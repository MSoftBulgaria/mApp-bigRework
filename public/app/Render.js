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
Render.prototype.renderViewWithData = function(deferredData,deferredView,$selector){

    /*Will render when both deffered objects are resolved*/

    $.when(deferredData,deferredView).done(function(data,view){
        var data = JSON.parse(data);
        var template = view;

        $selector.html(Mustache.render(template,{data:data}));


    }).fail(function(){
        console.log('Show 404');
    });
};

Render.prototype.renderView = function(deferredView,$selector){

    /*Will render when both deffered objects are resolved*/

    deferredView.done(function(view){
       $selector.html(view);
    });
};