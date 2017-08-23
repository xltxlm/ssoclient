<?php

namespace xltxlm\ssoclient\SsoAdmin;

use xltxlm\helper\Hclass\ObjectToArray;
use xltxlm\helper\Hclass\LoadFromArray;

class  ssoadminModel extends ssoadmin
{
    use ObjectToArray;
    use LoadFromArray;

    /** @var string */
    public $user;

    /**
     * @return string     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param string $user
     * @return ssoadminModel
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }
    /** @var string */
    public $ldap;

    /**
     * @return string     */
    public function getLdap()
    {
        return $this->ldap;
    }

    /**
     * @param string $ldap
     * @return ssoadminModel
     */
    public function setLdap($ldap)
    {
        $this->ldap = $ldap;
        return $this;
    }

}
