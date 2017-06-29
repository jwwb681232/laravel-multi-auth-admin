/*
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 2.0.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin-v2.0/admin/html/
*/var handleDataTableScroller=function(){"use strict";0!==$("#data-table").length&&$("#data-table").DataTable({ajax:"assets/plugins/DataTables/json/scroller-demo.json",deferRender:!0,scrollY:300,scrollCollapse:!0,scroller:!0,responsive:!0})},TableManageScroller=function(){"use strict";return{init:function(){handleDataTableScroller()}}}();