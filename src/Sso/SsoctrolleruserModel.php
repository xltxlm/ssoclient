<?php

namespace xltxlm\ssoclient\Sso;

use xltxlm\helper\Hclass\ObjectToArray;
use xltxlm\helper\Hclass\LoadFromArray;

class  SsoctrolleruserModel extends Ssoctrolleruser
{
    use ObjectToArray;
    use LoadFromArray;

    /** @var string */
    public $id;

    /**
     * @return string     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return SsoctrolleruserModel
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
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
     * @return SsoctrolleruserModel
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }
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
     * @return SsoctrolleruserModel
     */
    public function setProject_name($project_name)
    {
        $this->project_name = $project_name;
        return $this;
    }
    /** @var string */
    public $ctroller_class;

    /**
     * @return string     */
    public function getCtroller_class()
    {
        return $this->ctroller_class;
    }

    /**
     * @param string $ctroller_class
     * @return SsoctrolleruserModel
     */
    public function setCtroller_class($ctroller_class)
    {
        $this->ctroller_class = $ctroller_class;
        return $this;
    }
    /** @var string */
    public $access;

    /**
     * @return string     */
    public function getAccess()
    {
        return $this->access;
    }

    /**
     * @param string $access
     * @return SsoctrolleruserModel
     */
    public function setAccess($access)
    {
        $this->access = $access;
        return $this;
    }
    /** @var string */
    public $status;

    /**
     * @return string     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return SsoctrolleruserModel
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }
    /** @var string */
    public $title;

    /**
     * @return string     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return SsoctrolleruserModel
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }
    /** @var string */
    public $add_time;

    /**
     * @return string     */
    public function getAdd_time()
    {
        return $this->add_time;
    }

    /**
     * @param string $add_time
     * @return SsoctrolleruserModel
     */
    public function setAdd_time($add_time)
    {
        $this->add_time = $add_time;
        return $this;
    }
    /** @var string */
    public $update_time;

    /**
     * @return string     */
    public function getUpdate_time()
    {
        return $this->update_time;
    }

    /**
     * @param string $update_time
     * @return SsoctrolleruserModel
     */
    public function setUpdate_time($update_time)
    {
        $this->update_time = $update_time;
        return $this;
    }

}
