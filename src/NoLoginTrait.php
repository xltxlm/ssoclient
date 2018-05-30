<?php

namespace xltxlm\ssoclient;

use xltxlm\h5skin\Request\UserCookieModel;
use xltxlm\helper\BasicType;
use xltxlm\helper\Ctroller\LoadClass;
use xltxlm\helper\Url\FixUrl;
use xltxlm\redis\LockKey;
use xltxlm\redis\RedisCache;
use xltxlm\redis\RedisGet;
use xltxlm\ssoclient\Sso\access;
use xltxlm\ssoclient\Sso\Client\SsoctrolleruserSelectOne;
use xltxlm\ssoclient\Sso\Ssoctrolleruser;
use xltxlm\ssoclient\Sso\SsoctrolleruserModel;
use xltxlm\thrift\Config\ThriftConfig;

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
