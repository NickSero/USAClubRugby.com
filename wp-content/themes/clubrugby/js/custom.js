jQuery(document).ready(function($){

  // This will fire when document is ready:
  $(window).resize(function() {
      // This will fire each time the window is resized:
      if($(window).width() >= 960) {
        // if larger or equal

      } else {
        // if smaller

      }
  }).resize(); // This will simulate a resize to trigger the initial run.

  if($(window).width() >= 1024) {
  
    var divider = $('<li class="menu-item menu-item-divider"></li>');
    $(divider).insertAfter('#site-menu > .before-divider');
  
  }
  else {
    return;
  }

  $(document).foundation();
  
  FastClick.attach(document.body);

});