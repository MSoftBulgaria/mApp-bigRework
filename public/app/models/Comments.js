/**
 * Created by niki on 07.02.16.
 */

function Comments(id,text,video_id,user_id){
    var _id = id;
    var _text = text;
    var _video_id = video_id;
    var _user_id = user_id;

    this.getText = function(){
        return _text;
    };
    this.getID = function(){
        return _id;
    };

}