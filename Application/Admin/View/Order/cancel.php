<!DOCTYPE HTML>
<html>
<head>
<title>取消订单</title>
<?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/meta.php" ?>
</head>
<body>
<?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/header.php" ?>
<div class="main">
    <?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/left.php" ?>
    <div class="content">
        <h3 class="content_title">订单管理<small>/取消订单</small></h3>
        <form class="form" action="<?php echo U('cancelSubmit')?>" method="post">
            <table class="form_table" border="0" cellpadding="0" cellspacing="0">
            <table class="form_table" border="0" cellpadding="0" cellspacing="0">
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
                    <th>原因:</th>
                    <td>
                        <textarea name="admin_note" rows="5"></textarea>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td class="submit">
                        <input type="hidden" name="id" value="<?php echo $data['id'];?>">
                        <input name="" type="submit" value="提交修改">
                        <input name="" type="reset" value="重置">
                        <input name="button" type="button" onclick="history.back();" value="不修改了|返回上一页">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
</body>
</html>