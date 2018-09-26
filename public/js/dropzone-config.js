var total_photos_counter = 0;
Dropzone.options.myDropzone = {
    uploadMultiple: true,
    parallelUploads: 2,
    maxFiles:4,
    maxFilesize: 4,
    addRemoveLinks: true,
    dictRemoveFile: 'Remover Imagen',
    dictFileTooBig: 'Image is larger than 4MB',
    timeout: 10000,

    init: function () {
        this.on("removedfile", function (file) {
            $.post({
                url: '/images-delete',
                data: {id: file.name, _token: $('[name="_token"]').val()},
                dataType: 'json',
                success: function (data) {
                    total_photos_counter--;
                    $("#counter").text("# " + total_photos_counter);
                }
            });
        });
    },
    success: function (file, done) {
        total_photos_counter++;
        $("#counter").text("# " + total_photos_counter);
         console.log(done);
         location.reload();
    },
    maxfilesexceeded: function(){
       alert('El cantidad máxima de archivos es 4');
    }


};
