
/**
 * configure required libraries
 */
require.onError = function (err) {
    if (err.requireType === 'timeout') {
        // tell user
        console.log("error: "+err);
    } else {
        throw err;
        console.log(err);
    }
 };
require.config({
    urlArgs: "bust=" + (new Date()).getTime(),
    waitSeconds: 30,
    baseUrl: 'js/vendor',
    paths: {
        "templates": "../../templates"
    }
});

// load app with requirements
require([
    // Load our app module and pass it to our definition function
    'app'
 ], function(App){
    // The "app" dependency is passed in as "App"
    App.initialize();
});


