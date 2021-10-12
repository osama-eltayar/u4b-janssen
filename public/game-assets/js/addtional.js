let gameInterval, gameId ;
let duration = 300 ;
let score = 0;
const backgroundMusic = document.querySelector('#background');
const correctMusic = document.querySelector('#correct');
const winMusic = document.querySelector('#win');
const loseMusic = document.querySelector('#lose');

$(function (){
    // $(window).on('resize',function (){
    //     $('.memory-card').css('max-width', $('.memory-game').width() / 6)
    // })
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
    startMusic()
    console.log('login')
    login(form).done(function(res) {
        console.log(res)
        gameId = res.game_id ;
        showGame();
        // $('.memory-card').css('max-width', $('.memory-game').width() / 6)
        hideLogin()
        startTimer();
    }).fail((res) => {
        console.log('failed')
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
        setTimeout(function (){
            backgroundMusic.pause()
            winUser()
        },3500);

    else
        setTimeout(function (){
            backgroundMusic.pause()
            lose()
        },2000);

}

function increaseScore()
{
    score += 1 ;
    $('#score').text(' '+score)

    if (score == 12 )
        finishGame(true)
}

function winUser()
{
    winMusic.play()
    $('.win-popup').css('display' , 'flex');
}

function lose()
{
    loseMusic.play()
    $('.gameover-popup').css('display' , 'flex');
}

function updateScore()
{
    let data = {score:score,remainingDuration : duration} ;
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
    duration = 300 ;

    startTimer();
    startMusic();
    $('.game-popup').css('display','none')

}

function startMusic()
{
    correctMusic.play()
    correctMusic.pause()
    winMusic.play()
    winMusic.pause()
    loseMusic.play()
    loseMusic.pause()
    backgroundMusic.play()
    backgroundMusic.loop = true;
    loseMusic.pause()

}
