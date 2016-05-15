.directive('languageSelect',[ '$parse','$rootScope','Model',function($parse,$rootScope,Model){ //Step 1

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
                    $rootScope.$broadcast('language.changed');                   
                });
              
          }
    };
}])