<!DOCTYPE HTML>
<html>
<head>
    <title>结算</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="<?php echo $staticPath;?>/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
    <link rel="stylesheet" href="<?php echo $staticPath;?>/css/place_order.css?v=<?php echo C('STATIC_VERSION');?>">
    <link rel="shortcut icon" href="<?php echo $staticPath;?>/imgs/logo.png" />
</head>
<body>
    <div class="header">
        <h2>结算
            <div onclick="window.history.back()"><i class="icon-angle-left"></i></div>
            <div class="nav" id="nav">
                <ul>
                    <li><a href="javascript:void(0)"><i class="icon-home"></i>首页</a></li>
                    <li><a href="javascript:void(0)"><i class="icon-reorder"></i>分类</a></li>
                    <li><a href="javascript:void(0)"><i class="icon-shopping-cart"></i>购物车</a></li>
                    <li><a href="javascript:void(0)"><i class="icon-user"></i>我的账户</a></li>
                <div class="triangle"></div>
                </ul>
            </div>
            <div id="trigger_nav"><i class="icon-th"></i></div>
        </h2>
    </div>
    <div id="mongolia_layer"></div>
    <div class="main">
        <form action="<?php echo U('addSubmit');?>" id="addSubmit" name="addSubmit" method="POST">
            <!-- 收货信息 -->
            <ul class="order_info_list">
                <h3><i class="icon-map-marker"></i>收货信息</h3>
                <li>
                    <a href="<?php echo U('selectAddress');?>">
                    <div class="left">收货人:<?php echo $addressData['consignee'];?><span><?php echo $addressData['mobile'];?></span><br>收货地址:
                    <?php
                    $ctiyName = get_all_city_name($addressData['city']);
                    echo $ctiyName , $addressData['address'];
                    ?>
                    </div>
                    <div class="right"><i class="icon-angle-right"></i></div>
                    </a>
                </li>
            </ul>
            <!-- 配送时间 -->
            <ul class="order_info_list">
                <h3><i class="icon-time"></i>配送时间</h3>
                <li>
                    <a href="<?php echo U('selectDate');?>">
                    <div class="left">
                    <?php
                        echo '配送时间:';
                        if(session('order_delivery_time') == NULL){
                            echo date('m-d',strtotime('+2 days'));
                        }else{
                            echo session('order_delivery_time');
                        }  
                    ?>    
                    </div>
                    <div class="right"><i class="icon-angle-right"></i></div>
                    </a>
                </li>
            </ul>
            <!-- 支付方式 -->
            <ul class="order_info_list">
                <h3><i class="icon-yen"></i>选择支付方式</h3>
                <li>
                    <a href="<?php echo U('selectPayType'); ?>">
                        <div class="left">
                            <label><div class="label" style="height:.6rem;">&nbsp;<input type="radio" name="" checked></div><?php
                            $pay_name = session('order_pay_name');//读取上记住的次选择的支付方式
                            if($pay_name == null){//如果读取不到就给一个默认的
                                $pay_name = C('pay_name')[0];
                            }
                            echo $pay_name;
                            ?></label><span>修改</span>
                        </div>
                        <div class="right"><i class="icon-angle-right"></i></div>
                    </a>
                </li>
            </ul>
            <!-- 索要发票 --> 
            <ul class="order_info_list">
                <h3><i class="icon-tablet"></i>索要发票</h3>
                    <label><div class="label"><input type="radio" name="invoice" value="不需要发票" 
                    <?php
                        if(session('order_invoice') == NULL){
                            echo 'checked';
                        }
                    ?>
                    ></div>不需要发票</label><label><div class="label"><input type="radio" name="invoice" value="需要发票"
                    <?php
                        if(session('order_invoice') != NULL){
                            echo 'checked';
                        }
                    ?>
                    ></div>需要发票</label>
                <li id="invoice">
                    <a href="<?php echo U('selectInvoice');?>">
                    <div class="left">
                    <?php
                        if(session('order_invoice') == NULL){
                            echo '普通发票';
                        }else{
                            echo session('order_invoice');
                        }
                    ?>
                    </div>
                    <div class="right"><i class="icon-angle-right"></i></div>
                    </a>
                </li>
            </ul>
            <!-- 顾客留言 -->
            <ul class="order_info_list">
                <h3><i class="icon-edit"></i>顾客留言</h3>
                <textarea placeholder="选填" name="user_note"></textarea>
            </ul>
            <!-- 商品列表 -->
            <ul class="goods_list">
                <h3>共<?php echo $count;?>件商品</h3>
                <?php
                    foreach ($data as $key => $value) {
                        echo '<li data-goods_id="' , $value['id'] , '" data-id="' , $key , '">';
                        echo '    <div class="left"><img src="' , __ROOT__ , '/Uploads/' , $value['filename'] , '" alt="' , $value['name'] , '"><div      class="word">买2送1</div></div>';
                        echo '    <div class="right">';
                        echo '        <h4>' , $value['name'] , '</h4>';
                        echo '        规格：' , $value['format'] , '<br>';
                        echo '        <span>￥<sapn class="price">' , $value['price'] , '</sapn><span class="number">x' , $newNum[$key] , '</span></span>';
                        echo '    </div>';
                        echo '<input type="hidden" name="goods_id[]" value="' , $value['id'] , '">';
                        echo '<input type="hidden" name="num[]" value="' , $newNum[$key] , '">';
                        echo '</li>';
                    }
                ?>
            </ul>
            <!-- 商品总额 -->
            <div class="goods_money">
                商品总额<span>￥ <?php echo $totalPrice;?></span><br>
                运费<i class=""></i><span>+ ￥ 0.00</span>
            </div>
            <?php

                echo '<input type="hidden" name="consignee" value="',$addressData['consignee'],'">';
                echo '<input type="hidden" name="city"      value="',$addressData['city'],'">';
                echo '<input type="hidden" name="address"   value="',$addressData['address'],'">';
                echo '<input type="hidden" name="mobile"    value="',$addressData['mobile'],'">';
                echo '<input type="hidden" name="pay_name"  value="',$pay_name,'">';
                echo '<input type="hidden" name="invoice_title"  value="','  ',' ">'; //空格也算一个字符
                
            ?>
        </form>
    </div>
    <div class="foot">
        <div class="left">应付金额：<span>￥ <span id="pay"><?php echo $totalPrice;?></span></span></div>
        <!-- <div class="right">提交订单</div> -->
        <input class="right" type="submit" name="" value="提交订单" form="addSubmit">
    </div>
