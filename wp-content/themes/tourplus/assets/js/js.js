jQuery(function($) {

  /**
   * Get Window Width, Height
   */


  let windWidth = $(window).width();
  let windHeight = $(window).height();

  $(window).resize(function () {
    windWidth = jQuery(window).width();
    windHeight = jQuery(window).height();
  });

  /**
   *  Lazy load
   */


  $('.lazy').lazy();

  /**
   * Fixed Menu
   */

  $(document).scroll(function() {

    let scrollPosition = $(this).scrollTop();

    if (scrollPosition > 1) {
      $('.site-header').addClass('fixed-header');
    } else {
      $('.site-header').removeClass('fixed-header');
    }
  });

  let positionScrollHeader = jQuery(window).scrollTop();

  $(window).scroll(function() {

    let scroll = $(window).scrollTop();

    if(scroll > positionScrollHeader) {

      if ( $('.main-nav.open-menu').length ){
        $('.site-header').addClass('fixed-header-visible');
      }else{
        $('.site-header').removeClass('fixed-header-visible');
      }

    } else {
      $('.site-header').addClass('fixed-header-visible');

    }

    positionScrollHeader = scroll;
  });

  /**
   * Mob Menu
   */


  $('#menu-btn').on('click', function (e) {
    e.preventDefault();

    jQuery(this).toggleClass('active');
    jQuery('.site-header').toggleClass('active-menu');
    jQuery('.site-header nav').toggleClass('open-menu');
    jQuery('html').toggleClass("fixedPosition");

  });

  /**
   * Video modal
   */

  const videoModal = $("#videoModal");

  $('.play-btn').on('click', function (e) {
    e.preventDefault();

    let videoSec = $(this).attr('data-video');

    videoModal.find('video').attr('src', videoSec);

    videoModal.find('video').get(0).play();

    videoModal.modal("show");
  });

  videoModal.on('hidden.bs.modal', function(){
    videoModal.find('video').attr('src', '');
  });

  /**
   * Tour slider
   */

  if ( $('#popular-tour-slider').length ){

    $('#popular-tour-slider').slick({
      autoplay: false,
      autoplaySpeed: 5000,
      slidesToShow: 3,
      slidesToScroll: 1,
      arrows: false,
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 500,
          settings: {
            slidesToShow: 1,
            fade: true
          }
        }
      ]
    });

    let slideCount = $('#popular-tour-slider .slide').length;

    if ( slideCount < 4 && windWidth > 992 ){
      $('.popular-tour .slide-control').hide(400);
    }

    $('.popular-tour .slide-control.prev').click(function(e){
      e.preventDefault();

      $('#popular-tour-slider').slick('slickPrev');
    });

    $('.popular-tour .slide-control.next').click(function(e){
      e.preventDefault();

      $('#popular-tour-slider').slick('slickNext');
    });

  }

  /**
   * Reviews slider
   */

  if ( $('#reviews-slider').length ){
    $('#reviews-slider').slick({
      autoplay: false,
      autoplaySpeed: 5000,
      slidesToShow: 3,
      slidesToScroll: 1,
      arrows: false,
      dots: true,
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 500,
          settings: {
            slidesToShow: 1,
            fade: true
          }
        }
      ]
    });
  }

  /**
   * Our team slider
   */

  if ( $('#our-team-slider').length ){

    if ( windWidth < 441 ){

      $('#our-team-slider').slick({
        autoplay: false,
        autoplaySpeed: 5000,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        fade: true
      });
    }
  }

  /**
   * Our team slider
   */

  if ( $('#provide-slider').length ){

    $('#provide-slider').slick({
      autoplay: true,
      autoplaySpeed: 1600,
      speed: 800,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      pauseOnHover: false,
      pauseOnFocus: false,
      fade: true
    });
  }

  /**
   * SCROLL MENU
   */


  $('#primary-menu li a').addClass('scroll-to');

  $(document).on('click', '.scroll-to', function (e) {
    e.preventDefault();

    let href = $(this).attr('href');

    $('html, body').animate({
      scrollTop: $(href).offset().top
    }, 1000);

  });

  /**
   * Button hover
   */

  document.querySelectorAll('.button').forEach(button => button.innerHTML = '<span>' + button.textContent.trim().split('').join('</span><span>') + '</span>');

 /* $('.button').hover( function () {

    let thisBtnText = $(this).find('span');

    let timeout = 100;

    thisBtnText.each(function () {

      let thisSpan = $(this);

      console.log(timeout);
      setTimeout(function () {
        console.log(timeout);
        thisSpan.addClass('up-animation');
      }, timeout);


      timeout = timeout + 100;
    });
  })*/

  /**
   * Number animation
   */
