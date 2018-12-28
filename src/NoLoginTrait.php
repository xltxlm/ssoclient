<?php

namespace xltxlm\ssoclient;

use xltxlm\h5skin\Request\UserCookieModel;

/**
 * 登陆检测判断,放在每个需要验证的类入口上面
 * Class LoginTrait.
 */
trait NoLoginTrait
{
    /** @var  UserCookieModel */
    protected $userCookieModel;


    /**
     * @return UserCookieModel
     */
    public function getUserCookieModel()
    {
        return $this->userCookieModel=new UserCookieModel();
    }

}
