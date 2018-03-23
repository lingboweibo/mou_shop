$('#editor_td').width(750);//设置编辑器宽度 = $('#select_category')的宽度
//让编辑器的父标签的宽度 = 上级分类下拉选择框所在单元格的宽度，这样编辑器就不会超出到外面去

var ue = UE.getEditor('container',{
    toolbars: [
        [
        'source', //源代码
        'anchor', //锚点
        'link', //超链接
        'unlink', //取消链接

        'removeformat', //清除格式
        'selectall', //全选
        'cleardoc', //清空文档

        'undo', //撤销
        'redo', //重做
        'bold', //加粗
        'indent', //首行缩进

        'fontsize', //字号
        'forecolor', //字体颜色
        'backcolor', //背景色

        'justifyleft', //居左对齐
        'justifyright', //居右对齐
        'justifycenter', //居中对齐
        'justifyjustify', //两端对齐
        'insertorderedlist', //有序列表
        'insertunorderedlist', //无序列表

        'snapscreen', //截图
        'italic', //斜体
        'underline', //下划线
        'strikethrough', //删除线
        'subscript', //下标
        'superscript', //上标
        'spechars', //特殊字符
        'fontborder', //字符边框
        'formatmatch', //格式刷
        'pasteplain', //纯文本粘贴模式
        'preview', //预览
        'horizontal', //分隔线
        'time', //时间
        'date', //日期
        ],
        [
        'simpleupload', //单图上传
        'insertimage', //多图上传
        'emotion', //表情
        'imagenone', //默认
        'imagecenter', //居中
        'spechars', //特殊字符
        'searchreplace', //查询替换

        'fullscreen', //全屏
        'rowspacingtop', //段前距
        'rowspacingbottom', //段后距
        'lineheight', //行间距
        'edittip ', //编辑提示
        'customstyle', //自定义标题
        'autotypeset', //自动排版
        'touppercase', //字母大写
        'tolowercase', //字母小写
        'background', //背景

        'inserttable', //插入表格
        'edittable', //表格属性
        'edittd', //单元格属性
        'insertrow', //前插入行
        'insertcol', //前插入列
        'mergeright', //右合并单元格
        'mergedown', //下合并单元格
        'deleterow', //删除行
        'deletecol', //删除列
        'splittorows', //拆分成行
        'splittocols', //拆分成列
        'splittocells', //完全拆分单元格
        'mergecells', //合并多个单元格
        'deletetable', //删除表格
        'insertparagraphbeforetable', //"表格前插入行"

        'help', //帮助
        ]
    ]
});//实例化编辑器

$('#has_season_1').click(
    function (){
        $('#season_input').show();
    }
);
$('#has_season_2').click(
    function (){
        $('#season_input').hide();
    }
);