<?php
namespace Common\Model;
use Think\Model;
class OrderModel extends Model{
    protected $_validate = array(
        array('consignee'      ,'require'     ,'收货人不能为空'                       ,self::MUST_VALIDATE  ,'regex'  ,self::MODEL_INSERT,),//没有默认值的不能为空的字段新增时必须验证
        array('consignee'      ,'2,60'        ,'收货人的字数必须在2到60之间'          ,self::EXISTS_VALIDATE,'length' ,self::MODEL_BOTH  ,),//其它类型的不论新增还是编辑 存在字段就验证长度
        array('city'           ,'require'     ,'城市不能为空'                         ,self::MUST_VALIDATE  ,'regex'  ,self::MODEL_INSERT,),//没有默认值的不能为空的字段新增时必须验证
        array('city'           ,'number'      ,'城市必须是数字'                       ,self::EXISTS_VALIDATE,'regex'  ,self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证类型
        array('city'           ,'100000000,999999999','城市的范围必须在100000000到999999999之间'    ,self::EXISTS_VALIDATE,'between',self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证大小
        array('address'        ,'require'     ,'地址不能为空'                         ,self::MUST_VALIDATE  ,'regex'  ,self::MODEL_INSERT,),//没有默认值的不能为空的字段新增时必须验证
        array('address'        ,'3,255'       ,'地址的字数必须在3到255之间'           ,self::EXISTS_VALIDATE,'length' ,self::MODEL_BOTH  ,),//其它类型的不论新增还是编辑 存在字段就验证长度
        array('mobile'         ,'require'     ,'手机不能为空'                         ,self::MUST_VALIDATE  ,'regex'  ,self::MODEL_INSERT,),//没有默认值的不能为空的字段新增时必须验证
        array('mobile'         ,'11,60'        ,'手机的字数必须在11到60之间'            ,self::EXISTS_VALIDATE,'length' ,self::MODEL_BOTH  ,),//其它类型的不论新增还是编辑 存在字段就验证长度
        array('pay_name'       ,'2,120'       ,'支付方式名称的字数必须在2到120之间'   ,self::EXISTS_VALIDATE,'length' ,self::MODEL_BOTH  ,),//其它类型的不论新增还是编辑 存在字段就验证长度
        array('invoice_title'  ,'2,256'       ,'发票抬头的字数必须在2到256之间'       ,self::EXISTS_VALIDATE,'length' ,self::MODEL_BOTH  ,),//其它类型的不论新增还是编辑 存在字段就验证长度
        // array('user_money'     ,'number'      ,'使用余额必须是数字'                   ,self::EXISTS_VALIDATE,'regex'  ,self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证类型
        // array('user_money'     ,','           ,'使用余额的范围必须在到之间'           ,self::EXISTS_VALIDATE,'between',self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证大小
        // array('integral'       ,'number'      ,'使用积分必须是数字'                   ,self::EXISTS_VALIDATE,'regex'  ,self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证类型
        // array('integral'       ,'0,4294967295','使用积分的范围必须在0到4294967295之间',self::EXISTS_VALIDATE,'between',self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证大小
        // array('integral_money' ,'number'      ,'使用积分抵多少钱必须是数字'           ,self::EXISTS_VALIDATE,'regex'  ,self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证类型
        // array('integral_money' ,','           ,'使用积分抵多少钱的范围必须在到之间'   ,self::EXISTS_VALIDATE,'between',self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证大小
        array('user_note'      ,'0,255'       ,'用户备注的字数必须在0到255之间'       ,self::EXISTS_VALIDATE,'length' ,self::MODEL_BOTH  ,),//其它类型的不论新增还是编辑 存在字段就验证长度

    );
    //过滤提交过来的数据的函数
    public function getInsertData() {//这是获取添加记录时的提交值的方法，请自己查看去掉不需要的。获取更新记录时的提交值的方法可复制这些来改
        $data['order_sn'     ] = date('YmdHis') . rand_str(6);//订单编号 yyyymmddhhssii 14位时间+6位随机字符串;//订单编号 (自动生成 )
        $data['consignee'    ] = I('post.consignee');
        $data['city'         ] = I('post.city','',FILTER_SANITIZE_NUMBER_INT);
        $data['address'      ] = I('post.address');
        $data['mobile'       ] = I('post.mobile','',FILTER_SANITIZE_NUMBER_INT);
        $data['pay_name'     ] = I('post.pay_name');//订单的支付方式
        $data['invoice_title'] = I('post.invoice_title');//发票抬头
        $data['add_time'     ] = date('Y-m-d H:i:s');//下单时间(也是自动生成现在的时间)
        $data['user_note'      ] = I('post.user_note');//用户备注

        $redata = array();
        foreach ($data as $key => $one) {
            if(strlen($one) > 0 ){//判断循环到值的长度是否大于0
                $redata[$key] = $one;//长度大于0的就加到新数组里
            }
        }
        return $redata;//返回的是新数组
    }
    
}

/*
id
order_sn
order_status
shipping_status
pay_status
consignee
city
address
zipcode
mobile
email
shipping_code
shipping_name
pay_code
pay_name
invoice_title
goods_price  //商品总价
shipping_price
user_money
integral
integral_money
order_amount
total_amount
add_time
confirm_time
pay_time
user_note
admin_note
*/