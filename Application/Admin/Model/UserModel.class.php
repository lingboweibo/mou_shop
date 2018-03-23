<?php
namespace Admin\Model;
use Think\Model;
class UserModel extends Model{
    protected $_validate = array(
        array('username','','用户名已存在',self::MUST_VALIDATE,'unique',self::MODEL_INSERT),

        array('username' ,'require'     ,'用户名不能为空'                   ,self::MUST_VALIDATE  ,'regex'  ,self::MODEL_INSERT,),//没有默认值的不能为空的字段新增时必须验证
        array('username' ,'5,16'        ,'用户名的字数必须在0到16之间'      ,self::EXISTS_VALIDATE,'length' ,self::MODEL_BOTH  ,),//其它类型的不论新增还是编辑 存在字段就验证长度
        array('password' ,'require'     ,'密码不能为空'                     ,self::MUST_VALIDATE  ,'regex'  ,self::MODEL_INSERT,),//没有默认值的不能为空的字段新增时必须验证
        array('password' ,'5,32'        ,'密码的字数必须在0到32之间'        ,self::EXISTS_VALIDATE,'length' ,self::MODEL_BOTH  ,),//其它类型的不论新增还是编辑 存在字段就验证长度
        array('name'     ,'2,32'        ,'姓名的字数必须在0到32之间'        ,self::EXISTS_VALIDATE,'length' ,self::MODEL_BOTH  ,),//其它类型的不论新增还是编辑 存在字段就验证长度
        array('sex'      ,'number'      ,'性别必须是数字'                   ,self::EXISTS_VALIDATE,'regex'  ,self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证类型
        array('sex'      ,'0,255'       ,'性别的范围必须在0到255之间'       ,self::EXISTS_VALIDATE,'between',self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证大小
        array('mobile'   ,'0,48'        ,'联系电话的字数必须在0到48之间'    ,self::EXISTS_VALIDATE,'length' ,self::MODEL_BOTH  ,),//其它类型的不论新增还是编辑 存在字段就验证长度
        array('is_del'   ,'number'      ,'是否删除必须是数字'               ,self::EXISTS_VALIDATE,'regex'  ,self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证类型
        array('is_del'   ,'0,255'       ,'是否删除的范围必须在0到255之间'   ,self::EXISTS_VALIDATE,'between',self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证大小
        array('nickname' ,'0,32'        ,'昵称的字数必须在0到32之间'        ,self::EXISTS_VALIDATE,'length' ,self::MODEL_BOTH  ,),//其它类型的不论新增还是编辑 存在字段就验证长度
        array('job_id'   ,'number'      ,'职业必须是数字'                   ,self::EXISTS_VALIDATE,'regex'  ,self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证类型
        array('job_id'   ,'0,4294967295','职业的范围必须在0到4294967295之间',self::EXISTS_VALIDATE,'between',self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证大小
        array('email'    ,'0,96'        ,'邮件的字数必须在0到96之间'        ,self::EXISTS_VALIDATE,'length' ,self::MODEL_BOTH  ,),//其它类型的不论新增还是编辑 存在字段就验证长度
        array('qq'       ,'0,50'        ,'qq的字数必须在0到50之间'          ,self::EXISTS_VALIDATE,'length' ,self::MODEL_BOTH  ,),//其它类型的不论新增还是编辑 存在字段就验证长度
        array('city_id'  ,'number'      ,'地区必须是数字'                   ,self::EXISTS_VALIDATE,'regex'  ,self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证类型
        array('city_id'  ,'0,4294967295','地区的范围必须在0到4294967295之间',self::EXISTS_VALIDATE,'between',self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证大小
        array('address'  ,'0,96'        ,'详细地址的字数必须在0到96之间'    ,self::EXISTS_VALIDATE,'length' ,self::MODEL_BOTH  ,),//其它类型的不论新增还是编辑 存在字段就验证长度
        array('wechat'   ,'0,32'        ,'微信号的字数必须在0到32之间'      ,self::EXISTS_VALIDATE,'length' ,self::MODEL_BOTH  ,),//其它类型的不论新增还是编辑 存在字段就验证长度
    );
}