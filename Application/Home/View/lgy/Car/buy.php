<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>购物车</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/pub.css">
<style type="text/css">
.middle {background-color: #fff;border-bottom:1px solid #dfdfdf;}
.middle .topic{height:20px;line-height:20px;vertical-align: middle;width:100%;position:fixed;top:0;left:0; background: #fff;}
.detailsInfo ul{margin-top:38px;background-color: #fff}
.detailsInfo ul li{zoom:1;overflow:hidden;padding-top: 5px;border-bottom: 1px solid #ccc;padding-bottom: 4px}
.detailsInfo ul li .left{width:8.027777777777778%;margin-left:10px;margin-left:5px;border: none;float: left}
.detailsInfo ul li .center{width:30.33333333333333%;padding-right:6px;float:left;margin-left:5px;margin-top:7px}
.detailsInfo ul li .center.cent{color:#868686;padding-top:10px;}
.detailsInfo ul li .center #centBottom{color:#731108;font-size:14px;font-weight:bold;padding-top:15px}
.detailsInfo ul li .center.bottom{margin-top:7px}
.detailsInfo ul #reduce,.detailsInfo ul #increase,.detailsInfo ul #num{border: 1px solid #666;border-radius: 4px;padding:3px 6px;}
.detailsInfo ul #num{padding:4px 30px}
.detailsInfo ul li .centright{float: left;}
.detailsInfo ul li .centright p{padding-top:7px}
.detailsInfo ul li .centright p:nth-child(2){color: #9e96ae}
.detailsInfo ul li .centright p:nth-child(3){padding-top:15px;color: #691209}
.detailsInfo ul li .centright p:nth-child(4){padding-top:15px;}
.detailsInfo ul li .right{width:7.333333333333333%;font-size:18px;padding-top:85px;float:right;border: none;margin-top: 1px}
.detailsInfo ul li .sendGoods{margin-top:5px;width:79.16666666666667%;margin-left: 18.66666666666667%;float: left;}
.detailsInfo ul li .sendGoods button{background-color: #fff;border: 1px solid #cd0000;border-radius: 4px;padding:1px 4px; color: #cd0000;margin-bottom:5px}
.detailsInfo ul .detailGoods{ color: #cd0000}
.detailsInfo ul li:nth-child(5){padding-top: 0}
.detailsInfo ul li .area{width: 100%}
.detailsInfo ul li .area .left{float: left;width:7.11111111111111%;padding:5px 3px}
.detailsInfo ul li .area .right{float: left;padding:2px;width:81%;font-size: 12px}
.detailsInfo ul li .selectA{float: left;width:35.52777777777778%;margin-top:5px;margin-left:5px}
.detailsInfo ul li .selectA span{color: #000;}
.detailsInfo ul li .sum{width:28.47222222222222%;float: left;margin-left:10px;margin-top:5px;}
.detailsInfo ul li .btn{width:28.99444444444444%;float:right;}
.detailsInfo ul li .btn button{width:100%;padding:12px 30px;margin-right:0;background-color: #8a011d;color: #fff;border: none;font-size: 14px}
.detailsInfo ul li span.centbottom{color:#691209}
footer .footerTop ul li:nth-child(3) div{color:#8b0d01 }
</style>
</head>
<body>
<div class="wrap">
        <form action="" name="" id="form1">
        	<div class="middle">
                    <p class="topic">
                	    <span class="icon-angle-left"></span>
                	    <span id="textInfo">购物车(3)</span>
                	    <span class="icon-th"></span>
                    </p>
            </div>
            <div id="content">
                <div class="slice"></div>
                <div class="div1">
                    <ul>
                        <li>
                            <a href="#"><div class="page_sort" style="background-image:url(images/sprite.png);width:28px;height:22px;display: inline-block;background-size:95px;color:#fff;background-position:1px 737px;"></div><div>首页</div></a>
                        </li>
                        <li id="sortPage">
                            <a href="#"><div class="page_sort" style="background-image:url(images/sprite.png);width:28px;height:18px;display: inline-block;background-size:95px;color:#fff;background-position:3px 716px;"></div><div>分类</div></a>
                        </li>
                        <li>
                            <a href="#"><div class="buy_cart" style="background-image:url(images/sprite.png);width:30px;height:20px;display: inline-block;background-size:95px;color:#fff;background-position:-90px 675px;"></div><div>购物车</div></a>
                        </li>
                        <li>
                            <a href="#"><div class="page_sort" style="background-image:url(images/sprite.png);width:30px;height:16px;display: inline-block;background-size:95px;color:#fff;background-position:2px 694px;"></div><div>我的账户</div></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="detailsInfo">
            	<ul>
                    <li>
                        <div class="left" id="left">
                            <input type="checkbox" name="checkbox" id="checkbox">
                            <label id="label" for="checkbox" style="background-image:url(images/sprite.png);width:18px;height:18px;display: inline-block;background-size:80px;background-position:-20px 497px;"></label>
                        </div>
                        <div class="center"><img src="images/buy_1.png"></div>
                        <div class="centright">
                            <p class="top">夏迪邮票莫斯卡多白气泡酒</p>
                            <p class="cent">规格：750毫升</p>
                            <p id="centBottom">￥ 118.00</p>
                            <p class="bottom">
                                <span id="reduce">-</span>
                                <span id="num">5</span>
                                <span id="increase">+</span>
                            </p>
                        </div>
                        <div class="right"><span class="icon-trash"></span></div>
                        <div class="sendGoods">
                            <button>赠品</button>
                            <span class="detailGoods">夏迪邮票莫斯卡多白气泡酒 x2</span>
                        </div>
                    </li>
                	<li>
                        <div class="left" id="left">
                            <input type="checkbox" name="checkbox" id="checkbox">
                            <label id="label" for="checkbox" style="background-image:url(images/sprite.png);width:18px;height:18px;display: inline-block;background-size:80px;background-position:-20px 497px;"></label>
                        </div>      
                        <div class="center"><img src="images/buy_2.png"></div>
                        <div class="centright">
                        	<p class="top">咖喱牛肉</p>
                            <p class="cent">规格：约240g/份</p>
                            <p id="centBottom">￥ 18.00</p>
                            <p class="bottom">
                                <span id="reduce">-</span>
                                <span id="num">2</span>
                                <span id="increase">+</span>
                            </p>
                        </div>
                        <div class="right"><span class="icon-trash"></span></div>
                    </li>
                	<li>
                        <div class="left" id="left">
                            <input type="checkbox" name="checkbox" id="checkbox">
                            <label id="label" for="checkbox" style="background-image:url(images/sprite.png);width:18px;height:18px;display: inline-block;background-size:80px;background-position:-20px 497px;"></label>
                        </div>      
                        <div class="center"><img src="images/buy_3.png"></div>
                        <div class="centright">
                        	<p class="top">佳世坦纳牌含气饮用水</p>
                            <p class="cent">规格：1.5升</p>
                            <p id="centBottom">￥ 10.50</p>
                            <p class="bottom">
                                <span id="reduce">-</span>
                                <span id="num">5</span>
                                <span id="increase">+</span>
                            </p>
                        </div>
                        <div class="right"><span class="icon-trash"></span></div>
                    </li>
                    <li>
        	           <div class="area">
                		    <div class="left"><img src="images/buy_4.jpg"></div>
                		    <div class="right">
                    			<p>上海地区(除崇明)满200元免运费</p>
                    			<p>上海崇明、北京、江苏及浙江地区满300元免运费</p>
        		            </div>
                        </div>
                    </li>
                    <li>
                        <div class="selectA">
                            <input type="checkbox" name="checkbox" id="checkbox">
                            <label id="label" class="label" for="checkbox" style="background-image:url(images/sprite.png);width:18px;height:18px;display: inline-block;background-size:80px;background-position:-20px 497px;"></label><span>全选</span>
                        </div>
                        <div class="sum">
                        	<p class="top">合计：<span class="centbottom">￥0.00</span></p>
                            <p >优惠： ￥0.00</p>
                        </div>
                        <div class="btn"><button>结算</button></div>
                    </li>
                </ul>
        	</div>        
        </form>
	<footer>		
		<div class="footerTop">
            <ul>
                <li>
                    <a href="#"><div class="index_sort" style="background-image:url(images/sprite.png);width:28px;height:13px;display: inline-block;background-size:95px;background-position:-22px 737px;"></div><div>首页</div></a>
                </li>
                <li>
                    <a href="#"><div class="page_sort" style="background-image:url(images/sprite.png);width:37px;height:13px;display: inline-block;background-size:95px;background-position:-13px 716px;"></div><div>分类</div></a>
                </li>
                <li>
                    <a href="#"><div class="buy_cart" style="background-image:url(images/sprite.png);width:32px;height:13px;display: inline-block;background-size:95px;background-position:-139px 673px;"></div><div>购物车</div></a>
                </li>
                <li>
                    <a href="#"><div class="my_host" style="background-image:url(images/sprite.png);width:40px;height:13px;display: inline-block;background-size:95px;background-position:-13px 695px;"></div><div>我的账户</div></a>
                </li>
            </ul>
        </div>
	</footer>	
</div>
</body>
</html>
<script src="js/jquery-1.4.4.js"></script>
<script src="js/pub.js"></script>
<script type="text/javascript">
$('#form1 input:checkbox').hide();
(
    function(){
        var num = document.getElementById('num');
        var increase = document.getElementById('increase');
        var reduce = document.getElementById('reduce');
        var centBottom = document.getElementById('centBottom');
        var li = document.querySelectorAll('.middle ul li');
        var checkbox = document.querySelectorAll('#form1 input[type="checkbox"]');
        var centBottom1 = document.querySelector('.centBottom');
        var left = document.querySelectorAll('.left');
        var sum = 0.00;
        //绑定选中按钮
        $('#form1 #label').click(
            function(){
                // console.log(1);
                $(this).css('background-position','1px 497px');
                for(var i=0;i<checkbox.length;i++){
                    if(checkbox[i].checked){
                        sum+=parseFloat(num *parseInt(centbottom*100)/100)
                    }
                }
                centBottom1.innerHTML = sum;
               //  for(var i=0;i<checkbox.length;i++){
               //      if(checkbox[i].checked){
               //          sum+=parseFloat(num[i]*parseInt(centBottom[i]*100)/100)
               //      }
               //  } 
               // // centBottom1 = return parseInt(sum);
               // if($(this).checked){
               //  centBottom1.innerHTML =sum;
               // }   
            }
        );
        //绑定全选按钮
        $('.selectA').click(
            function(){
                console.log(1);
                $(this).css('background-position','1px 497px');
                $('.left').css('background-position','1px 497px');
            }
        )
        //增加按钮
        $('#increase').click(
            function(){
                num = parseInt($(this).prev().html());
                num++;
                $(this).prev().html(num);
            }
        );
        //减少按钮
        $('#reduce').click(
            function(){
                num = parseInt($(this).next().html());
                if(num>0)num--;
                $(this).next().html(num);
            }
        );
    }
)();

// //删除按钮

// (   
//     function(){
//         for(var i=0;i<li.length;i++){
//             var delet = document.querySelectorAll('.icon-trash')[i];
//             delet.click(
//                 function(){
//                     var node = this.parentNode.parentNode;
//                     node.parseNode.removeChild(node);
//                 }
//             )
//         }
//     }
        
// )();
</script>