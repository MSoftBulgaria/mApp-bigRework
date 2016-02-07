/**
 * Created by niki on 07.02.16.
 */

/**
 *
 * @param id we need user id for video upload
 * @param name
 * @param token will be used for auth
 * @param role default is user
 * @videos array with all video_id uploaded by curent user
 * @constructor
 */
function User(id,name,token,role,videos){
    var _id = id;
    var _name = name;
    var _token = token;
    var _role = role;
    var _videos = videos;

    this.getUserToken = function(){
        return _token;
    };
    this.getUserRole = function(){
        return _role;
    };
    this.getUserName = function(){
        return _name;
    };
    this.getUserID = function(){
        return _id;
    };
    this.getUserVideos = function(){
        return _videos;
    }

}

