<?php
namespace xltxlm\ssoclient\Sso_userlock;
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


class ThriftServer_Sso_userlockSelectOne_args {
  static $_TSPEC;

  /**
   * @var \xltxlm\ssoclient\Sso_userlock\SsoUserlock
   */
  public $SsoUserlock = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'SsoUserlock',
          'type' => TType::STRUCT,
          'class' => '\kuaigeng\sso\Thrift\Sso_userlock\SsoUserlock',
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['SsoUserlock'])) {
        $this->SsoUserlock = $vals['SsoUserlock'];
      }
    }
  }

  public function getName() {
    return 'ThriftServer_Sso_userlockSelectOne_args';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRUCT) {
            $this->SsoUserlock = new \xltxlm\ssoclient\Sso_userlock\SsoUserlock();
            $xfer += $this->SsoUserlock->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('ThriftServer_Sso_userlockSelectOne_args');
    if ($this->SsoUserlock !== null) {
      if (!is_object($this->SsoUserlock)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('SsoUserlock', TType::STRUCT, 1);
      $xfer += $this->SsoUserlock->write($output);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

