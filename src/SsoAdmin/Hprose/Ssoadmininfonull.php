<?php
namespace xltxlm\ssoclient\SsoAdmin\Hprose;

use Hprose\Socket\Client;
/**
* Hprose 客户端实现
*/
class Ssoadmininfonull
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
    public function setServerhost(string $serverhost): Ssoadmininfonull    {
        $this->serverhost = $serverhost;
        return $this;
    }


    /** @var \xltxlm\ssoclient\SsoAdmin\ssoadminModel */
    protected $SsoadminModel;

    /**
     * @return \xltxlm\ssoclient\SsoAdmin\ssoadminModel
     */
    public function getSsoadminModel()
    {
        return $this->SsoadminModel;
    }

    /**
     * @param \xltxlm\ssoclient\SsoAdmin\ssoadminModel $Ssoadmin
     * @return $this
     */
    public function setSsoadminModel($Ssoadmin)
    {
        $this->SsoadminModel = $Ssoadmin;
        return $this;
    }

    public function __invoke()
    {
                $client = new Client($this->getServerhost(),false);
        return call_user_func_array( [$client,'ssoadmininfonull'], [$this->getSsoadminModel()->__toArray()]);
    }


}