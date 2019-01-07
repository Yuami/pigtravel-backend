class DragAndDrop {
    constructor({
                    url = '',
                    maxFiles = 15,
                    container = 'drop-area',
                    alertContainer = 'drop-area-alert',
                    uploadBtn = 'drop-area-upload',
                    dropAreaMSG = 'Upload multiple files with the file dialog or by dragging and dropping images onto the dashed region',
                    btnMSG = 'Select some files'
                } = {}) {
        this.filesDone = 0;
        this.filesToDo = 0;
        this.fileArray = [];
        this.container = DragAndDrop.select(container);
        this.alertContainer = DragAndDrop.select(alertContainer);
        this.pBar = $("#progressbar-gallery");
        this.btnMSG = btnMSG;
        this.maxFiles = maxFiles;
        this.url = url;
    }

    static select(id){
        return $('#'+id);
    }

    update() {

    }

    upload() {
        if (this.url === '') {
            this.alert('URL not defined');
            return;
        }
        let formData = new FormData();

        formData.append('file', file);

        fetch(this.url, {
            method: 'POST',
            body: formData
        })
            .then((r) => {
                progressDone();
                return r;
            })
            .then(/* ya pondre algun mensaje de que ha ido bien de momento nada  */)
            .catch(() => { /* otiah que ha petado */
            })
    }

    initializeProgress(numFiles) {
        pBar.attr('aria-valuenow', '0').css('width', '0%');
        filesDone = 0;
        filesToDo = numFiles
    }

    progressDone() {
        filesDone++;
        let percent = filesDone / filesToDo * 100;
        let percentS = percent + '%';
        pBar.attr('aria-valuenow', percent).css('width', percentS);
    }

    handleDrop(e) {
        let dt = e.dataTransfer;
        let files = dt.files;

        handleFiles(files);
    }

    handleFiles(files) {
        let arr = [...files];
        if (!(arr.length > maxFiles || fileArray.length + arr.length > maxFiles)) {
            arr.forEach(f => fileArray.push(f));
            initializeProgress(fileArray.length);
            gallery.innerHTML = "";
            fileArray.forEach(previewFile);
        } else {
            alert("The max number of photos is: " + maxFiles)
        }
    }

    alert(message, type = 'e') {
        switch (type.toLowerCase()) {
            case 'error':
            case 'e':

                break;
            case 'success':
            case 's':

                break;
            case 'warning':
            case 'w':

                break;
        }
        this.alertContainer.text(message);
    }

    alertToggle() {
        this.alertContainer.toggle();
    }
}

let v = new DragAndDrop();