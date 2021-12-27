//Scripts layoutScripts v1.0

var $menuMobile = $('#mm'),
    $ContMenuLateral = $('#menuLateralHome'),
    $botnoMobile = $('#openMenuMobile'),
    $botnoMobileLat = $('#menuLatMobile'),
    $dataAttr = $('[data-menu-expand]');
function menuMobile() {
  var elDato = $dataAttr.attr('data-menu-expand');
  // console.log(elDato);
  switch (elDato) {
    case 'false':
      $menuMobile.attr('data-menu-expand', true);
      $botnoMobile.attr('data-menu-expand', true);
      TweenMax.to($menuMobile, 0.3, { x: '0', ease: Power3.easeInOut, easeParams: [1.1,0.7], force3D: true });
      break;
    case 'true':
      $menuMobile.attr('data-menu-expand', false);
      $botnoMobile.attr('data-menu-expand', false);
      TweenMax.to($menuMobile, 0.3, { x: '-300px', ease: Power3.easeInOut, easeParams: [1.1,0.7], force3D: true });
      break;
    default:
      break;
  }
}

$(window).on('load', function(){

});

jQuery(document).ready(function(){
  $('#md').clone().prependTo('#contListMenu').removeAttr('id').show();
  TweenMax.to($('#mm'), 0, {x: '-300px', force3D: true});
  $(function() {
      var $el = $('.parallax-background');
      $(window).on('scroll', function () {
        if($(window).width() >= 992) {
          var scroll = $(document).scrollTop();
          $el.css({
            'background-position':'50% '+(-.1*scroll)+'px'
          });
        } else {
          $el.css({
            'background-position':'inherit'
          });
        }
      });
  });
  // SliderHome
  $('.contSlider').slick({
    autoplay: true,
    slidesToShow: 1,
    infinite: true,
    dots: true,
    speed: 500,
    fade: true,
    cssEase: 'linear',
    prevArrow: $('#prev-slidemain'),
    nextArrow: $('#next-slidemain')
  });
  // Slider Dates slideDatesHome
  $('.slideDatesHome').slick({
    centerMode: true,
    centerPadding: '0',
    slidesToShow: 3,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          centerMode: true,
          centerPadding: '5px',
          slidesToShow: 3
        }
      },
      {
        breakpoint: 480,
        settings: {
          centerMode: true,
          centerPadding: '5px',
          slidesToShow: 1
        }
      }
    ],
    prevArrow: $('#prev-fechas'),
    nextArrow: $('#next-fechas')
  });
  //slider Home Vertical
  $(".slideContJurado").slick({
    infinite: true,
    vertical: true,
    arrows: false,
    centerMode: false,
    slidesToShow: 1,
    variableWidth:false,
    draggable:false
  });
  $('.slider-nav-thumbnails').slick({
    slidesToShow: 3,
    asNavFor: '.slideContJurado',
    focusOnSelect: true
  });
});