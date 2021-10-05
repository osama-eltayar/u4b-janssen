$(function (){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        error  :function (res) {
            if (res.status == 401)
                redirect('/register')

        }
    });

})


function redirect(url) {
    window.location.href = url;
}

$(document).ready(function(){
    $(document).ajaxStart(function(){
        loading();
    });

    $(document).ajaxComplete(function (){
        unLoading();
    })
})

function loading()
{
    $('#loader-wrapper').show();
}

function unLoading()
{
    $('#loader-wrapper').hide();
}
