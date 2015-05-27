/********** PARSE API ACCESS CREDENTIALS **********/

var application_id = "3M2CeciSh31cERvK8OhYFzNnWZEAx5NL6X8hmZ6J";
var rest_api_key = "idSIqXKZ6FGj2OmLaKf4zon7arSmscqx2u1pinnW";
var api_version = "1";

/******************* END *************************/

(function() {

    /*
     Replace the toJSON method of Backbone.Model with our version

     This method removes the "createdAt" and "updatedAt" keys from the JSON version
     because otherwise the PUT requests to Parse fails.
     */
    var original_toJSON =Backbone.Model.prototype.toJSON;
    var ParseModel = {
        toJSON : function(options) {
            _parse_class_name = this.__proto__._parse_class_name;
            data = original_toJSON.call(this,options);
            delete data.createdAt
            delete data.updatedAt
            return data
        },

        idAttribute: "objectId"
    };
    _.extend(Backbone.Model.prototype, ParseModel);

    /*
     Replace the parse method of Backbone.Collection

     Backbone Collection expects to get a JSON array when fetching.
     Parse returns a JSON object with key "results" and value being the array.
     */
    original_parse =Backbone.Collection.prototype.parse;
    var ParseCollection = {
        parse : function(options) {
            _parse_class_name = this.__proto__._parse_class_name;
            data = original_parse.call(this,options);
            if (_parse_class_name && data.results) {
                //do your thing
                return data.results;
            }
            else {
                //return original
                return data;
            }
        }
    };
    _.extend(Backbone.Collection.prototype, ParseCollection);

    /*
     Method to HTTP Type Map
     */
    var methodMap = {
        'create': 'POST',
        'update': 'PUT',
        'delete': 'DELETE',
        'read':   'GET'
    };

    /*
     Override the default Backbone.sync
     */
    var ajaxSync = Backbone.sync;
    Backbone.sync = function(method, model, options) {

        var debug = false;

        if ( debug ) {
            console.log('backbone-parse: Model include is '+ model._include);
        }


        var object_id = model.models? "" : model.id; //get id if it is not a Backbone Collection


//        var class_name = model.__proto__._parse_class_name;
        var class_name = model._parse_class_name;
        if (!class_name) {
            return ajaxSync(method, model, options) //It's a not a Parse-backed model, use default sync
        }

        // create request parameteres
        var type = methodMap[method];
        options || (options = {});
        var base_url = "https://api.parse.com/" + api_version;

        var url = base_url + "/";

        /**
         * Construct the URL based on the classname
         */
        switch ( class_name){
            case 'PasswordReset':
                url = url + 'requestPasswordReset';
            break;
            case 'User':
                url = url +'users';
            break;
            case '__myself__':
                url = url + 'users/me';
            break;
            default:
                url = url + 'classes/'+ class_name;
            break;

        }
        url = url + '/';

        /**
         * Add the Object Id when appropriate
         */
        if (method != "create" && object_id ) {
            url = url + object_id;
        }

        //Setup data
        var data ;

        /**
         * Options for retrieve
         */
        if ( !options.data && model && method=='read'){

            if ( model._include){

                data = encodeURI('include='+model._include);

            }

        }

        if (!options.data && model && (method == 'create' || method == 'update')) {
            data = JSON.stringify(model.toJSON());
        }
        else if (options.query && method == "read") { //query for Parse.com objects
            data = encodeURI("where=" + JSON.stringify(options.query));
        }

        if ( model._limit ){

            data = (data &&data.length)?data+'&limit='+model._limit:'limit='+model._limit;

        }

        if ( model._skip ){

            data = (data &&data.length)?data+'&skip='+model._skip:'skip='+model._skip;

        }

        if ( model._sort ){

            data = (data &&data.length)?data+'&order='+model._sort:'order='+model._sort;

        }


        if ( model._where ){

            data = (data && data.length)?data+'&where='+JSON.stringify(model._where):'where='+JSON.stringify(model._where);
        } 

        if (model._startsWith){

            data = (data && data.length)?data+'&startsWith='+JSON.stringify(model._startsWith):'startsWith='+JSON.stringify(model._startsWith);
        }
        
        if (model._notEqualTo){

            data = (data && data.length)?data+'&notEqualTo='+JSON.stringify(model._notEqualTo):'notEqualTo='+JSON.stringify(model._notEqualTo);
        
        }

        var request = {
            //data
            contentType: "application/json",
            processData: false,
            dataType: 'json',
            data: data,

            //action
            url: url,
            type: type,

            //authentication
            headers: {
                "X-Parse-Application-Id": application_id,
                "X-Parse-REST-API-Key": rest_api_key
            }

        };
        /**
         * Add session token when appropriate
         */
        if (class_name == '__myself__' || class_name == 'User')
            request.headers['X-Parse-Session-Token'] = model._session_token;

        if ( debug ) console.log(request);

        return $.ajax(_.extend(options, request));
    };

})();