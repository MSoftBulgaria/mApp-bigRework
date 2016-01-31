var Data = (function() {
    // your module code goes here
    var rowData = '';


    return {
        getData:function() {
            return rowData;
        }
        ,
        loadData:function(rowDataAddress) {
            return Ajax.getRequest(rowDataAddress);
        }
    }
}());
