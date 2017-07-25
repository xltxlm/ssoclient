<?php

namespace xltxlm\ssoclient;

use xltxlm\h5skin\Request\UserCookieModel;
use xltxlm\helper\Url\FixUrl;
use xltxlm\ssoclient\Sso\access;
use xltxlm\ssoclient\Sso\Client\SsoctrolleruserSelectOne;
use xltxlm\ssoclient\Sso\Ssoctrolleruser;
use xltxlm\ssoclient\Sso\SsoctrolleruserModel;
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
        if ($this->getSsoauthString() && self::$privatekeyPath) {
            $decryptedviaprivatekey = "";
            $privatekey = file_get_contents(self::$privatekeyPath);
            //解密
            openssl_private_decrypt($this->getSsoauthString(), $decryptedviaprivatekey, $privatekey);
            $decryptedviapublickeyArray = json_decode($decryptedviaprivatekey, true);
            $this->SsoUserModel = (new SsoUserModel($decryptedviapublickeyArray));
            //如果是第一次取到字符串,那么设置cookie
            $this->userCookieModel->setUsername($this->SsoUserModel->getUsername());
            $this->userCookieModel->makeCookie();
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


    /** @var  Ssoctrolleruser */
    protected $Ssoctrolleruser;

    /**
     * @return Ssoctrolleruser
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
        if (!$islogin && is_a($SsoThriftConfigObject, ThriftConfig::class)) {
            return (new FixUrl('http://' . $SsoThriftConfigObject->getHosturl() . ':' . $SsoThriftConfigObject->getPort()))
                ->setAttachKesy(['backurl' => $this::Myurl()])
                ->setJump(true)
                ->__invoke();
        }


        if ($islogin && $SsoThriftConfig && self::$privatekeyPath) {
            $SsoctrolleruserModel = (new SsoctrolleruserModel())
                ->setUser($this->userCookieModel->getUsername())
                ->setCtroller_class($this->ssoctroller_class ?: static::class);
            $this->Ssoctrolleruser = (new SsoctrolleruserSelectOne())
                ->setSsoctrolleruserModel($SsoctrolleruserModel)
                ->setThriftConfig(new $SsoThriftConfig)
                ->__invoke();
            if ($this->Ssoctrolleruser->access == '无权限') {
                $this->setSsoctrollerClassAccess(access::WU_QUAN_XIAN);
            }
            if ($this->Ssoctrolleruser->access == '操作') {
                $this->setSsoctrollerClassAccess(access::CAO_ZUO);
            }
            if ($this->Ssoctrolleruser->access == '只读') {
                $this->setSsoctrollerClassAccess(access::ZHI_DU);
            }

        }
    }
}
