<?php
namespace Common\Model;
use Think\Model;
class CityModel extends Model{
    protected $_validate = array(
        //       验证字段1,验证规则,错误提示,                  [验证条件,附加规则,验证时间   1 必须验证  新增数据时候验证
        //array('id',     ''      ,'城市ID不能跟别城市ID相同',1        ,'unique',1),
        array('id','9','城市ID必须是9位数',1,'length'),
        array('id','number','城市ID必须是数字',1),

        array('pid'     ,'number'      ,'上级地区ID必须是数字'                   ,self::EXISTS_VALIDATE,'regex'  ,self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证类型
        array('pid'     ,'0,4294967295','上级地区ID的范围必须在0到4294967295之间',self::EXISTS_VALIDATE,'between',self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证大小
        array('name'    ,'require'     ,'地区名不能为空'                         ,self::MUST_VALIDATE  ,'regex'  ,self::MODEL_INSERT,),//没有默认值的不能为空的字段新增时必须验证
        array('name'    ,'0,128'       ,'地区名的字数必须在0到128之间'           ,self::EXISTS_VALIDATE,'length' ,self::MODEL_BOTH  ,),//其它类型的不论新增还是编辑 存在字段就验证长度
        array('level'   ,'require'     ,'地区级别不能为空'                       ,self::MUST_VALIDATE  ,'regex'  ,self::MODEL_INSERT,),//没有默认值的不能为空的字段新增时必须验证
        array('level'   ,'number'      ,'地区级别必须是数字'                     ,self::EXISTS_VALIDATE,'regex'  ,self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证类型
        array('level'   ,'0,255'       ,'地区级别的范围必须在0到255之间'         ,self::EXISTS_VALIDATE,'between',self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证大小
        array('order_no','require'     ,'排序号码不能为空'                       ,self::MUST_VALIDATE  ,'regex'  ,self::MODEL_INSERT,),//没有默认值的不能为空的字段新增时必须验证
        array('order_no','number'      ,'排序号码必须是数字'                     ,self::EXISTS_VALIDATE,'regex'  ,self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证类型
        array('order_no','0,4294967295','排序号码的范围必须在0到4294967295之间'  ,self::EXISTS_VALIDATE,'between',self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证大小
    );
    public function test1(){
        my_dump('test');
    }
}