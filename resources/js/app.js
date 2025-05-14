import './bootstrap';
import Dropzone from 'dropzone';

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Drop post image here',
    acceptedFiles: '.png,.jpg,.jpeg,.gif',
    addRemoveLinks: true,
    // dictRemoveFile: 'Remove File',
    maxFiles: 1,
    uploadMultiple: false,
});

dropzone.on('success', (file, response) => {
    console.log({ file, response: response });
});
