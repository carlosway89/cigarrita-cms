define(['models/model'],function (Model) {
    return Backbone.Collection.extend({
        url: function(){
            return 'api/flag';
        },
        limit: 0,
        model: Model,
        defaults: {
            id: 1
        },
        initialize: function(){

        }
    });
});