/**
 * Created by niki on 07.02.16.
 */
function ViewController(configValues){
    /**
     *
     * @param viewName
     * @returns Deferred object
     */
    this.loadView = function(viewName){

        return $.ajax({
            url:CONFIG.templatesAddress[viewName],
            dataType:'html'

        })
    };
    }