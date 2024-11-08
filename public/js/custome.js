$(document).ready(function() {
    "use strict";
    $('#country').selectpicker();
    $('#timezone').selectpicker();
    $('#font').selectpicker();
    $('#langcode').selectpicker();

    $('#latest').click(function() {

        alert('hello');
        $('#mostread').addClass("d-none");
        // $('#latest').addClass("active");
        $('#recentupdate').removeClass("d-none");
        // $('#maxread').removeClass("active");
    });

    $('#maxread').click(function() {

        $('#recentupdate').addClass("d-none");
        // $('#latest').addClass("active");
        $('#mostread').removeClass("d-none");
        // $('#maxread').removeClass("active");
    });
});