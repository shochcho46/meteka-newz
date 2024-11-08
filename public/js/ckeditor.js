$(document).ready(function() {
    "use strict";
    var urlbase = $('#urlbase').val();

    CKEDITOR.replace('detail', {

        height: '450px',
        filebrowserBrowseUrl: urlbase + 'ckfinder/ckfinder.html',
        filebrowserUploadUrl: urlbase + 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

    });


});
