<?php
namespace xltxlm\ssoclient\Sso_userlock\Hprose;

use Hprose\Socket\Client;
/**
* Hprose 客户端实现
*/
class Sso_userlockSelectAll
{
    /** @var string 服务器的地址 */
    protected $serverhost="";

  /**
     * @return string
     */
    public function getServerhost(): string
    {
        return $this->serverhost;
    }

    /**
     * @param string $serverhost
     * @return $this
     */
    public function setServerhost(string $serverhost): Sso_userlockSelectAll    {
        $this->serverhost = $serverhost;
        return $this;
    }


    /** @var \xltxlm\ssoclient\Sso_userlock\SsoUserlockModel */
    protected $SsoUserlockModel;

    /**
     * @return \xltxlm\ssoclient\Sso_userlock\SsoUserlockModel
     */
    public function getSsoUserlockModel()
    {
        return $this->SsoUserlockModel;
    }

    /**
     * @param \xltxlm\ssoclient\Sso_userlock\SsoUserlockModel $SsoUserlock
     * @return $this
     */
    public function setSsoUserlockModel($SsoUserlock)
    {
        $this->SsoUserlockModel = $SsoUserlock;
        return $this;
    }

    public function __invoke()
    {
                $client = new Client($this->getServerhost(),false);
        return call_user_func_array( [$client,'Sso_userlockSelectAll'], [$this->getSsoUserlockModel()->__toArray()]);
    }


}