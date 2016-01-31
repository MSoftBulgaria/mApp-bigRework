var View = (function() {
    // your module code goes here
    var template = '';


    return {
        getTemplate:function() {
            return template;
        }
        ,
        loadTemplate:function(templateData) {
            return Ajax.getRequest(templateData);
        }
    }
}());
