jQuery(function($){

  $(document).foundation();

  FastClick.attach(document.body);

// MAIN MENU FUNCTIONALITY
/*
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

  $('#site-menu .news > .dropdown').attr('id','menu-news-menu').addClass('button-group even-4');
  $('#site-menu .clubs > .dropdown').attr('id','menu-clubs-menu').addClass('button-group even-4');
  $('#site-menu .schedules > .dropdown').attr('id','menu-schedules-menu').addClass('button-group even-5');
  $('#site-menu .standings > .dropdown').attr('id','menu-standings-menu').addClass('button-group even-4');
  $('#site-menu .statistics > .dropdown').attr('id','menu-statistics-menu').addClass('button-group even-4');
  $('#site-menu .championships > .dropdown').attr('id','menu-championships-menu').addClass('button-group even-5');
  $('#site-menu .social > .dropdown').attr('id','menu-social-menu').addClass('button-group even-4');

  news.addClass('button-group even-4');
  admin.addClass('button-group even-4');
  resources.addClass('button-group even-5');
  about.addClass('button-group even-5');


  function resetMenus(k,v){
    if(v){
      v.addClass('dropdown').attr('data-dropdown-content');
      $('li.'+k).addClass('has-dropdown').append(v);
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
  //$('a.menu-image-title-after').css({'font-size':($('ul#site-menu > li.menu-item').css('font-size'))});
  $('li.menu-item').addClass('button');

  $('header').click(function(){$(this).toggleClass('active')});
  $('.has-dropdown').click(function(){
    $(this).toggleClass('open');
    $(this).children('a').toggleClass('hover');
    $(this).children('ul').toggleClass('active');
    $(this).siblings('.open').removeClass('open');
    $(this).siblings().children('.hover').removeClass('hover');
    $(this).siblings().children('.active').removeClass('active');
  });

  $('#content-wrapper').click(function(){
    $('.open').removeClass('open');
    $('#site-menu li').children('a').removeClass('hover');
    $('#site-menu li').children('ul').removeClass('active');
  });
*/
  $('.page-footer .left > a').addClass('red-button');
  $('.page-footer .right.previous > a').addClass('red-button');


// UNIVERSAL SIZING
  var fullWidth = $(window).width();
  var viewHeight = $(window).height();


  $(window).bind("scroll",function(){
    if($(window).scrollTop() >= 1){
      $('#news-menu').addClass('fixed').css({'top':'137px'});
      $('#news-menu .sub-nav').css('width',fullWidth);
      var filter = $('dl.sub-nav');
      var sticky = $('<div class="contain-to-grid sticky"></div>');
      sticky.append(filter.attr('data-options','sticky_on: large'));
    } else {
      $('#news-menu').removeClass('fixed');
    }
  });

  $('.mega-menu-toggle').addClass('.mega-menu-open').removeClass('mega-menu-toggle');
  $('#mobile-menu-button').click(function(){
    $(this).addClass('active');
    $('body').addClass('overflow-hidden');
  });
  $('.exit-off-canvas').click(function(){
    $('#mobile-menu-button').removeClass('active');
    $('body').removeClass('overflow-hidden');
    $('#masthead').css('top',0);
  });

  $('#mobile-site-navigation').css({'height':viewHeight});
  

// FIRE WHEN DOCUMENT'S READY
  $(document).ready(function(){

    if($(window).width() < 893){
      $('body').addClass('mobile-view').removeClass('desktop-view');
    }
    else if($(window).width() >= 893){
      $('body').addClass('desktop-view').removeClass('mobile-view');
    }

    $('div[class=".mega-menu-open"]').remove();
    $('#mega-menu-main > li').addClass('mega-menu-columns-1-of-10');
    $('#mega-menu-main > li > .mega-sub-menu').css({'width':$('#nav-menu').width()});
    $('#site-map > li').addClass('small-12');
    $('#site-map > li > a').addClass('top-link');

    $('#mega-menu-main > li.mega-menu-item > a').fitText(1,{minFontSize:'6.3px',maxFontSize:'12.6px'});
    $('h2.news-article-title').fitText();
    $('#featured-matches > h1').fitText(1.9);
    $('#latest-news-headlines > h1').fitText(1.9);
    $('footer#footer > .column > p').fitText(2, {minFontSize:'17px', maxFontSize:'17px'});

    removeComma($('#about .no-bullet > li:last-child > span'));

    $('#freewall').fadeIn('slow');

    if($('.home')){
// MASONRY HOME NEWS FEED
      var $container;
      function triggerMasonry() {
// don't proceed if $container has not been selected
        if ( !$container ) {
          return;
        }
// init Masonry
        $container.masonry({
          itemSelector: '.brick'
        });
        $container.fadeIn();
      }
// trigger masonry on document ready
      $(function(){
        $container = $('#freewall');
        triggerMasonry();
      });
      $(function(){
        $container = $('#freewall').masonry();
        $container.imagesLoaded(function(){
          $container.masonry();
        });
      });
// trigger masonry when fonts have loaded
      Typekit.load({
        active: triggerMasonry,
        inactive: triggerMasonry
      });

    }

  });

  $('#mobile-site-navigation #menu-item-70').remove();

  $('#mobile-header #mobile-site-menu .has-dropdown').addClass('has-submenu').removeClass('has-dropdown');
  $('#mobile-header .has-submenu .dropdown').addClass('left-submenu').removeClass('dropdown');
  $('#mobile-header .has-submenu a').click(function(){
    $('.left-submenu').toggleClass('move-right');
  });
  $('.left-submenu').append('<li class="back"><a href="#"><i class="fa fa-angle-double-left"></i>Back</a></li>');

  $('.sub-nav > dd').click(function(){
    $(this).toggleClass('active');
    $(this).siblings().removeClass('active');
  });

  $('#news-menu').width($('#content').width());

  $('.news > a').attr('data-dropdown','news-drop');
  $('.news > .dropdown').attr('id','news-drop');

  $('#news .searchandfilter > div > ul').addClass('stack-for-small button-group even-6');

  $('#about li div.text-center').css({'width':$(this).siblings('strong').innerWidth()+'px'});

  $('body').fadeIn(2500);

// UTILITY FUNCTIONS
  function removeComma(el){
    var str = $(el).text();
    str = str.slice(0,str.length-1);
    $(el).text(str);
  }
  var getTextNodesIn = function(el) {
    return $(el).find(":not(iframe)").addBack().contents().filter(function(){
        return this.nodeType == 3;
    });
  };



// DYNAMIC MARGIN ADJUSTMENT
  $('main#content').css({'margin-top':$('#masthead').height()});
  var rsHeight = $('#headlines .rsContainer').height();
  $('.home #headlines .rsTabs').css({'margin-top':rsHeight});



  // slider
  $('.widget.new_royalslider_widget').addClass('small-12 medium-12 large-7 left');
  var rsWidth = $('.desktop-view #new-royalslider-1').width()-1+'px';
  
  setTimeout(function(){$('.desktop-view #new-royalslider-1 .rsOverflow').css({'width':rsWidth});},1);

  var iconHeight = $('small').css('font-size');
  $('.rsGCaption > .caption > h1.columns:last-child small .fa').css({'font-size':iconHeight});
  $('.rsGCaption > .caption > h1.columns:first-child').fitText(2);
  $('#headlines .rsTmb').fitText(1,{minFontSize:'11.25px'});

  $('img[alt="Capital GU"]').addClass('tall');
  var headerHeight = document.getElementsByClassName('site-branding').offsetHeight;
  $('#mobile-header #logo-holder img').css({'height':headerHeight+'px'});




// RESPONSIVE CONFIGS
  $(window).resize(function(){
    $('main#content').css({'margin-top':$('#masthead').height()});
    
    $('#mega-menu-main > li > .mega-sub-menu').css({'width':$('#nav-menu').width()});
    
    $('.home #headlines .rsTabs').css({'margin-top':rsHeight});

    $('.rsGCaption > .caption > h1.columns:first-child').fitText(2);

    if($(window).width() > 892) {
      $('body').addClass('mobile-view');
      if($('.home h4.news-item-metadata').innerWidth() >= 270){
        $('.home h4.news-item-metadata').css('font-size','1.25rem');
      }
      $('#featured-matches > h1').fitText(1.9);
      $('#latest-news-headlines > h1').fitText(1.9);
      $('footer#footer > .column > p').fitText(2, {minFontSize:'17px', maxFontSize:'17px'});
    }
    else {
      $('body').removeClass('mobile-view');
      $('#featured-matches > h1').fitText(1.9);
      $('#latest-news-headlines > h1').fitText(1.9);
      $('footer#footer > .column > p').fitText(2, {minFontSize:'17px', maxFontSize:'17px'});
    }
  }).resize();

});






