<?php

namespace xltxlm\ssoclient\SsoAdmin;

use xltxlm\helper\Hclass\ObjectToArray;
use xltxlm\helper\Hclass\LoadFromArray;

class  ssoadminrequestModel extends ssoadminrequest
{
    use ObjectToArray;
    use LoadFromArray;

    /** @var string */
    public $project_name;

    /**
     * @return string     */
    public function getProject_name()
    {
        return $this->project_name;
    }

    /**
     * @param string $project_name
     * @return ssoadminrequestModel
     */
    public function setProject_name($project_name)
    {
        $this->project_name = $project_name;
        return $this;
    }
    /** @var string */
    public $username;

    /**
     * @return string     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return ssoadminrequestModel
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

}
