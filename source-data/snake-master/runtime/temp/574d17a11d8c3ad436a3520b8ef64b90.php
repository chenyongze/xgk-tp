<?php /*a:1:{s:75:"/Users/yongze/Downloads/snake-master/application/admin/view/node/index.html";i:1573117750;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>节点管理</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/static/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/static/admin/style/admin.css" media="all">
</head>
<body>

<div class="layui-fluid">
    <div class="layui-row layui-col-space15">
        <div class="layui-col-md12">
            <div class="layui-card">

                <div style="padding-bottom: 10px;padding-top: 20px;margin-left: 10px">
                    <?php if((buttonAuth('node/add'))): ?>
                    <button class="layui-btn layuiadmin-btn-admin" data-type="add" id="addNode">
                        <i class="layui-icon">&#xe654;</i> 添加顶级节点
                    </button>
                    <?php endif; ?>
                    <blockquote class="layui-elem-quote" style="width: 300px;float: right;border-left: 5px solid #FFB800">
                        提示： 红色 <i class="layui-icon layui-icon-right" style="color: #FF5722"></i> 表示下面有子节点，可点击打开
                    </blockquote>
                </div>
                <div class="layui-card-body">

                    <table id="demo" lay-filter="test"></table>

                    <table class="layui-table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>节点名称</th>
                            <th>节点图标</th>
                            <th>节点路径</th>
                            <th>是否菜单</th>
                            <th>添加时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($tree) || $tree instanceof \think\Collection || $tree instanceof \think\Paginator): if( count($tree)==0 ) : echo "" ;else: foreach($tree as $key=>$vo): ?>
                        <tr>
                            <td><?php echo htmlentities($vo['id']); ?></td>
                            <td><?php echo htmlentities($vo['title']); ?></td>
                            <td><i class="<?php echo htmlentities($vo['node_icon']); ?>"></i></td>
                            <td><?php echo htmlentities($vo['node_path']); ?></td>
                            <td><?php if($vo['is_menu'] == 1): ?>否<?php else: ?>是<?php endif; ?></td>
                            <td><?php echo htmlentities($vo['add_time']); ?></td>
                            <td>
                                <div class="layui-btn-group">
                                    <?php if((buttonAuth('node/add'))): ?>
                                    <button type="button" class="layui-btn layui-btn-sm" onclick="addSub(this)" data-pid="<?php echo htmlentities($vo['id']); ?>" data-name="<?php echo htmlentities($vo['title']); ?>">
                                        <i class="layui-icon">&#xe654;</i> 添加子节点
                                    </button>
                                    <?php endif; if((buttonAuth('node/edit'))): ?>
                                    <button type="button" class="layui-btn layui-btn-sm layui-bg-blue" onclick="editNode(this)" data-id="<?php echo htmlentities($vo['id']); ?>" data-pid="<?php echo htmlentities($vo['pid']); ?>">
                                        <i class="layui-icon">&#xe642;</i> 编辑节点
                                    </button>
                                    <?php endif; if((buttonAuth('node/delete'))): ?>
                                    <button type="button" class="layui-btn layui-btn-sm layui-bg-red" onclick="delNode(this)" data-id="<?php echo htmlentities($vo['id']); ?>">
                                        <i class="layui-icon">&#xe640;</i> 删除节点
                                    </button>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                        <?php if(!empty($vo['children'])): if(is_array($vo['children']) || $vo['children'] instanceof \think\Collection || $vo['children'] instanceof \think\Paginator): if( count($vo['children'])==0 ) : echo "" ;else: foreach($vo['children'] as $key=>$v): ?>
                        <tr>
                            <td><?php echo htmlentities($v['id']); ?></td>
                            <td> &nbsp;&nbsp;&nbsp;&nbsp; <i class="layui-icon layui-icon-right" onclick="showSub(this)" data-flag="0" data-id="<?php echo htmlentities($v['id']); ?>" style="cursor: pointer;<?php if(!empty($v['children'])): ?>color:#FF5722<?php endif; ?>"></i> <?php echo htmlentities($v['title']); ?></td>
                            <td><?php echo htmlentities($v['node_icon']); ?></td>
                            <td><?php echo htmlentities($v['node_path']); ?></td>
                            <td><?php if($v['is_menu'] == 1): ?>否<?php else: ?>是<?php endif; ?></td>
                            <td><?php echo htmlentities($v['add_time']); ?></td>
                            <td>
                                <div class="layui-btn-group">
                                    <?php if((buttonAuth('node/add'))): ?>
                                    <button type="button" class="layui-btn layui-btn-sm" onclick="addSub(this)" data-pid="<?php echo htmlentities($v['id']); ?>" data-name="<?php echo htmlentities($v['title']); ?>">
                                        <i class="layui-icon">&#xe654;</i> 添加子节点
                                    </button>
                                    <?php endif; if((buttonAuth('node/edit'))): ?>
                                    <button type="button" class="layui-btn layui-btn-sm layui-bg-blue" onclick="editNode(this)" data-id="<?php echo htmlentities($v['id']); ?>" data-pid="<?php echo htmlentities($v['pid']); ?>">
                                        <i class="layui-icon">&#xe642;</i> 编辑节点
                                    </button>
                                    <?php endif; if((buttonAuth('node/delete'))): ?>
                                    <button type="button" class="layui-btn layui-btn-sm layui-bg-red" onclick="delNode(this)" data-id="<?php echo htmlentities($v['id']); ?>">
                                        <i class="layui-icon">&#xe640;</i> 删除节点
                                    </button>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                        <?php if(!empty($v['children'])): if(is_array($v['children']) || $v['children'] instanceof \think\Collection || $v['children'] instanceof \think\Paginator): if( count($v['children'])==0 ) : echo "" ;else: foreach($v['children'] as $key=>$vl): ?>
                        <tr style="display: none" class="tree-<?php echo htmlentities($vl['pid']); ?>">
                            <td><?php echo htmlentities($vl['id']); ?></td>
                            <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <i class="layui-icon layui-icon-right"></i> <?php echo htmlentities($vl['title']); ?></td>
                            <td><?php echo htmlentities($vl['node_icon']); ?></td>
                            <td><?php echo htmlentities($vl['node_path']); ?></td>
                            <td><?php if($vl['is_menu'] == 1): ?>否<?php else: ?>是<?php endif; ?></td>
                            <td><?php echo htmlentities($vl['add_time']); ?></td>
                            <td>
                                <div class="layui-btn-group">
                                    <?php if((buttonAuth('node/edit'))): ?>
                                    <button type="button" class="layui-btn layui-btn-sm layui-bg-blue" onclick="editNode(this)" data-id="<?php echo htmlentities($vl['id']); ?>" data-pid="<?php echo htmlentities($vl['pid']); ?>">
                                        <i class="layui-icon">&#xe642;</i> 编辑节点
                                    </button>
                                    <?php endif; if((buttonAuth('node/delete'))): ?>
                                    <button type="button" class="layui-btn layui-btn-sm layui-bg-red" onclick="delNode(this)" data-id="<?php echo htmlentities($vl['id']); ?>">
                                        <i class="layui-icon">&#xe640;</i> 删除节点
                                    </button>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php endif; ?>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php endif; ?>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/static/layui/layui.js"></script>
<script src="/static/common/js/layTool.js"></script>
<script src="/static/common/js/jquery.min.js"></script>

<script>

    function renderTable() {
        window.location.reload();
    }

    $(function () {

        $("#addNode").click(function () {

            layTool.open('<?php echo url("node/add", ["pid" => 0, "pname" => "顶级节点"]); ?>', '添加顶级节点', '40%', '50%');
        });
    });

    function addSub(obj) {

        var pid = $(obj).attr('data-pid');
        var pname = $(obj).attr('data-name');

        layTool.open('/admin/node/add/pid/' + pid + '/pname/' + pname, '添加字节点', '40%', '50%');
    }

    function editNode(obj) {

        var id = $(obj).attr('data-id');
        var pid = $(obj).attr('data-pid');

        layTool.open('/admin/node/edit/pid/' + pid + '/id/' + id, '编辑节点', '40%', '50%');
    }

    function delNode(obj) {

        var id = $(obj).attr('data-id');

        layui.use('layer', function () {

            var layer = layui.layer;

            layer.ready(function () {
                var index = layer.confirm('您确定要删除该节点？', {
                    title: '友情提示',
                    icon: 3,
                    btn: ['确定', '取消']
                }, function(){

                    $.getJSON('<?php echo url("node/delete"); ?>', {id: id}, function (res) {
                        if (0 == res.code) {
                            layTool.msg(res.msg);

                            setTimeout(function () {
                                renderTable();
                            }, 500);
                        } else {

                            layTool.alert(res.msg, '', 2);
                        }
                    });

                }, function(){

                });
            });
        });
    }

    function showSub(obj) {

        var flag = $(obj).attr('data-flag');
        if (0 == flag) {
            $(".tree-" + $(obj).attr('data-id')).show();
            $(obj).attr('data-flag', 1);
        } else {
            $(".tree-" + $(obj).attr('data-id')).hide();
            $(obj).attr('data-flag', 0);
        }
    }
</script>
</body>
</html>