"use strict";

$("#faveicone").spartanMultiImagePicker({
    fieldName: 'favupload[]', // this configuration will send your images named "fileUpload" to the server
    maxCount: 1,
    rowHeight: '100px',
    allowedExt: 'png|jpg|jpeg|gif|webp',
    groupClassName: 'd-flex justify-content-center',
    maxFileSize: '',
    dropFileLabel: "Drop Here",
    onAddRow: function(index) {
        console.log(index);
        console.log('add new row');
    },
    onRenderedPreview: function(index) {
        console.log(index);
        console.log('preview rendered');
    },
    onRemoveRow: function(index) {
        console.log(index);
    },
    onExtensionErr: function(index, file) {
        console.log(index, file, 'extension err');
        alert('Please only input png or jpg type file')
    },
    onSizeErr: function(index, file) {
        console.log(index, file, 'file size too big');
        alert('File size too big');
    }
});



$("#logo").spartanMultiImagePicker({
    fieldName: 'logoupload[]', // this configuration will send your images named "fileUpload" to the server
    maxCount: 1,
    allowedExt: 'png|jpg|jpeg|gif|webp',
    rowHeight: '100px',
    groupClassName: "col-12 ",
    maxFileSize: '',
    dropFileLabel: "Drop Here",
    onAddRow: function(index) {
        console.log(index);
        console.log('add new row');
    },
    onRenderedPreview: function(index) {
        console.log(index);
        console.log('preview rendered');
    },
    onRemoveRow: function(index) {
        console.log(index);
    },
    onExtensionErr: function(index, file) {
        console.log(index, file, 'extension err');
        alert('Please only input png or jpg type file')
    },
    onSizeErr: function(index, file) {
        console.log(index, file, 'file size too big');
        alert('File size too big');
    }
});


var imgloc = $('#editfavioc').val();
$("#editfaveicone").spartanMultiImagePicker({

    fieldName: 'favupload[]', // this configuration will send your images named "fileUpload" to the server
    maxCount: 1,
    allowedExt: 'png|jpg|jpeg|gif|webp',
    rowHeight: '100px',
    placeholderImage: {
        image: imgloc,
        width: '100%'
    },
    groupClassName: 'd-flex justify-content-center',
    maxFileSize: '',
    dropFileLabel: "Drop Here",
    onAddRow: function(index) {
        console.log(index);
        console.log('add new row');
    },
    onRenderedPreview: function(index) {
        console.log(index);
        console.log('preview rendered');
    },
    onRemoveRow: function(index) {
        console.log(index);
    },
    onExtensionErr: function(index, file) {
        console.log(index, file, 'extension err');
        alert('Please only input png or jpg type file')
    },
    onSizeErr: function(index, file) {
        console.log(index, file, 'file size too big');
        alert('File size too big');
    }
});


var editimglogo = $('#editlogo').val();
$("#editlogoup").spartanMultiImagePicker({

    fieldName: 'logoupload[]', // this configuration will send your images named "fileUpload" to the server
    maxCount: 1,
    allowedExt: 'png|jpg|jpeg|gif|webp',
    rowHeight: '100px',
    placeholderImage: {
        image: editimglogo,
        width: '100%'
    },
    groupClassName: 'd-flex justify-content-center',
    maxFileSize: '',
    dropFileLabel: "Drop Here",
    onAddRow: function(index) {
        console.log(index);
        console.log('add new row');
    },
    onRenderedPreview: function(index) {
        console.log(index);
        console.log('preview rendered');
    },
    onRemoveRow: function(index) {
        console.log(index);
    },
    onExtensionErr: function(index, file) {
        console.log(index, file, 'extension err');
        alert('Please only input png or jpg type file')
    },
    onSizeErr: function(index, file) {
        console.log(index, file, 'file size too big');
        alert('File size too big');
    }
});



var oldprofileimglogo = $('#oldprofilepic').val();
$("#editprofilepic").spartanMultiImagePicker({

    fieldName: 'profilepicupload', // this configuration will send your images named "fileUpload" to the server
    maxCount: 1,
    rowHeight: '300px',
    allowedExt: 'png|jpg|jpeg|gif|webp',
    placeholderImage: {
        image: oldprofileimglogo,
        width: '100%'
    },
    groupClassName: 'd-flex justify-content-center',
    maxFileSize: '',
    dropFileLabel: "Drop Here",
    onAddRow: function(index) {
        console.log(index);
        console.log('add new row');
    },
    onRenderedPreview: function(index) {
        console.log(index);
        console.log('preview rendered');
    },
    onRemoveRow: function(index) {
        console.log(index);
    },
    onExtensionErr: function(index, file) {
        console.log(index, file, 'extension err');
        alert('Please only input png or jpg type file')
    },
    onSizeErr: function(index, file) {
        console.log(index, file, 'file size too big');
        alert('File size too big');
    }
});




