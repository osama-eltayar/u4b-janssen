$(".access-cam-btn").on("click", function () {
    $("#camera-input").click();
});

$(".gallery-btn").on("click", function () {
    $("#gallery-input").click();
});

$(".image-uploader").on("change", function () {
    readURL(this);
});

$("#save").on("click", function () {
    submitPhoto();
});

function readURL(input) {
    if (input.files && input.files[0]) {
        $("#save").attr("disabled", false);
        let reader = new FileReader();
        reader.onload = function (e) {
            createCanvas(e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        $("#save").attr("disabled", true);
    }
}

function createCanvas(base64) {
    let canvas = $("#canvas")[0];
    let frame = $("#frame")[0];
    let map = $("#map")[0];
    let ctx = canvas.getContext("2d");
    let image = new Image();
    image.src = base64;
    image.onload = function () {
        ctx.drawImage(frame, 0, 0, 300, 150);
        ctx.drawImage(image, 43, 19, 214, 112);
        ctx.drawImage(map, 25, 100, 25, 30);
    };

    $(".canvasimg").css("display", "none");
}

function submitPhoto() {
    let base64 = $("#canvas")[0].toDataURL();
    $.ajax({
        url: SubmitImageUrl,
        type: "post",
        data: {
            base64_image: base64,
        },
    })
        .done((res) => {
            download(base64);
            $(".thankyou").show();
        })
        .fail((res) => {})
        .always(() => {});
}

function download(base64) {
    let link = document.createElement("a");
    link.download = "janssen.png";
    link.href = base64;
    link.click();
}
