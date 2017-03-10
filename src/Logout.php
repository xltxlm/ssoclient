<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/3/10
 * Time: 11:58.
 */

namespace xltxlm\ssoclient;

use xltxlm\h5skin\Request\UserCookieModel;
use xltxlm\helper\Ctroller\Unit\RunInvoke;
use xltxlm\helper\Url\FixUrl;

/**
 * 退出登录
 * Class Logout.
 */
trait Logout
{
    use RunInvoke;

    public function getLogout()
    {
        //清除掉sign
        (new UserCookieModel())
            ->clearCookie();
        $url = (new FixUrl(LoginTrait::$ssoUrl))->setAttachKesy(['c' => "Index/Logout", 'backurl' => urlencode($_GET['backurl'])])->__invoke();
        header("Location:".$url);
    }
}
