/**
 * Created by niki on 07.02.16.
 */

function Video(id,nameOfVideo,dailyViewCount,totalViewCount,createdAt,userId,thumbnailId,categoryId,commentsList){
    var _id = id;
    var _nameOfVideo = nameOfVideo;
    var _dailyViewCount = dailyViewCount;
    var _totalViewCount = totalViewCount;
    var _createdAt = createdAt;
    var _userId = userId;
    var _thumbnailId = thumbnailId;
    var _categoryId = categoryId;
    var _commentsList = commentsList;

    this.getNameOfVideo = function(){
        return _nameOfVideo;
    };
    this.getViewCount = function(){
        return {
            daily:_dailyViewCount,
            total:_totalViewCount
        }
    };
    this.getUploadDate = function(){
        return _createdAt;
    };
    this.getUploader = function(){
        return _userId;
    };
    this.getThumbnail = function(){
        return _thumbnailId;
    };
    this.getCategoryId = function(){
        return _categoryId;
    };
    this.getCommentsListForThis = function(){
        return _commentsList;
    }



}