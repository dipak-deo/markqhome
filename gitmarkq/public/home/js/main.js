//AD POPUP
  $(document).ready(function(){
    callshowpopup();
  });
var showpopup;
function callshowpopup(){
  showpopup =setTimeout(function() {$("#modalpopup").modal("show");},0);
}




$(window).scroll(function() {    
var scroll = $(window).scrollTop();

if (scroll >= 200) {
    $(".menu-section").addClass("fixed-top");
} else {
    $(".menu-section").removeClass("fixed-top");
}
}); 

//MENU DROPDOWN
     $(document).ready(function () {
$('.navbar .dropdown').hover(function () {
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown(150);
    }, function () {
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp(105)
    });
});




//BACK TO TOP
      $(document).ready(function(){

$(function(){
 
    $(document).on( 'scroll', function(){
 
      if ($(window).scrollTop() > 100) {
      $('.scroll-top-wrapper').addClass('show');
    } else {
      $('.scroll-top-wrapper').removeClass('show');
    }
  });
 
  $('.scroll-top-wrapper').on('click', scrollToTop);
});
 
function scrollToTop() {
  verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
  element = $('body');
  offset = element.offset();
  offsetTop = offset.top;
  $('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
}

});

      //MOBILE MENU

function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}


//TESTIMONIALS

(function($){
    $('.testi-item').owlCarousel({
      items: 1,
      loop:true,
      margin:30,        
      nav: true,
      dots: true,        
      autoplay:true,
      autoplayTimeout:5000,
      navText: ['<span class="fas fa-arrow-left"></span>','<span class="fas fa-arrow-right"></span>'],        
      responsiveClass:true,
      responsive:{
          0:{
              items:1
          },
  
          600:{
              items:2
          },

          1000:{
              items:3
          }
      }
    });

})(jQuery);

//READY

(function($){
    $('.ready-item').owlCarousel({
      items: 1,
      loop:true,
      margin:30,        
      nav: true,
      dots: true,        
      autoplay:true,
      autoplayTimeout:5000,
      navText: ['<span class="fas fa-arrow-left"></span>','<span class="fas fa-arrow-right"></span>'],        
      responsiveClass:true,
      responsive:{
          0:{
              items:1
          },
  
          600:{
              items:2
          },

          1000:{
              items:3
          }
      }
    });

})(jQuery);


//PARTNERS

(function($){
    $('.partner-item').owlCarousel({
      items: 1,
      loop:true,
      margin:30,        
      nav: true,
      dots: true,        
      autoplay:true,
      autoplayTimeout:5000,
      navText: ['<span class="fas fa-arrow-left"></span>','<span class="fas fa-arrow-right"></span>'],        
      responsiveClass:true,
      responsive:{
          0:{
              items:1
          },
  
          600:{
              items:3
          },

          1000:{
              items:6
          }
      }
    });

})(jQuery);

//PACKAGE

