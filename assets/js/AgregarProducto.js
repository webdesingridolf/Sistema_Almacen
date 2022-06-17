$(document).ready(function(){
    let base_url="/Sistema_Almacen/";
    tablaProductos=$('#example1').DataTable({ 
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
            "url": base_url+"productos/MostrarProductos", 
            "method": 'POST', //usamos el metodo POST
            //"data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
            
        },
        
        "columns":[
           
            {"data": "detalle"},
            {"data": "unidadmedida"},
            {"data": "stock"},
            {"data": "almacen"},
            {"data": "Especifica"},
            {"data": "fecha"},
            
            {"defaultContent": "<button type='button' id='editar' class='editar btn btn-primary'><i class='fas fa-edit'></i></button>	<button type='button' id='Eliminar' class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminar' ><i class='fas fa-trash'></i></button>"}
        ]
    });
    
    //funciona para actualizar y eliminar
    
      $("#example1").on("click", "#editar", function(){
          var datos=tablaProductos.row($(this).parents("tr")).data();
        // forma de llamar a los objetos datos.nombre d ela columna
        console.log(datos);
     });
   
    

    

   
    if (document.querySelector("#frmProductos")) {
   
        let base_url="/Sistema_Almacen/";
        let frmProductos=document.querySelector("#frmProductos");
        frmProductos.onsubmit=function(e){
            e.preventDefault();
            fntGuardar();
        }
        async function fntGuardar() {
            let detalle=document.querySelector("#detalle").value;
            let unidadmedida=document.querySelector("#unidadMedida").value;
            let stock=document.querySelector("#stock").value;
            let almacen=document.querySelector("#almacen").value;
            
            let especifica=document.querySelector("#especifica").value;
            
            
           
            
            try {
                const data=new FormData(frmProductos);
                let resp=await fetch(base_url+"Productos/RegistrarProducto",{
                    method: 'POST',
                    mode: 'cors',
                    cache: 'no-cache',
                    body: data
    
                });
                json=await resp.json();
                if(json.status){
                    toastr.success(json.msg);
                    frmProductos.reset();
                    $("#unidadMedida").select2({
                        placeholder: 'Seleccione un producto'
                    });
                    $("#especifica").select2({
                        placeholder: 'Seleccione una opcion'
                    });
                    $("#almacen").select2({
                        placeholder: 'Seleccione una opcion'
                    });
                   
                    tablaProductos.ajax.reload(null, false);
    
                   
                   
                    
    
                   
    
    
                }else{
                    alert("nell",json.msg,"error");
                }
                
               
                
            } catch (err) {
                console.log("ocurrio un error: ".err);
            }
            
        }
        
    }
    


});






