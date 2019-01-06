function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
}

function highlight(e) {
    dropArea.classList.add('highlight')
}

function unhighlight(e) {
    dropArea.classList.remove('highlight')
}

function handleDrop(e) {
    let dt = e.dataTransfer;
    let files = dt.files;

    handleFiles(files);
}

function handleFiles(files) {
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

function uploadFile(file) {
    let url = 'https://back.pig.test/houses';
    let formData = new FormData();

    formData.append('file', file);

    fetch(url, {
        method: 'POST',
        body: formData
    })
        .then((r) => {
            progressDone();
            return r;
        })
        .then(/* ya pondre algun mensaje de que ha ido bien de momento nada  */)
        .catch(() => { /* otiah que ha petado */ })
}

function previewFile(file, i) {
    progressDone();
    let reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onloadend = function () {
        let img = document.createElement('img');
        img.src = reader.result;
        $(gallery).append(toComponent(img, i));
    };
}

function initializeProgress(numFiles) {
    pBar.attr('aria-valuenow', '0').css('width', '0%');
    filesDone = 0;
    filesToDo = numFiles
}

function progressDone() {
    filesDone++;
    let percent = filesDone / filesToDo * 100;
    let percentS = percent + '%';
    pBar.attr('aria-valuenow', percent).css('width', percentS);
}

function toComponent(img, i) {
    img = $(img);
    let container = $(`<div id="img-gallery-${i}" class="col-12 col-sm-4 col-md-2 d-inline-block my-3">`);
    let delBtn = $(`<a class="del-img">`).click((e) =>
       deleteIMG(i)
    );
    let icon = $(`<i class="fas fa-trash fa-2x toRed">`);
    return container.append(img).append(delBtn.append(icon))[0];
}

function deleteIMG(i){
    fileArray.splice(i,1);
    fileArray = fileArray.filter(Boolean);
    $(`#img-gallery-${i}`).remove();
}

let filesDone = 0;
let filesToDo = 0;
let maxFiles = 15;
let fileArray = [];
let dropArea = document.getElementById('drop-area');
let gallery = document.getElementById('gallery');
let pBar = $("#progressbar-gallery");

['dragenter', 'dragover', 'dragleave', 'drop'].forEach(e => dropArea.addEventListener(e, preventDefaults, false));
['dragenter', 'dragover'].forEach(e => dropArea.addEventListener(e, highlight, false));
['dragleave', 'drop'].forEach(e => dropArea.addEventListener(e, unhighlight, false));
dropArea.addEventListener('drop', handleDrop, false);