(function($){
    $('.package-item').owlCarousel({
      items: 1,
      loop:true,
      margin:30,        
      nav: true,
      dots: true,        
      autoplay:true,
      autoplayTimeout:5000,
      navText: ['<span class="fas fa-arrow-left"></span>','<span class="fas fa-arrow-right"></span>'],        
      responsiveClass:true,
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

})(jQuery);


//VIDEO GALLERY

$(function () {
        $('#myVideoSlide').videoOslide();
 });


//FAQS

$(".set > a").on("click", function() {
  if ($(this).hasClass("active")) {
    $(this).removeClass("active");
    $(this)
      .siblings(".set .content")
      .slideUp(200);
    $(".set > a i")
      .removeClass("fa-minus")
      .addClass("fa-plus");
  } else {
    $(".set > a i")
      .removeClass("fa-minus")
      .addClass("fa-plus");
    $(this)
      .find("i")
      .removeClass("fa-plus")
      .addClass("fa-minus");
    $(".set > a").removeClass("active");
    $(this).addClass("active");
    $(".set .content").slideUp(200);
    $(this)
      .siblings(".set .content")
      .slideDown(200);
  }
});

//TABS

$("#user-nav-tabs li").on('click', function(e) {
    var targetLink = $(e.currentTarget.children[0]).attr("href").slice(1);

    var content_map = {
        c1  : "#content1",
        c2  : "#content2",
        c3  : "#content3"
    }

    $(e.currentTarget).siblings().removeClass("active");

    $.each(content_map, function(hash, elid) {
        if (hash == targetLink) {
            $(elid).show();
            $(e.currentTarget).addClass("active");
        } else {
            $(elid).hide();
        }
    });
});

//GALLERY

(function($){
    $('.beauty-item').owlCarousel({
      items: 1,
      loop:true,
      margin:30,        
      nav: true,
      dots: true,        
      autoplay:true,
      autoplayTimeout:5000,
      navText: ['<span class="fas fa-arrow-left"></span>','<span class="fas fa-arrow-right"></span>'],        
      responsiveClass:true,
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

})(jQuery);



document.querySelectorAll('details').forEach((el) => {
            const summary = el.querySelector('summary');
            const content = el.querySelector('.content');

            summary.addEventListener('click', (e) => {
                e.preventDefault();
                if (el.open) {
                    slideUp(content, () => {
                        el.open = false;
                    });
                } else {
                    el.open = true;
                    slideDown(content);
                }
            });
        });

        function slideUp(element, callback) {
            const height = element.offsetHeight;
            element.style.height = height + 'px';
            element.offsetHeight; // Force reflow
            element.style.height = '0';
            element.addEventListener('transitionend', function handler() {
                element.removeEventListener('transitionend', handler);
                callback();
            });
        }

        function slideDown(element) {
            element.style.height = '0';
            element.offsetHeight; // Force reflow
            const height = element.scrollHeight;
            element.style.height = height + 'px';
            element.addEventListener('transitionend', function handler() {
                element.removeEventListener('transitionend', handler);
                element.style.height = 'auto';
            });
        }


//EXPLORE SECTION TABS

  $(function() {
  var $tabButtonItem = $('#tab-button1 li'),
      $tabSelect = $('#tab-select1'),
      $tabContents = $('.tab-contents1'),
      activeClass = 'is-active';

  $tabButtonItem.first().addClass(activeClass);
  $tabContents.not(':first').hide();

  $tabButtonItem.find('a').on('click', function(e) {
    var target = $(this).attr('href');

    $tabButtonItem.removeClass(activeClass);
    $(this).parent().addClass(activeClass);
    $tabSelect.val(target);
    $tabContents.hide();
    $(target).show();
    e.preventDefault();
  });

  $tabSelect.on('change', function() {
    var target = $(this).val(),
        targetSelectNum = $(this).prop('selectedIndex');

    $tabButtonItem.removeClass(activeClass);
    $tabButtonItem.eq(targetSelectNum).addClass(activeClass);
    $tabContents.hide();
    $(target).show();
  });
});

  $(function() {
  var $tabButtonItem = $('#tab-button2 li'),
      $tabSelect = $('#tab-select2'),
      $tabContents = $('.tab-contents2'),
      activeClass = 'is-active';

  $tabButtonItem.first().addClass(activeClass);
  $tabContents.not(':first').hide();

  $tabButtonItem.find('a').on('click', function(e) {
    var target = $(this).attr('href');

    $tabButtonItem.removeClass(activeClass);
    $(this).parent().addClass(activeClass);
    $tabSelect.val(target);
    $tabContents.hide();
    $(target).show();
    e.preventDefault();
  });

  $tabSelect.on('change', function() {
    var target = $(this).val(),
        targetSelectNum = $(this).prop('selectedIndex');

    $tabButtonItem.removeClass(activeClass);
    $tabButtonItem.eq(targetSelectNum).addClass(activeClass);
    $tabContents.hide();
    $(target).show();
  });
});


$(function() {
  var $tabButtonItem = $('#tab-button3 li'),
      $tabSelect = $('#tab-select3'),
      $tabContents = $('.tab-contents3'),
      activeClass = 'is-active';

  $tabButtonItem.first().addClass(activeClass);
  $tabContents.not(':first').hide();

  $tabButtonItem.find('a').on('click', function(e) {
    var target = $(this).attr('href');

    $tabButtonItem.removeClass(activeClass);
    $(this).parent().addClass(activeClass);
    $tabSelect.val(target);
    $tabContents.hide();
    $(target).show();
    e.preventDefault();
  });

  $tabSelect.on('change', function() {
    var target = $(this).val(),
        targetSelectNum = $(this).prop('selectedIndex');

    $tabButtonItem.removeClass(activeClass);
    $tabButtonItem.eq(targetSelectNum).addClass(activeClass);
    $tabContents.hide();
    $(target).show();
  });
});


$(function() {
  var $tabButtonItem = $('#tab-button4 li'),
      $tabSelect = $('#tab-select4'),
      $tabContents = $('.tab-contents4'),
      activeClass = 'is-active';

  $tabButtonItem.first().addClass(activeClass);
  $tabContents.not(':first').hide();

  $tabButtonItem.find('a').on('click', function(e) {
    var target = $(this).attr('href');

    $tabButtonItem.removeClass(activeClass);
    $(this).parent().addClass(activeClass);
    $tabSelect.val(target);
    $tabContents.hide();
    $(target).show();
    e.preventDefault();
  });

  $tabSelect.on('change', function() {
    var target = $(this).val(),
        targetSelectNum = $(this).prop('selectedIndex');

    $tabButtonItem.removeClass(activeClass);
    $tabButtonItem.eq(targetSelectNum).addClass(activeClass);
    $tabContents.hide();
    $(target).show();
  });
});

$(function() {
  var $tabButtonItem = $('#tab-button4 li'),
      $tabSelect = $('#tab-select4'),
      $tabContents = $('.tab-contents4'),
      activeClass = 'is-active';

  $tabButtonItem.first().addClass(activeClass);
  $tabContents.not(':first').hide();

  $tabButtonItem.find('a').on('click', function(e) {
    var target = $(this).attr('href');

    $tabButtonItem.removeClass(activeClass);
    $(this).parent().addClass(activeClass);
    $tabSelect.val(target);
    $tabContents.hide();
    $(target).show();
    e.preventDefault();
  });

  $tabSelect.on('change', function() {
    var target = $(this).val(),
        targetSelectNum = $(this).prop('selectedIndex');

    $tabButtonItem.removeClass(activeClass);
    $tabButtonItem.eq(targetSelectNum).addClass(activeClass);
    $tabContents.hide();
    $(target).show();
  });
});

$(function() {
  var $tabButtonItem = $('#tab-button6 li'),
      $tabSelect = $('#tab-select6'),
      $tabContents = $('.tab-contents6'),
      activeClass = 'is-active';

  $tabButtonItem.first().addClass(activeClass);
  $tabContents.not(':first').hide();

  $tabButtonItem.find('a').on('click', function(e) {
    var target = $(this).attr('href');

    $tabButtonItem.removeClass(activeClass);
    $(this).parent().addClass(activeClass);
    $tabSelect.val(target);
    $tabContents.hide();
    $(target).show();
    e.preventDefault();
  });

  $tabSelect.on('change', function() {
    var target = $(this).val(),
        targetSelectNum = $(this).prop('selectedIndex');

    $tabButtonItem.removeClass(activeClass);
    $tabButtonItem.eq(targetSelectNum).addClass(activeClass);
    $tabContents.hide();
    $(target).show();
  });
});













