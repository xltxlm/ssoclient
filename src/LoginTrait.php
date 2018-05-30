<?php

namespace xltxlm\ssoclient;

use kuaigeng\kkreview\Grpc\SsoctrolleruserRequest;
use kuaigeng\kkreview\Grpc\SsoctrolleruserResponse;
use xltxlm\h5skin\Request\UserCookieModel;
use xltxlm\helper\BasicType;
use xltxlm\helper\Ctroller\LoadClass;
use xltxlm\helper\Url\FixUrl;
use xltxlm\redis\RedisCache;
use xltxlm\ssoclient\Sso\access;
use xltxlm\thrift\Config\ThriftConfig;

/**
 * 登陆检测判断,放在每个需要验证的类入口上面
 * Class LoginTrait.
 */
trait LoginTrait
{
    use base64Trait;
    /** @var  UserCookieModel */
    protected $userCookieModel;
    protected $ssoauthString = "";
    /** @var string 公钥的文件路径 */
    public static $privatekeyPath = "";
    /** @var int */
    protected $ssoctroller_class_access = access::WU_QUAN_XIAN;

    /** @var  SsoUserModel */
    protected $SsoUserModel;
    /** @var string sso登录服务器地址的配置类 */
    protected $SsoThriftConfig = "";

    /**
     * @return string
     */
    public function getSsoctrollerClass(): string
    {
        return $this->ssoctroller_class ?: static::class;
    }

    /**
     * @param string $ssoctroller_class
     * @return $this
     */
    public function setSsoctrollerClass(string $ssoctroller_class)
    {
        $this->ssoctroller_class = $ssoctroller_class;
        return $this;
    }


    /**
     * @return UserCookieModel
     */
    public function getUserCookieModel()
    {
        return $this->userCookieModel;
    }


    /**
     * @return string
     */
    public function getSsoThriftConfig()
    {
        return $this->SsoThriftConfig;
    }

    /**
     * @param string $SsoThriftConfig
     * @return LoginTrait
     */
    public function setSsoThriftConfig(string $SsoThriftConfig): LoginTrait
    {
        $this->SsoThriftConfig = $SsoThriftConfig;
        return $this;
    }


    /**
     * @return int
     */
    public function getSsoctrollerClassAccess(): int
    {
        return $this->ssoctroller_class_access;
    }

    /**
     * @param string $ssoctroller_class_access
     * @return LoginTrait
     */
    public function setSsoctrollerClassAccess(int $ssoctroller_class_access)
    {
        $this->ssoctroller_class_access = $ssoctroller_class_access;
        return $this;
    }

    /**
     * sso登陆成功之后回调
     * @return SsoUserModel
     */
    final public function getLoginTraitSsoUserModel()
    {
        $this->userCookieModel = new UserCookieModel();
        //如果存在登陆密钥，账户直接从密钥里面取出即可
        //&& $_SERVER['HTTP_REFERER']
        $is需要切换账户 = (!$this->userCookieModel->getUsername() || !$this->userCookieModel->check()) && $this->getSsoauthString() && self::$privatekeyPath;
        if ($is需要切换账户) {
            $decryptedviaprivatekey = "";
            $privatekey = file_get_contents(self::$privatekeyPath);
            //解密
            openssl_private_decrypt($this->getSsoauthString(), $decryptedviaprivatekey, $privatekey);
            $decryptedviapublickeyArray = json_decode($decryptedviaprivatekey, true);
            $this->SsoUserModel = (new SsoUserModel($decryptedviapublickeyArray));
            //如果是第一次取到字符串,那么设置cookie
            $this->userCookieModel
                ->setUsername($this->SsoUserModel->getUsername())
                ->makeCookie();
        } else {
            $this->SsoUserModel = (new SsoUserModel())
                ->setUsername($this->userCookieModel->getUsername());
        }

        return $this->SsoUserModel;
    }


    /**
     * @return string
     */
    public static function getPrivatekeyPath()
    {
        return self::$privatekeyPath;
    }

    /**
     * 注意下会不会被 request 设置上去
     * @param string $privatekeyPath
     * @return string
     */
    public static function setPrivatekeyPath($privatekeyPath)
    {
        return self::$privatekeyPath = $privatekeyPath;
    }


