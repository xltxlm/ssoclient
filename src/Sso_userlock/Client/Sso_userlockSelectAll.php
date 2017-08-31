<?php

namespace xltxlm\ssoclient\Sso_userlock\Client;

use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TSocket;
use Thrift\Transport\THttpClient;
use Thrift\Transport\TBufferedTransport;
use Thrift\Exception\TException;
use \xltxlm\thrift\Config\ThriftConfig;
use xltxlm\ssoclient\Sso_userlock\ThriftServerClient;
use xltxlm\ssoclient\Sso_userlock\SsoUserlockModel;

/**
* Thrift 客户端实现
*/
class Sso_userlockSelectAll
{
    /** @var ThriftConfig 配置类 */
    protected $ThriftConfig;

    /** @var TBufferedTransport */
    protected $transport;
    /** @var ThriftServerClient */
    protected $client;


    /** @var SsoUserlockModel */
    protected $SsoUserlockModel;

    /**
     * @return SsoUserlockModel
     */
    public function getSsoUserlockModel()
    {
        return $this->SsoUserlockModel;
    }

    /**
     * @param SsoUserlockModel $SsoUserlock
     * @return $this
     */
    public function setSsoUserlockModel($SsoUserlock)
    {
        $this->SsoUserlockModel = $SsoUserlock;
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
            $socket = new THttpClient($ThriftConfig->getHost(), $ThriftConfig->getPort(), '?c=ThriftServer/ThriftServerSso_userlockSelectAll',$_SERVER['HTTPS'] ? 'https' : 'http');
            $socket->setTimeoutSecs(2);
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
     * @return \xltxlm\ssoclient\Sso_userlock\SsoUserlock[]
    */
    public function __invoke()  {
                return call_user_func_array( [$this->client,'Sso_userlockSelectAll'], [$this->getSsoUserlockModel()]);
    }

    public function __destruct()
    {
        if(is_object($this->transport))
            $this->transport->close();
    }
}