<script src="<?php echo $staticPath;?>/js/jquery-1.8.2.min.js"></script>
<script src="<?php echo $staticPath;?>/js/pub.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script>
$('#trigger_nav').toggle(
    function () {
        $('#mongolia_layer').css({'width':screen.width,'height':screen.height});
        $('#mongolia_layer').show();
        $('#nav').show();       
    },
    function () {
        $('#mongolia_layer').hide();
        $('#nav').hide();
    }
)
$('#mongolia_layer').click(
    function () {
        $('#mongolia_layer').hide();
        $('#nav').hide();
    }
)
function checkboxState() {
    var leng=document.querySelectorAll('.order_info_list label input');
    for (var i = 0; i < leng.length; i++) {
        if(leng[i].checked == true){
            leng[i].parentNode.style.backgroundPosition='-.4rem';
            if (leng[i].value=='需要发票') {
                $('#invoice').attr('style','display:block');
            };
            if (leng[i].value=='不需要发票') {
                $('#invoice').attr('style','display:none');
            };
        }else{
            leng[i].parentNode.style.backgroundPosition='0';
        }
    }
};
checkboxState();
$('.order_info_list label input').click(function() {
    if(this.value=='需要发票'){
        $('#invoice').attr('style','display:block');
    }else{
        $('#invoice').attr('style','display:none');
    }
    checkboxState();
});
</script>
</body>
</html>