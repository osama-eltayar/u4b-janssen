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
    createCanvas() ;
    submitPhoto();
});

let canEdit, isDragging, prevX, prevY, canMoveX, canMoveY, userImage
let currentStartX = 0 ;
let currentStartY = 0 ;
let move = true

$("#edit").on("click", function () {
    canEdit = true
});

$('#canvas').on('mousedown',function (e){
    isDragging = true
    prevX = e.clientX  ;
    prevY = e.clientY ;
})

$('#canvas').on('touchstart',function (e){
    isDragging = true
    prevX = e.touches[0].clientX  ;
    prevY = e.touches[0].clientY ;
})

$('#canvas').on('mouseup touchend',function (e){
    isDragging = false
    canEdit = false
})

$('#canvas').mousemove(function (e){

    if (isDragging && canEdit)
    {
        handleMove(e.clientX,e.clientY)
    }
})

$(window).on('touchmove',function (e){
    if (canEdit && isDragging )
    {
        handleMove(e.touches[0].clientX,e.touches[0].clientY)
    }
})

function handleMove(x,y)
{
    move = !move
    currentStartX += canMoveX && move ?   prevX - x : 0;
    currentStartY += canMoveY && move ? prevY - y : 0 ;

    if (currentStartX < 0)
        currentStartX = 0;

    if (currentStartY < 0)
        currentStartY = 0;

    if (canMoveX || canMoveY)
        reDrawCanvas()
}

function readURL(input) {
    if (input.files && input.files[0]) {
        $("#save").attr("disabled", false);
        $('.canvasimg').attr('src' ,$("#frame").attr('src') )
        let reader = new FileReader();
        reader.onload =  function (e) {
            let image = new Image();
            image.src = e.target.result;
            image.onload = function () {
                userImage = image
                createFirstCanvas();
                $("#edit").attr("disabled", false);
            }
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        $("#save").attr("disabled", true);
    }
}

function createFirstCanvas(){
    let canvas = $("#canvas")[0];
    let ctx = canvas.getContext("2d");
    let imageWidth = userImage.width ;
    let imageHeight = userImage.height ;
    canMoveY = true
    canMoveX = true
    if (userImage.width < 544.3)
    {
            imageWidth = 544.3 ;
            canMoveX = false
    }
    if (userImage.height < 662)
    {
        imageHeight = 662 ;
        canMoveY = false
    }
    ctx.clearRect(0,0,764.5,882.3)
    ctx.drawImage(userImage, 110, 110,imageWidth,imageHeight);
}

function reDrawCanvas()
{
    let canvas = $("#canvas")[0];
    let ctx = canvas.getContext("2d");
    ctx.clearRect(0,0,764.5,882.3)
    ctx.drawImage(userImage, currentStartX, currentStartY,544.3,662,110,110,544.3,662);
}

function createCanvas() {
    let canvas = $("#canvas")[0];
    let frame = $("#frame")[0];
    let map = $("#map")[0];
    let ctx = canvas.getContext("2d");
    ctx.drawImage(frame, 0, 0, 764.5, 882.3);
    ctx.drawImage(map, 28, 606, 269.382, 256.192);
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
