'use strict';

/* Filters */

angular.module('cigarritaFilters', [])
.filter("sanitize", ['$sce', function($sce) {
  return function(htmlCode){
    return $sce.trustAsHtml(htmlCode);
  }
}])
.filter('unique', function() {
   return function(collection, keyname) {
      var output = [], 
          keys = [];

      angular.forEach(collection, function(item) {
          var key = item[keyname];
          if(keys.indexOf(key) === -1) {
              keys.push(key);
              output.push(item);
          }
      });

      return output;
   };
})
.filter('search', function() {
   return function(collection, keyname) {
      var output = [], 
          keys = [];
      
      // console.log(collection, keyname);
      
      angular.forEach(collection, function(item) {
          item.subcategoria
          if (item.subcategoria==keyname) {
            output.push(item);
          }
      });

      return output;
   };
})
.filter('spaceless',function() {
    return function(input) {
        if (input) {
            input=input ? String(input).replace(/<[^>]+>/gm, '') : '';
            input=input.replace(/,/g,'');
            input=input.replace(")",'');
            input=input.replace("(",'')
              
            return input.replace(/\s+/g, '-');    
        }
    }
});
// .filter('filterByTags', function () {
//     return function (items, data) {
//         var filtered = []; // Put here only items that match
//         // (items || []).forEach(function (item) { // Check each item
//         //     var matches = tags.some(function (tag) {          // If there is some tag
//         //         return (item.data1.indexOf(tag.text) > -1) || // that is a substring
//         //                (item.data2.indexOf(tag.text) > -1);   // of any property's value
//         //     });                                               // we have a match
//         //     if (matches) {           // If it matches
//         //         filtered.push(item); // put it into the `filtered` array
//         //     }
//         // });
// 		console.log(items,data);
//         // return filtered; // Return the array with items that match any tag
//     };
// });
