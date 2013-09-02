/* Función para llenar combos desde JSON con Ajax */
function cargarCombo(url,combo, target){
    target.empty();
    $.getJSON(url,'id='+combo.val(),
        function(data){
            target.append("<option value =''>*** Seleccione ***</option>");
            $.each(data,
                function(i,item){
                    target.append($("<option></option>")
                    .attr("value",item.id)
                    .text(item.descripcion));
                });
        });
}