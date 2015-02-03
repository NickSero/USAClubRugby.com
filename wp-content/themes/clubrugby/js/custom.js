jQuery(document).ready(function($){
  
  // This will fire when document is ready:
  $(window).resize(function() {
      // This will fire each time the window is resized:
      if($(window).width() >= 960) {
        // if larger or equal
        $('#desktop-header').css('display','block');
        $('#mobile-header').css('display','none');
      } else {
        // if smaller
        $('#mobile-header').css('display','block');
        $('#desktop-header').css('display','none');

      }
  }).resize(); // This will simulate a resize to trigger the initial run.

  $(document).foundation();
  
  FastClick.attach(document.body);

});