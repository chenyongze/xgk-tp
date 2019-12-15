<?php /*a:1:{s:77:"/Users/yongze/Downloads/snake-master/application/admin/view/manager/edit.html";i:1573117750;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>编辑管理员</title>
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
                <div class="layui-card-body">
                    <form class="layui-form" action="" lay-filter="component-form-element">
                        <input type="hidden" name="admin_id" value="<?php echo htmlentities($admin['admin_id']); ?>"/>
                        <div class="layui-row layui-col-space10 layui-form-item">
                            <div class="layui-col-lg6">
                                <label class="layui-form-label">管理名称：</label>
                                <div class="layui-input-block">
                                    <input type="text" name="admin_name" lay-verify="required" placeholder="" autocomplete="off" class="layui-input" value="<?php echo htmlentities($admin['admin_name']); ?>">
                                </div>
                            </div>
                            <div class="layui-col-lg6">
                                <label class="layui-form-label">管理密码：</label>
                                <div class="layui-input-block">
                                    <input type="text" name="admin_password" placeholder="输入则为重置" autocomplete="off" class="layui-input">
                                </div>
                            </div>

                            <div class="layui-col-lg6">
                                <label class="layui-form-label">选择框</label>
                                <div class="layui-input-block">
                                    <select name="role_id" lay-verify="required">
                                        <option value=""></option>
                                        <?php if(!empty($roles)): if(is_array($roles) || $roles instanceof \think\Collection || $roles instanceof \think\Paginator): if( count($roles)==0 ) : echo "" ;else: foreach($roles as $key=>$vo): if($vo['role_id'] != 1): ?>
                                        <option value="<?php echo htmlentities($vo['role_id']); ?>" <?php if($admin['role_id'] == $vo['role_id']): ?> selected <?php endif; ?>><?php echo htmlentities($vo['role_name']); ?></option>
                                        <?php endif; ?>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="layui-col-lg6">
                                    <label class="layui-form-label">是否启用：</label>
                                    <div class="layui-input-block">
                                        <input type="radio" name="status" value="1" title="启用" <?php if($admin['status'] == 1): ?> checked <?php endif; ?>>
                                        <input type="radio" name="status" value="0" title="禁用" <?php if($admin['status'] == 0): ?> checked <?php endif; ?>>
                                    </div>
                                </div>
                        </div>
                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <button class="layui-btn" lay-submit lay-filter="component-form-element">立即提交</button>
                                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/static/layui/layui.js"></script>
<script>
    layui.config({
        base: '/static/admin/' //静态资源所在路径
    }).use(['form'], function(){
        var $ = layui.$
            ,admin = layui.admin
            ,element = layui.element
            ,form = layui.form;

        form.on('submit(component-form-element)', function(data){

            $.post("<?php echo url('manager/editAdmin'); ?>", data.field, function (res) {

                if(0 == res.code) {

                    layer.msg(res.msg);
                    setTimeout(function () {

                        var index = parent.layer.getFrameIndex(window.name);
                        parent.layer.close(index);
                        window.parent.renderTable();
                    }, 200);
                } else {

                    layer.alert(res.msg, {
                        'title': '添加错误',
                        'icon': 2
                    });
                }
            }, 'json');
            return false;
        });
    });
</script>
</body>
</html>