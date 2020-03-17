var line_pause=false;
$(document).ready(function () {
    // Here we put all the code
    var heart = $('.heart'),
        cog = $('#cog'),
        popUp = $('.popUp'),
        closePopUp = $('#closePopUp'),
        cancelPopUp = $('#cancelPopUp');


    heart.click(function () {
        $(this).toggleClass('fa-heart-o');
        $(this).toggleClass('heart-red fa-heart');
    })

    cog.click(function () {
        popUp.fadeIn(500);
    })

    closePopUp.click(function () {
        popUp.fadeOut(500);
    })

    cancelPopUp.click(function () {
        popUp.slideUp(500)
    })

    $('.story-img').click(function () {
        $('.carousel').carousel(0);
        $('.show-story').fadeIn(500);
        loadLine();

    })
    $('.close-story').click(function () {
        $('.show-story').fadeOut(500);

    })
    $(".carousel").on('slide.bs.carousel', function (event) {
        console.log(event);
        if (event.from == 2 && event.to == 0) {
            $('.carousel').dispose;
            $('.show-story').fadeOut(0);

        }
        loadLine();
    })

})

function loadLine() {
    $('.progress-line').width(124);
    var id = setInterval(function () {
        if(line_pause){}
        else{
        var width = $('.progress-line').width();
        width -= 0.2;


        $('.progress-line').width(width);

        if ($('.progress-line').width() == 0) {
            $(".carousel").carousel("next");
            clearInterval(id);
        }}
    }, 10);
}
$('.carousel').hover(function(){
    line_pause=true;
},function(){
    line_pause=false;
});