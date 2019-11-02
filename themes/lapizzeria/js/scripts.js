
var map;
window.initMap = function(){

    var latLng = {
        lat: 42.667542,
        lng: 21.166191
    };
    map = new google.maps.Map(document.getElementById('map'), {
        center: latLng,
        zoom: 8
    });

    var maker = new google.maps.Marker({
       position: latLng,
       map: map,
       title: 'La Pizzeria'
    });
}
$ = jQuery.noConflict();

$(document).ready(function() {
    $('.mobile-menu a').on('click',function(){
        $('nav.site-nav').toggle('slow');
    });

    var breakpoint = 768;
    $(window).resize(function(){
       if($(document).width() >= breakpoint){
           $('nav.site-nav').show();
       }else{
           $('nav.site-nav').hide();
       }
    });


    //Fluidbox Plugin
    jQuery('.gallery a').each(function(){
        jQuery(this).attr({'data-fluidbox': ''});
    });

    if(jQuery('[data-fluidbox]').length > 0 ){
        jQuery('[data-fluidbox]').fluidbox();
    }
});

//Adapt Map
    var breakpoint = 760;
    var map = $('#map');
    if(map.length > 0){
        if($(document).width() >= breakpoint){
            displayMap(0);
        } else{
            displayMap(300);
        }
    }
    var breakpoint = 760;
    $(window).resize(function () {
        if($(document).width() >= breakpoint){
            displayMap(0);
        } else{
            displayMap(300);
        }
    });
 function displayMap(value){
  if(value == 0){
      var locationSection = $('.location-reservation');
      var locationHeight = locationSection.height();
      $('#map').css({'height': locationHeight});
  } else {
      $('#map').css({'height': value});
  }

 }