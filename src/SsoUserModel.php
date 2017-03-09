<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/3/9
 * Time: 17:12.
 */

namespace xltxlm\ssoclient;

use xltxlm\helper\Hclass\LoadFromArray;

class SsoUserModel
{
    use LoadFromArray;
    /** @var string 账户id */
    protected $id = 0;
    /** @var string 账户 */
    protected $username = '';

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return SsoUserModel
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     *
     * @return SsoUserModel
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }
}
