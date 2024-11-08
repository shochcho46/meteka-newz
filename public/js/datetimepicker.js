$(document).ready(function() {
    "use strict";
    // $("#date").datetimepicker({
    //     format: 'yyyy-mm-dd',
    //     minView: 2,
    //     autoclose: true,
    //     startDate: '0'
    // });



    $("#date").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        startDate: '0',
        todayHighlight: true
    });

    $("#from_date").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,

        todayHighlight: true
    });

    $("#to_date").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,

        todayHighlight: true
    });


    $("#archive").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,

        todayHighlight: true
    });


});