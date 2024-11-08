$(document).ready(function() {
    "use strict";

    $('#latest').click(function() {


        $('#recentupdate').removeClass("d-none");
        $('#mostread').addClass("d-none");
        $('#maxread').removeClass("active");
        $('#latest').addClass("active");
    });

    $('#maxread').click(function() {

        $('#mostread').removeClass("d-none");
        $('#recentupdate').addClass("d-none");
        $('#maxread').addClass("active");
        $('#latest').removeClass("active");
    });
});