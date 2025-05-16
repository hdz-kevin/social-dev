import Dropzone from 'dropzone';

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Drop post image here',
    acceptedFiles: '.png,.jpg,.jpeg,.gif',
    addRemoveLinks: true,
    maxFiles: 1,
    uploadMultiple: false,

    init: function () {
        const imgName = document.querySelector('input[name="image"]').value.trim();

        if (imgName) {
            const image = {
                size: 1000,
                name: imgName,
            };

            this.options.addedfile.call(this, image);
            this.options.thumbnail.call(this, image, `/uploads/${image.name}`);

            image.previewElement.classList.add('dz-success', 'dz-complete');
        }
    }
});

dropzone.on('success', (file, response) => {
    document.querySelector('input[name="image"]').value = response.imgName;
});

dropzone.on('removedfile', () => {
    document.querySelector('input[name="image"]').value = "";
});
