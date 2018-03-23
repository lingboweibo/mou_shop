<?php
namespace Common\Model;
use Think\Model;
class UserModel extends Model{
    protected $_validate = array(
        array('username','','此手机号码的用户已注册，如果您忘记密码，请使用找回密码功能',self::MUST_VALIDATE,'unique',self::MODEL_INSERT),
        array('nickname' ,'2,32'        ,'昵称的字数必须在2到32之间'        ,self::EXISTS_VALIDATE,'length' ,self::MODEL_BOTH  ,),//其它类型的不论新增还是编辑 存在字段就验证长度
        array('username' ,'require'     ,'手机号码不能为空'                   ,self::MUST_VALIDATE  ,'regex'  ,self::MODEL_INSERT,),//没有默认值的不能为空的字段新增时必须验证
        array('username' ,'11,16'        ,'手机号码的字数必须在11到16之间'      ,self::EXISTS_VALIDATE,'length' ,self::MODEL_BOTH  ,),//其它类型的不论新增还是编辑 存在字段就验证长度
        array('password' ,'require'     ,'密码不能为空'                     ,self::MUST_VALIDATE  ,'regex'  ,self::MODEL_INSERT,),//没有默认值的不能为空的字段新增时必须验证
        array('password' ,'5,32'        ,'密码的字数必须在0到32之间'        ,self::EXISTS_VALIDATE,'length' ,self::MODEL_BOTH  ,),//其它类型的不论新增还是编辑 存在字段就验证长度
    );
}