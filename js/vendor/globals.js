define([
    'config'
], function(config) {
    var Globals = {
    };
    _.extend(Globals, config);
    return Globals;
});