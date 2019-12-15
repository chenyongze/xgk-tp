layui.define(["element", "jquery"], function (exports) {
    "use strict";
    var element = layui.element,
        $ = layui.$,
        layer = layui.layer;
    var xgk = {
        render: function (param) {
            layer.msg(param)
        },
    }
    exports("xgk", xgk);
})