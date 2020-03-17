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

    $('.story-img').click(function (event) {
        console.log(event.target.id);
        $.ajax({ type: 'post', url: '/storyWorking', data: { response: 1,username:event.target.id}, success: function (response) {
        $('.story-content').append(response);
            
       
      


        $('.carousel').carousel(0);
            $('.show-story').fadeIn(500);
            $(document).on("click",".close-story",function(){
                console.log("close");
                $('.show-story').remove();
            });
            $(document).on("mouseenter",".carousel",function(){
               line_pause=true;
            });
            $(document).on("mouseleave",".carousel",function(){
                line_pause=false;
             });
            loadLine();
         }});

    })

       

    })
    $(".carousel").on('slide.bs.carousel', function (event) {
        console.log(event);
        if (event.from == 2 && event.to == 0) {
           
            $('.show-story').remove();
            
        }
        loadLine();
    })



function loadLine() {
    $('.progress-line').width(124);
    var id = setInterval(function () {
        if(line_pause){}
        else{
        var width = $('.progress-line').width();
        width -= 0.1;


        $('.progress-line').width(width);

        if ($('.progress-line').width() == 0) {
            $(".show-story").remove();
            clearInterval(id);
        }}
    }, 10);
}
