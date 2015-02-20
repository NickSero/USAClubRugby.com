jQuery(function($){

  // MAIN MENU FUNCTIONALITY
  var news = $('#menu-news-menu'),
      clubs = $('#menu-clubs-menu'),
      schedules = $('#menu-schedules-menu'),
      standings = $('#menu-standings-menu'),
      stats = $('#menu-statistics-menu'),
      champs = $('#menu-championships-menu'),
      social = $('#menu-social-hub-menu'),
      admin = $('#menu-administration-menu'),
      resources = $('#menu-resources'),
      about = $('#menu-about-menu');

  function resetMenus(k,v){
    if(v){
      v.addClass('dropdown').attr('data-dropdown-content');
      $('li.'+k).addClass('has-dropdown not-click').append(v);
      $('li.'+k).children('a[title]').attr({'data-dropdown':'menu-'+k+'-menu'});
    }
  }
  resetMenus('news',news);
  resetMenus('clubs',clubs);
  resetMenus('schedules',schedules);
  resetMenus('standings',standings);
  resetMenus('statistics',stats);
  resetMenus('championships',champs);
  resetMenus('social',social);
  resetMenus('administration',admin);
  resetMenus('resources',resources);
  resetMenus('about',about);
  
  $('a[title="Resources"]').attr('data-dropdown','menu-resources');
  $('a[title="Social Hub"]').attr('data-dropdown','menu-social-hub-menu');


  $(document).ready(function(){
    
    removeComma($('#about .no-bullet > li:last-child > span'));

    if($('.home')){

      // MASONRY HOME NEWS FEED
      var $container = $('#container');
      function triggerMasonry() {
        // don't proceed if $container has not been selected
        if ( !$container ) {
          return;
        }
        // init Masonry
        $container.masonry({
          itemSelector: '.brick'
        });
      }
      // trigger masonry on document ready
      $(function(){
        $container = $('#container');
        triggerMasonry();
      });
      // trigger masonry when fonts have loaded
      Typekit.load({
        active: triggerMasonry,
        inactive: triggerMasonry
      });

    }

    $(window).bind('scroll',function(){
      if($(window).scrollTop() = 107){
        $('#news-menu').addClass('fixed').css('position','fixed');
        var filter = $('dl.sub-nav');
        var sticky = $('<div class="contain-to-grid sticky"></div>');
        sticky.append(filter.attr('data-options','sticky_on: large'));
      }
    });

  });


  $('#mobile-menu-button').click(function(){
    $(this).addClass('active');
  });
  $('.exit-off-canvas').click(function(){
    $('#mobile-menu-button').removeClass('active');
  });

  $('#mobile-site-navigation #menu-item-70').remove();

  $('ul#site-menu ul.dropdown').css({'width':$('.top-bar-section').width()+'px'});
  $('.dropdown').hover(function(){
    $(this).toggleClass('open');
    $(this).siblings('a').toggleClass('hover');
  });

  $('.menu-item-divider, .menu-item-divider > a').css({'height':$('.before-divider').height()});

  $('.sub-nav > dd').click(function(){
    $(this).toggleClass('active');
    $(this).siblings().removeClass('active');
  });

  $('#news-menu').width($('#content').width());

  $('.news > a').attr('data-dropdown','news-drop');
  $('.news > .dropdown').attr('id','news-drop');

  $('#about li div.text-center').css({'width':$(this).siblings('strong').innerWidth()+'px'});


  // UTILITY FUNCTIONS
  function removeComma(el){
    var str = $(el).text();
    str = str.slice(0,str.length-1);
    console.log(str);
    $(el).text(str);
  }

  $(window).resize(function(){
    if($(window).width() < 1440) {
      
      // Home Page News Tweaks
      if($('#site-menu > .menu-item > a').innerWidth() >= 83){
        $('#site-menu > .menu-item > a').css('font-size','0.529999rem');
      }
      if($('.home h4.news-item-metadata').innerWidth() >= 270){
        $('.home h4.news-item-metadata').css('font-size','1.25rem');
      }
   
    } else {
      // smaller
      
    }
  }).resize();

// FITTEXT FOR HEADERS
  $('h1').fitText();


  
});