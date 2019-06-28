require('./bootstrap');

Dropzone.options.addImages ={
    maxFilesize: 2,
    acceptedFiles: 'image/*',
    success: function(file, response){
        if(file.status =='success'){
            handleDropzoneFileUpload.handleSuccess(response);
        } else {
            handleDropzoneFileUpload.handleError(response);
        }
    }
}

var handleDropzoneFileUpload = {
    handleError:function(response){
        console.log(response);
    },
    handleSuccess: function(response){

       var wrap = $('#cms-gallery-images');
       var src = filepath + response.file_name;
       $(wrap).append('<div class="item" ><img src="'+ src +'"></div>');
    }
};

$(document).ready(function(){
    console.log('Ready to roll');
});
