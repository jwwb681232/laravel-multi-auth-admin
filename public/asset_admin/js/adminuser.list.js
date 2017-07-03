$(document).ready(function () {
    var lang = {
        "sProcessing": "处理中...",
        "sLengthMenu": "每页 _MENU_ 项",
        "sZeroRecords": "没有匹配结果",
        "sInfo": "当前显示第 _START_ 至 _END_ 项，共 _TOTAL_ 项。",
        "sInfoEmpty": "当前显示第 0 至 0 项，共 0 项",
        "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
        "sInfoPostFix": "",
        "sSearch": "搜索:",
        "sUrl": "",
        "sEmptyTable": "没有查到数据",
        "sLoadingRecords": "载入中...",
        "sInfoThousands": ",",
        "oPaginate": {
            "sFirst": "首页",
            "sPrevious": "上页",
            "sNext": "下页",
            "sLast": "末页",
            "sJump": "跳转"
        },
        "oAria": {
            "sSortAscending": ": 以升序排列此列",
            "sSortDescending": ": 以降序排列此列"
        }};
    $('#datatable').DataTable({
        "processing": true,
        'language':lang,
        "serverSide": true,
        'searchDelay':300,//搜索延时
        'search':{
            regex : true//是否开启模糊搜索
        },
        "ajax": {
            'url' : "/admin/adminuser/ajaxIndex"
        },
        "columns": [
            {"data": "id","name" : "id"},
            {"data": "name","name" : "name","orderable" : false},
            {"data": "email","name": "email","orderable" : false},
            {"data": "role","name": "role","orderable" : false},
            {"data": "created_at","name": "created_at","orderable" : true},
            {"data": "updated_at","name": "updated_at","orderable" : true},
            {"data": "button","name": "button",'type':'html',"orderable" : false}
        ]
    });


});