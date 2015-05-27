define(['models/model'],function (Model) {
    return Backbone.Collection.extend({
        url: function(){
          
          var query=this.where?"/"+this.where:'';
          query+=this.like?"/"+this.like+'_like':'';
          query+=this.attribute?"/"+this.attribute:'';
          var _model=this.modelo;

            return 'api/index/'+_model+query;
        },
        limit: 0,
        model: Model,
        modelo:'',
        where:'',
        attribute:'',
        like:'',
        defaults: {
            id: 1
        },
        initialize: function(options){

          this.where= options?(options.where?options.where:''):'';
          this.attribute= options?(options.attribute?options.attribute:''):'';
          this.like=options?(options.like?options.like:''):'';
          this.modelo=options?(options.modelo?options.modelo:''):'';

        }
    });
});