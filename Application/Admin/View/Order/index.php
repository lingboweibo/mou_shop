<!DOCTYPE HTML>
<html>
<head>
<title>订单列表</title>
<?php  include APP_PATH.MODULE_NAME.'/'.C('DEFAULT_V_LAYER').'/include/meta.php'; ?> 
</head>
<body>
<?php  include APP_PATH.MODULE_NAME.'/'.C('DEFAULT_V_LAYER').'/include/header.php'; ?> 
<div class="main">
    <?php  include APP_PATH.MODULE_NAME.'/'.C('DEFAULT_V_LAYER').'/include/left.php'; ?> 
    <div class="content">
        <h3 class="content_title"><a href="<?php echo U('index'); ?>">订单列表</a><small>/共<?php echo $count ?>条记录</small></h3>
        <form action="index.php" method="get" name="form1">
            <table class="action" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="right">
                        发货状态：<?php
                       $arr = array();
                       $arr['addValue']  = '';
                       $arr['addText']   = '不限';
                       $arr['name']      = 'shipping_status';
                       $arr['data']      = array(
                            array('id' => 0  ,'name' => '未发货'),
                            array('id' => 1  ,'name' => '已发货'),
                            array('id' => 2  ,'name' => '已签收'),
                        );
                       $arr['value'] = $shipping_status;
                        echo selectHtml($arr);
                        ?>
                        支付状态：<?php
                       $arr = array();
                       $arr['addValue']  = '';
                       $arr['addText']   = '不限';
                       $arr['name']      = 'pay_status';
                       $arr['data']      = array(
                            array('id' => 0 ,'name' => '未支付'),
                            array('id' => 1 ,'name' => '已支付'),
                            array('id' => 2 ,'name' => '已支付部分款'),
                        );
                       $arr['value'] = $pay_status;
                        echo selectHtml($arr);
                        ?>
                       订单状态：<?php
                       $arr = array();
                       $arr['addValue']  = '';
                       $arr['addText']   = '不限';
                       $arr['name']      = 'order_status';
                       $arr['data']      = array(
                            array('id' => 0 ,'name' => '待确认'),
                            array('id' => 1 ,'name' => '已确认'),
                            array('id' => 2 ,'name' => '已取消'),
                        );
                       $arr['value'] = $order_status;
                        echo selectHtml($arr);
                        ?>
                       订单总价区间<input class="input_text_int" type="number" name="total_amount_star" value="<?php echo $total_amount_star;?>">
                       至 <input class="input_text_int" type="number" name="total_amount_end" value="<?php echo $total_amount_end;?>">
                        <?php include APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/include/key_word.php'; ?>
                    </td>
                </tr>
            </table>
        </form>
        <form action="friend_del.php" method="get" name="form1">
            <table class="list_tab" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <th>订单编号</th>
                    <th>订单状态</th>
                    <th>发货状态</th>
                    <th>支付状态</th>
                    <th>收货人</th>
                    <th>城市</th>
                    <th>手机</th>
                    <th>物流编号</th>
                    <th>物流名称</th>
                    <th>下单时间</th>
                    <th>订单总价</th>
                    <th>操作</th>
                </tr>
            <?php
            //my_dump($data);
            if($count > 0){
              foreach ($data as $value) {
                if($value['order_status'] == 0){
                    $order_status = '待确认';
                }elseif($value['order_status'] == 1){
                    $order_status = '已确认';
                }else{
                    $order_status = '已取消';
                }
                if($value['shipping_status'] == 0){
                    $shipping_status = '未发货';
                }elseif($value['shipping_status'] == 1){
                    $shipping_status = '已发货';
                }else{
                    $shipping_status = '已签收';
                } 
                if($value['pay_status'] == 0){
                    $pay_status = '未支付';
                }elseif($value['pay_status'] == 1){
                    $pay_status = '已支付';
                }else{
                    $pay_status = '已支付部分款';
                }
                 echo '<tr>';
                 echo '    <td>'. $value['order_sn'].'</td>';
                 echo '    <td>'. $order_status .'</td>';
                 echo '    <td>'. $shipping_status .'</td>';
                 echo '    <td>'. $pay_status .'</td>';
                 echo '    <td>'. $value['consignee'].'</td>';
                 echo '    <td>'. get_all_city_name($value['city']).'</td>';
                 echo '    <td>'. $value['mobile'].'</td>';
                 echo '    <td>'. $value['shipping_code'].'</td>';
                 echo '    <td>'. $value['shipping_name'].'</td>';
                 echo '    <td>'. $value['add_time'].'</td>';
                 echo '    <td>'. $value['total_amount'].'</td>';
                 
                 echo '    <td>';

                 $arr             = array();
                 $arr['url']      = U('view',array('id' => $value['id']));
                 $arr['ico']      = 'icon-eye-open';
                 $arr['title']    = '查看';
                 $arr['allClass'] = 'blue';
                 echo but_link($arr);

                if($order_status != '已确认'){
                    $arr             = array();
                    $arr['url']      = U('confirm',array('id' => $value['id']));
                    $arr['ico']      = 'icon-check';
                    $arr['title']    = '确认订单';
                    $arr['allClass'] = 'blue';
                     echo but_link($arr);
                 }
                 if($order_status != '已取消'){
                    $arr             = array();
                    $arr['url']      = U('cancel',array('id' => $value['id']));
                    $arr['ico']      = 'icon-remove';
                    $arr['title']    = '取消订单';
                    $arr['allClass'] = 'red';
                     echo but_link($arr);
                }
                if($shipping_status == '未发货'){
                    $arr             = array();
                    $arr['url']      = U('shipping',array('id' => $value['id']));
                    $arr['ico']      = 'icon-arrow-right';
                    $arr['title']    = '发货';
                    $arr['allClass'] = 'blue';
                     echo but_link($arr);
                }
                if($pay_status != '已支付'){
                    $arr             = array();
                    $arr['url']      = U('confirmPay',array('id' => $value['id']));
                    $arr['ico']      = 'icon-ok';
                    $arr['title']    = '确认支付';
                    $arr['allClass'] = 'blue';
                     echo but_link($arr);
                }
                 echo '    </td>';
                 echo '</tr>';
              }  
            }else{
               echo '<tr><td colspan="12">找不到符合条件的记录</td></tr>';
            }
            ?>
            </table>
            <?php echo $pageHtml; ?>
        </form> 
    </div>
</div>
</body>
</html>