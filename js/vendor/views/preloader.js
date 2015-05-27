define([
    'text!/templates/preloader.php',
    'beans',
    'models/parse',
    'collections/parse',
    'channel'
],
    function(tmpl,Beans,ParseModel,ParseCollection,Channel) {
        return Backbone.View.extend({
            beans: new Beans,
            debug: false,
            template: Handlebars.compile(tmpl),
            events: {
            },
            initialize: function() {
            },
            render: function() {
                this.$el.html( Handlebars.compile( tmpl)(this));
                return this;
            }
        });
    }
);