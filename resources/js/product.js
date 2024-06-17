const photos = [];

$("#photoUpload").on("click", function (event) {
    $("#productFile").click();
});

$("#productFile").on("change", function (event) {
    const files = event.target.files;
    if (files.length <= 0) return;

    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        photos.push(file.name);
    }

    $("#productFile").val("");
    console.log(photos);
});
