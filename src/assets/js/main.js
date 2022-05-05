// Animações
window.addEventListener('load', function () {

  AOS.init({
    duration: 2000,
    offset: 120
  });

});


/*
 * Replace all SVG images with inline SVG
 */
$('img.svg').each(function () {
  var $img = $(this);
  var imgID = $img.attr('id');
  var imgClass = $img.attr('class');
  var imgURL = $img.attr('src');

  $.get(imgURL, function (data) {
    // Get the SVG tag, ignore the rest
    var $svg = $(data).find('svg');

    // Add replaced image's ID to the new SVG
    if (typeof imgID !== 'undefined') {
      $svg = $svg.attr('id', imgID);
    }
    // Add replaced image's classes to the new SVG
    if (typeof imgClass !== 'undefined') {
      $svg = $svg.attr('class', imgClass + ' replaced-svg');
    }

    // Remove any invalid XML tags as per http://validator.w3.org
    $svg = $svg.removeAttr('xmlns:a');

    // Replace image with new SVG
    $img.replaceWith($svg);

  }, 'xml');

});

//Carousel Depoimentos Home
$('.owl-carousel-produtos').owlCarousel({
  margin: 20,
  nav: false,
  autoplay: false,
  dots: true,
  responsive: {
    0: {
      items: 1
    },
    768: {
      items: 2
    },
    1000: {
      items: 3
    }
  }
});


// Scroll Nav

function sectionScroll(index) {
  var targetOffset = $(index).offset().top;
  var variacao = 30;
  $('html, body').animate({
    scrollTop: targetOffset - variacao
  }, 3000);
}
// Scroll Menu Header
$('a.btn-simulacao').on('click', function (e) {
  var href = ($(this).attr('href')).split('#');
  if (href.length == 2) {
    var id = '#' + href[1];
    if ($(id).length > 0) {
      e.preventDefault();
      sectionScroll(id);
    }
  }
});


//Mascaras para os campos
$('.mask_phone_with_ddd').mask('(00) 00000-0000');
$('.mask_cpf').mask('000.000.000-00');
$('.mask_cnpj').mask('00.000.000/0000-00');
//$('.mask_spcelphones').mask(SPMaskBehavior, spOptions);

    var CpfCnpjMaskBehavior = function(val) {
       
        return val.replace(/\D/g, '').length <= 11 ? '000.000.000-0099' : '00.000.000/0000-00';
    },
    cpfCnpjOptions = {
        onKeyPress: function(val, e, field, options) {
            field.mask(CpfCnpjMaskBehavior.apply({}, arguments), options);
          }
      };
    $(".mask_cpfcnpj").mask(CpfCnpjMaskBehavior, cpfCnpjOptions);

var wpcf7Elm = document.querySelector('.wpcf7');

wpcf7Elm.addEventListener('wpcf7mailsent', function (event) {
    fbq('track', 'Lead');
    gtag('event', 'conversion', {'send_to': 'AW-315790915/Fn-4CIKJ_PUCEMOsypYB'});
    $('html, body').animate({ scrollTop: ($("#s-intro-home").offset().top-50)}, 'slow');
}, false)