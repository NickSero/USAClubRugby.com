jQuery(function($){

  $(document).ready(function(){
    removeComma($('#about .no-bullet > li:last-child > span'));
  });

  $('#mobile-menu-button').click(function(){
    $(this).addClass('active');
  });
  $('.exit-off-canvas').click(function(){
    $('#mobile-menu-button').removeClass('active');
  });

  $('#mobile-site-navigation #menu-item-70').remove();

  $('.menu-item-divider, .menu-item-divider > a').css({'height':$('.before-divider').height()});

  $('.sub-nav > dd').click(function(){
    $(this).toggleClass('active');
    $(this).siblings().removeClass('active');
  });

  $('#news-menu').width($('#content').width());

  $('ul.dropdown').css({'width':($('.desktop-header-wrapper').innerWidth())+'px'});

  $('.news > a').attr('data-dropdown','news-drop');
  $('.news > .dropdown').attr('id','news-drop');

  $('#about li div.text-center').css({'width':$(this).siblings('strong').innerWidth()+'px'});

  $('.has-dropdown').click(function(){
    $('ul.dropdown.f-dropdown.content.mega').toggleClass('open f-open-dropdown');
  });
  $('.has-dropdown').focusout(function(){
    $('ul.dropdown.f-dropdown.content.mega').removeClass('open f-open-dropdown');
  });
  !$('.has-dropdown').click(function(){
    $('.hover').removeClass('hover');
  });

  // UTILITY FUNCTIONS
  function removeComma(el){
    var str = $(el).text();
    str = str.slice(0,str.length-1);
    console.log(str);
    $(el).text(str);
  }

  $(window).resize(function(){
    if($(window).width() >= 769) {
      // do something
    } else {
      // smaller
      
    }
  }).resize();



  
});