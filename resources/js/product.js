const photos = [];
let modal = false;

$(".photo-upload").on("click", function (event) {
    $("#productFile").click();
});

$("#productFile").on("change", function (event) {
    const files = event.target.files;
    if (files.length <= 0) return;

    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        photos.push(file.name);
        const url = URL.createObjectURL(file);
        imagePreview(url);
    }

    if (!modal) {
        modal = true;
        $("#previewModal").modal("show");
    }
    $("#productFile").val("");

    $(".list-box").on("click", function () {
        changePreview(this);
    });
});

$("#closePreviewModal").on("click", function () {
    $("#productFile").val("");
    $("#imageList").html("");
    if (modal) {
        $("#previewModal").modal("hide");
        modal = false;
    }
});

function imagePreview(url) {
    $("#imagePreview").attr("src", url);
    $("#imageList").append(`
        <div class="list-box">
            <img src="${url}" alt="cover-list" class="img-fluid">
            <button type="button" class="btn btn-danger remove-img-btn">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    `);
}

function changePreview(element) {
    const img = element.getElementsByTagName("img")[0];
    const src = img.getAttribute("src");
    $("#imagePreview").attr("src", src);
}
