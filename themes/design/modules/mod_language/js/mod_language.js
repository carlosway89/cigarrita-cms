.directive('elementObject',function($parse,$rootScope){ 
    return {
          link: function (scope, element, attrs, ngModel) {
            console.log("soy una directiva");
              
          }
    }
})