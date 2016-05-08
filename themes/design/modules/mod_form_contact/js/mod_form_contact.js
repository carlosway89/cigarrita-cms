.directive('elementForm', [ '$compile','$rootScope','Model',function ($compile,$rootScope,Model) {
  return {
    link: function (scope, element, attrs) {
      
      setTimeout(function(){
        element.append('<div id="alert-msg" class="alert alert-success" style="display:none;margin-top: 20px;background-color: rgba(223, 240, 216, 0.57);color: rgb(21, 42, 22);" >Your message has been successfully sent</div>');

        element.find('form').submit(function(event){
          event.preventDefault();
          var target=element.find('form');
          
          var data = {};
          var msg="";
          target.find('input,textarea').each(function(){

              data[ $(this).attr('id')] = $(this).val();              
              msg=msg + $(this).attr('id')+" : "+$(this).val()+"\n\n";
              $(this).val('');

          });
          console.log(data);

          var contact_model={
            email:data['email'],
            subject:msg
          }

          setTimeout(function(){
            //$("#alert-msg").fadeOut(3000);
            //$rootScope.$broadcast('form.contact.saving',contact_model);
            var record = new Model({
                model:'formContact'
            });
            
            var alert=$('#alert-msg');
            // console.log(contact_model);
            record = $.extend(record, contact_model);
            record.$save(function(record){

              alert.fadeOut();
              setTimeout(function(){
                  alert.fadeIn();
              },1000);
              // console.log(record);

            });
          },300);

          
        });

      });


    }
  };
}])