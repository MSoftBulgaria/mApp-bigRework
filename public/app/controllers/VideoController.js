function VideoController(){

    /**
     *
     * @param viewName
     * @returns Defered object
     */

    this.uploadVideo = function(formData){
        return $.ajax({
            url: CONFIG.apiAddress[videoUploadEndPoint] ,  //server script to process data
            type: 'POST',
            xhr: function() {  // custom xhr
                myXhr = $.ajaxSettings.xhr();
                if(myXhr.upload){ // if upload property exists
                    myXhr.upload.addEventListener('progress', progressHandlingFunction, false); //TO DO Progres bar
                }
                return myXhr;
            },

            // Form data
            data: formData,


            //Options to tell JQuery not to process data or worry about content-type
            cache: false,
            contentType: false,
            processData: false
        });

    };
    this.loadVideo = function(loadVideoAction,dataQuery){
        return $.ajax({
            url:CONFIG.apiAddress[loadVideoAction],
            method:'GET',
            cache:false

        })
    }


}

VideoController.prototype = Object.create(Controller.prototype);
VideoController.prototype.constructor = Controller;