if ( $('.our-numbers').length ){

  $('.our-numbers').viewportChecker({

    offset: 200,

    callbackFunction: function (elem, action) {

      $('.our-numbers .item .number .counter').each(function (index) {

        let thisNumber = $(this).attr('data-number');

        setTimeout(function () {

          new Typed(".our-numbers .item:nth-child("+(index + 1)+") .number .counter", {
            strings: [thisNumber],
            typeSpeed: 100,
            showCursor: false,
            loopCount:1
          });

          if ( $('.our-numbers .item:nth-child('+(index + 1)+') .number .more-number').length ){

            let thisMoreNumber = $('.our-numbers .item:nth-child('+(index + 1)+') .number .more-number');

            setTimeout(function () {

              thisMoreNumber.css({'opacity' : '1'})

            }, (thisNumber.length * 100) + 200 )

          }

        }, (index + 1) * 300)

      })
    }
  });

  /**
   * About tour
   */

  //Вывод больше курсов

  $('.tour-preview').on('click', function (e) {
    e.preventDefault();

    let tourId = $(this).attr('data-tour');

    let thisTour = {
      action: 'open_tour',
      tourId: tourId
    };

    $.post( myajax.url, thisTour, function(response) {

      if($ .trim(response) !== '' ){

        $('#tourModal .modal-body').html(response);

        $('#tourModal').modal("show");
      }
    });

  })

  /**
   * Basic animation
   */

  const startAnimationDelay = 200;
  const animationTracking = $('.animation-tracking');

  animationTracking.each(function () {

    let thisTrack = $(this);

    thisTrack.viewportChecker({

      offset: startAnimationDelay,

      callbackFunction: function (elem, action) {

        $('.visible .first-up').addClass('animate');

        setTimeout(function () {
          $('.visible .second-up').addClass('animate');
        }, 500);

      }
    });
  });
}

  /*$('.our-numbers .number .counter').each(function () {
    $(this).prop('Counter',0).animate({
      Counter: $(this).text()
    }, {
      duration: 3000,
      easing: 'swing',
      step: function (now) {
        $(this).text(Math.ceil(now));
      }
    });
  });*/



  //Смена категории курсов

  /*jQuery('.page-template-template-home .curses-cat-wrapper .cat').on('click', function (e) {
    e.preventDefault();

    jQuery('.page-template-template-home .curses-cat-wrapper .cat').removeClass('active-cat');

    jQuery(this).addClass('active-cat');

    var subCatId = jQuery(this).data('subcatid');

    var allCat = jQuery(this).data('allcat');

    var currentLang = jQuery(this).data('lang');

    var pageCatNavWrapper = jQuery('#mor-curses-dtn-wrap');

    var allCatPosts = Number(jQuery(this).attr('data-allposts'));

    pageCatNavWrapper.attr('data-allposts', allCatPosts);

    var targetAllPosts = Number(pageCatNavWrapper.attr('data-allposts'));

    if ( targetAllPosts <= 6 ){
      pageCatNavWrapper.addClass('d-none');
    }else{
      pageCatNavWrapper.removeClass('d-none');
    }

    let data = {

      action: 'change_curses_category',
      allCat: allCat,
      currentLang: currentLang,
      subCatId: subCatId
    };

    jQuery.post( myajax.url, data, function(response) {

      if(jQuery.trim(response) !== ''){

        jQuery('#curses-list').html(response);
      }
    });

  });*/



  //Fancybox Init

  /*jQuery('[data-fancybox]').fancybox({
    protect: true,
    loop : true,
    fullScreen : true,
    scrolling : 'yes',
    image : {
      preload : "auto",
      protect : true
    },
    buttons: [
      "zoom",
      "slideShow",
      "fullScreen",
      "close"
    ]

  });*/

  //Webinar Countdown Timer

  /*if ( jQuery('.courses-template-template-webinar-page').length ){

    let startData = Number(jQuery('#timer').data('start'));

    const date = new Date(startData*1000);

    startData = new Date(date).getTime();

    // Update the count down every 1 second
    let dataTimer = setInterval(function() {

      // Get today's date and time
      let getDate = new Date().getTime();

      // Find the distance between now and the count down date
      let distance = startData - getDate;

      // Time calculations for days, hours, minutes and seconds
      let days = Math.floor(distance / (1000 * 60 * 60 * 24));
      let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      let seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Display the result in the element with id="demo"

      jQuery('#timer .day .date').text(days);
      jQuery('#timer .hour .date').text(hours);
      jQuery('#timer .minute .date').text(minutes);
      jQuery('#timer .second .date').text(seconds);


      // If the count down is finished, write some text
      if (distance < 0) {
        clearInterval(dataTimer);

      }
    }, 1000);

  }*/
    // MAP INIT

    /*function initMap() {
        var location = {
            lat: 48.268376,
            lng: 25.9301257
        };

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: location,
            scrollwheel: false
        });

        var marker = new google.maps.Marker({
            position: location,
            map: map
        });

        var marker = new google.maps.Marker({ // кастомный марекр + подпись
            position: location,
            title:"Город, Улица, \n" +
            "Дом, Квартира",
            map: map,
            icon: {
                url: ('img/marker.svg'),
                scaledSize: new google.maps.Size(141, 128)
            }
        });

        jQuery.getJSON("map-style_dark.json", function(data) { // подключения стиля для гугл карты
            map.setOptions({styles: data});
        });

    }

    initMap();*/

    // MOB-MENU

    /*jQuery('#menu-btn').on('click', function (e) {
       e.preventDefault();

       jQuery('#mob-menu').toggleClass('active-menu');
       jQuery(this).toggleClass('open-menu');
    });

    jQuery('#mob-menu a').on('click', function (e) {
        e.preventDefault();

        jQuery('#mob-menu').removeClass('active-menu');
        jQuery('#menu-btn').removeClass('open-menu');
    });*/


    //SCROLL MENU

    /*jQuery(document).on('click', '.scroll-to', function (e) {
        e.preventDefault();

        var href = jQuery(this).attr('href');

        jQuery('html, body').animate({
            scrollTop: jQuery(href).offset().top
        }, 1000);

    });*/



    // PHONE MASK

    /*jQuery("input[type=tel]").mask("+38(999) 999-99-99");*/

    // DTA VALUE REPLACE

    /*jQuery('.open-form').on('click', function (e) {
        e.preventDefault();
        var type = jQuery(this).data('type');
        jQuery('#type-form').find('input[name=type]').val(type);
    });*/

    // FORM LABEL FOCUS UP

    /*jQuery('.form-control').on('focus', function() {
        jQuery(this).closest('.form-control').find('label').addClass('active');
    });

    jQuery('.form-control').on('blur', function() {
        var jQuerythis = jQuery(this);
        if (jQuerythis.val() == '') {
            jQuerythis.closest('.form-control').find('label').removeClass('active');
        }
    });*/

    // SCROLL TOP.

    /*jQuery(document).on('click', '.up-btn', function() {
        jQuery('html, body').animate({
            scrollTop: 0
        }, 300);
    });*/

    // SHOW SCROLL TOP BUTTON.

    /*jQuery(document).scroll(function() {
        var y = jQuery(this).scrollTop();

        if (y > 800) {
            jQuery('.up-btn').fadeIn();
        } else {
            jQuery('.up-btn').fadeOut();
        }
    });*/

    // UTM

    /*function getQueryVariable(variable) {
        var query = window.location.search.substring(1);
        var vars = query.split('&');
        for (var i = 0; i < vars.length; i++) {
            var pair = vars[i].split('=');
            if (decodeURIComponent(pair[0]) == variable) {
                return decodeURIComponent(pair[1]);
            }
        }
    }
    utm_source = getQueryVariable('utm_source') ? getQueryVariable('utm_source') : "";
    utm_medium = getQueryVariable('utm_medium') ? getQueryVariable('utm_medium') : "";
    utm_campaign = getQueryVariable('utm_campaign') ? getQueryVariable('utm_campaign') : "";
    utm_term = getQueryVariable('utm_term') ? getQueryVariable('utm_term') : "";
    utm_content = getQueryVariable('utm_content') ? getQueryVariable('utm_content') : "";

    var forms = jQuery('form');
    jQuery.each(forms, function (index, form) {
        jQueryform = jQuery(form);
        jQueryform.append('<input type="hidden" name="utm_source" value="' + utm_source + '">');
        jQueryform.append('<input type="hidden" name="utm_medium" value="' + utm_medium + '">');
        jQueryform.append('<input type="hidden" name="utm_campaign" value="' + utm_campaign + '">');
        jQueryform.append('<input type="hidden" name="utm_term" value="' + utm_term + '">');
        jQueryform.append('<input type="hidden" name="utm_content" value="' + utm_content + '">');
    });*/

});

// PRELOADER

jQuery(window).on('load', function () {

  jQuery('#loader').fadeOut(400);
});

/**
 * Parallax
 */

const imagesParallax = document.querySelectorAll('.parallax-image');

const imagesParallax2 = document.querySelectorAll('.parallax-image2');

new simpleParallax(imagesParallax,{
  delay: 2,
  scale: 1.1,
  maxTransition: 100,
  transition: 'cubic-bezier(0,0,0,1)'
});

new simpleParallax(imagesParallax2,{
  delay: 1,
  scale: 1.1,
  orientation: 'left - left',
  maxTransition: 150,
  transition: 'cubic-bezier(0,0,0,3)'
});