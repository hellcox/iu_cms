<div class="layui-body" style="padding: 15px;">

    <blockquote class="layui-elem-quote" style="line-height: 0;padding-left: 5px;">
        <span class="layui-breadcrumb" style="visibility: visible;">
            <span lay-separator="">首页 / 内容管理 / 文章管理</span>
        </span>
    </blockquote>

    <a class="layui-btn layui-btn-xs" href="<?= site_url('content/article/add') ?>">新增</a>

    <div style="margin-top: 10px;">
        <div class="layui-form">
            <table class="layui-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>添加时间</th>
                    <th>修改时间</th>
                    <th>标题</th>
                    <th>浏览量</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($articles as $article): ?>
                    <tr>
                        <td><?= $article['art_id'] ?></td>
                        <td><?= date('y/m/d H:i:s',$article['add_time']) ?></td>
                        <td><?= date('y/m/d H:i:s',$article['update_time']) ?></td>
                        <td><?= $article['art_title'] ?></td>
                        <td><?= $article['art_view'] ?></td>
                        <td>
                            <div class="layui-btn-group">
                                <button class="layui-btn layui-btn-xs">查看</button>
                                <button class="layui-btn layui-btn-xs">编辑</button>
                                <button class="layui-btn layui-btn-xs">删除</button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<script src="<?= lib_url('jquery', 'jquery.js') ?>" charset="utf-8"></script>
<script src="<?= lib_url('layui', 'layui.all.js') ?>" charset="utf-8"></script>
<script>
    $ = layui.jquery;
    $(function () {

    });
</script>