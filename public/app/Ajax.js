/**
 * Class wrapper for ajax requests
 * @type Ajax
 */
;(function(global){
    var Ajax = {
        /**
         * Performs get request
         * @param url - the url against which you perform the request
         * @param params String|Object parameters which should be added to the url
         * @param async - is the request synchronous or asynchronous
         * @returns Promise if async is true | XmlHTTPRequest if async is false
         */
        getRequest: function(url, params, async) {
            return this.request('GET', url, params, async);
        },

        /**
         * Performs post request
         * @param url - the url against which you perform the request
         * @param params String|Object parameters which should be added to the url
         * @param async - is the request synchronous or asynchronous
         * @returns Promise if async is true | XmlHTTPRequest if async is false
         */
        postRequest: function(url, params, async) {
            return this.request('POST', url, params, async);
        },


        /**
         * Performs ajax GET or POST request
         * @param method - the request method - GET or POST
         * @param url - the url against which you perform the request
         * @param params String|Object parameters which should be added to the url
         * @param async - is the request synchronous or asynchronous
         * @returns Promise if async is true | XmlHTTPRequest if async is false
         */
        request: function(method, url, params, async) {
            var _this = this;
            return new Promise(function(resolve,reject){
                var xhr = _this.getXhr();

                if (params) {
                    params = typeof params == 'object' ? this.objectToParams(params) : params;
                    if (method.toLowerCase() == 'get') {
                        url += url.indexOf('?') == -1 ? ('?' + params) : url + params;
                    }
                }
                async = async === undefined ? true : async;
                xhr.open(method, url, async ? true: false);

                if (!async) {
                    return xhr;
                }

                xhr.onload = function(){
                    if (xhr.status >= 200 && xhr.status <=300 || xhr.status == 304){
                        // If successful, resolve the promise by passing back the request response
                        resolve(xhr.response);
                    }else {
                        reject(xhr.statusText);
                    }
                }
                xhr.onerror = function(){
                    reject(Error('Network error'));
                }
                xhr.send(method.toLowerCase() == 'get' ? null : params);
            });


        },

        /**
         * creates cross browser XmlHttpRequest
         * @returns {XMLHttpRequest|window.ActiveXObject}
         */
        getXhr: function() {
            var request;
            if (typeof XMLHttpRequest != 'undefined') {
                request = new XMLHttpRequest();
            } else {
                request = new ActiveXObject('Microsoft.XMLHTTP');
            }

            if (typeof request == undefined) {
                throw new Error('Your browser does not support XmlHttpRequest');
            }

            return request;
        },

        /**
         * Converts object to request string
         * suitable to be sent via HTTP request
         * @param {type} object
         * @returns {String}
         */
        objectToParams: function(object) {
            var pairs = [];
            for (var i in object) {
                pairs.push(encodeURIComponent(i) + '=' + encodeURIComponent(object[i]));
            }

            return pairs.join('&');
        }
    }
    global.Ajax = Ajax;
}(window));