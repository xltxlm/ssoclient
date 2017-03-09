<?php

namespace xltxlm\ssoclient;

use xltxlm\h5skin\Request\UserCookieModel;
use xltxlm\helper\Ctroller\Request\Request;

/**
 * 登陆检测判断,放在每个需要验证的类入口上面
 * Class LoginTrait.
 */
trait LoginTrait
{
    use Request;
    protected $ssoauthString = "";
    /** @var string 公钥的文件路径 */
    public static $pubkeyPath = "";
    /** @var string sso网址 */
    public static $ssoUrl = "";

    /** @var  SsoUserModel */
    protected $SsoUserModel;

    /**
     * sso登陆成功之后回调
     * @return SsoUserModel
     */
    public function getSsoUserModel()
    {
        $userCookieModel = new UserCookieModel();
        if ($this->getSsoauthString()) {
            $decryptedviapublickey = "";
            $pubkey = file_get_contents(self::$pubkeyPath);
            //解密
            openssl_public_decrypt($this->getSsoauthString(), $decryptedviapublickey, $pubkey);
            $decryptedviapublickeyArray = json_decode($decryptedviapublickey, true);
            $this->SsoUserModel = (new SsoUserModel($decryptedviapublickeyArray));
            //如果是第一次取到字符串,那么设置cookie
            $userCookieModel->setUsername($this->SsoUserModel->getUsername());
            $userCookieModel->makeCookie();
        } else {
            $this->SsoUserModel = (new SsoUserModel())
                ->setUsername($userCookieModel->getUsername());
        }

        return $this->SsoUserModel;
    }


    /**
     * @return string
     */
    public static function getSsoUrl()
    {
        return self::$ssoUrl;
    }

    /**
     * @return string
     */
    public static function setSsoUrl($ssoUrl)
    {
        return self::$ssoUrl = $ssoUrl;
    }


    /**
     * @return string
     */
    public static function getPubkeyPath()
    {
        return self::$pubkeyPath;
    }

    /**
     * 注意下会不会被 request 设置上去
     * @param string $pubkeyPath
     * @return string
     */
    public static function setPubkeyPath($pubkeyPath)
    {
        return self::$pubkeyPath = $pubkeyPath;
    }


    /**
     * @return string
     */
    public function getSsoauthString()
    {
        return base64_decode($this->ssoauthString);
    }

    /**
     * @param string $ssoauthString
     * @return LoginTrait
     */
    public function setSsoauthString($ssoauthString)
    {
        $this->ssoauthString = $ssoauthString;
        return $this;
    }


    /**
     * 检测是否登陆
     */
    public function getLoginTrait()
    {
        $islogin = (new UserCookieModel())
            ->check();
        if (!$islogin) {
            header("Location:".self::$ssoUrl);
            die;
        }
    }
}
