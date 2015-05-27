define([
     'router',
     'globals',
     'beans',
     'channel'
    ], function(AppRouter,Globals,Beans,Channel){
        
        var fadeDuration=1000;
        var fadeDuration1=1000;
        var slideDuration=7000;
        var currentIndex=1;
        var nextIndex=1;

    var nextSlide=function(){

          nextIndex =currentIndex+1;

          if(nextIndex > $('#principal .transito').length)
          {
            nextIndex =1;
          }
          $('#principal .transito:nth-child('+nextIndex+')').show().animate({opacity: 1.0}, fadeDuration);
          $('#principal .transito:nth-child('+nextIndex+') h1').transition('bounce');
          $('#principal .transito:nth-child('+nextIndex+') img').transition('pulse');
          $('#principal .transito:nth-child('+currentIndex+')').animate({opacity: 0.0}, fadeDuration).hide();
          currentIndex = nextIndex;

    };

    var website_call=function(){

      var that=this;

      var beans=new Beans();       

        require(['views/post','collections/content','views/menu'],function(Post,Content,Menu){
            
            var view=$('.header-options');

            that.content=new Content({
              where:[
                'language',
                'estado'      
              ],
              attribute:[
                beans.readCookie('language.choice')?beans.readCookie('language.choice'):beans.readCookie('language.initial'),
                1     
              ]
            });

            that.content.fetch({
              success:function(model,result){

                var menu=new Menu({
                    el:view,
                    model:model
                });

                menu.menu_site();

                $.each(model.models,function(item,model){
                  setTimeout(function(){
                    var view=$('#'+model.attributes.content[0].template);    

                    var post=new Post({
                        el:view
                    });
                    post.call_post(model.attributes.content[0]);
                  },100);
                });

              }
            });
           
            
        });
    };

    var language_call=function(){

      require(['collections/collection'],function(contentCollection){
          
              collection = new contentCollection({
                  modelo:'language',
                  where:'estado',
                  attribute:1
                });

                collection.fetch({
                  success: function(model,result,options){
                    setTimeout(function(){
                      var view=$('.menu.laguage-select');
                      view.empty();
                      $.each(model.models,function(item,model){
                        view.append('<div class="item" data-value="'+model.attributes.min+'"><i class="flag-icon-'+model.attributes.flag+' flag-icon"></i> '+model.attributes.name+'</div>');

                      }); 
                      $('.ui.dropdown').dropdown();

                    },200);
                  },
                  error: function(model,xhr,options){
                    console.log(xhr);
                    language_call();
                  }
                });
          });

    };

    var initialize = function(){
         var beans = new Beans;
         var debug = false;
         var $this = this;
         var that=this;

         console.clear();

         beans.createCookie('language.initial','en',10);

        $(document).on('click',"a[href^='/']",function(event){

             var href = $(event.currentTarget).attr('href');

             //chain 'or's for other black list routes
             var passThrough = href.indexOf('logout') >= 0;

             //Allow shift+click for new tabs, etc.
             if ( !passThrough && !event.altKey && !event.ctrlKey && !event.metaKey && !event.shiftKey)

                 event.preventDefault();

             // Remove leading slashes and hash bangs (backward compatablility)
             var url = href.replace(/^\//,'').replace('\#\!\/','');

             console.log(url);

             // Instruct Backbone to trigger routing events
             Channel.trigger('navigate.to',url);

             return false;

         });

        $('#language_option').on('change',function(event){
            var target=$(event.currentTarget);
            var value=target.val();
            beans.createCookie('language.choice',value,10);
            console.clear();
            Backbone.history.stop();
            currentIndex=1;
            nextIndex=1;            
            setTimeout(function(){
              website_call();
            },100);
        });

        var path=window.location.pathname;
        // console.log(path);
        if (path!='/panel' && path!='/login') {
          website_call();
          language_call();

        }else{
          console.log('cargo channel');
          setTimeout(function(){
            Channel.trigger('panel.loaded');
          },300);
          
        }

        $(document).ready(function() {

            Channel.on('principal.loaded',function(){
                setTimeout(function(){
                    $('#principal .transito').css({opacity: 0.0});
                    $('#principal .transito:nth-child('+nextIndex+')').show().animate({opacity: 1.0}, fadeDuration1);
                    $('#principal .transito:nth-child('+nextIndex+') h1').transition('bounce');
                    $('#principal .transito:nth-child('+nextIndex+') img').transition('pulse');
                    var timer = setInterval(nextSlide,slideDuration);
                },200);   
            });

        });

        WebFont.load({
          google: {
            families: ["Lato:100,100italic,300,300italic,400,400italic,700,700italic,900,900italic","Great Vibes:400","Open Sans:300,400,600,700,800"]
          }
        });

        $('.ui.dropdown').dropdown();

        AppRouter.initialize();       
        
    };
     return {
         initialize: initialize
     };
     // What we return here will be used by other modules
});