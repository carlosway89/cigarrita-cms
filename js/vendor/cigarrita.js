/**
 * Project:     [     ]
 * Module:      Backbone JavaScript architecture
 * Component:   JavaScript library

 * Description: This library contains reusable code that could be
 *  used potentially anywhere in the site code

 * Author:      Carlos Manay  <carlos@reality-magic.com>
 */
// define([
//     'channel'],function (Channel) {
    //"use strict";

    var Beans = function(){

        /**
         * Allows us to debug the entire module, or any method
         * @type {boolean}
         */
        this.debug = false;

        /**
         * Does the application allow for HTTPS?
         * @returns {boolean} true if it does
         */
        this.allow_ssl = function(){

            return !! ($('body').hasClass('ssl-yes'));

        };

        /**
         * Is the given string alpha-numeric?
         * @param string the string to test
         * @returns {boolean} true if it is, false otherwise
         */
        this.is_alphanum = function(string){
            return /^([a-zA-Z0-9]+)$/.test( string );
        };
        /**
         * Show a Preloader
         * @param root 
         */
        this.preloader= function(root){
            var view = null;
            // remove existing
            if ( root.children().length )
                root.children().remove();

            require(['views/preloader'],function(Preloader){
                view = new Preloader();
                if ( view ) root.prepend( view.render().el );
            });
        };
        /**
         * Show a User Alert
         * @param type
         * @param root
         * @param message
         */
        this.user_alert = function(type,root,message){
            var view = null;
            // remove existing
            if ( root.children().length )
                root.children().remove();
            switch ( type ){
                case 'success':
                    require(['views/alert-success'],function(AlertSuccess){
                        view = new AlertSuccess({
                            message: message
                        });
                        if ( view ) root.prepend( view.render().el );
                    });
                break;
                case 'error':
                    require(['views/alert-error'],function(AlertError){
                        view = new AlertError({
                            message: message
                        });
                        if ( view ) root.prepend( view.render().el );
                    });
                break;    
                case 'info':
                require(['views/alert-info'],function(AlertInfo){
                    view = new AlertInfo({
                        message: message
                    });
                    if ( view ) root.prepend( view.render().el );
                });
                break;
                case 'warning':
                require(['views/alert-info'],function(AlertWarning){
                    view = new AlertWarning({
                        message: message
                    });
                    if ( view ) root.prepend( view.render().el );
                });
                break;
            }
        };

        /**
         * Session token for logged in user
         * @type {string}
         */
        this.session_token = '';

        /**
         * Set the user's session token
         * @param token
         */
        this.set_session = function( token ){
            this.session_token = token;
        };


        /**
         * Create a new Cookie
         * @param name
         * @param value
         * @param days
         */
        this.createCookie = function(name,value,days) {
            if (days) {
                var date = new Date();
                date.setTime(date.getTime()+(days*24*60*60*1000));
                var expires = "; expires="+date.toGMTString();
            }
            else var expires = "";
            document.cookie = name+"="+value+expires+"; path=/";
        };

        this.readCookie = function(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for(var i=0;i < ca.length;i++) {
                var c = ca[i];
                while (c.charAt(0)==' ') c = c.substring(1,c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
            }
            return null;
        };

        this.eraseCookie = function(name) {
            this.createCookie(name,"",-1);
        };

        /**
         * Allows me to save and track my current Geo Position
         * @type {{}}
         */
        this.geo_position = {};

        /**
         * Decode the geo location into something meaningful
         * @param lat
         * @param lng
         * @param callback
         */
        this.decode_geolocation = function(lat,lng,callback){

            var geocoder = new google.maps.Geocoder();

            var latlng = new google.maps.LatLng(lat, lng);

            geocoder.geocode({'latLng': latlng}, function(results, status) {
                var location_name = 'unknown';

                if (status == google.maps.GeocoderStatus.OK) {

                    // get the length of the results
                    var len = results[0].address_components.length;
                    var country = len-1;
                    var city = len-3;
                    //console.log(results[0]);
                    location_name = results[0].address_components[city].long_name+', '+
                        results[0].address_components[(city+1)].long_name;
                    country_name = results[0].address_components[country].long_name;
                    if (typeof(callback)=='function')
                        callback({
                            location_name: location_name,
                            country_name: country_name
                        });
                } else {
                    
                    alert("Geocoder failed due to: " + status);
                }


            });

        };

        this.initialize_geolocation = function(callback){

            if ( this.debug ) console.log('initializing geo-location process');

            var that = this;
            var mapOptions = {
                zoom: 6
            };
            var map = new google.maps.Map(document.getElementById('map-canvas'),
                mapOptions);

            // Try HTML5 geolocation
            if(navigator.geolocation) {

                if ( this.debug ) {
                    console.log('browser supports geo-location');
                    console.log(navigator.geolocation);
                }

                navigator.geolocation.getCurrentPosition(function(position) {

                    if ( that.debug ) console.log('got geo-location');


                    if (that.debug) {
                        console.log('inaf: Geo-Position appears below');
                        console.log(position);
                    }
                    var pos = new google.maps.LatLng(position.coords.latitude,
                        position.coords.longitude);


                    // save the geo position for later use
                    that.geo_position = position;

                    // $('input#latitude').val(position.coords.latitude);
                    // $('input#longitude').val(position.coords.longitude);

                    that.decode_geolocation(position.coords.latitude,position.coords.longitude,callback);

                    var infowindow = new google.maps.InfoWindow({
                        map: map,
                        position: pos,
                        content: 'You are here'
                    });

                    map.setCenter(pos);
                }, function() {

                    if ( that.debug ) console.log('Unable to get geo-location');

                    // that.handleNoGeolocation(true);

                },{timeout:300,maximumAge:0,enableHighAccuracy:true});
            } else {

                if ( this.debug ) console.log('unable to get geo-location');
                
                // Browser doesn't support Geolocation
                // that.handleNoGeolocation(false);

            }

        };
        this.set_location_map=function(lat,long){
            var that = this;
            var mapOptions = {
                zoom: 6
            };
            var map = new google.maps.Map(document.getElementById('map-canvas'),
                mapOptions);
            var pos = new google.maps.LatLng(lat,long);
            var infowindow = new google.maps.InfoWindow({
                map: map,
                position: pos,
                content: 'You are here'
            });

            map.setCenter(pos);
            
        };

        /**
         * Geo Location
         */
        this.geo_location = function(callback){

            if ( this.debug ) console.log('beginning geo-location process');

            var that = this;

            /** Note: This example requires that you consent to location sharing when
             * prompted by your browser. If you see a blank space instead of the map, this
             * is probably because you have denied permission for location sharing.
             */
            var map;


            // this.handleNoGeolocation(errorFlag);

            this.initialize_geolocation(callback);
        };

        this.generate_data_table = function( tableName ){

            console.log('setting up datatable '+tableName);

            var dataTable = {
                tabla           : tableName,
                ordenaPor       : new Array([0, "desc" ]),
                filsXpag        : 10,
                desactOrdenaEn  : [0] ,
                functions       : [

                    // $('[data-rel=tooltip]').tooltip()

                ]
            };

            // paginaDataTable(dataTable);
            
            // definiciones por defecto  
            dataTable["ordenaPor"] = (dataTable["ordenaPor"] != undefined) ? dataTable["ordenaPor"] : [[0,"desc"]]; 
            dataTable["desactOrdenaEn"] = (dataTable["desactOrdenaEn"] != undefined) ? dataTable["desactOrdenaEn"] : [];
            dataTable["filsXpag"] = ( dataTable["filsXpag"] != undefined) ?  dataTable["filsXpag"] : 10;
            dataTable["JQueryUI"] = (dataTable["JQueryUI"] != undefined) ? dataTable["JQueryUI"] : true;
            dataTable["functions"] = (dataTable["functions"] != undefined) ? dataTable["functions"] : "";
            
            // funcionalidad js           
            $("#"+dataTable["tabla"]+"").dataTable({
                "bJQueryUI"             :     dataTable["JQueryUI"],
                "iDisplayLength"        :     dataTable["filsXpag"],
                // "oLanguage"             :     {
                //     "sEmptyTable"       :     "Tabla sin data disponible",
                //     "sInfo"             :     "Mostrando desde _START_ hasta _END_ de _TOTAL_ registros",
                //     "sInfoEmpty"        :     "Mostrando desde 0 hasta 0 de 0 registros",
                //     "sInfoFiltered"     :     "(filtrado de _MAX_ registros en total)",
                //     "sInfoPostFix"      :     "",
                //     "sInfoThousands"    :     ",",
                //     "sLengthMenu"       :     "Mostrar _MENU_ registros",
                //     "sLoadingRecords"   :     "Cargando...",
                //     "sProcessing"       :     "Procesando...",
                //     "sSearch"           :     "Buscar:",
                //     "sZeroRecords"      :     "No se encontraron resultados",
                //     "oPaginate"         :     {
                //         "sFirst"        :     "Primero",
                //         "sLast"         :     "Último",
                //         "sNext"         :     "Siguiente",
                //         "sPrevious"     :     "Anterior"
                //     },
                //     "sPaginationType": "bootstrap",
                //     "oAria"             : {
                //         "sSortAscending"    :     ": activar para Ordenar Ascendentemente",
                //         "sSortDescending"   :     ": activar para Ordendar Descendentemente"
                //     }
                // },
                "fnDrawCallback": function(oSettings) {
                    eval(dataTable["functions"]); // funcion ejecutada cuando cambia pagina
                },
                "aoColumnDefs"          :       [{            
                    "aTargets"          :       dataTable["desactOrdenaEn"], // desactivar ordenamiento en cols... 
                    "bSortable"         :       false     
                }],    
                "aaSorting"             :       dataTable["ordenaPor"]  
            });          
        };

    };
//     return Beans;
// });
