const assetsURL = "http://localhost/ecommerce/resources/";

$(function () {
    $("#changeLogoBtn").on("click", function (event) {
        $("#storeLogo").click();
        $("#storeLogo").on("change", function (event) {
            const file = event.target.files[0];
            if (!file) return;

            const fileURL = URL.createObjectURL(file);
            $("#storeProfile").attr("src", fileURL);
            $("#storeProfile").attr("width", "200px");
            $("#storeProfile").attr("height", "200px");
            $("#storeProfile").attr("style", "object-fit: cover");
        });
    });
});

if (document.getElementById("flashAlert")) {
    const flashAlert = document.getElementById("flashAlert");
    setTimeout(() => {
        flashAlert.remove();
    }, 4000);
}
