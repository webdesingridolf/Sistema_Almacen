


$(document).ready(function(){
    
    let base_url="/Sistema_Almacen/";
    tablaingreso=$('#example1').DataTable({ 
        "responsive": true, "lengthChange": false, "autoWidth": false,       
        language: {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
                 },
                 "sProcessing":"Procesando...",
            },
        //para usar los botones   
        
        dom: 'Bfrtilp',       
        buttons:[ 
            {
                extend:    'excelHtml5',
                text:      '<i class="fas fa-file-excel"></i> ',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fas fa-file-pdf"></i> ',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger'
            },
            {
                extend:    'print',
                text:      '<i class="fa fa-print"></i> ',
                titleAttr: 'Imprimir',
                className: 'btn btn-info'
            },
        ],
        "ajax":{            
            "url": base_url+"ingresos/MostrarListaIngresos", 
            "method": 'POST', //usamos el metodo POST
            //"data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
            
        },
        
        "columns":[
            
            {"data": "fecha"},
            {"data": "cantidad"},
            {"data": "cantidadUnidad"},
            {"data": "unidadmedida"},
            {"data": "producto"},
            {"data": "Especifica"},
            {"data": "precio"},
            {"data": "total"},
            {"data": "ordenCompra"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button type='button' id='editar' class='editar btn btn-primary' data-toggle='modal' data-target='#modalActualizar'><i class='fas fa-edit'></i></button>	<button type='button' id='Eliminar' class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminar' ><i class='fas fa-trash'></i></button></div></div>"}
        ]
    });

//-----------------------eliminar ingreso --------------------------------------------------------------------------*
    document.getElementById("eliminarIngreso").addEventListener("click", fntEliminar);

    
    $("#example1").on("click", "#Eliminar", function(){
          
        var datos=tablaingreso.row($(this).parents("tr")).data();
        // forma de llamar a los objetos datos.nombre d ela columna
        $("#id").val(datos.id);
     });
     function fntEliminar() {
         id=document.getElementById("id").value;
         frmeliminar=document.querySelector("#frmEliminar");
         eliminar();
        async function eliminar(){
            id=document.querySelector("#id");

            try {
                const data=new FormData(frmeliminar) ;
                let resp=await fetch(base_url+"Ingresos/EliminarIngreso",{
                    method: 'POST',
                    mode: 'cors',
                    cache: 'no-cache',
                    body: data
    
                });
                
                json=await resp.json();
                if(json.status){
                    toastr.error(json.msg);
                    tablaingreso.ajax.reload(null, false);
                    $("#modalEliminar").modal('hide');
                }else{
                    toastr.error(json.msg);
                    
                }               
            } catch (err) {
                console.log("ocurrio un error: ".err);
            }

        }        
        
      }
//---------------------------------fin funcion eliminar ---------------------------------------------------------------
   
//--------------------------------Funcion Actualizar------------------------------------------------------------------
document.getElementById("ActualizarIngreso").addEventListener("click", fntActualizar);

    
    $("#example1").on("click", "#editar", function(){
        
          
        var datos=tablaingreso.row($(this).parents("tr")).data();
        // forma de llamar a los objetos datos.nombre d ela columna
        console.log(datos);
        $("#upId").val(datos.id);
        $("#upCantidad").val(datos.cantidad);
        
        $('#upProducto').val(datos.producto);
        $('#upProductoid').val(datos.ProductoID);
        $('#upEspecifica').val(datos.EspecificaID).trigger('change.select2');
        $("#upPrecio").val(datos.precio);
        $("#upTotal").val(datos.total);
        $("#upOrden").val(datos.ordenCompra);
        $("#CantidadA").val(datos.cantidad);
        $("#CantidadUA").val(datos.cantidadUnidad);
        $("#upCantidadUnidad").val(datos.cantidadUnidad);
        if(document.getElementById("upCantidadUnidad").value==0){
            document.getElementById("upCantidadUnidadLabel").style.display='none';
            document.getElementById("upCantidadUnidad").style.display='none';
        }else{
            document.getElementById("upCantidadUnidadLabel").style.display='inherit';
            document.getElementById("upCantidadUnidad").style.display='inherit';
        }
        $('#upCantidad').change(function (){
            var idProducto=document.getElementById('upProductoid').value;
            obtenerid();
            function obtenerid() {
            idUM()
            async function idUM() {
                const data=new FormData();
                    data.append('id',idProducto );
                    let UM=await fetch(base_url+"ingresos/ObteneridUM",{
                        method: 'POST',
						mode: 'cors',
						cache: 'no-cache',
						body: data
                    });
                    json=await UM.json();
                    var idUM=json[0]["UMid"]
                    UnidadMedida(idUM);
                    async function UnidadMedida(id) {
                        const dataUM=new FormData();
                        dataUM.append('idUM',id );
                       let UMdata=await fetch(base_url+"ingresos/ObtenerUMdata",{
                            method: 'POST',
                            mode: 'cors',
                            cache: 'no-cache',
                            body: dataUM
                        });
                        json=await UMdata.json();
                        
                        if (json[0]["Extra"]==1) {
                            document.getElementById("upCantidadUnidadLabel").style.display='inherit';
                            document.getElementById("upCantidadUnidad").style.display='inherit';
                            $("#upCantidad").change(function(){
                                var equivalencia=json[0]["Equivalencia"];
                                var cantidad=document.getElementById("upCantidad").value;
                                document.querySelector("#upCantidadUnidad").value=cantidad*equivalencia;

                            });
                        }else{
                            document.getElementById("upCantidadUnidadLabel").style.display='none';
                            document.getElementById("upCantidadUnidad").style.display='none';

                        }
                        
                    }
            }
        }
            

        });
        

     });

     function fntActualizar() {
        frmActualizar=document.querySelector("#frmActualizar");
        actualizar();
       async function actualizar(){
          // id=document.querySelector("#id");
           

           try {
               const data=new FormData(frmActualizar) ;
               let resp=await fetch(base_url+"Ingresos/ActualizarIngreso",{
                   method: 'POST',
                   mode: 'cors',
                   cache: 'no-cache',
                   body: data
   
               });
               
               json=await resp.json();
               if(json.status){
                   toastr.success(json.msg);
                   tablaingreso.ajax.reload(null, false);
                   $("#modalActualizar").modal('hide');
               }else{
                   toastr.error(json.msg);
                   
               }               
           } catch (err) {
               console.log("ocurrio un error: ".err);
           }
           

       }     
       
     }


//-------------------------------fin funcion actualizar----------------------------------------------------------------

    
    
//----------------------------cargar datos con select----------------------------------------------------
    $("#producto").change(function () {
        var idProducto=document.getElementById('producto').value;
        obtenerid();
        function obtenerid() {
            idUM()
            async function idUM() {
                const data=new FormData();
                    data.append('id',idProducto );
                    let UM=await fetch(base_url+"ingresos/ObteneridUM",{
                        method: 'POST',
						mode: 'cors',
						cache: 'no-cache',
						body: data
                    });
                    json=await UM.json();
                    var idUM=json[0]["UMid"]
                    UnidadMedida(idUM);
                    async function UnidadMedida(id) {
                        const dataUM=new FormData();
                        dataUM.append('idUM',id );
                       let UMdata=await fetch(base_url+"ingresos/ObtenerUMdata",{
                            method: 'POST',
                            mode: 'cors',
                            cache: 'no-cache',
                            body: dataUM
                        });
                        json=await UMdata.json();
                        console.log(json);
                        if (json[0]["Extra"]==1) {
                            document.getElementById("CUnidadLabel").style.display='inherit';
                            document.getElementById("CUnidad").style.display='inherit';
                            $("#cantidad").change(function(){
                                var equivalencia=json[0]["Equivalencia"];
                                var cantidad=document.getElementById("cantidad").value;
                                document.querySelector("#CUnidad").value=cantidad*equivalencia;

                            });
                        }else{
                            document.getElementById("CUnidadLabel").style.display='none';
                            document.getElementById("CUnidad").style.display='none';

                        }
                        
                    }
            }
        }
        
    });
    
//----------------------------------fin cargar datos con select--------------------------------------------

});
