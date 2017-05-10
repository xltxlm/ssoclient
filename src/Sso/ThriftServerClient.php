<?php
namespace xltxlm\ssoclient\Sso;
/**
 * Autogenerated by Thrift Compiler (0.10.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;


class ThriftServerClient implements \xltxlm\ssoclient\Sso\ThriftServerIf {
  protected $input_ = null;
  protected $output_ = null;

  protected $seqid_ = 0;

  public function __construct($input, $output=null) {
    $this->input_ = $input;
    $this->output_ = $output ? $output : $input;
  }

  public function SsoctrolleruserInsert(\xltxlm\ssoclient\Sso\Ssoctrolleruser $Ssoctrolleruser)
  {
    $this->send_SsoctrolleruserInsert($Ssoctrolleruser);
    return $this->recv_SsoctrolleruserInsert();
  }

  public function send_SsoctrolleruserInsert(\xltxlm\ssoclient\Sso\Ssoctrolleruser $Ssoctrolleruser)
  {
    $args = new \xltxlm\ssoclient\Sso\ThriftServer_SsoctrolleruserInsert_args();
    $args->Ssoctrolleruser = $Ssoctrolleruser;
    $bin_accel = ($this->output_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
    if ($bin_accel)
    {
      thrift_protocol_write_binary($this->output_, 'SsoctrolleruserInsert', TMessageType::CALL, $args, $this->seqid_, $this->output_->isStrictWrite());
    }
    else
    {
      $this->output_->writeMessageBegin('SsoctrolleruserInsert', TMessageType::CALL, $this->seqid_);
      $args->write($this->output_);
      $this->output_->writeMessageEnd();
      $this->output_->getTransport()->flush();
    }
  }

  public function recv_SsoctrolleruserInsert()
  {
    $bin_accel = ($this->input_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary');
    if ($bin_accel) $result = thrift_protocol_read_binary($this->input_, '\xltxlm\allinone\Thrift\Ssoctrolleruser\ThriftServer_SsoctrolleruserInsert_result', $this->input_->isStrictRead());
    else
    {
      $rseqid = 0;
      $fname = null;
      $mtype = 0;

      $this->input_->readMessageBegin($fname, $mtype, $rseqid);
      if ($mtype == TMessageType::EXCEPTION) {
        $x = new TApplicationException();
        $x->read($this->input_);
        $this->input_->readMessageEnd();
        throw $x;
      }
      $result = new \xltxlm\ssoclient\Sso\ThriftServer_SsoctrolleruserInsert_result();
      $result->read($this->input_);
      $this->input_->readMessageEnd();
    }
    if ($result->success !== null) {
      return $result->success;
    }
    throw new \Exception("SsoctrolleruserInsert failed: unknown result");
  }

  public function SsoctrolleruserSelectOne(\xltxlm\ssoclient\Sso\Ssoctrolleruser $Ssoctrolleruser)
  {
    $this->send_SsoctrolleruserSelectOne($Ssoctrolleruser);
    return $this->recv_SsoctrolleruserSelectOne();
  }

  public function send_SsoctrolleruserSelectOne(\xltxlm\ssoclient\Sso\Ssoctrolleruser $Ssoctrolleruser)
  {
    $args = new \xltxlm\ssoclient\Sso\ThriftServer_SsoctrolleruserSelectOne_args();
    $args->Ssoctrolleruser = $Ssoctrolleruser;
    $bin_accel = ($this->output_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
    if ($bin_accel)
    {
      thrift_protocol_write_binary($this->output_, 'SsoctrolleruserSelectOne', TMessageType::CALL, $args, $this->seqid_, $this->output_->isStrictWrite());
    }
    else
    {
      $this->output_->writeMessageBegin('SsoctrolleruserSelectOne', TMessageType::CALL, $this->seqid_);
      $args->write($this->output_);
      $this->output_->writeMessageEnd();
      $this->output_->getTransport()->flush();
    }
  }

  public function recv_SsoctrolleruserSelectOne()
  {
    $bin_accel = ($this->input_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary');
    if ($bin_accel) $result = thrift_protocol_read_binary($this->input_, '\xltxlm\allinone\Thrift\Ssoctrolleruser\ThriftServer_SsoctrolleruserSelectOne_result', $this->input_->isStrictRead());
    else
    {
      $rseqid = 0;
      $fname = null;
      $mtype = 0;

      $this->input_->readMessageBegin($fname, $mtype, $rseqid);
      if ($mtype == TMessageType::EXCEPTION) {
        $x = new TApplicationException();
        $x->read($this->input_);
        $this->input_->readMessageEnd();
        throw $x;
      }
      $result = new \xltxlm\ssoclient\Sso\ThriftServer_SsoctrolleruserSelectOne_result();
      $result->read($this->input_);
      $this->input_->readMessageEnd();
    }
    if ($result->success !== null) {
      return $result->success;
    }
    throw new \Exception("SsoctrolleruserSelectOne failed: unknown result");
  }

  public function SsoctrolleruserSelectAll(\xltxlm\ssoclient\Sso\Ssoctrolleruser $Ssoctrolleruser)
  {
    $this->send_SsoctrolleruserSelectAll($Ssoctrolleruser);
    return $this->recv_SsoctrolleruserSelectAll();
  }

  public function send_SsoctrolleruserSelectAll(\xltxlm\ssoclient\Sso\Ssoctrolleruser $Ssoctrolleruser)
  {
    $args = new \xltxlm\ssoclient\Sso\ThriftServer_SsoctrolleruserSelectAll_args();
    $args->Ssoctrolleruser = $Ssoctrolleruser;
    $bin_accel = ($this->output_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
    if ($bin_accel)
    {
      thrift_protocol_write_binary($this->output_, 'SsoctrolleruserSelectAll', TMessageType::CALL, $args, $this->seqid_, $this->output_->isStrictWrite());
    }
    else
    {
      $this->output_->writeMessageBegin('SsoctrolleruserSelectAll', TMessageType::CALL, $this->seqid_);
      $args->write($this->output_);
      $this->output_->writeMessageEnd();
      $this->output_->getTransport()->flush();
    }
  }

  public function recv_SsoctrolleruserSelectAll()
  {
    $bin_accel = ($this->input_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary');
    if ($bin_accel) $result = thrift_protocol_read_binary($this->input_, '\xltxlm\allinone\Thrift\Ssoctrolleruser\ThriftServer_SsoctrolleruserSelectAll_result', $this->input_->isStrictRead());
    else
    {
      $rseqid = 0;
      $fname = null;
      $mtype = 0;

      $this->input_->readMessageBegin($fname, $mtype, $rseqid);
      if ($mtype == TMessageType::EXCEPTION) {
        $x = new TApplicationException();
        $x->read($this->input_);
        $this->input_->readMessageEnd();
        throw $x;
      }
      $result = new \xltxlm\ssoclient\Sso\ThriftServer_SsoctrolleruserSelectAll_result();
      $result->read($this->input_);
      $this->input_->readMessageEnd();
    }
    if ($result->success !== null) {
      return $result->success;
    }
    throw new \Exception("SsoctrolleruserSelectAll failed: unknown result");
  }

}

