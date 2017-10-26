$("#s").focus(function(){
    $("#s").autocomplete({
        minLength: 2,
        source: function(request, response) {
            $.ajax({
                url: "/users/searchjson",
                data: {
                    term: request.term
                },
                dataType: "json",
                success: function(data){
                    response($.map(data, function(el, index){
                        return {
                            value: el.name + " " + el.lastName,
                            codigo: el.codigo,
                            nombre: el.name,
                            apellido: el.lastName
                        };
                    }));
                }
            });
        }
    }).autocomplete("instance")._renderItem = function(ul, item){
        return $("<li>")
        .data("ui-autocomplete-item", item)
        .append("<div>" + item.nombre + " "+ item.apellido + "</div>")
        .appendTo(ul)
    };
});