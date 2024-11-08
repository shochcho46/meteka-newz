$(document).ready(function() {
    "use strict";

    $('#mainmenu').change(function() {
        var fullurl = $('#urlbase').val();

        var num = $('#submenu')[0].length;
        var submenuselect = $('#submenu')[0].sumo;

        var id = $(this).val();
        var ajaxurl = fullurl + "posts/get/submenu/group/" + id;

        $.ajax({
            url: ajaxurl,
            type: 'get',
            dataType: 'json',
            success: function(response) {


                $("#submenu").empty();
                $.each(response.data, function(key, value) {
                    if (value.length > 0) {
                        var html = "<optgroup label=" + key + ">";
                        $.each(value, function(subkey, subvalue) {
                            // submenuselect.add(subvalue.id, subvalue.name);
                            html += "<option value=" + subvalue.id + ">" + subvalue.name + "</option>";
                        });
                        html += "</optgroup>"
                        $("#submenu").append(html);

                    }
                });

                submenuselect.reload();

            }
        })
    });




});

var page = 1;
$('#loadmore').click(function() {
    page++;
    var websitebase = $('#weburl').val();
    var url = websitebase + '?page=' + page


    $.ajax({
            url: url,
            type: "get",
            beforeSend: function() {
                $('.ajax-load').show();
                $('#loadmore').hide();
            }
        })
        .done(function(data) {
            if (data.html == " ") {
                $('.ajax-load').html("No more records found");
                return;
            }
            $('.ajax-load').hide();
            $('#loadmore').show();
            $("#post-data").append(data.html);
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            alert('server not responding...');
        });

});