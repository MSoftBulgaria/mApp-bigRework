var DomController = (function() {

    var dataPromise = {};
    var templatePromise = {};

    return {

        loadUploadPage:function(dataAddress,templateAddress) {

            dataPromise = Data.loadData(dataAddress);
            templatePromise = View.loadTemplate(templateAddress);

            Promise.all([dataPromise, templatePromise]).then(function(dataPromise) {

                var data = JSON.parse(dataPromise[0]);
                var template = dataPromise[1];
                var mustacheData = {};


                $('#aplication').html(Mustache.render(template,{data:data}));

            });
        },
        loadSearchResultsPage:function(dataAddress,templateAddress){
            dataPromise = Data.loadData(dataAddress);
            templatePromise = View.loadTemplate(templateAddress);

            Promise.all([dataPromise, templatePromise]).then(function(dataPromise) {

                var data = JSON.parse(dataPromise[0]);
                var template = dataPromise[1];
                var mustacheData = {};

                $('#aplication').html(Mustache.render(template,{data:data}));

            });
        },
        loadSearchResultsPage:function(dataAddress,templateAddress){
            dataPromise = Data.loadData(dataAddress);
            templatePromise = View.loadTemplate(templateAddress);

            Promise.all([dataPromise, templatePromise]).then(function(dataPromise) {

                var data = JSON.parse(dataPromise[0]);
                var template = dataPromise[1];
                var mustacheData = {};

                $('#aplication').html(Mustache.render(template,{data:data}));

            });
        },
        loadIndexPage:function(templateAddress){

            templatePromise = View.loadTemplate(templateAddress);

            templatePromise.then(function(dataPromise) {

                var template = dataPromise;

                $('#aplication').html(template);
            });
        },
        loadVideoForPlayer:function(dataAddress,templateAddress){

            dataPromise = Data.loadData(dataAddress);
            templatePromise = View.loadTemplate(templateAddress);

            Promise.all([dataPromise, templatePromise]).then(function(dataPromise) {

                var data = JSON.parse(dataPromise[0]);
                var template = dataPromise[1];
                var mustacheData = {};


                $('#aplication').html(Mustache.render(template,{data:data}));

            });
        },
        loadUsers:function(dataAddress,templateAddress){

            dataPromise = Data.loadData(dataAddress);
            templatePromise = View.loadTemplate(templateAddress);

            Promise.all([dataPromise, templatePromise]).then(function(dataPromise) {

                var data = JSON.parse(dataPromise[0]);
                var template = dataPromise[1];
                var mustacheData = {};


                $('#aplication').html(Mustache.render(template,{data:data}));

            });
        }

    }
}());







