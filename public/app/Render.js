/**
 * Created by niki on 07.02.16.
 */
function Render(){

}
/**
 *
 * @param deferredData
 * @param deferredView
 */
Render.prototype.renderView = function(deferredData,deferredView,$selector){

    /*Will render when both deffered objects are resolved*/

    $.when(deferredData,deferredView).done(function(data,view){
        var data = JSON.parse(data);
        var template = view;

        $selector.html(Mustache.render(template,{data:data}));


    }).fail(function(){
        console.log('Show 404');
    });
};