/* ------------------------------------------------------------------------
  Usage: $(node).shortNumber(4711) sets the contents of `node` (to "4.7k")
         $(node).shortNumber() reads that actual number back from the node

  If you want to pre-shorten some DOM node with a value on the server side,
  be sure to set the data-shortnumber="4711" or whatever number on it, too:

  Likes: <span data-shortnumber="<% _num %>"><% short_number _num %></span>

  (To just format arbitrary numbers to tiny strings use shortNumber(4711).)
---------------------------------------------------------------------------- */

(function(global, $) {
  var name = 'shortNumber';
  global[name] = shortenNumber;
 
  $.fn[name] = function(set_to) {
    return set_to != null ? this.text(shortenNumber(set_to)).data(name, set_to)
                          : this.data(name) || +/\d+/.exec(this.text());
  };
 
  name = name.toLowerCase(); // using lowercase data attributes dodges problems
 
  // shortenNumber(n): fit integers in 4 chars w/SI suffixes (5 for negatives)
  // 1 000..9 999 => 1k..9.9k;         10 000..999 999 => 10k..999k;
  // 1 000 000..9 999 999 => 1M..9.9M; 10 000 000..999 999 999 => 10M..999M; ...
  function shortenNumber(n) {
    if ('number' !== typeof n) n = Number(n);
    var sgn      = n < 0 ? '-' : ''
      , suffixes = ['k', 'M', 'G', 'T', 'P', 'E', 'Z', 'Y']
      , overflow = Math.pow(10, suffixes.length * 3 + 3)
      , suffix, digits;
    n = Math.abs(Math.round(n));
    if (n < 1000) return sgn + n;
    if (n >= 1e100) return sgn + 'many';
    if (n >= overflow) return (sgn + n).replace(/(\.\d*)?e\+?/i, 'e'); // 1e24
 
    do {
      n      = Math.floor(n);
      suffix = suffixes.shift();
      digits = n % 1e6;
      n      = n / 1000;
      if (n >= 1000) continue; // 1M onwards: get them in the next iteration
      if (n >= 10 && n < 1000 // 10k ... 999k
       || (n < 10 && (digits % 1000) < 100) // Xk (X000 ... X099)
         )
        return sgn + Math.floor(n) + suffix;
      return (sgn + n).replace(/(\.\d).*/, '$1') + suffix; // #.#k
    } while (suffixes.length)
    return sgn + 'many';
  }
})(this, jQuery);