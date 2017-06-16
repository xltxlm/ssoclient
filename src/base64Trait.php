<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/6/14
 * Time: 16:17
 */

namespace xltxlm\ssoclient;

/**
 * 传输过程中加密解密
 * Trait base64Trait
 * @package xltxlm\ssoclient
 */
trait base64Trait
{
    public static function base64url_encode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    public static function base64url_decode($data)
    {
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }
}