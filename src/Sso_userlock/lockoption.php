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


/**
 * You can define enums, which are just 32 bit integers. Values are optional
 * and start at 1 if not supplied, C style again.
 */
final class lockoption {
  const DENG_YU = 1;
  const BU_DENG_YU = 2;
  const BAO_HAN = 3;
  const BU_ZAI_LIE_BIAO_ZHONG = 4;
  static public $__names = array(
    1 => 'DENG_YU',
    2 => 'BU_DENG_YU',
    3 => 'BAO_HAN',
    4 => 'BU_ZAI_LIE_BIAO_ZHONG',
  );
}
