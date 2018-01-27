<link rel="stylesheet" href="<?= lib_url('editor.md', 'css/editormd.css') ?>">
<div class="layui-body" style="padding: 15px;">

    <blockquote class="layui-elem-quote" style="line-height: 0;padding-left: 5px;">
        <span class="layui-breadcrumb" style="visibility: visible;">
            <span lay-separator="">首页 / 内容管理 / 新增文章</span>
        </span>
    </blockquote>

    <a class="layui-btn layui-btn-xs" href="<?= site_url('content/article/add') ?>">刷新</a>

    <div style="margin-top: 10px;"></div>

    <form class="layui-form layui-form-pane" action="">
        <div class="layui-form-item">
            <label class="layui-form-label">标题</label>
            <div class="layui-input-block">
                <input type="text" name="title" autocomplete="off" placeholder="title" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">描述</label>
            <div class="layui-input-block">
                <input type="text" name="desc" autocomplete="off" placeholder="desc" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">关键词</label>
            <div class="layui-input-block">
                <input type="text" name="keywords" autocomplete="off" placeholder="keywords" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <button type="button" class="layui-btn layui-btn-xs" id="up-art-cover" style="margin-bottom: 5px;">
                <i class="layui-icon">&#xe67c;</i>上传封面
            </button>
            <input type="hidden" name="art-cover" value="">
            <div class="art-cover"></div>
        </div>

    </form>

    <div style="margin-top: 10px;"></div>

    <!--markdown-->
    <div id="editormd">
        <textarea style="display:none;">> 写点什么吧...</textarea>
    </div>

</div>

<script src="<?= lib_url('editor.md', 'editormd.js') ?>" charset="UTF-8"></script>
<script>
    $ = layui.jquery;
    $(function () {
        testEditor = editormd("editormd", {
            width: "100%",
            height: 500,
            path: "<?= lib_url('editor.md', 'lib/') ?>",
        });
    });
    layui.use('upload', function () {
        var upload = layui.upload;

        //执行实例
        var uploadInst = upload.render({
            elem: '#up-art-cover' //绑定元素
            , url: "<?=site_url('common/upload/image')?>" //上传接口
            , done: function (res) {
                //上传完毕回调
                if (res.code == 0) {
                    var imgUrl = res.data.file_url;
                    var image = '<img src="' + imgUrl + '" alt="" height="100">';
                    $(".art-cover").empty();
                    $(".art-cover").append(image);
                    $("input[name='art-cover']").val(imgUrl);
                    layer.msg(res.msg);
                } else {
                    layer.msg(res.msg);
                }
            }
            , error: function () {
                //请求异常回调
            }
        });
    });
</script>