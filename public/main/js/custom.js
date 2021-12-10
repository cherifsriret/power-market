 // Convert Password Field To Text Field On Hover
 var passField = $('.password');
 $('.show-password').hover(function (){
     passField.attr('type' , 'text');
 }, function () {
     passField.attr('type' , 'password');
});

    // Create Smooth Scroll Div
    $(".navbar .link-scroll").click(function(e){
        e.preventDefault();
        $('html , body').animate({
            scrollTop: $('.' + $(this).data('scroll')).offset().top - 120
        } ,1000);
    });

// Owl Carousel Header
$('#Owl-Header').owlCarousel({
    nav:false,
    autoplay:true,
    loop:true,
    margin:10,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});



// Fixed Top Navbar
$(window).scroll(function(){
    if($(window).scrollTop() >= 100){
        $(".navLinks").addClass("fixed-top");
    }else{
        $(".navLinks").removeClass("fixed-top");
    }
});

// Show And Hidden Button Scroll Top
$('body').append("<div class='go-top'><i class='fas fa-angle-double-up'></i></div>");
$(window).on('scroll', function() {
    var scrolled = $(window).scrollTop();
    if (scrolled > 600)
        $('.go-top').addClass('active');
    if (scrolled < 600)
        $('.go-top').removeClass('active');
});
$('.go-top').on('click', function() {
    $('html, body').animate({
        scrollTop: '0',
    }, 50);
});