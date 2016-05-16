.directive('languageSelect',[ '$parse','$rootScope','$window','Model',function($parse,$rootScope,$window,Model){ //Step 1

    return {
          // require : 'ngModel',            //Step 2
          link: function (scope, element, attrs, ngModel) {

              
                $("#language_option").val(beans.readCookie('language.initial'));
                setTimeout(function(){
                  $(element).dropdown();                 
                },300);

                $(element).on('change',function(event){
                    var value=$(element).find('input').val();
                    beans.createCookie('language.initial',value,10); 
                    setTimeout(function(){
                       $window.location.reload();
                    },100);                   
                    //$rootScope.$broadcast('language.changed');                   
                });
              
          }
    };
}])