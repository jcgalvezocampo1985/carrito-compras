<script>
    window.addEventListener('load', function() {
        var productos_id = $(".producto_id");
        var producto_id;

        for(var i = 0; i <= productos_id.length; i++)
        {
            producto_id = productos_id[i].value;
            consultaCantidadProducto(producto_id);
        }
    });

    function consultaCantidadProducto(producto_id)
    {
       $.ajax({
            url: 'compras/cantidadProducto/'+producto_id,
            type: 'GET',
            success: function(response){
                document.getElementById('cantidad_'+producto_id).value = response
            }
        });
    }

    function incrementaCompra(producto_id)
    {
        $.ajax({
            url: 'compras/incrementaCompra/'+producto_id,
            type: 'GET',
            success: function(response){
                consultaCantidadProducto(producto_id);

                if(response.mensaje !== "")
                {
                    notificaciones(response.mensaje);
                }
                else
                {
                    document.getElementById('total_productos').innerHTML = response.total_productos
                    document.getElementById('total_compra').innerHTML = response.total_compra
                    document.getElementById('subtotal').innerHTML = response.subtotal
                    document.getElementById('total_impuesto').innerHTML = response.total_impuesto
                }
            }
        });
    }

    function decrementaCompra(producto_id)
    {
        //var cantidad = parseInt(document.getElementById('cantidad_'+product_id).value)

        $.ajax({
            url: 'compras/decrementaCompra/'+producto_id,
            type: 'GET',
            success: function(response){
                consultaCantidadProducto(producto_id);
                document.getElementById('total_productos').innerHTML = response.total_productos
                document.getElementById('total_compra').innerHTML = response.total_compra
                document.getElementById('subtotal').innerHTML = response.subtotal
                document.getElementById('total_impuesto').innerHTML = response.total_impuesto
            }
        });
    }

    function eliminaProducto(producto_id)
    {
        $.ajax({
            url: 'compras/eliminaProducto/'+producto_id,
            type: 'GET',
            success: function(response){
                consultaCantidadProducto(producto_id);
                document.getElementById('total_productos').innerHTML = response.total_productos
                document.getElementById('total_compra').innerHTML = response.total_compra
                document.getElementById('subtotal').innerHTML = response.subtotal
                document.getElementById('total_impuesto').innerHTML = response.total_impuesto
            }
        });
    }

    function eliminarCarrito()
    {
        swal({
            title: 'Confirmar',
            text: '¿Deseas cancelar la compra?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#fff',
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#3b3f5c',
        }).then(function(result){
            if(result.value){
                $.ajax({
                    url: 'compras/limpiarCarrito/',
                    type: "GET",
                    success: function(respuesta) {
                        redireccionar()
                    }
                });
            }
        })
    }

    function guardarCompra()
    {
        swal({
            title: 'Confirmar',
            text: '¿Deseas guardar la compra?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#fff',
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#3b3f5c',
        }).then(function(result){
            if(result.value){
                $.ajax({
                    url: 'compras/guardarCompra/',
                    type: "GET",
                    success: function(respuesta) {
                        notificaciones(respuesta);
                        window.setTimeout(redireccionar, 2000);
                    }
                });
            }
        })
    }

    function redireccionar()
    {
        window.location.href = "compras";
    }
</script>