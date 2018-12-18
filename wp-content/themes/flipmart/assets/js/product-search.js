/*$ = jQuery;

var productSearch = $('.search-area');
var searchForm =  productSearch.find("form");   
searchForm.submit(function(e){
    e.preventDefault();
    var data = {
        action : '',
        text : productSearch.find('.search-field').val()
    };
    $.ajax({
        url : ajax_url,
        data : data,
        success : function(response){
            productSearch.find("ul").empty();
            for( var i = 0; i < response.length; i++){
                console.log(response[i]);
                var html = "<li id='product-" + response[i].id +" '><a href='" + response[i].permalink + "'>" + response[i].title + "</a></li>";
                productSearch.find("ul").append(html);
            }
        }
    });
});*/