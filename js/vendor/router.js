 define([
     'beans',
     'channel'
     ], function(
        Beans,
        Channel
     ){
        var AppRouter = Backbone.Router.extend({
            beans: new Beans,
            debug: true,
            routes: {
               'services':'services',
               'projects':'projects',
               'contact':'contact',
               'about':'about',
               'principal':'principal',
               'blog':'blog',
                  /*panel url*/
                'languages':'languages',
                'messages':'messages',
                'pages':'pages'
            },
            services: function(){

              var item='services';
              this.scroller(item);              
            },
            projects: function(){

              var item='projects';
              this.scroller(item);              
            },
            contact: function(){

              var item='contact';
              this.scroller(item);              
            },
            about: function(){

              var item='about';
              this.scroller(item);              
            },
            principal: function(){

              var item='principal';
              this.scroller(item);              
            },
            blog: function(){

              var item='blog';
              this.set_page(item);              
            },
            /*view called*/
            languages:function(){

              var item='languages';
              this.set_active(item);
              this.set_view('language');

            },
            messages:function(){

              var item='messages';
              this.set_active(item);
              this.set_view('form');

            },
            pages:function(){
              var item='pages';
              this.set_active(item);
              this.set_content('content');
            },
            set_page:function(item){
              $('.content').addClass('mode-external');
              $('#'+item).css('display','block');

              $('.header-options a').removeClass('active');

              var target=$('.header-options').find("a[href^='/"+item+"']");
                 
              target.addClass('active');

            },
            set_view:function(item){

              console.log('set view',item);

              require(['views/tablas'],function(View){

                $('.panel-content').empty();
                $('.panel-content').addClass('ui button loading ');

                var view=new View({
                  el:$('.panel-content')
                });

                view.show_items(item);

              });

            },
            set_content:function(item){

              console.log('set content',item);

              require(['views/tablas'],function(View){

                $('.panel-content').empty();
                $('.panel-content').addClass('ui button loading ');

                var view=new View({
                  el:$('.panel-content')
                });

                view.show_content();

              });

            },
            set_active:function(item){
              $('.list-menu.panels').find("li").removeClass('active');
              var ancle=$('.list-menu.panels').find("a[href^='#"+item+"']");
              ancle.parent().addClass('active');
            },
            scroller:function (item) {
                // var cant=$('#content_page').length();
                // console.log(cant);
                $('.content').removeClass('mode-external');

                 $('.header-options a').removeClass('active');
                 $('.external').css('display','none');
                 // console.log('pushsate',item);
                 var target=$('.header-options').find("a[href^='/"+item+"']");
                 
                  target.addClass('active');
                  var link_href=target.attr('href');

                  if (link_href!=undefined) {

                    link_href=link_href.replace('/','');
                    // console.log(link_href);
                    var div_target =$('#'+link_href);

                    // $('body,html').animate({  
                    //     scrollTop: (div_target.offset().top-100)
                    // }, 1000);
                    console.log($('#navegador').height());

                    $('html, body').stop().animate({
                        scrollTop: div_target.offset().top - $('#navegador').height()
                    }, 1500);

                  };
            }   
        });
        var initialize = function(){
                /**
                 * Now that we've loaded both APIs, we can proceed to begin routing...
                 */
                var app_router = new AppRouter;

                // route somewhere
              Channel.on('navigate.to',function(route){
                  console.log('navigate');
                  app_router.navigate(route, {trigger: true});

              });

                app_router.on('route:defaultAction', function(actions){
                    /**
                     * We don't know this view, so show a 404
                     */
                    require(['views/four-oh-four'],function(FourOhFour){

                        var $div = $('div.view-container');
                        $div.addClass( 'container-message container');

                        new FourOhFour({
                            el: $div
                        });
                    });
                });
                /**
                 * Set default route
                 */
                // if ( ! window.location.hash.length ) window.location.hash = '#welcome';
                Channel.on('menu.list.loaded',function(){
                  setTimeout(function(){
                    // Backbone.history.start();
                    Backbone.history.start({
                        pushState: true
                    });
                  },200);

                });


                Channel.on('panel.loaded',function(){
                    // console.log('backbone hashtag');
                    if ( ! window.location.hash.length && window.location.pathname!='/login') window.location.hash = '#pages';
                    Backbone.history.start();
                });



     };
 return {
     initialize: initialize
    };
 });
