jQuery(function($) {


  /**
   * Get Window Width & Height
   */

  let windWidth = $(window).width();
  let windHeight = $(window).height();

  $(window).resize(function () {
    windWidth = $(window).width();
    windHeight = $(window).height();
  });
  // Lazy load

  $('.lazy').lazy();

  /**
   * Fixed Menu
   */

  let infiniteScrollCounter = 0;

  $(document).scroll(function() {

    let scrollPosition = $(this).scrollTop();

    if (scrollPosition > 1) {
      $('.site-header').addClass('fixed-header');
    } else {
      $('.site-header').removeClass('fixed-header');
    }
  });

  let positionScrollHeader = $(window).scrollTop();

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

    if( $('#scroll-detected').length ){

      if ( scroll == $(document).height() - $(window).height() ){

        $('#scroll-detected').show('fast');

        infiniteScrollCounter ++ ;

        let pageNumber = infiniteScrollCounter;
        let catId = $('.our-portfolio .category.active a').attr('data-cat');

        let data = {
          action: 'portfolio_scroll',
          pageNumber: pageNumber,
          catId: catId,
        };

        $.post( foodtemplate_ajax.url, data, function(response) {

          if($.trim(response) !== ''){
            $('#scroll-detected').hide(1000);
            $('#portfolio-content').append(response);
          }
        });
      }
    }

    if( $('#blog-scroll-detection').length ){

      if ( scroll == $(document).height() - $(window).height() ){

        infiniteScrollCounter ++ ;

        console.log(infiniteScrollCounter);

        let pageNumber = infiniteScrollCounter;

        let data = {
          action: 'blog_scroll',
          pageNumber: pageNumber,
        };

        $.post( foodtemplate_ajax.url, data, function(response) {

          if($.trim(response) !== ''){
            $('#blog-list').append(response);
          }
        });
      }
    }
  });

  /**
   * Calories slider
   */

  if ( $('#home-calories-slider').length ){

    $('#home-calories-slider').slick({
      autoplay: false,
      autoplaySpeed: 5000,
      slidesToShow: 3,
      slidesToScroll: 1,
      arrows: false,
      dots: true,
      lazyLoad: 'ondemand',
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 575,
          settings: {
            slidesToShow: 1,
          }
        }
      ]
    });
  }

  /**
   * Reviews slider
   */

  if ( $('#reviews-slider').length ){

    $('#reviews-slider').slick({
      autoplay: false,
      autoplaySpeed: 5000,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      adaptiveHeight: true,
      fade: true
    });

    const reviewsInfo = $('.reviews .info-controls');

    const reviewsCount = $('#reviews-slider .slide').length;

    reviewsInfo.find('.all').text(reviewsCount);

    reviewsInfo.find('.slide-info__avatar img').attr('src', $('#reviews-slider .slide:nth-child(1)').attr('data-avatar'));

    reviewsInfo.find('.name').text($('#reviews-slider .slide:nth-child(1)').attr('data-name'));

    reviewsInfo.find('.position').text($('#reviews-slider .slide:nth-child(1)').attr('data-position'));

    $('#reviews-slider').on('beforeChange', function(event, slick, currentSlide, nextSlide){

      reviewsInfo.find('.current').text(nextSlide+1);

      let slideObject = slick['$slides'][nextSlide];

      let arraySlide = jQuery.makeArray(slideObject);

      let devMenName = arraySlide[0]['dataset']['name'];
      let devMenPost = arraySlide[0]['dataset']['position'];

      reviewsInfo.find('.slide-info__avatar img').attr('src', arraySlide[0]['dataset']['avatar']);

      reviewsInfo.find('.name').text(arraySlide[0]['dataset']['name']);

      reviewsInfo.find('.position').text(arraySlide[0]['dataset']['position']);

    });

    $('.reviews .control.prev').click(function(e){
      e.preventDefault();

      $('#reviews-slider').slick('slickPrev');
    });

    $('.reviews .control.next').click(function(e){
      e.preventDefault();

      $('#reviews-slider').slick('slickNext');
    });
  }


  /**
   * Change portfolio category
   */

  $('.our-portfolio .category-list .category').on('click', function(e){

    e.preventDefault();

    $('.our-portfolio .category-list .category').removeClass('active');

    let thisCat = $(this);

    thisCat.addClass('active');

    let currentCat = Number(thisCat.find('a').attr('data-cat'));

    let data = {
      action: 'portfolio_change_category',
      catId: currentCat,
    };

    $.post( foodtemplate_ajax.url, data, function(response) {

      if($.trim(response) !== ''){
        $('#portfolio-content').html(response);
      }
    });


  });









  //Mob Menu

  /*jQuery('#mob-menu').on('click', function (e) {
    e.preventDefault();

    jQuery(this).toggleClass('active');
    jQuery('header').toggleClass('active-menu');
    jQuery('header nav').toggleClass('open-menu');
    jQuery('html').toggleClass("fixedPosition");

  });*/

  //SCROLL MENU

  /*jQuery('#primary-menu li a').addClass('scroll-to');

  jQuery(document).on('click', '.scroll-to', function (e) {
    e.preventDefault();

    let href = jQuery(this).attr('href');

    jQuery('html, body').animate({
      scrollTop: jQuery(href).offset().top
    }, 1000);

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

  //Вывод больше курсов

  /*if ( jQuery('.page-template-template-home').length ){

    var activeCat = jQuery('.curses-cat-wrapper .cat.active-cat');
    var allPosts = Number(activeCat.attr('data-allposts'));

    jQuery('#mor-curses-dtn-wrap').attr('data-allposts', allPosts);

    var targetAllPosts = Number(jQuery('#mor-curses-dtn-wrap').attr('data-allposts'));

    var btnMore = jQuery('#more-curses');

    btnMore.attr('data-currentcat', activeCat.attr('data-subcatid'));
    btnMore.attr('data-allcat', activeCat.attr('data-allcat'));

    btnMore.on('click', function (e) {
      e.preventDefault();

      var curseLeng = jQuery(this).attr('data-lang');
      var curseCurrentCat = Number(jQuery(this).attr('data-currentcat'));
      var curseAllCat = Number(jQuery(this).attr('data-allcat'));

      var moreCurses = {
        action: 'more_curses',
        currentLang: curseLeng,
        allCat: curseAllCat,
        currentCat: curseCurrentCat
      };

      jQuery.post( myajax.url, moreCurses, function(response) {

        if(jQuery.trim(response) !== ''){

          jQuery('#curses-list').append(response);
        }
      });

      jQuery('#mor-curses-dtn-wrap').addClass('d-none');

    });

  }*/

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

/*jQuery(window).on('load', function () {

    jQuery('#loader').fadeOut(400);
});*/
