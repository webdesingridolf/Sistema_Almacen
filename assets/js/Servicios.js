$(document).ready(function(){
    let base_url="/Sistema_Almacen/";
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
            {"data": "detalle"},
            {"data": "cantidad"},
            {"data": "Especifica"},
            {"data": "precio"},
            {"data": "total"},
            {"data": "os"},
            
            {"defaultContent": "<button type='button' id='editar' class='editar btn btn-primary'><i class='fas fa-edit'></i></button>	<button type='button' id='Eliminar' class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminar' ><i class='fas fa-trash'></i></button>"}
        ]
    });
    
    //funciona para actualizar y eliminar
    
      $("#example1").on("click", "#editar", function(){
          var datos=tablaProductos.row($(this).parents("tr")).data();
        // forma de llamar a los objetos datos.nombre d ela columna
        console.log(datos);
     });
   
    

    

   
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
                    $("#unidadMedida").select2({
                        placeholder: 'Seleccione un producto'
                    });
                    $("#especifica").select2({
                        placeholder: 'Seleccione una opcion'
                    });
                    $("#almacen").select2({
                        placeholder: 'Seleccione una opcion'
                    });
                   
                    tablaServicios.ajax.reload(null, false);
    
                   
                   
                    
    
                   
    
    
                }else{
                    alert("nell",json.msg,"error");
                }
                
               
                
            } catch (err) {
                console.log("ocurrio un error: ".err);
            }
            
        }
        
    }
    


});