// mobile detection

if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
 var mobile=true;
}
else var mobile = false;

var $ = jQuery;
var winh = $(window).height();

$(window).ready(function(){


function scrollBtn(){
  $( "#scroll-btn" ).css('opacity','1').animate({
      bottom:'40px',
      // opacity: '1',
    }, 600,"linear", function() {
        $( "#scroll-btn" ).animate({
        bottom:'20px',
        opacity: '0',
      }, 300,"linear", function() {
        $( "#scroll-btn" ).animate({
        bottom:'80px',
        transition:'none',
      }, 0, scrollBtn
      );
    }
      );
    });
}
scrollBtn();


  // if (!$('body').hasClass('elementor-editor-active')) toggleArrow();
  // open form
  // $('body').click(function(){
  //   if($(event.target).is("div.am-step-booking-catalog") || ($(event.target).parents('div.am-step-booking-catalog').length==0 && $(event.target).parents('#appt-btn').length==0)) $('#appt-form').hide();
  // });

  // $('#appt-btn .elementor-button , #appt-mobile-btn .elementor-button').click(function(){
  //   $('#appt-form').show();
  // });
  setTimeout(function(){


    $('.elementor-widget-premium-carousel-widget').each(function(){
      var banners = $(this).find('.slick-dots>li').length;
      bannerwidth = 100/banners;
      bannerwidth = bannerwidth+'%';
      if (banners==1) $(this).find('.slick-dots').hide();
      $(this).find('.slick-dots>li').each(function(){
        $(this).css('width',bannerwidth);
    });
    });
 },2000); 
  // accesibility fix for multiple links on one item:

  $('.some-container').attr('tabindex',0).find('a').each(function(){
    $(this).attr('tabindex',-1);
  });
  $('.some-container').click(function(){              
    window.location.assign($(this).find('a').first().attr('href'));
   
  });  
  document.onkeydown = function(e) {
    if(e.keyCode === 13) { // The Enter/Return key
      $(':focus').trigger( "click" );
    }
  };  

  $('.open-search').click(function(){
    $('.elementor-search-form__container').addClass('elementor-search-form--full-screen elementor-lightbox');
    $('.mobile-nav .elementor-search-form__input').first().trigger('focus');
  });

  $('#mobile-menu .menu-item.disable').click(function(){
    $(this).toggleClass('open');
    $(this).find('.sub-menu').toggleClass('open');
    if ($(event.target).closest('a').parent().is(this)) return false;
  });

  // mobile menu
  // nav bar on scroll
  var lastScrollTop = 0;
  if (!$('body').hasClass('elementor-editor-active')){
    $(window).scroll(function(event){
       var st = $(this).scrollTop();
       if($(window).scrollTop()>winh/10){
        $('#nav-header').addClass('scrolled');
         if (st > lastScrollTop && $(window).scrollTop()>winh*0.5){
             // downscroll code
             $('#nav-header').addClass('down');
         } else {
            // upscroll code
            $('#nav-header').removeClass('down');
         }      
       }
       else {
        $('#nav-header').removeClass('scrolled');
       } 
       lastScrollTop = st;
    });      
  }


  if ($(window).width() < 978) {
    $('#hamburger').click(function(){   
      $('#hamburger-icon').toggleClass('open');
      $('body').toggleClass('no-scroll');
      $('#main-nav, #nav-header').toggleClass('open');
      if ($('#main-nav').hasClass('open')){
        $('#nav-header').addClass('open');
        var delay = 0;
        setTimeout(function(){
          $('#nav-header .logo-text').addClass('open');
        },300);
        $('#main-nav nav ul li').each(function(){
          var that = this;
          
          setTimeout(function(){
            $(that).addClass('show');
          },delay);
          delay += 100;
        });
      }
      else{
        $('#main-nav .menu-item').removeClass('show');
        $('#nav-header,#nav-header .logo-text').removeClass('open');
      } 

    }); 
  }  
  
  // navigation link

  $('.maplink').click(function(){
    var addr = $(this).attr('data-addr');
    // If it's an iPhone..
    if( (navigator.platform.indexOf("iPhone") != -1) 
        || (navigator.platform.indexOf("iPod") != -1)
        || (navigator.platform.indexOf("iPad") != -1))
         window.open("maps://maps.google.com/maps?daddr="+addr);
    else
         window.open("http://maps.google.com/maps?daddr="+addr);
  });

  $('.hide-empty-link').each(function(){
    if ($(this).find('a').length==0) $(this).remove();
  });
});
  // cookies

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}