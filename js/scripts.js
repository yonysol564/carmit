var locations;
var width;


jQuery( window ).load(function() {
    jQuery( "body" ).addClass('loaded');
});


jQuery(window).resize(function() {
    width = jQuery(window).width();
    jQuery('.bg_home').height(jQuery(window).height());
    if( width < 767){
      jQuery('.bg_home').height(jQuery(window).height() -169);
    }
    // if( width < 767){
    //   var targetElement = jQuery(".row_2 .img_div");
    //   var moviedElement = jQuery(".row_2 .text_div");
    //   jQuery(moviedElement).insertBefore(targetElement);
    // }else{
    //   var targetElement = jQuery(".row_2 .text_div");
    //   var moviedElement = jQuery(".row_2 .img_div");
    //   jQuery(moviedElement).insertBefore(targetElement);
    // }

});
jQuery(window).trigger('resize');



jQuery(document).ready(function(){

    jQuery("#menu-toggle").click(function(e) {
      e.preventDefault();
      jQuery("#wrapper").toggleClass("toggled");
    });

    // jQuery("input[type='submit']").click(function(e) {
    //   var email = jQuery("input[name='con_email']").val();
    //   validateEmail(email);
    // });

    jQuery("input[name='con_email']").keyup(function () {
        var email = this.value;
        validateEmail(email);
    });



    create_home_slider();
    create_customer_slider();
    create_products_slider();
    create_product_gallery();
    even_sidebar();

    
    jQuery('.scroll_arr').click(function(e) {
        e.preventDefault();

        var main_slider = jQuery( ".main_slider_wrap" ).height();
        var body =jQuery("html, body");
        body.stop().animate({scrollTop: main_slider}, '1200', function() { 
      
        });
    });

   jQuery( ".toggle_search" ).click(function(e) {
        e.preventDefault();
        jQuery( ".abs_from" ).slideToggle( "fast", function() {
  
        });
    });

    jQuery( ".close_search" ).click(function(e) {
        e.preventDefault();
        jQuery( ".abs_from" ).slideToggle( "fast", function() {
  
        });
    });

   



    var window_width = jQuery( window ).width();
    if(jQuery("#contact_map").length) {
        init_google_map();
    }


    jQuery('.share_sidebar_inner a').click(function() {
     // var social_title = jQuery(this).data('title');
      var social_img = jQuery(this).data('img');
      jQuery('meta[property="og:image"]').attr('content', social_img);
    });


    jQuery('.fixed_con').click(function(e) {
        e.preventDefault();
        if(jQuery(this).css("margin-left") == "253px")
        {
            jQuery('#fixed_form').animate({"margin-left": '-=253'});
            jQuery('.fixed_con').animate({"margin-left": '-=253'});
        }
        else
        {
            jQuery('#fixed_form').animate({"margin-left": '+=253'});
            jQuery('.fixed_con').animate({"margin-left": '+=253'});
        }
    });

    jQuery('.logo_box a').click(function(e) {
        var url = jQuery(this).data('url');
        if (url === false) {
          e.preventDefault();
        }
    });

});


function validateEmail(email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

    if (!emailReg.test(email) || jQuery("input[name='con_email']").val() == '') {
         jQuery("input[name='con_email']").addClass(' error ');
         console.log(email + 'bad');
    } else {
         jQuery("input[name='con_email']").removeClass('error');
         console.log(email + 'good');
    }
}

function even_sidebar(){
    var height = Math.max(jQuery(".about_col_9").height(),jQuery(".about_col_3").height());
    jQuery(".about_col_9,.about_col_3").css("min-height",height);
}

function create_home_slider(){
  home_slider = jQuery(".bg_home_wrap");
  home_slider.slick({
    infinite: true,
    speed: 1000,
    autoplay: true,
    fade: true,
    autoplaySpeed: 3000,
    slidesToShow: 1,
    slidesToScroll: 1,
    focusOnSelect: false,
    arrows: true,
    prevArrow: '<div class="carousel-prev carousel-arr"></div>',
    nextArrow: '<div class="carousel-next carousel-arr"></div>',
    responsive: [
      {
        breakpoint: 767,
        settings: {
          arrows:false,
          slidesToShow: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          dots:false,
          slidesToShow: 1
        }
      }
    ]
  });
}

function create_products_slider(){
  product_slider = jQuery(".wrap_home_products");
  product_slider.slick({
    infinite: true,
    speed: 500,
    autoplay: false,
    fade: false,
    autoplaySpeed: 2000,
    slidesToShow: 4,
    slidesToScroll: 1,
    focusOnSelect: false,
    arrows: true,
    prevArrow: '<div class="carousel-prev carousel-arr"></div>',
    nextArrow: '<div class="carousel-next carousel-arr"></div>',
    responsive: [
      {
        breakpoint: 767,
        settings: {
          arrows:false,
          slidesToShow: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          dots:false,
          arrows:true,
          slidesToShow: 1
        }
      }
    ]
  });
}

function create_customer_slider(){
  service_slider = jQuery(".customer_slider");
  service_slider.slick({
    infinite: true,
    speed: 500,
    autoplay: true,
    fade: false,
    rtl: true,
    autoplaySpeed: 2000,
    slidesToShow: 6,
    slidesToScroll: 1,
    focusOnSelect: false,
    arrows: true,
    prevArrow: '<div class="carousel-prev carousel-arr"></div>',
    nextArrow: '<div class="carousel-next carousel-arr"></div>',
    responsive: [
      {
        breakpoint: 767,
        settings: {
          arrows:false,
          slidesToShow: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          dots:false,
          slidesToShow: 1
        }
      }
    ]
  });
}


function create_product_gallery(){
  product_slider = jQuery(".product_gallery");
  product_slider.slick({
    infinite: true,
    speed: 1000,
    autoplay: true,
    fade: true,
    autoplaySpeed: 3000,
    slidesToShow: 1,
    slidesToScroll: 1,
    focusOnSelect: false,
    arrows: true,
    prevArrow: '<div class="carousel-prev carousel-arr"></div>',
    nextArrow: '<div class="carousel-next carousel-arr"></div>',
    responsive: [
      {
        breakpoint: 767,
        settings: {
          arrows:false,
          slidesToShow: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          dots:false,
          arrows:false,
          slidesToShow: 1
        }
      }
    ]
  });
}

function fix_top_menu() {
   var window_width = jQuery( window ).width();
    if (window_width > 640) {
     //  console.log('bigeerrr 640');
      jQuery( ".bg_image" ).insertBefore( "nav" );
    }

    else{
      // console.log('640');
       jQuery( "nav" ).insertBefore( ".bg_image" );
    }
}

function init_google_map(){
  map = new google.maps.Map(document.getElementById('contact_map'), {
      zoom: 17,
      draggable: false,
      scrollwheel: false,
      zoomControl: false,
      streetViewControl: false,
      navigationControl: false,
      draggable: false,
      center: new google.maps.LatLng(locations[1],locations[2])
    });
    var infowindow = new google.maps.InfoWindow();
    var marker;
    marker = new google.maps.Marker({
    position: new google.maps.LatLng(locations[1], locations[2]),
    map: map,
    animation: google.maps.Animation.DROP
  });
}
