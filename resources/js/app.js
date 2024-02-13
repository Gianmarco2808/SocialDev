import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone',{
    dictDefaultMessage: 'Sube aqui tu imagen',
    acceptedFiles: '.png,.jpeg,.jpg,.gif',
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar archivo',
    maxFiles: 1,
    uploadMultiple: false,

    init: function() {
        if (document.querySelector('[name="imagen"]').value.trim()) {
            const imagenpublicada = {};
            imagenpublicada.size = 1234;
            imagenpublicada.name = document.querySelector('[name="imagen"]').value;

            this.options.addedfile.call(this, imagenpublicada);
            this.options.thumbnail.call(this, imagenpublicada, `/uploads/${imagenpublicada.name}`);

            imagenpublicada.previewElement.classList.add('dz-success', 'dz-complete');

        }
    }
});

dropzone.on('success', function(file, response){
    document.querySelector('[name="imagen"]').value = response.imagen;
});


dropzone.on('removedfile', function(){
    document.querySelector('[name="imagen"]').value = "";
});
