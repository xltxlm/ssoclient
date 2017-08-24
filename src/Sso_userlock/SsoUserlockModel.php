<?php

namespace xltxlm\ssoclient\Sso_userlock;

use xltxlm\helper\Hclass\ObjectToArray;
use xltxlm\helper\Hclass\LoadFromArray;

class  SsoUserlockModel extends SsoUserlock
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
     * @return SsoUserlockModel
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return SsoUserlockModel
     */
    public function setCtroller_class($ctroller_class)
    {
        $this->ctroller_class = $ctroller_class;
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
     * @return SsoUserlockModel
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }
    /** @var string */
    public $field;

    /**
     * @return string     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * @param string $field
     * @return SsoUserlockModel
     */
    public function setField($field)
    {
        $this->field = $field;
        return $this;
    }
    /** @var string */
    public $lockoption;

    /**
     * @return string     */
    public function getLockoption()
    {
        return $this->lockoption;
    }

    /**
     * @param string $lockoption
     * @return SsoUserlockModel
     */
    public function setLockoption($lockoption)
    {
        $this->lockoption = $lockoption;
        return $this;
    }
    /** @var string */
    public $lockvalue;

    /**
     * @return string     */
    public function getLockvalue()
    {
        return $this->lockvalue;
    }

    /**
     * @param string $lockvalue
     * @return SsoUserlockModel
     */
    public function setLockvalue($lockvalue)
    {
        $this->lockvalue = $lockvalue;
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
     * @return SsoUserlockModel
     */
    public function setUsername($username)
    {
        $this->username = $username;
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
     * @return SsoUserlockModel
     */
    public function setStatus($status)
    {
        $this->status = $status;
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
     * @return SsoUserlockModel
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
     * @return SsoUserlockModel
     */
    public function setUpdate_time($update_time)
    {
        $this->update_time = $update_time;
        return $this;
    }
    /** @var string */
    public $elasticsearch;

    /**
     * @return string     */
    public function getElasticsearch()
    {
        return $this->elasticsearch;
    }

    /**
     * @param string $elasticsearch
     * @return SsoUserlockModel
     */
    public function setElasticsearch($elasticsearch)
    {
        $this->elasticsearch = $elasticsearch;
        return $this;
    }

}
