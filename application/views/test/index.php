<div class="layui-body">
    <!-- 内容主体区域 -->
    <div style="padding: 15px;">
        内容主体区域

        <br>
        <br>
        <blockquote class="layui-elem-quote">
            layui 之所以赢得如此多人的青睐，更多是在于它“前后台系统通吃”的能力。既可编织出绚丽的前台页面，又可满足繁杂的后台功能需求。
        </blockquote>

        <a href="" class="layui-btn layui-btn-big">获取该布局代码</a>

        <?= dump($haha) ?>


        <div style="height: 500px;"></div>
    </div>
</div>

<script src="<?= lib_url('jquery', 'jquery.js') ?>" charset="utf-8"></script>
<script src="<?= lib_url('layui', 'layui.js') ?>" charset="utf-8"></script>
<script>
    //JavaScript代码区域
    layui.use('element', function () {
        var element = layui.element;

    });
</script>
