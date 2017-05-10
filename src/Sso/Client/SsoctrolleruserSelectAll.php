<?php

namespace xltxlm\ssoclient\Sso\Client;

use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TSocket;
use Thrift\Transport\THttpClient;
use Thrift\Transport\TBufferedTransport;
use Thrift\Exception\TException;
use \xltxlm\thrift\Config\ThriftConfig;
use xltxlm\ssoclient\Sso\ThriftServerClient;
use xltxlm\ssoclient\Sso\SsoctrolleruserModel;

/**
* Thrift 客户端实现
*/
class SsoctrolleruserSelectAll
{
    /** @var ThriftConfig 配置类 */
    protected $ThriftConfig;

    /** @var TBufferedTransport */
    protected $transport;
    /** @var ThriftServerClient */
    protected $client;


    /** @var SsoctrolleruserModel */
    protected $SsoctrolleruserModel;

    /**
     * @return SsoctrolleruserModel
     */
    public function getSsoctrolleruserModel()
    {
        return $this->SsoctrolleruserModel;
    }

    /**
     * @param SsoctrolleruserModel $Ssoctrolleruser
     * @return $this
     */
    public function setSsoctrolleruserModel($Ssoctrolleruser)
    {
        $this->SsoctrolleruserModel = $Ssoctrolleruser;
        return $this;
    }

    /**
     * @param ThriftConfig $ThriftConfig
    */
    public function __construct(ThriftConfig $ThriftConfig = null )
    {
        if( $ThriftConfig )
        {
            $this->setThriftConfig($ThriftConfig);
        }
    }

    /**
     * @param ThriftConfig $ThriftConfig
     * @return $this
    */
    public function setThriftConfig(ThriftConfig $ThriftConfig )
    {
        $this->ThriftConfig=$ThriftConfig;
        if ($ThriftConfig->getType() == ThriftConfig::HTTP) {
            $socket = new THttpClient($ThriftConfig->getHost(), $ThriftConfig->getPort(), '?c=ThriftServer/ThriftServerSsoctrolleruserSelectAll');
        } else {
            $socket = new TSocket($ThriftConfig->getHost(), $ThriftConfig->getPort());
        }
        $this->transport = new TBufferedTransport($socket, 1024, 1024);
        $protocol = new TBinaryProtocol($this->transport);
        $this->client = new ThriftServerClient($protocol);
        $this->transport->open();
        return $this;
    }


    /**
     * @return \xltxlm\ssoclient\Sso\Ssoctrolleruser[]
    */
    public function __invoke()  {
                return call_user_func_array( [$this->client,'SsoctrolleruserSelectAll'], [$this->getSsoctrolleruserModel()]);
    }

    public function __destruct()
    {
        //$this->transport->close();
    }
}

