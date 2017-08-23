<?php
namespace xltxlm\ssoclient\SsoAdmin\Hprose;

use Hprose\Socket\Client;
/**
* Hprose 客户端实现
*/
class Ssoadmininfo
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
    public function setServerhost(string $serverhost): Ssoadmininfo    {
        $this->serverhost = $serverhost;
        return $this;
    }


    /** @var \xltxlm\ssoclient\SsoAdmin\ssoadminrequestModel */
    protected $SsoadminrequestModel;

    /**
     * @return \xltxlm\ssoclient\SsoAdmin\ssoadminrequestModel
     */
    public function getSsoadminrequestModel()
    {
        return $this->SsoadminrequestModel;
    }

    /**
     * @param \xltxlm\ssoclient\SsoAdmin\ssoadminrequestModel $Ssoadminrequest
     * @return $this
     */
    public function setSsoadminrequestModel($Ssoadminrequest)
    {
        $this->SsoadminrequestModel = $Ssoadminrequest;
        return $this;
    }

    public function __invoke()
    {
                $client = new Client($this->getServerhost(),false);
        return call_user_func_array( [$client,'ssoadmininfo'], [$this->getSsoadminrequestModel()->__toArray()]);
    }


}