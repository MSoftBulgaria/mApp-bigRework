/**
 * Created by niki on 07.02.16.
 */
function Controller(){

}
Controller.prototype.loadAction = function(getAction){
    return $.ajax({
        url:CONFIG.apiAddress[getAction],
        cache:false

    });
};