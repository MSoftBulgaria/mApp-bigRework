function Category(id,name){
    var _id = id;
    var _name = name;

    this.getCategoryMeta = function(){
        return {
            id:_id,
            name:_name
        }
    }
}
