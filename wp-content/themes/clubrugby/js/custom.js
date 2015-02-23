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

  news.addClass('button-group even-4');
  clubs.addClass('button-group even-4');
  schedules.addClass('button-group even-5');
  standings.addClass('button-group even-4');
  stats.addClass('button-group even-4');
  champs.addClass('button-group even-5');
  social.addClass('button-group even-4');
  admin.addClass('button-group even-4');
  resources.addClass('button-group even-5');
  about.addClass('button-group even-5');


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

  $('ul#site-menu ul.menu.dropdown').css({'width':$('.top-bar-section').width()+'px'});
  $('ul#site-menu').children('li').children('.menu-image-title-after').append('<i class="fa fa-sort-desc"></i>');
  $('a.menu-image-title-after').css({'font-size':($('ul#site-menu > li.menu-item').css('font-size'))});
  $('li.menu-item').addClass('button');

  $('.has-dropdown').click(function(){
    $(this).toggleClass('open');
    $(this).children('a').toggleClass('hover');
    $(this).children('ul').toggleClass('active');
    $(this).siblings('.open').removeClass('open');
    $(this).siblings().children('.hover').removeClass('hover');
    $(this).siblings().children('.active').removeClass('active');
  });
  $('.has-dropdown').focusout(function(){
    $(this).removeClass('open');
    $(this).children('a').removeClass('hover');
    $(this).children('ul').removeClass('active');
  });


// FIRE WHEN DOCUMENT'S READY
  $(document).ready(function(){
    
    removeComma($('#about .no-bullet > li:last-child > span'));

    $('.main-navigation').fadeIn('slow');  

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
        triggerMasonry();
      });
// trigger masonry when fonts have loaded
      Typekit.load({
        active: triggerMasonry,
        inactive: triggerMasonry,
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

  $('#mobile-header #mobile-site-menu .has-dropdown').addClass('has-submenu').removeClass('has-dropdown');
  $('#mobile-header .has-submenu .dropdown').addClass('left-submenu').removeClass('dropdown');
  $('#mobile-header .has-submenu a').click(function(){
    $('.left-submenu').toggleClass('move-right');
  });
  $('.left-submenu').append('<li class="back"><a href="#"><i class="fa fa-angle-double-left"></i>Back</a></li>');

  //$('.menu-item-divider, .menu-item-divider > a').css({'height':$('.before-divider').height()});

  $('.sub-nav > dd').click(function(){
    $(this).toggleClass('active');
    $(this).siblings().removeClass('active');
  });

  $('#news-menu').width($('#content').width());

  $('.news > a').attr('data-dropdown','news-drop');
  $('.news > .dropdown').attr('id','news-drop');

  $('#news .searchandfilter > div > ul').addClass('stack-for-small button-group even-6');

  $('#about li div.text-center').css({'width':$(this).siblings('strong').innerWidth()+'px'});

  $('#masthead').fadeIn(1500);

// UTILITY FUNCTIONS
  function removeComma(el){
    var str = $(el).text();
    str = str.slice(0,str.length-1);
    $(el).text(str);
  }

// RESPONSIVE CONFIGS
  $(window).resize(function(){
    if($(window).width() > 892) {
// Home Page News Tweaks
      if($('#site-menu > .menu-item > a').innerWidth() >= 83){
        $('#site-menu > .menu-item > a').css('font-size','0.9rem');
      }
      if($('.home h4.news-item-metadata').innerWidth() >= 270){
        $('.home h4.news-item-metadata').css('font-size','1.25rem');
      }
   
    } else {
// smaller

    }
  }).resize();
  
});