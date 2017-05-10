<?php
namespace xltxlm\ssoclient\Sso\Hprose;

use Hprose\Socket\Client;
/**
* Hprose 客户端实现
*/
class SsoctrolleruserInsert
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
    public function setServerhost(string $serverhost): SsoctrolleruserInsert    {
        $this->serverhost = $serverhost;
        return $this;
    }


    /** @var \xltxlm\ssoclient\Sso\SsoctrolleruserModel */
    protected $SsoctrolleruserModel;

    /**
     * @return \xltxlm\ssoclient\Sso\SsoctrolleruserModel
     */
    public function getSsoctrolleruserModel()
    {
        return $this->SsoctrolleruserModel;
    }

    /**
     * @param \xltxlm\ssoclient\Sso\SsoctrolleruserModel $Ssoctrolleruser
     * @return $this
     */
    public function setSsoctrolleruserModel($Ssoctrolleruser)
    {
        $this->SsoctrolleruserModel = $Ssoctrolleruser;
        return $this;
    }

    public function __invoke()
    {
                $client = new Client($this->getServerhost(),false);
        return call_user_func_array( [$client,'SsoctrolleruserInsert'], [$this->getSsoctrolleruserModel()->__toArray()]);
    }


}