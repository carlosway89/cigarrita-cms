'use strict';

/* Services */

var cigarritaServices = angular.module('cigarritaServices', ['ngResource']);

cigarritaServices
.service('RunFile',function($http){
    this.getAll=function(success,failure){
        $http.get('api/runFile');
        // .success(success)
        // .error(failure); 

    }
})
.factory('MultiLanguage',function($resource){
    
    return $resource('api/multiLanguage/:attr',{
        attr:"@attr"        
    },{
        update:{method:'PUT'}
    });
})
.factory('Template',function($resource){
    
    return $resource('api/index/template',{},{
        query: {method:'GET', isArray:true}
    });
})
.factory('Messages',function($resource){
    
    return $resource('api/index/form',{},{
        query: {method:'GET', isArray:true}
    });
})
.factory('Language',function($resource){
    
    return $resource('api/index/language/:condition/:attr',{
        condition:"@condition",
        attr:"@attr"        
    },{
        update:{method:'PUT'}
    });
})
.factory('Content', ['$resource',
  function($resource){
    return $resource('api/content/language/:language', {
        language:"@lang"
    }, {
      query: {method:'GET', params:{language:'es'}, isArray:true}
    });
  }])
.factory('Sort',function($resource){
    return $resource('api/menuSort/',{},{
        update:{method:'PUT'}
    });
})
.factory('Menu',function($resource){
    
    return $resource('api/index/menu/:id',{
        id:"@id"
    },{
        update:{method:'PUT'}
    });
})
.factory('Block',function($resource){
    
    return $resource('api/index/content/:id',{
        id:"@id"
    },{
        update:{method:'PUT'}
    });
})
.factory('Post',function($resource){
    
    return $resource('api/index/post/:id',{
        id:"@id"
    },{
        update:{method:'PUT'}
    });
})
.factory('Model',function($resource){
    
    return $resource('api/index/:model/:id',{
        model:'@model',
        id:"@id"
    },{
        query: {method:'GET',params:{model:'@model'}, isArray:true},
        update:{method:'PUT'}
    });
})
.factory('MyUser',function($resource){
    
    return $resource('api/myuser',{
    },{
        query: {method:'GET', isArray:false},
        update:{method:'PUT'}
    });
});