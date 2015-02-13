jQuery(function($){

  $(document).ready(function(){
    console.log($('#desktop-site-navigation').innerWidth());
  });

  $('.menu-item-divider, .menu-item-divider > a').css({'height':$('.before-divider').height()});

  $('.sub-nav > dd').click(function(){
    $(this).toggleClass('active');
    $(this).siblings().removeClass('active');
  });

  $('#news-menu').width($('#content').width());

  $('ul.dropdown').css({'width':($('.desktop-header-wrapper').innerWidth())+'px'});

  $('.news > a').attr('data-dropdown','news-drop');
  $('.news > .dropdown').attr('id','news-drop');

/*
  // free wall news feed
  if($('.home')){
    var temp = "<div class='news-item brick' style='width:{width}px;'></div>";
    var w = 1, h = 1, html = '', limitItem = 49;
    for (var i = 0; i < limitItem; ++i) {
      w = 1 + 3 * Math.random() << 0;
      html += temp.replace(/\{width\}/g, w*150).replace("{index}", i + 1);
    }
    $("#container").html(html);
    
    var wall = new freewall("#container");
    wall.reset({
      selector: '.brick',
      animate: true,
      cellW: 150,
      cellH: 'auto',
      onResize: function() {
        wall.fitWidth();
      }
    });

    var images = wall.container.find('.brick');
    images.find('img').load(function() {
      wall.fitWidth();
    });
  } else {
    return;
  }
*/
  
});