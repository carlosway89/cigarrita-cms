var fadeDuration=1000;
        var fadeDuration1=1000;
        var slideDuration=7000;
        var currentIndex=1;
        var nextIndex=1;

    var nextSlide=function(){

          nextIndex =currentIndex+1;

          if(nextIndex > $('#principal_background .transito').length)
          {
            nextIndex =1;
          }
          $('#principal_background .transito:nth-child('+nextIndex+')').show().animate({opacity: 1.0}, fadeDuration);
          $('#principal_background .transito:nth-child('+nextIndex+') h1').transition('bounce');
          $('#principal_background .transito:nth-child('+nextIndex+') img').transition('pulse');
          $('#principal_background .transito:nth-child('+currentIndex+')').animate({opacity: 0.0}, fadeDuration).hide();
          currentIndex = nextIndex;

    };

     $('#principal_background .transito').css({opacity: 0.0});
      $('#principal_background .transito:nth-child('+nextIndex+')').show().animate({opacity: 1.0}, fadeDuration1);
      $('#principal_background .transito:nth-child('+nextIndex+') h1').transition('bounce');
      $('#principal_background .transito:nth-child('+nextIndex+') img').transition('pulse');
      var timer = setInterval(nextSlide,slideDuration);