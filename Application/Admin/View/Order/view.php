<!DOCTYPE HTML>
<html>
<head>
<title>订单详情</title>
<?php include APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/include/meta.php'; ?>
</head>
<body>
<?php include APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/include/header.php'; ?>
<div class="main">
    <?php include APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/include/left.php'; ?>
    <div class="content">
        <h3 class="content_title">订单详情<small></small></h3>
        <form class="form" action="friend_del.php" method="get" name="form1">
            <table class="form_table" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <th>ID：</th>
                    <td><?php echo $data['id']?></td>
                </tr>
                <tr>
                    <th>订单编号:</th>
                    <td><?php echo $data['order_sn']?></td>
                </tr>
                <tr>
                    <th>订单状态:</th>
                    <td><?php echo $data['order_status'] == 0 ? '待确认' : ($data['order_status'] == 1 ? '已确认' : '已取消');?></td>
                </tr>
                <tr>
                    <th>发货状态:</th>
                    <td><?php echo $data['shipping_status'] == 0 ? '未发货' : ($data['shipping_status'] == 1 ? '已发货' : '已签收');?></td>
                </tr>
                <tr>
                    <th>支付状态:</th>
                    <td><?php echo $data['pay_status'] = $data['pay_status'] == 0 ? '未支付' : ($data['pay_status'] == 1 ? '已支付' : '已支付部分款');?></td>
                </tr>
                <tr>
                    <th>收货人:</th>
                    <td><?php echo $data['consignee']?></td>
                </tr>
                <tr>
                    <th>城市:</th>
                    <td><?php echo get_all_city_name($data['city']);?></td>
                </tr>
                <tr>
                    <th>地址:</th>
                    <td><?php echo $data['address']?></td>
                </tr>
                <tr>
                    <th>邮政编码:</th>
                    <td><?php echo $data['zipcode']?></td>
                </tr>
                <tr>
                    <th>手机:</th>
                    <td><?php echo $data['mobile']?></td>
                </tr>
                <tr>
                    <th>物流编号:</th>
                    <td><?php echo $data['shipping_code']?></td>
                </tr>
                <tr>
                    <th>物流名称:</th>
                    <td><?php echo $data['shipping_name']?></td>
                </tr>
                <tr>
                    <th>下单时间:</th>
                    <td><?php echo $data['add_time']?></td>
                </tr>
                <tr>
                    <th>订单总价:</th>
                    <td><?php echo $data['total_amount']?></td>
                </tr>
                <tr>
                    <th>支付方式名称:</th>
                    <td><?php echo $data['pay_name']?></td>
                </tr>
                <tr>
                    <th>使用积分:</th>
                    <td><?php echo $data['integral']?></td>
                </tr>
                <tr>
                    <th>使用积分抵多少钱:</th>
                    <td><?php echo $data['integral_money']?></td>
                </tr>
                <tr>
                    <th>商品总价:</th>
                    <td><?php echo $data['goods_price']?></td>
                </tr>
                <tr>
                    <th>邮费:</th>
                    <td><?php echo $data['shipping_price']?></td>
                </tr>
                <tr>
                    <th>应付款金额:</th>
                    <td><?php echo $data['order_amount']?></td>
                </tr>
                <tr>
                    <th>支付时间:</th>
                    <td><?php echo $data['pay_time']?></td>
                </tr>
                <tr>
                    <th>用户备注:</th>
                    <td><?php echo $data['user_note']?></td>
                </tr>
                <tr>
                    <th>管理员备注:</th>
                    <td><?php echo $data['admin_note']?></td>
                </tr>
            </table>
            <h3 class="content_title">该订单购买的商品列表</h3>
            <table class="list_tab" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>商品名称</th>
                <th>单价</th>
                <th>购买数量</th>
                <th>小计</th>
            </tr>
            <?php
            $all = 0;
            foreach($orderData as $key => $value){
                $temp = $value['price'] * $value['num'];
                $all += $temp;
                echo '<tr>';
                echo '<td>' , $value['id'   ] ,'</td>';
                echo '<td>' , $value['name' ] ,'</td>';
                echo '<td>' , $value['price'] ,'</td>';
                echo '<td>' , $value['num'  ] ,'</td>';
                echo '<td>' , $temp           ,'</td>'; //每件商品的单价和购买数量的积
                echo '</tr>';
            }

            ?>
            <tr>
            <td colspan="4">合计</td>
            <td><?php echo $all;?></td>
            </tr>

            </table>
        </form>
    </div>
</div>
</body>
</html>