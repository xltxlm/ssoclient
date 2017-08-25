<?php
namespace kuaigeng\sso\Thrift\Ssoctroller\Hprose;

use Hprose\Socket\Client;
/**
* Hprose 客户端实现
*/
class SsoctrollerInsert
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
    public function setServerhost(string $serverhost): SsoctrollerInsert    {
        $this->serverhost = $serverhost;
        return $this;
    }


    /** @var \kuaigeng\sso\Thrift\Ssoctroller\SsoctrollerModel */
    protected $SsoctrollerModel;

    /**
     * @return \kuaigeng\sso\Thrift\Ssoctroller\SsoctrollerModel
     */
    public function getSsoctrollerModel()
    {
        return $this->SsoctrollerModel;
    }

    /**
     * @param \kuaigeng\sso\Thrift\Ssoctroller\SsoctrollerModel $Ssoctroller
     * @return $this
     */
    public function setSsoctrollerModel($Ssoctroller)
    {
        $this->SsoctrollerModel = $Ssoctroller;
        return $this;
    }

    public function __invoke()
    {
                $client = new Client($this->getServerhost(),false);
        return call_user_func_array( [$client,'SsoctrollerInsert'], [$this->getSsoctrollerModel()->__toArray()]);
    }


}