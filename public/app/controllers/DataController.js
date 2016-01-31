var DataController = (function() {
    // your module code goes here
    var fd = {};

    return {

        uploadForm:function(formElement){
            fd = new FormData(formElement);
            var r = new XMLHttpRequest();
            r.open('POST',config.apiAddress + 'video');
            r.onreadystatechange = function(){
                if(r.readyState == 4 && r.status == 200){
                    formElement.reset();
                }
            };

            r.send(fd);

        }

    }
}());







