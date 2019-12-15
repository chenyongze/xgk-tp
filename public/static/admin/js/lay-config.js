/**
 * date:2019/08/16
 * author:Mr.Chung
 * description:此处放layui自定义扩展
 */

window.rootPath = (function (src) {
    src = document.scripts[document.scripts.length - 1].src;
    return src.substring(0, src.lastIndexOf("/") + 1);
})();

layui.config({
    base: rootPath + "lay-module/", //设定扩展的Layui模块的所在目录，一般用于外部模块扩展
    version: true,
    // debug: true
}).extend({
    layuimini: "layuimini/layuimini", // layuimini扩展
    step: 'step-lay/step', // 分步表单扩展
    treetable: 'treetable-lay/treetable', //table树形扩展
    tableSelect: 'tableSelect/tableSelect', // table选择扩展
    iconPickerFa: 'iconPicker/iconPickerFa', // fa图标选择扩展
    echarts: 'echarts/echarts', // echarts图表扩展
    echartsTheme: 'echarts/echartsTheme', // echarts图表主题扩展
    wangEditor: 'wangEditor/wangEditor', // wangEditor富文本扩展
    xgk: 'xgk-lay/xgk', // xgk js
});


// 全局方法 
layui.use(['layer', 'jquery'], function () {
    let layer = layui.layer,
        $ = layui.$
    $body = $('body');
    $body.on('click', '[data-phone-view]', function () {
        layer.msg('data-phone-view')
    });
})