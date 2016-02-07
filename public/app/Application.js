    /*load controllers*/
    var videoController = new VideoController();
    var commentController = new CommentController();
    var viewController = new ViewController();
    var categoryController = new CategoryController();

    console.log(viewController);

    /*load render*/
    var render = new Render();


    var router = Router(render);

