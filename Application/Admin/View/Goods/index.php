<!DOCTYPE HTML>
<html>
<head>
<title>商品列表</title>
<?php include APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/include/meta.php'; ?>
</head>
<body>
<?php include APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/include/header.php'; ?>
<div class="main">
    <?php include APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/include/left.php'; ?>
    <div class="content">
        <h3 class="content_title"><a href="<?php echo U('index'); ?>">商品列表</a> <?php echo $name;?><small> 共<?php echo $count;?>条记录</small></h3>
        <form action="<?php echo __APP__;?>" method="get" name="form1">
            <table class="action" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td>
                        <?php
                        $arr             = array();
                        $arr['url']      = U('add');
                        $arr['title']    = '添加商品';
                        $arr['ico']      = 'icon-plus';
                        $arr['allClass'] = 'bg_gray';
                        echo but_link($arr);
                        ?>
                    </td>
                    <td align="right">
                        赠送积分范围:
                        <input type="number" class="input_text_int" name="integral_start" size="5" value="<?php echo $integral_start;?>">至
                        <input type="number" class="input_text_int" name="integral_end" size="5" value="<?php echo $integral_end;?>">
                        价格范围:
                        <input type="number" class="input_text_int" name="price_start" size="5" value="<?php echo $price_start;?>">至
                        <input type="number" class="input_text_int" name="price_end" size="5" value="<?php echo $price_end;?>">
                        <label><input type="checkbox" name="is_new" value="1"<?php if($is_new == 1){echo ' checked';}?>>只搜索新品</label>
                        <label><input type="checkbox" name="is_recommend" value="1"<?php if($is_recommend == 1){echo ' checked';}?>>只搜索推荐商品</label>
                        <?php
                        $arr = array();
                        $arr['addValue']  = '';
                        $arr['addText']  = '不限类型';
                        $arr['name']  = 'prom_type';
                        $arr['data']  = array(
                            array('id' => 0,'name' => '普通'),
                            array('id' => 1,'name' => '限时抢购'),
                            array('id' => 2,'name' => '促销优惠'),
                        );
                        $arr['value'] = $prom_type;//让value = $prom_type 的选择被选中
                        echo selectHtml($arr);
                        ?>
                        <?php include APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/include/key_word.php'; ?>
                    </td>
                </tr>
            </table>
        </form>
        <form action="friend_del.php" method="get" name="form1">
            <table class="list_tab" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <th>ID</th>
                    <th>商品名称</th>
                    <th>所属分类</th>
                    <th>
                        <?php
                        if($price_by == 2){
                            $get['price_by'] = 1;
                            echo '<a href="' , U('index',$get) , '">价格↑</a>';
                        }else{
                            $get['price_by'] = 2;
                            echo '<a href="' , U('index',$get) , '">价格↓</a>';
                        }?>
                    </th>
                    <th>排序号</th>
                    <th>销量</th>
                    <th>上架</th>
                    <th>赠送积分</th>
                    <th>新品</th>
                    <th>推荐</th>
                    <th>类型</th>
                    <th>更新时间</th>
                    <th>操作</th>
                </tr> 
                 <?php
                if($count > 0 ){
                    foreach ($data as $value) {
                        if($value['is_on_sale'] == 0){
                            $state = '<span style="color:red">已下架</div>';//状态显示
                            $stateBtn = '上架';//按钮i文字显示
                            $ico      = 'icon-ok';
                            $url = 'putaway';
                        }elseif($value['is_on_sale'] == 1){
                            $state = '<span style="color:green">已上架</div>';
                            $stateBtn = '下架';//按钮i文字显示
                            $ico      = 'icon-remove';
                            $url = 'soldout';
                        }

                        $value['is_new'] = $value['is_new'] == 1 ? '是' : '否';
                        $value['is_recommend'] = $value['is_recommend'] == 1 ? '是' : '否';

                        //0 普通 1 限时抢购 2促销优惠
                        if($value['prom_type'] == 0){
                            $value['prom_type'] = '普通';
                        }elseif($value['prom_type'] == 1){
                            $value['prom_type'] = '限时抢购';
                        }elseif($value['prom_type'] == 2){
                            $value['prom_type'] = '促销优惠';
                        }

                        echo '<tr>';
                        echo '    <td>' , $value['id'] , '</td>';
                        echo '    <td>' , $value['name'] , '</td>';
                        echo '    <td>' , categoryIdToName($value['cat_id']) , '</td>';
                        echo '    <td>' , $value['price'] , '</td>';

                        echo '    <td>';
                        $arr             = array();
                        $arr['url']      = U('OrderUp',array('id' => $value['id']));
                        $arr['ico']      = 'icon-arrow-up';
                        $arr['attribute']= ' title="排序上移"';
                        $arr['allClass'] = 'blue';
                        echo but_link($arr);
                        echo '<span class="btn">' , $value['sort'] , '</span>';
                        $arr             = array();
                        $arr['url']      = U('OrderDown',array('id' => $value['id']));
                        $arr['ico']      = 'icon-arrow-down';
                        $arr['attribute']= ' title="排序下移"';
                        $arr['allClass'] = 'blue';
                        echo but_link($arr);
                        echo '</td>';


                        echo '    <td>' , $value['sales_sum'] , '</td>';
                        echo '    <td>' , $state , '</td>';
                        echo '    <td>' , $value['give_integral'] , '</td>';
                        echo '    <td>' , $value['is_new'] , '</td>';
                        echo '    <td>' , $value['is_recommend'] , '</td>';
                        echo '    <td>' , $value['prom_type'] , '</td>';
                        echo '    <td>' , $value['last_update'] , '</td>';

                        echo '    <td>';

                        $arr             = array();
                        $arr['url']      = U('uploadImage',array('id' => $value['id'],'name' => $value['name']));//当控制器的uploadImage，然后传一个get参数 id = 当前循环到的ID
                        $arr['title']    = '上传图片';
                        $arr['ico']      = 'icon-circle-arrow-up';
                        $arr['allClass'] = 'blue';
                        echo but_link($arr);

                        $arr             = array();
                        $arr['url']      = U('lookImage',array('id' => $value['id'],'name' => $value['name']));
                        $arr['title']    = '查看图片';
                        $arr['ico']      = 'icon-eye-open';
                        $arr['allClass'] = 'blue';
                        echo but_link($arr);

                        $arr             = array();
                        $arr['url']      = U('edit',array('id' => $value['id']));
                        $arr['title']    = '编辑';
                        $arr['ico']      = 'icon-edit';
                        $arr['allClass'] = 'blue';
                        echo but_link($arr);

                        //增加 上架或下架的链接（已经上架的就显示下架链接，已经下架的就显示上架链接）
                        $arr = array();
                        $arr['url'] = U($url,array('id'=>$value['id']));//这里链接的URL是上架还是下架，是由$url这个变量决定
                        //$url = 'putaway' 时上面这行代码的右边的U方法就会生成一个链接到当前控制器的 上架 操作
                        //$url = 'soldout' 时上面这行代码的右边的U方法就会生成一个链接到当前控制器的 下架 操作

                        $arr['title'] = $stateBtn;
                        $arr['allClass'] = 'blue';
                        $arr['ico'] = $ico;
                        echo but_link($arr);

                        $arr              = array();
                        $arr['url']       = U('del',array('id' => $value['id']));
                        $arr['ico']       = 'icon-trash';
                        $arr['allClass']  = 'red';
                        $arr['attribute'] = ' onclick="return confirm(\'确认要删除这个商品吗？\');" title="删除"';
                        echo but_link($arr);
                        echo '</td>';

                        echo '</tr>';
                    }
                }else{
                    echo '<tr><td colspan="11">找不到符合条件的记录</td></tr>';
                }
                ?>
            </table>
            <?php echo $pageHtml;?>
        </form>
    </div>
</div>
</body>
</html>