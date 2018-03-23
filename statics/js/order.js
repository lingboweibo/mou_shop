/*
 * 排序功能相关JS代码 ( 景曾春 1137738009 )
 * 调用前提：
 * <script type="text/javascript">var order_rep_url = '{:urldecode(U('Admin/Shop/index', array_merge(I('get.'), array('f'=>'<f>', 'desc'=>'<desc>'))))}'; var order_param = {f:'{:I('get.f', 'id')}', desc:'{:I('get.desc', '0')}'};</script>
 * <script src="__ROOT__/statics/js/order.js" type="text/javascript"></script>
 * <tr>
 *     <th order="yes" f="id">ID</th>
 * <tr>
 */

var icon = '<span order_ico="yes" style=" width:6px; height:14px; display:inline-block;"><div style=" width:0px; height:0px; border:solid 3px; border-top-color:transparent; border-left-color:transparent;  border-bottom-color:#888;  border-right-color:transparent;"></div><div style=" width:0px; height:0px; border:solid 3px; margin-top:2px; border-top-color:#888; border-left-color:transparent;  border-bottom-color:transparent;  border-right-color:transparent;"></div></span>';

$(function(){
    new OrderOBJ();
});

function OrderOBJ(){
    var obj = $('[order="yes"]');
    var thisP = this;
    
    this.init = function(){
        obj.css('cursor', 'pointer');
        obj.attr('title', '点击排序');
        $.each(obj, function(key, val){
            $(val).append(icon);
        });
        obj.filter('[f="'+order_param.f+'"]').find('div').eq(order_param.desc==='1'?1:0).css('border-'+(order_param.desc==='1'?'top':'bottom')+'-color', 'red');
        obj.click(function(){
            thisP.updateGet($(this));
            window.location = thisP.getURL();
        });
    };
    
    this.updateGet = function(jqE){
        var clickF = jqE.attr('f');
        if(clickF === order_param.f){
            if(order_param.desc === '1'){
                order_param.desc = '0';
                return;
            }
        }else{
            order_param.f = clickF;
        }
        order_param.desc = '1';
    };
    
    this.getURL = function(){
        var url = order_rep_url.replace('<f>', order_param.f);
        return url.replace('<desc>', order_param.desc);
    };
    
    this.init();
}