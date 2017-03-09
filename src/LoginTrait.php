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
    public static $privatekeyPath = "";
    /** @var string sso网址 */
    public static $ssoUrl = "";

    /** @var  SsoUserModel */
    protected $SsoUserModel;

    public static function base64url_encode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    public static function base64url_decode($data)
    {
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }

    /**
     * sso登陆成功之后回调
     * @return SsoUserModel
     */
    public function getSsoUserModel()
    {
        $userCookieModel = new UserCookieModel();
        if ($this->getSsoauthString()) {
            $decryptedviaprivatekey = "";
            $privatekey = file_get_contents(self::$privatekeyPath);
            //解密
            openssl_private_decrypt($this->getSsoauthString(), $decryptedviaprivatekey, $privatekey);
            $decryptedviapublickeyArray = json_decode($decryptedviaprivatekey, true);
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
        return self::base64url_decode($this->ssoauthString);
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
