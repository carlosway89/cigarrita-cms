define([
    'text!/templates/[[name]].hbs'
],
    function(tmpl) {
        return Backbone.View.extend({
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
