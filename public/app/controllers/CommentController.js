/**
 * Created by niki on 07.02.16.
 */
function CommentController(){
    Controller.call(this);

    this.setComment = function(setcomment,commentData){
        return $.ajax({
            method: "POST",
            url: CONFIG.apiAddress[setcomment],
            dataType:'json',
            data:commentData
        })
    }

}

CommentController.prototype = Object.create(Controller.prototype);
CommentController.prototype.constructor = Controller;