var docuoldimglogo = $('#olddocupic').val();
$("#editdocupic").spartanMultiImagePicker({

    fieldName: 'docupicupload', // this configuration will send your images named "fileUpload" to the server
    maxCount: 1,
    rowHeight: '300px',
    allowedExt: 'png|jpg|jpeg|gif|webp',
    placeholderImage: {
        image: docuoldimglogo,
        width: '100%'
    },
    groupClassName: 'd-flex justify-content-center',
    maxFileSize: '',
    dropFileLabel: "Drop Here",
    onAddRow: function(index) {
        console.log(index);
        console.log('add new row');
    },
    onRenderedPreview: function(index) {
        console.log(index);
        console.log('preview rendered');
    },
    onRemoveRow: function(index) {
        console.log(index);
    },
    onExtensionErr: function(index, file) {
        console.log(index, file, 'extension err');
        alert('Please only input png or jpg type file')
    },
    onSizeErr: function(index, file) {
        console.log(index, file, 'file size too big');
        alert('File size too big');
    }
});



$("#postpicture").spartanMultiImagePicker({
    fieldName: 'picturepost', // this configuration will send your images named "fileUpload" to the server
    maxCount: 1,
    rowHeight: '400px',
    groupClassName: 'col-12',
    maxFileSize: '',
    allowedExt: 'png|jpg|jpeg|gif|webp',
    dropFileLabel: "Drop Here",
    onAddRow: function(index) {
        console.log(index);
        console.log('add new row');
    },
    onRenderedPreview: function(index) {
        console.log(index);
        console.log('preview rendered');
    },
    onRemoveRow: function(index) {
        console.log(index);
    },
    onExtensionErr: function(index, file) {
        console.log(index, file, 'extension err');
        alert('Please only input png or jpg type file')
    },
    onSizeErr: function(index, file) {
        console.log(index, file, 'file size too big');
        alert('File size too big');
    }
});



var postoldpic = $('#oldpostpic').val();
$("#editpostpic").spartanMultiImagePicker({
    fieldName: 'postpicupload', // this configuration will send your images named "fileUpload" to the server
    maxCount: 1,
    allowedExt: 'png|jpg|jpeg|gif|webp',
    rowHeight: '400px',
    placeholderImage: {
        image: postoldpic,
        width: '100%'
    },
    groupClassName: 'col-12',
    maxFileSize: '',
    dropFileLabel: "Drop Here",
    onAddRow: function(index) {
        console.log(index);
        console.log('add new row');
    },
    onRenderedPreview: function(index) {
        console.log(index);
        console.log('preview rendered');
    },
    onRemoveRow: function(index) {
        console.log(index);
    },
    onExtensionErr: function(index, file) {
        console.log(index, file, 'extension err');
        alert('Please only input png or jpg type file')
    },
    onSizeErr: function(index, file) {
        console.log(index, file, 'file size too big');
        alert('File size too big');
    }
});




$("#epaperpic").spartanMultiImagePicker({
    fieldName: 'epaper[]', // this configuration will send your images named "fileUpload" to the server
    maxCount: 1,
    rowHeight: '400px',
    groupClassName: 'col-12',
    maxFileSize: '',
    allowedExt: 'png|jpg|jpeg|gif|webp',
    dropFileLabel: "Drop Here",
    onAddRow: function(index) {
        console.log(index);
        console.log('add new row');
    },
    onRenderedPreview: function(index) {
        console.log(index);
        console.log('preview rendered');
    },
    onRemoveRow: function(index) {
        console.log(index);
    },
    onExtensionErr: function(index, file) {
        console.log(index, file, 'extension err');
        alert('Please only input png or jpg type file')
    },
    onSizeErr: function(index, file) {
        console.log(index, file, 'file size too big');
        alert('File size too big');
    }
});




