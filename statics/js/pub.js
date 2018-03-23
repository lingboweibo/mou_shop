var left_menu_on_off = function()
{
    var h3   = $('.sidebar .parent h3');
    var ul   = $('.sidebar .parent ul');
    var span = $('.sidebar .parent h3 span:last-child');
    h3.each
    (
        function (i){
            this.id = 'sidebar_parent_h3_' + i;
        }
    );
    span.each
    (
        function (i) {
            this.id = 'sidebar_parent_h3_span_' + i;
            var value = window.localStorage.getItem(this.id);
            if(value)$(this).attr('class',value);
        }
    );
    ul.each
    (
        function (i)  {
            this.id = 'sidebar_parent_ul_' + i;
            var value = window.localStorage.getItem(this.id);
            if(value)$(this).attr('style',value);
        }
    );
    h3.click
    (
        function(){
            console.log('h3.click');
            var class_name,span,ul,display;
            var h3   = document.querySelectorAll('.sidebar .parent h3');
            for(var i=0;i<h3.length;i++){
                span = $(h3[i]).children('span:last-child');
                ul   = $(h3[i]).next();
                class_name = 'icon-folder-close';
                display    = 'none';
                if(h3[i].id == this.id){
                    if(span.attr('class') != 'icon-folder-open'){
                        class_name = 'icon-folder-open';
                        display    = 'block';
                    }
                }
                span.attr('class',class_name);
                if(display == 'none')
                    ul.slideUp();//隐藏
                else
                    ul.slideDown();//显示
                window.localStorage.setItem(span.attr('id'),class_name);
                window.localStorage.setItem(ul.attr('id'),'display:' + display);
            }
        }
    );
}
$(window).load(
    function(){
        $('.main').css({'min-height' : $(window).height() - $('header').innerHeight() - 2,'min-width'  : window.screen.availWidth - 30});
        $('.main > .content').css('min-height',$('.main').height() - 30);
        $('.main > .sidebar').css('min-height',$('.main').height());
    }
);
$(document).ready(left_menu_on_off);