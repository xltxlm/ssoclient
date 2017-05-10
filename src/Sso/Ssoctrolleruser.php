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


/**
 * Structs are the basic complex data structures. They are comprised of fields
 * which each have an integer identifier, a type, a symbolic name, and an
 * optional default value.
 * 
 * Fields can be declared "optional", which ensures they will not be included
 * in the serialized output if they aren't set.  Note that this requires some
 * manual management in some languages.
 */
class Ssoctrolleruser {
  static $_TSPEC;

  /**
   * @var string
   */
  public $id = null;
  /**
   * @var string
   */
  public $user = null;
  /**
   * @var string
   */
  public $project_name = null;
  /**
   * @var string
   */
  public $ctroller_class = null;
  /**
   * @var string
   */
  public $access = null;
  /**
   * @var string
   */
  public $status = null;
  /**
   * @var string
   */
  public $title = null;
  /**
   * @var string
   */
  public $add_time = null;
  /**
   * @var string
   */
  public $update_time = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'id',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'user',
          'type' => TType::STRING,
          ),
        3 => array(
          'var' => 'project_name',
          'type' => TType::STRING,
          ),
        4 => array(
          'var' => 'ctroller_class',
          'type' => TType::STRING,
          ),
        5 => array(
          'var' => 'access',
          'type' => TType::STRING,
          ),
        6 => array(
          'var' => 'status',
          'type' => TType::STRING,
          ),
        7 => array(
          'var' => 'title',
          'type' => TType::STRING,
          ),
        8 => array(
          'var' => 'add_time',
          'type' => TType::STRING,
          ),
        9 => array(
          'var' => 'update_time',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['id'])) {
        $this->id = $vals['id'];
      }
      if (isset($vals['user'])) {
        $this->user = $vals['user'];
      }
      if (isset($vals['project_name'])) {
        $this->project_name = $vals['project_name'];
      }
      if (isset($vals['ctroller_class'])) {
        $this->ctroller_class = $vals['ctroller_class'];
      }
      if (isset($vals['access'])) {
        $this->access = $vals['access'];
      }
      if (isset($vals['status'])) {
        $this->status = $vals['status'];
      }
      if (isset($vals['title'])) {
        $this->title = $vals['title'];
      }
      if (isset($vals['add_time'])) {
        $this->add_time = $vals['add_time'];
      }
      if (isset($vals['update_time'])) {
        $this->update_time = $vals['update_time'];
      }
    }
  }

  public function getName() {
    return 'Ssoctrolleruser';
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
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->id);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->user);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->project_name);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 4:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->ctroller_class);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 5:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->access);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 6:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->status);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 7:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->title);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 8:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->add_time);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 9:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->update_time);
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
    $xfer += $output->writeStructBegin('Ssoctrolleruser');
    if ($this->id !== null) {
      $xfer += $output->writeFieldBegin('id', TType::STRING, 1);
      $xfer += $output->writeString($this->id);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->user !== null) {
      $xfer += $output->writeFieldBegin('user', TType::STRING, 2);
      $xfer += $output->writeString($this->user);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->project_name !== null) {
      $xfer += $output->writeFieldBegin('project_name', TType::STRING, 3);
      $xfer += $output->writeString($this->project_name);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->ctroller_class !== null) {
      $xfer += $output->writeFieldBegin('ctroller_class', TType::STRING, 4);
      $xfer += $output->writeString($this->ctroller_class);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->access !== null) {
      $xfer += $output->writeFieldBegin('access', TType::STRING, 5);
      $xfer += $output->writeString($this->access);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->status !== null) {
      $xfer += $output->writeFieldBegin('status', TType::STRING, 6);
      $xfer += $output->writeString($this->status);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->title !== null) {
      $xfer += $output->writeFieldBegin('title', TType::STRING, 7);
      $xfer += $output->writeString($this->title);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->add_time !== null) {
      $xfer += $output->writeFieldBegin('add_time', TType::STRING, 8);
      $xfer += $output->writeString($this->add_time);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->update_time !== null) {
      $xfer += $output->writeFieldBegin('update_time', TType::STRING, 9);
      $xfer += $output->writeString($this->update_time);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

