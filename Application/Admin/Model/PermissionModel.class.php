<?php
namespace Admin\Model;
use Think\Model;
class PermissionModel extends Model{
    protected $_validate = array(
        array('permission_name','require'     ,'权限名称不能为空'                   ,self::MUST_VALIDATE  ,'regex'  ,self::MODEL_INSERT,),//没有默认值的不能为空的字段新增时必须验证
        array('permission_name','0,32'        ,'权限名称的字数必须在0到32之间'      ,self::EXISTS_VALIDATE,'length' ,self::MODEL_BOTH  ,),//其它类型的不论新增还是编辑 存在字段就验证长度
        array('controller_name','require'     ,'控制器名称不能为空'                 ,self::MUST_VALIDATE  ,'regex'  ,self::MODEL_INSERT,),//没有默认值的不能为空的字段新增时必须验证
        array('controller_name','0,50'        ,'控制器名称的字数必须在0到50之间'    ,self::EXISTS_VALIDATE,'length' ,self::MODEL_BOTH  ,),//其它类型的不论新增还是编辑 存在字段就验证长度
        array('action_name'    ,'0,50'        ,'操作名称的字数必须在0到50之间'      ,self::EXISTS_VALIDATE,'length' ,self::MODEL_BOTH  ,),//其它类型的不论新增还是编辑 存在字段就验证长度
        array('order_no'       ,'number'      ,'排序号必须是数字'                   ,self::EXISTS_VALIDATE,'regex'  ,self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证类型
        array('order_no'       ,'0,4294967295','排序号的范围必须在0到4294967295之间',self::EXISTS_VALIDATE,'between',self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证大小

        array('order_no_sotr',array('之前','之后'),'普通排序在某字段之前或之后选项值不正常',1,'in',1),//此表单字段新增时必须验证(注意这不是数据库字段)
    );
    public function getInsertData(&$controller){
        $data['permission_name'] = I('post.permission_name');//权限名称
        $data['controller_name'] = I('post.controller_name');//控制器名称
        $data['action_name'    ] = I('post.action_name');//操作名称
        $data['order_no_sotr'    ] = I('post.order_no_sotr');//排在之前还是之后        
        $data['order_no_field'   ] = I('post.order_no_field',FILTER_SANITIZE_NUMBER_INT);//排在哪个之前或之后
        if(empty($data['order_no_field']) == false || empty($data['order_index_field']) == false){
            //如果排在哪个分类之前或哪个分类之后不为空，就要处理更新相关分类的排序号
            //如果没有跟他同级的分类，那他就肯定是排在第一，其它分类也不受影所以不用更新其它分类的序号
            $this->startTrans();//开启事务
            $this->_batchSetOrderNo($data,'order_no');//更新相关受影响的普通排序号的记录，并设置当前添加分类所需的 order_no
        }

        if ($this->create($data)===false){
            if(empty($data['order_no_field']) == false || empty($data['order_index_field']) == false){
                //如果排在哪个分类之前或哪个分类之后不为空，
                $this->rollback();//回滚事务 如果数据不合法就要把前面更新过的数据恢复
            }
            $controller->err($this->getError());//用它来提交错误信息，因为模型类没有显示错误提示的方法，控制器类才有显示错误提示的方法
        }
        return $data;
    }
    //在类文件里$this就代表当前类的一个实例
    //
    private function _batchSetOrderNo(&$data,$field){//这个方法的主要作用更新受影响的序号。 注意这里的$data 使用了传址方式
        // 排在某某分类的前面或后面的主要实现过程：
        // 1、获取提交来的各数据……；（这里有前面的getInsertData获取再传到这里的用 $data 传址接收）
        // 2、获取【某某分类】的排序号码
        // 3、如果是排在前面{
        //     3.1 把排序号码 大于 【某某分类】的排序号码-1 的分类记录的 排序号码 全部 +1 更新；
        //     3.2 要加的分类的序号 = 【某某分类】的排序号码
        // }else{//不是排在前面那就是排在后面了
        //     4.1 把排序号码 大于 【某某分类】的排序号码 的分类记录的 排序号码 全部 +1 更新；
        // }
        if(empty($data[$field . '_field']) == false){
            $atId = $data[$field . '_field'];//order_no_fieldo
            //my_dump($data);
            //下面一行代码实现 查询出某某分类的排序号，赋值给 $data['order_no']或$data['order_index']
            $atOrder = $this->where(array('id' => $atId))->getField($field);//$this就是这个实例本身，这个实例是一个模型类的实例
            $data[$field] = $atOrder;//添加分类时，这个新加的分类的序号应该用什么，如果是排在之前就用某某分类的序号

            //my_dump($data[$field]);//看能不能显示 查询出atOrder

            $map['pid'] = $data['pid'];//限定更新条件是同一个父ID的

            //$map['字段名'] = array('表达式','查询条件');
            //my_dump($data);

            if($data[$field . '_sotr'] == '之前'){
                $map[$field] = array('GT',$atOrder-1);//再增加条件是: 排序号码 大于 【某某分类】的排序号码-1
            }else{
                $map[$field] = array('GT',$atOrder);//再增加条件是: 排序号码 大于 【某某分类】的排序号码 
                $data[$field] +=1;//添加分类时，这个新加的分类的序号应该用什么，如果是排在之后就用某某分类的序号 + 1
            }
            $this->where($map)->setInc($field);//把符合条件的记录 全部 +1 更新
        }
        //这里面给 $data[$field] 赋了值，赋的值要在这个函数外面用，所以这里用了传址，让这个函数运行完之后$data里面的值还有效
    }
}