    /**
     * @return string
     */
    public function getSsoauthString()
    {
        return self::base64url_decode($_REQUEST['ssoauthString']);
    }


    /** @var  SsoctrolleruserResponse */
    protected $Ssoctrolleruser;

    /**
     * @return SsoctrolleruserResponse
     */
    public function getSsoctrolleruser()
    {
        return $this->Ssoctrolleruser;
    }


    /**
     * 检测是否登陆
     */
    final public function getLoginTrait()
    {
        $islogin = $this->userCookieModel
            ->check();

        //登录了,确认权限
        $SsoThriftConfig = $this->getSsoThriftConfig();
        /** @var ThriftConfig $SsoThriftConfigObject */
        if ($SsoThriftConfig) {
            $SsoThriftConfigObject = new $SsoThriftConfig;
        }
        //没有登录，重定向要求登录
        if (php_sapi_name() == 'cli') {
            $this->setSsoctrollerClassAccess(access::CAO_ZUO);
            return null;
        } else {
            //如果配置的登录中心，并且没有登录的。跳转过去
            if (!$islogin && is_a($SsoThriftConfigObject, ThriftConfig::class)) {
                (new FixUrl('http://' . $SsoThriftConfigObject->getHosturl() . ':' . $SsoThriftConfigObject->getPort()))
                    ->setAttachKesy(['backurl' => $this::Myurl()])
                    ->setJump(true)
                    ->__invoke();
            }
        }

        if ($islogin && $SsoThriftConfig && self::$privatekeyPath) {

            $rootNamespce = (new BasicType(LoadClass::$rootNamespce))->popby('\\')->getValue();
            $SsoctrolleruserRequestClass = $rootNamespce . '\\Grpc\\SsoctrolleruserRequest';
            $SsoctrolleruserResponseClass = $rootNamespce . '\\Grpc\\SsoctrolleruserResponse';

            //一个账户的权限默认缓存一个小时
            $key = "priv_" . $this->userCookieModel->getUsername() . $this->getSsoctrollerClass() . $_SERVER['HTTP_X_FORWARDED_PORT'];

            $redisClass = $rootNamespce . '\\Config\\RedisCacheConfig';
            $RedisCacheObject = (new RedisCache())
                ->setRedisConfig(new $redisClass)
                ->setKey($key)
                ->setExpire(3600 / 2);
            $Ssoctrolleruser = $RedisCacheObject->__invoke();
            if ($RedisCacheObject->isCached()) {
                $this->Ssoctrolleruser = $Ssoctrolleruser;
            }

            if (!($this->Ssoctrolleruser instanceof $SsoctrolleruserResponseClass)) {
                $this->Ssoctrolleruser = (new $SsoctrolleruserResponseClass);
            }
            if (!$this->Ssoctrolleruser->getAccess() || $this->Ssoctrolleruser->getAccess() == '无权限') //查询当前账户的权限
            {
                /** @var SsoctrolleruserRequest $Ssoctrolleruser */
                $Ssoctrolleruser = (new $SsoctrolleruserRequestClass);
                $this->Ssoctrolleruser = $Ssoctrolleruser
                    ->setCtroller_class($this->getSsoctrollerClass())
                    ->setHttpsport($_SERVER['HTTP_X_FORWARDED_PORT'])
                    ->setUser($this->userCookieModel->getUsername())
                    ->__invoke();
                if ($this->Ssoctrolleruser->getAccess() != '无权限') {
                    $RedisCacheObject
                        ->setValue($this->Ssoctrolleruser)
                        ->__invoke();
                }
            }

            if ($this->Ssoctrolleruser->getAccess() == '无权限') {
                $this->setSsoctrollerClassAccess(access::WU_QUAN_XIAN);
            }
            if ($this->Ssoctrolleruser->getAccess() == '操作') {
                $this->setSsoctrollerClassAccess(access::CAO_ZUO);
            }
            if ($this->Ssoctrolleruser->getAccess() == '只读') {
                $this->setSsoctrollerClassAccess(access::ZHI_DU);
            }
        }
    }
}
