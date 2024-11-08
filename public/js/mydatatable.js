$(document).ready(function() {
    "use strict";
    var companyname = $('#export').val();

    // Social Table Start

    $('#social').DataTable({

        pagingType: 'full_numbers',
        "lengthMenu": [
            [10, 15, 20, 25, 30, 40, 50, -1],
            [10, 15, 20, 25, 30, 40, 50, "All"]
        ],
        dom: 'lBfrtip',
        buttons: [{
                extend: 'copy',
                className: 'btn btn-primary',
                messageTop: companyname,
                title: companyname,

                exportOptions: {
                    columns: [0, 1]
                }
            },


            {
                extend: 'csv',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1]
                }
            },
            {
                extend: 'excel',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1]
                }
            },
            {
                extend: 'pdf',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1]
                }
            },
            {
                extend: 'print',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1]
                }
            },

        ],
        responsive: true
    });

    // Social Table End

    // Main Menu Table Start

    $('#mainmenu').DataTable({
        pagingType: 'full_numbers',
        "lengthMenu": [
            [10, 15, 20, 25, 30, 40, 50, -1],
            [10, 15, 20, 25, 30, 40, 50, "All"]
        ],
        dom: 'lBfrtip',
        buttons: [{
                extend: 'copy',
                messageTop: companyname,
                title: companyname,

                exportOptions: {
                    columns: [0, 1, 3]
                }
            },


            {
                extend: 'csv',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1, 3]
                }
            },
            {
                extend: 'excel',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1, 3]
                }
            },
            {
                extend: 'pdf',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1, 3]
                }
            },
            {
                extend: 'print',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1, 3]
                }
            },

        ],
        responsive: true
    });

    //Main Menu Table End


    // Sub Menu Table Start

    $('#submenu').DataTable({
        pagingType: 'full_numbers',
        "lengthMenu": [
            [10, 15, 20, 25, 30, 40, 50, -1],
            [10, 15, 20, 25, 30, 40, 50, "All"]
        ],
        dom: 'lBfrtip',
        buttons: [{
                extend: 'copy',
                messageTop: companyname,
                title: companyname,

                exportOptions: {
                    columns: [0, 1, 3]
                }
            },


            {
                extend: 'csv',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1, 3]
                }
            },
            {
                extend: 'excel',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1, 3]
                }
            },
            {
                extend: 'pdf',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1, 3]
                }
            },
            {
                extend: 'print',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1, 3]
                }
            },

        ],
        responsive: true
    });

    //Sub Menu Table End



    //Post Table Start
    $('#tablepost').DataTable({
        pagingType: 'full_numbers',
        "lengthMenu": [
            [10, 15, 20, 25, 30, 40, 50, -1],
            [10, 15, 20, 25, 30, 40, 50, "All"]
        ],
        dom: 'lfrtip',
        responsive: true
    });

    //Post Table End

    //Post Display Table Start
    $('#displayTable').DataTable({
        pagingType: 'full_numbers',
        "lengthMenu": [
            [10, 15, 20, 25, 30, 40, 50, -1],
            [10, 15, 20, 25, 30, 40, 50, "All"]
        ],
        dom: 'lfrtip',
        responsive: true
    });

    //Post Display Table End

    //Role Table Start

    $('#roletable').DataTable({
        pagingType: 'full_numbers',
        "lengthMenu": [
            [10, 15, 20, 25, 30, 40, 50, -1],
            [10, 15, 20, 25, 30, 40, 50, "All"]
        ],
        dom: 'lBfrtip',
        buttons: [{
                extend: 'copy',
                messageTop: companyname,
                title: companyname,

                exportOptions: {
                    columns: [0, 1, 2]
                }
            },


            {
                extend: 'csv',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1, 2]
                }
            },
            {
                extend: 'excel',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1, 2]
                }
            },
            {
                extend: 'pdf',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1, 2]
                }
            },
            {
                extend: 'print',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1, 2]
                }
            },

        ],
        responsive: true
    });

    //Role Table End

    //Admin List Table Start

    $('#admintable').DataTable({
        pagingType: 'full_numbers',
        "lengthMenu": [
            [10, 15, 20, 25, 30, 40, 50, -1],
            [10, 15, 20, 25, 30, 40, 50, "All"]
        ],
        dom: 'lBfrtip',
        buttons: [{
                extend: 'copy',
                messageTop: companyname,
                title: companyname,

                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5]
                }
            },


            {
                extend: 'csv',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5]
                }
            },
            {
                extend: 'excel',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5]
                }
            },
            {
                extend: 'pdf',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5]
                }
            },
            {
                extend: 'print',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5]
                }
            },

        ],
        responsive: true
    });

    //Admin List Table End


    //E-paper List Table Start

    $('#epapertable').DataTable({
        pagingType: 'full_numbers',
        "lengthMenu": [
            [10, 15, 20, 25, 30, 40, 50, -1],
            [10, 15, 20, 25, 30, 40, 50, "All"]
        ],
        dom: 'lBfrtip',
        buttons: [{
                extend: 'copy',
                messageTop: companyname,
                title: companyname,

                exportOptions: {
                    columns: [0, 1, 2]
                }
            },


            {
                extend: 'csv',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1, 2]
                }
            },
            {
                extend: 'excel',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1, 2]
                }
            },
            {
                extend: 'pdf',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1, 2]
                }
            },
            {
                extend: 'print',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1, 2]
                }
            },

        ],
        responsive: true
    });

    //E-paper List Table End

    //Album List Table Start

    $('#albumtable').DataTable({
        pagingType: 'full_numbers',
        "lengthMenu": [
            [10, 15, 20, 25, 30, 40, 50, -1],
            [10, 15, 20, 25, 30, 40, 50, "All"]
        ],
        dom: 'lBfrtip',
        buttons: [{
                extend: 'copy',
                messageTop: companyname,
                title: companyname,

                exportOptions: {
                    columns: [0, 1, 2, 3]
                }
            },


            {
                extend: 'csv',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1, 2, 3]
                }
            },
            {
                extend: 'excel',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1, 2, 3]
                }
            },
            {
                extend: 'pdf',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1, 2, 3]
                }
            },
            {
                extend: 'print',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1, 2, 3]
                }
            },

        ],
        responsive: true
    });

    //Album List Table End


    //Gallery List Table Start


    $('#gallerytable').DataTable({
        pagingType: 'full_numbers',
        "lengthMenu": [
            [10, 15, 20, 25, 30, 40, 50, -1],
            [10, 15, 20, 25, 30, 40, 50, "All"]
        ],
        dom: 'lBfrtip',
        buttons: [{
                extend: 'copy',
                messageTop: companyname,
                title: companyname,

                exportOptions: {
                    columns: [0, 1, 2, 3]
                }
            },


            {
                extend: 'csv',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1, 2, 3]
                }
            },
            {
                extend: 'excel',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1, 2, 3]
                }
            },
            {
                extend: 'pdf',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1, 2, 3]
                }
            },
            {
                extend: 'print',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1, 2, 3]
                }
            },

        ],
        responsive: true
    });




    //Gallery List Table End

    //Advertise List Table start

    $('#advertisetable').DataTable({
        pagingType: 'full_numbers',
        "lengthMenu": [
            [10, 15, 20, 25, 30, 40, 50, -1],
            [10, 15, 20, 25, 30, 40, 50, "All"]
        ],
        dom: 'lBfrtip',
        buttons: [{
                extend: 'copy',
                messageTop: companyname,
                title: companyname,

                exportOptions: {
                    columns: [0, 1, 2, 3]
                }
            },


            {
                extend: 'csv',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1, 2, 3]
                }
            },
            {
                extend: 'excel',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1, 2, 3]
                }
            },
            {
                extend: 'pdf',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1, 2, 3]
                }
            },
            {
                extend: 'print',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1, 2, 3]
                }
            },

        ],
        responsive: true
    });

    //Gallery List Table End
});