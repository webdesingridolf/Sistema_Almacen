$(document).ready(function(){
    let base_url="/Sistema_Almacen/";
/*--------------------------------Cargar datos---------------------------------------------------------------------*/
    tablaServicios=$('#example1').DataTable({ 
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
            "url": base_url+"servicios/MostrarServicios", 
            "method": 'POST', //usamos el metodo POST
            //"data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
            
        },
        
        "columns":[
           
            {"data": "fecha"},
            {"data": "cantidad"},
            {"data": "detalle"},
            {"data": "Especifica"},
            {"data": "precio"},
            {"data": "total"},
            {"data": "os"},
            
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button type='button' id='editar' class='editar btn btn-primary' data-toggle='modal' data-target='#modalActualizar'><i class='fas fa-edit'></i></button>	<button type='button' id='Eliminar' class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminar' ><i class='fas fa-trash'></i></button></div></div>"}
        ]
    });
/*--------------------------------fin Cargar datos---------------------------------------------------------------------*/
  


/*--------------------------------funcion registrar Servicios ---------------------------------------------------------------------*/


if (document.querySelector("#frmServicios")) {
   
    let base_url="/Sistema_Almacen/";
    let frmServicios=document.querySelector("#frmServicios");
    frmServicios.onsubmit=function(e){
        e.preventDefault();
        fntGuardar();
    }
    async function fntGuardar() {
        let detalle=document.querySelector("#detalle").value;
        let os=document.querySelector("#os").value;
        let cantidad=document.querySelector("#cantidad").value;
        let precio=document.querySelector("#precio").value;
        let total=document.querySelector("#total").value;
        
        let especifica=document.querySelector("#Especifica").value;
        
        
       
        
        try {
            const data=new FormData(frmServicios);
            let resp=await fetch(base_url+"Servicios/RegistrarServicio",{
                method: 'POST',
                mode: 'cors',
                cache: 'no-cache',
                body: data

            });
            
            json=await resp.json();
            if(json.status){
                toastr.success(json.msg);
                frmServicios.reset();
               
                $("#Especifica").select2({
                    placeholder: 'Seleccione una opcion'
                });
               
                tablaServicios.ajax.reload(null, false);
 
            }else{
                toastr.error(json.msg);
            }
            
           
            
        } catch (err) {
            console.log("ocurrio un error: ".err);
        }
        
    }
    
}




/*--------------------------------fin funcion registrar Servicios ---------------------------------------------------------------------*/


/*------------------------funcion actualizar servicios-----------------------------------------------------------------------------------*/

    
    $("#example1").on("click", "#editar", function(){
        
          
        var datos=tablaServicios.row($(this).parents("tr")).data();
        // forma de llamar a los objetos datos.nombre d ela columna
        console.log(datos);
        $("#upId").val(datos.id);
        $('#upDetalle').val(datos.detalle);
        $("#upCantidad").val(datos.cantidad);
        $("#upPrecio").val(datos.precio);
        $("#upTotal").val(datos.total);
        $("#upOS").val(datos.os);
        $('#upEspecifica').val(datos.EspecificaID).trigger('change.select2');
      
        
        
       

     });
    document.getElementById("ActualizarServicio").addEventListener("click", fntActualizar);


     function fntActualizar() {
        frmActualizar=document.querySelector("#frmActualizar");
        actualizar();
       async function actualizar(){
          // id=document.querySelector("#id");
           

           try {
               const data=new FormData(frmActualizar) ;
               let resp=await fetch(base_url+"Servicios/ActualizarServicios",{
                   method: 'POST',
                   mode: 'cors',
                   cache: 'no-cache',
                   body: data
   
               });
               
               json=await resp.json();
               if(json.status){
                   toastr.success(json.msg);
                   $("#modalActualizar").modal('hide');
                   tablaServicios.ajax.reload(null, false);
                   
               }else{
                   toastr.error(json.msg);
                   
               }               
           } catch (err) {
               console.log("ocurrio un error: ".err);
           }
           

       }     
       
     }





/*------------------------fin funcion actualizar servicios-----------------------------------------------------------------------------------*/




/*------------------------funcion eliminar servicios-----------------------------------------------------------------------------------*/


document.getElementById("eliminarServicio").addEventListener("click", EliminarServicio);
    
   
    
      $("#example1").on("click", "#Eliminar", function(){
          
        var datos=tablaServicios.row($(this).parents("tr")).data();
        // forma de llamar a los objetos datos.nombre d ela columna
       
        $("#id").val(datos.id);
        console.log(datos);
        
     });
     function EliminarServicio() {
         id=document.getElementById("id").value;
         frmeliminar=document.querySelector("#frmEliminar");
         eliminar();
        async function eliminar(idservicio){
            id=document.querySelector("#id");

            try {
                const data=new FormData(frmeliminar) ;
                let resp=await fetch(base_url+"Servicios/EliminarServicio",{
                    method: 'POST',
                    mode: 'cors',
                    cache: 'no-cache',
                    body: data
    
                });
                
                json=await resp.json();
                if(json.status){
                    toastr.success(json.msg);
                    tablaServicios.ajax.reload(null, false);
                    $("#modalEliminar").modal('hide');
                }else{
                    toastr.success(json.msg);
                    
                }
                
               
                
            } catch (err) {
                console.log("ocurrio un error: ".err);
            }

        }        
        
      }


/*------------------------fin funcion eliminar servicios-----------------------------------------------------------------------------------*/

   
    

    

   
    
    


});