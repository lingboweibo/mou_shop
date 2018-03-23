<div class="sidebar">
    <ul>
        <li class="parent">
            <h3><span class="icon-cog"></span>系统设置<span class="icon-folder-close"></span></h3>
            <ul>
                <li><a href="/index.php/Admin/Index/index.html"><span class="icon-home"></span>系统首页</a></li>
                <li><a href="<?php echo U('Admin/index');?>"><span class="icon-user"></span>管理员列表</a></li>
                <li><a href="<?php echo U('Permission/index');?>"><span class="icon-user-md"></span>权限设置</a></li>
                <li><a href="<?php echo U('City/index');?>"><span class="icon-table"></span>城市列表</a></li>
                <li><a href="<?php echo U('Help/index');?>"><span class="icon-tasks"></span>帮助中心</a></li>
            </ul>
        </li>
        <li class="parent">
            <h3><span class="icon-indent-left"></span>商品管理<span class="icon-folder-close"></span></h3>
            <ul>
                <li><a href="<?php echo U('Goods/index');?>"><span class="icon-table"></span>商品列表</a></li>
                <li><a href="<?php echo U('Goods/add');?>"><span class="icon-plus"></span>添加商品</a></li>
                <li><a href="<?php echo U('Category/index');?>"><span class="icon-table"></span>分类列表</a></li>
            </ul>
        </li>
        <li class="parent">
            <h3><span class="icon-user-md"></span>订单管理<span class="icon-folder-close"></span></h3>
            <ul>
                <li><a href="<?php echo U('Order/index');?>"><span class="icon-table"></span>订单列表</a></li>
            </ul>
        </li>
        <li class="parent">
            <h3><span class="icon-user-md"></span>会员管理<span class="icon-folder-close"></span></h3>
            <ul>
                <li><a href="<?php echo U('User/index'); ?>"><span class="icon-table"></span>会员列表</a></li>
                <li><a href="<?php echo U('User/add'); ?>"><span class="icon-plus"></span>添加会员</a></li>
            </ul>
        </li>
        <li><a href="<?php echo U('Admin/editMy');?>"><span class="icon-key"></span>修改密码</a></li>
        <li><a href="<?php echo U('Login/quit');?>"><span class="icon-signout"></span>注销</a></li>
    </ul>
    <div class="panel">
        <h3><span class="icon-user-md"></span>公告</h3>
        <p>暂无公告</p>
    </div>
</div>