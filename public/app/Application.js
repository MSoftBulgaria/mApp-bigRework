document.addEventListener("DOMContentLoaded", function(event) {

    var router = new Navigo(root = null, useHash=false);

    router.on('upload', function () {
        DomController.loadUploadPage(
            config.apiAddress + 'category',
            config.templatesAddress + 'upload.html'
        );
    });
    router.on('topTen', function () {
        DomController.loadSearchResultsPage(
            config.apiAddress + 'category',
            config.templatesAddress + 'search-results.html'
        );
    });
    router.on('videos', function () {
        DomController.loadSearchResultsPage(
            config.apiAddress + 'data/videos',
            config.templatesAddress + 'video-strips.html'
        );
    });
    router.on('play/:id', function (id) {
        DomController.loadVideoForPlayer(
            config.apiAddress + 'data/video/'+id ,
            config.templatesAddress + 'video-player.html'
        );
    });
    router.on('users', function (id) {
        DomController.loadUsers(
            config.apiAddress + 'user/all' ,
            config.templatesAddress + 'top-users.html'
        );
    });
    router.on(function () {
        DomController.loadIndexPage(config.templatesAddress + 'big-header.html')
    });



});