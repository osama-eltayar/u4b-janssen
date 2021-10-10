let gameInterval, gameId ;
let duration = 20 ;
let score = 0;

$(function (){
   $('.login-form').on('submit',function (e){
       e.preventDefault();
       handleLogin($(this))
   });

   $('#try-again').on('click',function (){
       tryAgain()
   })
});

function login(form)
{
    let data = form.serializeArray() ;
    return $.ajax({
        url: form.attr('action'),
        type: "post",
        data: data,
    })
     .done((res) => {})
     .fail((res) => {})
     .always(() => {});
}

function handleLogin(form)
{
    login(form).done(function(res) {
        console.log(res)
        gameId = res.game_id ;
        showGame();
        hideLogin()
        startTimer();
    })
}

function showGame()
{
    $('.game-page').css('display','flex')
}

function hideLogin()
{
    $('.login-page').css('display','none')
}

function startTimer()
{
    ticTic()
    gameInterval = setInterval(function(){
        ticTic()
    }, 1000);
}

function ticTic()
{
    duration-- ;
    let minutes = Math.floor(duration/60)  ;
    let seconds = duration%60
    $('.minuts').text('0'+minutes)
    $('.seconds').text(seconds > 9 ? seconds : '0'+seconds)

    if (duration == 0)
    {
        finishGame(false)
        return ;
    }

}

function finishGame(win = true)
{
    clearInterval(gameInterval);
    updateScore()

    if (win)
        win()
    else
        lose()
}

function increaseScore()
{
    score += 10 ;
    $('#score').text(score)

    if (score == 120 )
        finishGame(true)
}

function win()
{
    $('.win-popup').css('display' , 'flex');
}

function lose()
{
    $('.gameover-popup').css('display' , 'flex');
}

function updateScore()
{
    let data = {score:score} ;
    let url = submitScoreUrl.replace('xxx', gameId)

    return $.ajax({
        url: url ,
        type: "put",
        data: data,
        async: false
    })

}

function tryAgain()
{
    score = 0 ;
    $('#score').text(score)
    [hasFlippedCard, lockBoard] = [false, false];
    [firstCard, secondCard] = [null, null];

    cards.forEach(function (card) {
        card.removeEventListener('click',flipCard)
        card.addEventListener("click", flipCard)
        card.classList.remove("animated");
        card.classList.remove("flip");
        card.style.opacity = null
    });
    duration = 20 ;
    startTimer();
    $('.game-popup').css('display','none')

}
