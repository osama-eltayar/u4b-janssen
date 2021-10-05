$('.access-cam-btn').on('click',function (){
    $('#camera-input').click();
});

$('.gallery-btn').on('click',function (){
    $('#gallery-input').click();
});

$('.image-uploader').on('change',function (){
    readURL(this)
});

$('#save').on('click',function (){
    submitPhoto()

})

function readURL(input)
{
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            createCanvas(e.target.result)
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function createCanvas(base64)
{
    let canvas = $('#canvas')[0];
    let frame = $('#frame')[0]
    let ctx = canvas.getContext('2d');
    let image = new Image();
    image.src = base64
    image.onload = function() {
        ctx.drawImage(frame, 0, 0,300,150);
        ctx.drawImage(image, 43, 19,214,112);
    };
}

function submitPhoto()
{

    let base64 = $('#canvas')[0].toDataURL();
    $.ajax({
        url : SubmitImageUrl,
        type: 'post',
        data:{
            base64_image : base64
        }
    })
     .done(res => {
         download(base64)

     })
     .fail(res => {

     })
     .always(() => {
     })
}

function download(base64)
{
    let link = document.createElement('a');
    link.download = 'janssen.png';
    link.href = base64
    link.click();
}
