<?php
namespace Common\Model;
use Think\Model;
class AddressModel extends Model{
    protected $_validate = array(
        array('user_id'   ,'require'     ,'所属会员不能为空'                       ,self::MUST_VALIDATE  ,'regex'  ,self::MODEL_INSERT,),//没有默认值的不能为空的字段新增时必须验证
        array('user_id'   ,'number'      ,'所属会员必须是数字'                     ,self::EXISTS_VALIDATE,'regex'  ,self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证类型
        array('user_id'   ,'0,4294967295','所属会员的范围必须在0到4294967295之间'  ,self::EXISTS_VALIDATE,'between',self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证大小
        array('consignee' ,'require'     ,'收货人不能为空'                         ,self::MUST_VALIDATE  ,'regex'  ,self::MODEL_INSERT,),//没有默认值的不能为空的字段新增时必须验证
        array('consignee' ,'2,60'        ,'收货人的字数必须在2到60之间'            ,self::EXISTS_VALIDATE,'length' ,self::MODEL_BOTH  ,),//其它类型的不论新增还是编辑 存在字段就验证长度
        array('mobile'    ,'require'     ,'手机号不能为空'                         ,self::MUST_VALIDATE  ,'regex'  ,self::MODEL_INSERT,),//没有默认值的不能为空的字段新增时必须验证
        array('mobile'    ,'11,60'        ,'手机号的字数必须在11到60之间'          ,self::EXISTS_VALIDATE,'length' ,self::MODEL_BOTH  ,),//其它类型的不论新增还是编辑 存在字段就验证长度
        array('city'      ,'require'     ,'所在地区不能为空'                       ,self::MUST_VALIDATE  ,'regex'  ,self::MODEL_INSERT,),//没有默认值的不能为空的字段新增时必须验证
        array('city'      ,'number'      ,'所在地区必须是数字'                     ,self::EXISTS_VALIDATE,'regex'  ,self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证类型
        array('city'      ,'0,4294967295','所在地区的范围必须在0到4294967295之间'  ,self::EXISTS_VALIDATE,'between',self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证大小
        array('address'   ,'require'     ,'街道地址不能为空'                       ,self::MUST_VALIDATE  ,'regex'  ,self::MODEL_INSERT,),//没有默认值的不能为空的字段新增时必须验证
        array('address'   ,'3,120'       ,'街道地址的字数必须在3到120之间'         ,self::EXISTS_VALIDATE,'length' ,self::MODEL_BOTH  ,),//其它类型的不论新增还是编辑 存在字段就验证长度
        array('is_default','number'      ,'是否为默认地址必须是数字'               ,self::EXISTS_VALIDATE,'regex'  ,self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证类型
        array('is_default','0,1'         ,'是否为默认地址的范围必须在0到1之间'     ,self::EXISTS_VALIDATE,'between',self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证大小
    );
    public function getInsertData($userId) {//这是获取添加记录时的提交值的方法，请自己查看去掉不需要的。获取更新记录时的提交值的方法可复制这些来改
        $data['user_id'   ] = $userId;//所属会员
        $data['consignee' ] = I('post.consignee');//收货人
        $data['mobile'    ] = I('post.mobile');//手机号
        $data['city'      ] = getLastPid('city');//所在地区
        $data['address'   ] = I('post.address');//街道地址
        $data['is_default'] = I('post.is_default','',FILTER_SANITIZE_NUMBER_INT);//是否为默认地址
        $redata = array();
        foreach ($data as $key => $one) {//添加记录时把空值的字段去掉，让空值的使用默认值，更新记录时不要把空值的字段去掉
            if(strlen($one) > 0){
                $redata[$key] = $one;
            }
        }
        return $redata;
    }
    public function getUpData() {
        $data['consignee' ] = I('post.consignee');//收货人
        $data['mobile'    ] = I('post.mobile');//手机号
        $data['city'      ] = getLastPid('city');//所在地区
        $data['address'   ] = I('post.address');//街道地址
        $data['is_default'] = I('post.is_default','',FILTER_SANITIZE_NUMBER_INT);//是否为默认地址

        if($data['is_default'] == '')$data['is_default'] = 0;
        return $data;
    }
}
