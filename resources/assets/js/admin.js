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
    },
    error:function(file,response){
        handleDropzoneFileUpload.handleError(response);
    }
}

var handleDropzoneFileUpload = {
    handleError:function(response){

        var wrap = $('#gallery_messages');
        $(wrap).append('<div class="alert alert-danger"><ul><li>'+response+'</li></ul></div><br />');
    },
    handleSuccess: function(response){

        $('.no_images').hide();
        var wrap = $('#cms-gallery-images');
        var src = basepath + response.file_path + response.file_name;

        var mini_form ='<div class="action_overlay"><form action="'+response.action+response.id+'" method="post" style="display: inline-block;">';
        mini_form += '<input type="hidden" name="_token" value="'+response.csrf+'">';
        mini_form += '<input name="_method" type="hidden" value="DELETE">';
        mini_form += '<button class="btn btn-danger" type="submit">X</button></form></div>';

        $(wrap).append('<div class="item" ><img src="'+ src +'">'+ mini_form +'</div>');
    }
};



$(document).ready(function(){

    var imageGrid = document.getElementById('cms-gallery-images');
    new Sortable(imageGrid, {
        animation: 150
    });


    console.log('Ready to roll');
});
