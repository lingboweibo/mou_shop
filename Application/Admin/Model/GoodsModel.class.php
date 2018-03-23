<?php
namespace Admin\Model;
use Think\Model;
class GoodsModel extends Model{
    protected $_validate = array(
        array('name','require','商品名称不能为空',1),

        array('cat_id'       ,'number'      ,'分类id必须是数字'                      ,self::EXISTS_VALIDATE,'regex'  ,self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证类型
        array('cat_id'       ,'1,4294967295','请选择一个分类'                        ,self::EXISTS_VALIDATE,'between',self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证大小
        array('name'         ,'2,120'       ,'商品名称的字数必须在2到120之间'        ,self::EXISTS_VALIDATE,'length' ,self::MODEL_BOTH  ,),//其它类型的不论新增还是编辑 存在字段就验证长度
        array('price'        ,'/^[0-9]+(.[0-9]+)*/'      ,'价格必须是数字'           ,self::EXISTS_VALIDATE,'regex'  ,self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证类型
        array('price'        ,'0,99999999999','价格的范围必须0在到99999999999之间'   ,self::EXISTS_VALIDATE,'between',self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证大小
        array('home'         ,'number'      ,'产地必须是数字'                        ,self::EXISTS_VALIDATE,'regex'  ,self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证类型
        array('home'         ,'0,4294967295','产地的范围必须在0到4294967295之间'     ,self::EXISTS_VALIDATE,'between',self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证大小
        array('format'       ,'0,32'        ,'规格的字数必须在0到32之间'             ,self::EXISTS_VALIDATE,'length' ,self::MODEL_BOTH  ,),//其它类型的不论新增还是编辑 存在字段就验证长度
        array('keywords'     ,'0,255'       ,'商品关键词的字数必须在0到255之间'      ,self::EXISTS_VALIDATE,'length' ,self::MODEL_BOTH  ,),//其它类型的不论新增还是编辑 存在字段就验证长度
        array('remark'       ,'0,255'       ,'商品简单描述的字数必须在0到255之间'    ,self::EXISTS_VALIDATE,'length' ,self::MODEL_BOTH  ,),//其它类型的不论新增还是编辑 存在字段就验证长度

        array('is_on_sale'   ,'number'      ,'是否上架必须是数字'                    ,self::EXISTS_VALIDATE,'regex'  ,self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证类型
        array('is_on_sale'   ,'0,1'         ,'是否上架的范围必须在0到1之间'          ,self::EXISTS_VALIDATE,'between',self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证大小

        array('sort'         ,'number'      ,'商品排序必须是数字'                    ,self::EXISTS_VALIDATE,'regex'  ,self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证类型
        array('sort'         ,'0,4294967295','商品排序的范围必须在0到4294967295之间' ,self::EXISTS_VALIDATE,'between',self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证大小

        array('is_recommend' ,'number'      ,'是否推荐必须是数字'                    ,self::EXISTS_VALIDATE,'regex'  ,self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证类型
        array('is_recommend' ,'0,1'         ,'是否推荐的范围必须在0到1之间'          ,self::EXISTS_VALIDATE,'between',self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证大小
        array('is_new'       ,'number'      ,'是否新品必须是数字'                    ,self::EXISTS_VALIDATE,'regex'  ,self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证类型
        array('is_new'       ,'0,1'         ,'是否新品的范围必须在0到1之间'          ,self::EXISTS_VALIDATE,'between',self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证大小
        array('is_hot'       ,'number'      ,'是否热卖必须是数字'                    ,self::EXISTS_VALIDATE,'regex'  ,self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证类型
        array('is_hot'       ,'0,1'         ,'是否热卖的范围必须在0到1之间'          ,self::EXISTS_VALIDATE,'between',self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证大小

        array('sales_sum'    ,'number'      ,'商品销量必须是数字'                    ,self::EXISTS_VALIDATE,'regex'   ,self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证类型
        array('sales_sum'    ,'0,4294967295','商品销量的范围必须在0到4294967295之间' ,self::EXISTS_VALIDATE,'between' ,self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证大小
        array('prom_type'    ,'number'      ,'prom_type必须是数字'                   ,self::EXISTS_VALIDATE,'regex'   ,self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证类型
        array('prom_type'    ,'0,2'         ,'prom_type的范围必须在0到2之间'         ,self::EXISTS_VALIDATE,'between' ,self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证大小
        array('month_star'   ,'require'     ,'季节范围开始月份不能为空'              ,self::EXISTS_VALIDATE ,'regex'  ,self::MODEL_INSERT,),//已改为存在字段就验证
        array('month_star'   ,'number'      ,'季节范围开始月份必须是数字'            ,self::EXISTS_VALIDATE,'regex'   ,self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证类型
        array('month_star'   ,'0,12'        ,'季节范围开始月份的范围必须在0到12之间' ,self::EXISTS_VALIDATE,'between' ,self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证大小
        array('day_star'     ,'require'     ,'季节范围开始日期不能为空'              ,self::EXISTS_VALIDATE ,'regex'  ,self::MODEL_INSERT,),//已改为存在字段就验证
        array('day_star'     ,'number'      ,'季节范围开始日期必须是数字'            ,self::EXISTS_VALIDATE,'regex'   ,self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证类型
        array('day_star'     ,'0,31'        ,'季节范围开始日期的范围必须在0到31之间' ,self::EXISTS_VALIDATE ,'between',self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证大小
        array('month_end'    ,'require'     ,'季节范围结束月份不能为空'              ,self::EXISTS_VALIDATE ,'regex'  ,self::MODEL_INSERT,),//已改为存在字段就验证
        array('month_end'    ,'number'      ,'季节范围结束月份必须是数字'            ,self::EXISTS_VALIDATE,'regex'   ,self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证类型
        array('month_end'    ,'0,12'        ,'季节范围结束月份的范围必须在0到12之间' ,self::EXISTS_VALIDATE,'between' ,self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证大小
        array('day_end'      ,'require'     ,'季节范围结束日期不能为空'              ,self::EXISTS_VALIDATE ,'regex'  ,self::MODEL_INSERT,),//已改为存在字段就验证
        array('day_end'      ,'number'      ,'季节范围结束日期必须是数字'            ,self::EXISTS_VALIDATE,'regex'   ,self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证类型
        array('day_end'      ,'0,31'        ,'季节范围结束日期的范围必须在0到32之间' ,self::EXISTS_VALIDATE,'between' ,self::MODEL_BOTH  ,),//数字类型的不论新增还是编辑 存在字段就验证大小
    );
    public function getInsertData() {//这是获取添加记录时的提交值的方法，请自己查看去掉不需要的。获取更新记录时的提交值的方法可复制这些来改
        $data['name'         ] = I('post.name');//商品名称
        $data['price'        ] = I('post.price');
        $data['month_star'   ] = I('post.month_star','',FILTER_SANITIZE_NUMBER_INT);//季节范围开始月份
        $data['day_star'     ] = I('post.day_star','',FILTER_SANITIZE_NUMBER_INT);//季节范围开始日期
        $data['month_end'    ] = I('post.month_end','',FILTER_SANITIZE_NUMBER_INT);//季节范围结束月份
        $data['day_end'      ] = I('post.day_end','',FILTER_SANITIZE_NUMBER_INT);//季节范围结束日期
        //上面的为空时不可以从$data里去掉（不能为空的字段，也没有默认值的字段，这些字段就必须验证） 
    
        //下面这些为空时时可以从$data里去掉（因为有些从$data 里去掉就会使用默认值，有些是允许空的）
        $data['format'       ] = I('post.format');//规格
        $data['keywords'     ] = I('post.keywords');//商品关键词
        $data['remark'       ] = I('post.remark');//商品简单描述
        $data['content'      ] = I('post.content','','');//编辑器的内容不进行过滤，那这样就要注意安全，因为编辑器是后台人员用的，所以比较可以信任
        $data['is_on_sale'   ] = I('post.is_on_sale','',FILTER_SANITIZE_NUMBER_INT);//是否上架
        $data['is_recommend' ] = I('post.is_recommend','',FILTER_SANITIZE_NUMBER_INT);//是否推荐
        $data['is_new'       ] = I('post.is_new','',FILTER_SANITIZE_NUMBER_INT);//是否新品
        $data['is_hot'       ] = I('post.is_hot','',FILTER_SANITIZE_NUMBER_INT);//是否热卖
        $data['give_integral'] = I('post.give_integral');//购买商品赠送积分
        $data['prom_type'    ] = I('post.prom_type','',FILTER_SANITIZE_NUMBER_INT);//0 普通 1 限时抢购 2促销优惠
        $data['home'         ] = getLastPid('home');//产地
        $data['cat_id'       ] = getLastPid('cat_id');//分类id
        $data['sort'         ] = $this->order('sort desc')->getField('sort') + 1;//自动获取最大的商品表排序号+1作为新加的商品的排序号

        //添加记录时把空值的字段去掉，让空值的使用默认值
        //去掉这一次添加时的数据里就没有这个字段，没有这个字段，验证规则时 是存在字段就验证的 就不会验证这些不存在的字段)
        //
        //有些字段是必须验证的，但懒得改验证规则就用下面的循环特殊处理让它为空时也不从$data数组里去掉，这样就会存在这个字段就会验证它
        $redata = array();
        foreach ($data as $key => $one) {
            if(
                strlen($one) > 0 ||
                $key == 'name' ||
                $key == 'price' ||
                $key == 'month_star' ||
                $key == 'day_star' ||
                $key == 'month_end' ||
                $key == 'day_end'
            ){//判断循环到值的长度是否大于0
                $redata[$key] = $one;//长度大于0的就加到新数组里
            }
        }
        //判断如果选选择的是“没有应季范围”就要把应季范围四个字段从$redata里去掉
        //要让选择有，或选择没有时，提交的数据不同，然后就可以根据这个不同点
        if(I('post.has_season') == 0){
            unset($redata['month_star'],$redata['day_star'],$redata['month_end'],$redata['day_end']);
        }
        //my_dump($redata);
        return $redata;//返回的是新数组
    }
    public function getUpData() {//获取要更新字段和值
        $data['name'         ] = I('post.name');//商品名称
        $data['price'        ] = I('post.price');
        $data['month_star'   ] = I('post.month_star','',FILTER_SANITIZE_NUMBER_INT);//季节范围开始月份
        $data['day_star'     ] = I('post.day_star','',FILTER_SANITIZE_NUMBER_INT);//季节范围开始日期
        $data['month_end'    ] = I('post.month_end','',FILTER_SANITIZE_NUMBER_INT);//季节范围结束月份
        $data['day_end'      ] = I('post.day_end','',FILTER_SANITIZE_NUMBER_INT);//季节范围结束日期

        $data['format'       ] = I('post.format');//规格
        $data['keywords'     ] = I('post.keywords');//商品关键词
        $data['remark'       ] = I('post.remark');//商品简单描述
        $data['content'      ] = I('post.content','','');//编辑器的内容不进行过滤，那这样就要注意安全，因为编辑器是后台人员用的，所以比较可以信任
        $data['give_integral'] = I('post.give_integral');//购买商品赠送积分
        $data['prom_type'    ] = I('post.prom_type','',FILTER_SANITIZE_NUMBER_INT);//0 普通 1 限时抢购 2促销优惠

        $data['home'         ] = getLastPid('home');//产地
        $data['cat_id'       ] = getLastPid('cat_id');//分类id

        $data['is_on_sale'   ] = I('post.is_on_sale','',FILTER_SANITIZE_NUMBER_INT);//是否上架
        $data['is_recommend' ] = I('post.is_recommend','',FILTER_SANITIZE_NUMBER_INT);//是否推荐
        $data['is_new'       ] = I('post.is_new','',FILTER_SANITIZE_NUMBER_INT);//是否新品
        $data['is_hot'       ] = I('post.is_hot','',FILTER_SANITIZE_NUMBER_INT);//是否热卖

        if($data['is_on_sale'  ] == '')$data['is_on_sale'   ] = 0;
        if($data['is_recommend'] == '')$data['is_recommend' ] = 0;
        if($data['is_new'      ] == '')$data['is_new'       ] = 0;
        if($data['is_hot'      ] == '')$data['is_hot'       ] = 0;

        if(I('post.has_season') == 0){
            $data['month_star'] = 0;
            $data['day_star'] = 0;
            $data['month_end'] = 0;
            $data['day_end'] = 0;
        }

        $data['last_update'] = date('Y-m-d H:i:s');
        //修改数据时不能像添加数据时把 $data里面值是空的元素去掉,是因为为空时去掉，那想把某个字段改成空，都改不了
        return $data;
    }
}