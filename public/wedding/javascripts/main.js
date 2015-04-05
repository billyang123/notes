$(function(){
  $('.navigation a').click(function(e){
    $(this.hash).ScrollTo();
    return false;
  });

  $('.carousel').carousel();

  $(".gallery a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});

  var script = document.createElement("script");
  script.src = "http://api.map.baidu.com/api?v=1.4&callback=showMap";
  document.body.appendChild(script);

  // $("#rsvp-form").validate();
  // $("#rsvp-form").submit(form_submit)

});
