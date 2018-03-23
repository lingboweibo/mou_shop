<!DOCTYPE HTML>
<html>
<head>
<title>修改分类</title>
<?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/meta.php" ?>
</head>
<body>
<?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/header.php" ?>
<div class="main">
    <?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/left.php" ?>
    <div class="content">
        <h3 class="content_title">分类管理<small>/修改分类</small></h3>
        <form class="form" action="<?php echo U('editSubmit')?>" method="post" enctype="multipart/form-data">
        <input name='id' type='hidden' value="1">
            <table class="form_table" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <th>ID:</th>
                    <td><?php echo $data['id'];?></td>
                </tr>
                <tr>
                    <th width="180">上级分类:</th>
                    <td id="select_category">
                        <?php
                        $arr = array();
                        $arr['addValue']  = '';
                        $arr['addText']  = '顶级分类';
                        $arr['name']  = 'pid[]';
                        $parArr = getParentCategoryId($data['pid']);
                        $parArr[] = $data['pid'];
                        foreach ($parArr as $key => $value) {
                            if($key == 0){
                                $arr['data']  = getCategoryData(0);
                            }else{
                                $arr['data']  = getCategoryData($parArr[$key - 1]);
                            }
                            $arr['value'] = $value;
                            echo selectHtml($arr);
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>分类名称:</th>
                    <td><input name="name" type="text" maxlength="128" size="22" value="<?php echo $data['name'];?>"></td>
                </tr>
                <tr>
                    <th>新图标</th>
                    <td>
                        <input name="ico" type="file" accept="image/*"><br>
                        <canvas width="120px" height="120px" id="myCanvas1" class="category_ico_preview"></canvas>
                        <br>(建议上传120*120像素的图标，大小不要超过400K，图标只允许：jpg gif png jpeg这几种格式)
                    </td>
                </tr>
                <tr>
                    <th>旧图标</th>
                    <td><?php
                    if($data['ico'] == ''){
                        echo '没有图标';
                    }else{
                        echo '<div class="category_ico_preview"><img src="./Uploads/ico/' , $data['ico'] ,'"></div>';
                    }
                    ?>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td class="submit">
                        <input name="id" type="hidden" value="<?php echo $data['id']; ?>">
                        <input name="" type="submit" value="提交修改">
                        <input name="" type="reset" value="重置">
                        <input name="button" type="button" onclick="history.back();" value="不修改了|返回上一页" >
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
</body>
</html>
<script>
var AJAX_URL_CATEGORY = '<?php echo U('Home/Category/getCategory',array('id' => 'CITY_ID_CITY_ID_CITY_ID'));?>';
</script>
<script src="<?php echo __ROOT__ , C('STATIC_PATH');?>/js/category.js?v=<?php echo C('STATIC_VERSION');?>"></script>