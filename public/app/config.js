var CONFIG = {

    basePath:location.protocol+'//'+ location.hostname+ (location.port ?':'+location.port:''),

    templatesAddress:location.protocol+'//'+ location.hostname+ (location.port ?':'+location.port:'') + '/app/views/',

    apiAddress :this.basePath,

    viewsPath:{
        home:'big-header.html'
    }
};