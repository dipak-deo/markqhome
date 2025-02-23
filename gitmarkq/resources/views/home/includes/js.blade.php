
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src=" {{ url('home/js/bootstrap.min.js')}}"></script>    
<script src=" {{ url('home/js/popper.min.js')}}"></script> 
<script src=" {{ url('home/js/owl.carousel.min.js')}}"></script>  
<script src=" {{ url('home/js/main.js')}}"></script>
<script src=" {{ url('home/js/wow.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.6/swiper-bundle.min.js"></script>

<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

<script>
  new WOW().init();
</script>
<script>
  //SLIDER
wow = new WOW(
  {
    animateClass: 'animated',
    offset:       100,
    callback:     function(box) {
      console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
    }
  }
);
wow.init();
document.getElementById('moar').onclick = function() {
  var section = document.createElement('section');
  section.className = 'section--purple wow fadeInDown';
  this.parentNode.insertBefore(section, this);
};

</script>

<script>
  $(document).ready(function() {
 // executes when HTML-Document is loaded and DOM is ready

// breakpoint and up  
$(window).resize(function(){
  if ($(window).width() >= 980){  

      // when you hover a toggle show its dropdown menu
      $(".navbar .dropdown-toggle").hover(function () {
         $(this).parent().toggleClass("show");
         $(this).parent().find(".dropdown-menu").toggleClass("show"); 
       });

        // hide the menu when the mouse leaves the dropdown
      $( ".navbar .dropdown-menu" ).mouseleave(function() {
        $(this).removeClass("show");  
      });
  
    // do something here
  } 
});  
  
  

// document ready  
});
</script>


<script>
  function vertical_tabs()
  {
  if ($('.ux-vertical-tabs').length > 0)
    {
    $('.ux-vertical-tabs .tabs button').on("click", function()
      {
      var temp_tab = $(this).data('tab');
      var temp_tab_js = this.getAttribute('data-tab');
      var temp_content = $('.ux-vertical-tabs .maincontent .tabcontent[data-tab="' + temp_tab + '"]');
      var temp_content_js = document.querySelector('.ux-vertical-tabs .maincontent .tabcontent[data-tab="' + temp_tab_js + '"]');
      var temp_content_active_js = document.querySelector('.ux-vertical-tabs .maincontent .tabcontent.active');

      $('.ux-vertical-tabs .tabs button').removeClass('active');
      $('.ux-vertical-tabs .tabs button[data-tab="' + temp_tab + '"]').addClass('active');

      var animation_start = anime({ duration: 400, targets: temp_content_active_js, opacity:[1,0], translateX: [0,'100%'], easing: 'easeInOutCubic',
      complete: function()
        {
          $('.ux-vertical-tabs .maincontent .tabcontent').removeClass('active');
        temp_content.addClass('active');
        var animation_end = anime({ duration: 400, targets: temp_content_js, opacity:[0,1], translateX: ['100%','0'], easing: 'easeInOutCubic' });
          }
      });
      });
    }
  }

$(function() 
  {
  vertical_tabs();
  });
</script>

<script>
  $('#carousel-1').carousel({
      interval: 4000,
      wrap: true,
      keyboard: true
 });
</script>

@stack('scripts')
@livewireScripts