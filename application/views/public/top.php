<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <a href="<?=base_url()?>">
            <div class="layui-logo" style="color: #fff;">IUXIAO-CMS</div>
        </a>

        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="<?= base_url('assets/image/head.jpg') ?>" class="layui-nav-img">
                    <span>土豆</span>
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="">基本资料</a></dd>
                    <dd><a href="<?=site_url('login/logout')?>">安全退出</a></dd>
                </dl>
            </li>
        </ul>
    </div>