/**
 * Created by niki on 07.02.16.
 */
var Router = function(render){
    var router = new Navigo(CONFIG.basePath, useHash=false);

    router.on('upload', function () {
        render.renderView(viewController.loadView('upload'))
    });
    router.on('topTen', function () {
        console.log(arguments)
    });
    router.on('videos', function () {
        console.log(arguments)
    });
    router.on('play/:id', function (id) {
        console.log(arguments)
    });
    router.on('users', function (id) {
        console.log(arguments)
    });
    router.on(function () {
        render.renderView(viewController.loadView('home'),$('#main'));
    });

    return router;

};