var epaperoldpic = $('#oldepapertpic').val();
$("#editepaperpic").spartanMultiImagePicker({
    fieldName: 'epaperpicupload[]', // this configuration will send your images named "fileUpload" to the server
    maxCount: 1,
    allowedExt: 'png|jpg|jpeg|gif|webp',
    rowHeight: '400px',
    placeholderImage: {
        image: epaperoldpic,
        width: '100%'
    },
    groupClassName: 'col-12',
    maxFileSize: '',
    dropFileLabel: "Drop Here",
    onAddRow: function(index) {
        console.log(index);
        console.log('add new row');
    },
    onRenderedPreview: function(index) {
        console.log(index);
        console.log('preview rendered');
    },
    onRemoveRow: function(index) {
        console.log(index);
    },
    onExtensionErr: function(index, file) {
        console.log(index, file, 'extension err');
        alert('Please only input png or jpg type file')
    },
    onSizeErr: function(index, file) {
        console.log(index, file, 'file size too big');
        alert('File size too big');
    }
});


//gallery start

$("#gallerypic").spartanMultiImagePicker({
    fieldName: 'picgallery', // this configuration will send your images named "fileUpload" to the server
    maxCount: 1,
    rowHeight: '400px',
    groupClassName: 'col-12',
    maxFileSize: '',
    allowedExt: 'png|jpg|jpeg|gif|webp',
    dropFileLabel: "Drop Here",
    onAddRow: function(index) {
        console.log(index);
        console.log('add new row');
    },
    onRenderedPreview: function(index) {
        console.log(index);
        console.log('preview rendered');
    },
    onRemoveRow: function(index) {
        console.log(index);
    },
    onExtensionErr: function(index, file) {
        console.log(index, file, 'extension err');
        alert('Please only input png or jpg type file')
    },
    onSizeErr: function(index, file) {
        console.log(index, file, 'file size too big');
        alert('File size too big');
    }
});

//gallery end


//gallery Edit start

var galleryoldpic = $('#oldgallerypic').val();
$("#editgalleypic").spartanMultiImagePicker({
    fieldName: 'gallerypicupload', // this configuration will send your images named "fileUpload" to the server
    maxCount: 1,
    rowHeight: '400px',
    allowedExt: 'png|jpg|jpeg|gif|webp',
    placeholderImage: {
        image: galleryoldpic,
        width: '100%'
    },
    groupClassName: 'col-12',
    maxFileSize: '',
    dropFileLabel: "Drop Here",
    onAddRow: function(index) {
        console.log(index);
        console.log('add new row');
    },
    onRenderedPreview: function(index) {
        console.log(index);
        console.log('preview rendered');
    },
    onRemoveRow: function(index) {
        console.log(index);
    },
    onExtensionErr: function(index, file) {
        console.log(index, file, 'extension err');
        alert('Please only input png or jpg type file')
    },
    onSizeErr: function(index, file) {
        console.log(index, file, 'file size too big');
        alert('File size too big');
    }
});

//gallery Edit end


// Advertise start

$("#advertisepic").spartanMultiImagePicker({
    fieldName: 'picadvertise[]', // this configuration will send your images named "fileUpload" to the server
    maxCount: 1,
    rowHeight: '400px',
    allowedExt: 'png|jpg|jpeg|gif|webp',
    groupClassName: 'col-12',
    maxFileSize: '',
    dropFileLabel: "Drop Here",
    onAddRow: function(index) {
        console.log(index);
        console.log('add new row');
    },
    onRenderedPreview: function(index) {
        console.log(index);
        console.log('preview rendered');
    },
    onRemoveRow: function(index) {
        console.log(index);
    },
    onExtensionErr: function(index, file) {
        console.log(index, file, 'extension err');
        alert('Please only input png or jpg type file')
    },
    onSizeErr: function(index, file) {
        console.log(index, file, 'file size too big');
        alert('File size too big');
    }
});
// Advertise end

// Advertise edit start

var advertiseoldpic = $('#oldadvertisepic').val();
$("#editadvertisepic").spartanMultiImagePicker({
    fieldName: 'advertisepicupload[]', // this configuration will send your images named "fileUpload" to the server
    maxCount: 1,
    allowedExt: 'png|jpg|jpeg|gif|webp',
    rowHeight: '400px',
    placeholderImage: {
        image: advertiseoldpic,
        width: '100%'
    },
    groupClassName: 'col-12',
    maxFileSize: '',
    dropFileLabel: "Drop Here",
    onAddRow: function(index) {
        console.log(index);
        console.log('add new row');
    },
    onRenderedPreview: function(index) {
        console.log(index);
        console.log('preview rendered');
    },
    onRemoveRow: function(index) {
        console.log(index);
    },
    onExtensionErr: function(index, file) {
        console.log(index, file, 'extension err');
        alert('Please only input png or jpg type file')
    },
    onSizeErr: function(index, file) {
        console.log(index, file, 'file size too big');
        alert('File size too big');
    }
});

// Advertise edit end
