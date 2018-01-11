<div class="layui-body" style="padding: 15px;">

    <blockquote class="layui-elem-quote" style="line-height: 0;padding-left: 5px;">
        <span class="layui-breadcrumb" style="visibility: visible;">
            <span lay-separator="">首页 / 系统管理 / 节点管理</span>
        </span>
    </blockquote>

    <button id="module_add" class="layui-btn layui-btn-xs">新增模块</button>

    <div style="margin-top: 10px;"></div>

    <div class="layui-collapse" lay-accordion="">
        <?php foreach ($nodes as $key => $val): ?>
            <div class="layui-colla-item">
                <h2 class="layui-colla-title">
                    <span class="layui-badge-dot layui-bg-green"></span>
                    <?= $val['node_name'] ?>
                    <span style="color: #999">[排序：<?= $val['node_sort'] ?>]</span>
                    <button class="layui-btn layui-btn-xs layui-btn-normal" style="float: right;margin-top: 10px" data-id="<?= $val['node_id'] ?>"
                            onclick="addNode(this)">新增菜单
                    </button>
                </h2>
                <div class="layui-colla-content">

                    <?php foreach ($val['child'] as $key1 => $val1): ?>
                        <div class="layui-collapse" lay-accordion="">
                            <div class="layui-colla-item">
                                <h2 class="layui-colla-title">
                                    <span class="layui-badge-dot layui-bg-blue"></span>
                                    <?= $val1['node_name'] ?>
                                    <span style="color: #999">[排序：<?= $val1['node_sort'] ?>]</span>
                                    <button class="layui-btn layui-btn-xs layui-btn-danger" data-id="<?= $val1['node_id'] ?>"
                                            style="float: right;margin-top: 10px" onclick="addAction(this)">新增操作
                                    </button>
                                </h2>
                                <div class="layui-colla-content">

                                    <?php foreach ($val1['child'] as $key2 => $val2): ?>
                                        <div class="layui-collapse" lay-accordion="">
                                            <div class="layui-colla-item">
                                                <h2 class="layui-colla-title">
                                                    <span class="layui-badge-dot layui-bg-orange"></span>
                                                    <span><?= $val2['node_name'] ?></span>
                                                </h2>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
    <? //= dump($nodes) ?>
</div>

<!--新增模块-->
<div class="module_add" style="display:none;padding: 15px 10px 0 10px;">
    <div class="layui-form-item">
        <input type="text" id="module_cn_name" placeholder="菜单名称：系统管理" class="layui-input">
    </div>
    <div class="layui-form-item">
        <input type="text" id="module_en_name" placeholder="模块名称：system" class="layui-input">
    </div>
    <div class="layui-form-item" style="margin-bottom: 0">
        <input type="text" id="module_sort" placeholder="排序值：99" class="layui-input">
    </div>
</div>

<!--新增菜单-->
<div class="menu_add" style="display:none;padding: 15px 10px 0 10px;">
    <div class="layui-form-item">
        <input type="text" id="menu_cn_name" placeholder="菜单名称：系统管理" class="layui-input">
    </div>
    <div class="layui-form-item">
        <input type="text" id="menu_ca" placeholder="控制器/方法：node/add" class="layui-input">
    </div>
    <div class="layui-form-item" style="margin-bottom: 0">
        <input type="text" id="menu_sort" placeholder="排序值：99" class="layui-input">
    </div>
</div>

<!--新增操作-->
<div class="action_add" style="display:none;padding: 15px 10px 0 10px;">
    <div class="layui-form-item">
        <input type="text" id="action_cn_name" placeholder="菜单名称：系统管理" class="layui-input">
    </div>
    <div class="layui-form-item">
        <input type="text" id="action_ca" placeholder="控制器/方法：node/add" class="layui-input">
    </div>
    <div class="layui-form-item" style="margin-bottom: 0">
        <input type="text" id="action_sort" placeholder="排序值：99" class="layui-input">
    </div>
</div>




<script src="<?= lib_url('jquery', 'jquery.js') ?>" charset="utf-8"></script>
<script src="<?= lib_url('layui', 'layui.all.js') ?>" charset="utf-8"></script>
<script>
    $ = layui.jquery;

    // 新增操作
    function addAction(obj) {
        var _addAction = "<?= site_url('system/node/addAction')?>";
        layer.open({
            type: 1
            , title: '新增操作'
            , content: $(".action_add")
            , area: ['370px']
            , btn: ['提交', '取消']
            , yes: function (index) {
                var _data = {};
                _data['cn_name'] = $("#action_cn_name").val();
                _data['sort'] = $("#action_sort").val();
                _data['menu_ca'] = $("#action_ca").val();
                _data['module_id'] = $(obj).data('id');
                $.ajax({
                    type: "post",
                    url: _addAction,
                    data: _data,
                    success: function (res) {
                        layer.close(index,);
                        if (res.code == 0) {
                            layer.msg(res.msg, {time: 1500}, function () {
                                location.reload();
                            })
                        } else {
                            layer.msg(res.msg);
                        }
                    }
                });
            }
        });
    }

    // 新增菜单
    function addNode(obj) {
        var _addMenu = "<?= site_url('system/node/addMenu')?>";
        layer.open({
            type: 1
            , title: '新增菜单'
            , content: $(".menu_add")
            , area: ['370px']
            , btn: ['提交', '取消']
            , yes: function (index) {
                var _data = {};
                _data['cn_name'] = $("#menu_cn_name").val();
                _data['sort'] = $("#menu_sort").val();
                _data['menu_ca'] = $("#menu_ca").val();
                _data['module_id'] = $(obj).data('id');
                $.ajax({
                    type: "post",
                    url: _addMenu,
                    data: _data,
                    success: function (res) {
                        layer.close(index,);
                        if (res.code == 0) {
                            layer.msg(res.msg, {time: 1500}, function () {
                                location.reload();
                            })
                        } else {
                            layer.msg(res.msg);
                        }
                    }
                });
            }
        });
    }

    $(function () {
        // 新增模块
        $("#module_add").click(function () {
            var _addModule = "<?= site_url('system/node/addModule')?>";
            layer.open({
                type: 1
                , title: '新增模块'
                , content: $(".module_add")
                , area: ['370px']
                , btn: ['提交', '取消']
                , yes: function (index) {
                    var cnName = $("#module_cn_name").val();
                    var enName = $("#module_en_name").val();
                    var sort = $("#module_sort").val();
                    $.ajax({
                        type: "post",
                        url: _addModule,
                        data: {"cn_name": cnName, "en_name": enName, "sort": sort},
                        success: function (res) {
                            layer.close(index,);
                            if (res.code == 0) {
                                layer.msg(res.msg, {time: 1500}, function () {
                                    location.reload();
                                })
                            } else {
                                layer.msg(res.msg);
                            }
                        }
                    });
                }
            });
        })
    });
</script>