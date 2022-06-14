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
            "url": base_url+"Usuario/mostrar", 
            "method": 'POST', //usamos el metodo POST
            //"data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
            
        },
        
        "columns":[
            {"data": "id"},
            {"data": "TDocumento"},
            {"data": "NDocmuento"},
            {"data": "nombre"},
            {"data": "apellido"},
            {"data": "fechaNacimiento"},
            {"data": "user"},
            {"data": "password"},
            {"data": "FechaRegistro"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
        ]
    });
    
    if (document.querySelector("#frmIngresos")) {
   
        let base_url="/Sistema_Almacen/";
        let frmIngresos=document.querySelector("#frmIngresos");
        frmIngresos.onsubmit=function(e){
            e.preventDefault();
            fntGuardar();
        }
        async function fntGuardar() {
            let producto=document.querySelector("#producto").value;
            let cantidad=document.querySelector("#cantidad").value;
            let precio=document.querySelector("#precio").value;
            let total=document.querySelector("#total").value;
            let orden=document.querySelector("#ordenCompra").value;
            let especifica=document.querySelector("#especifica").value;
            
            if (producto==" "||cantidad==" "||precio==" "||total==" "||orden==" "||especifica==" ") {
               alert("llene todos los campos") ;
               
               return;
            }
           
            
            try {
                const data=new FormData(frmIngresos);
                let resp=await fetch(base_url+"ingresos/RegistrarIngreso",{
                    method: 'POST',
                    mode: 'cors',
                    cache: 'no-cache',
                    body: data
    
                });
                json=await resp.json();
                if(json.status){
                    toastr.success(json.msg);
                    frmIngresos.reset();
                    $("#producto").select2({
                        placeholder: 'Seleccione un producto'
                    });
                    $("#especifica").select2({
                        placeholder: 'Seleccione una opcion'
                    });
                   
                    tablaingreso.ajax.reload(null, false);
    
                   
                   
                    
    
                   
    
    
                }else{
                    alert("nell",json.msg,"error");
                }
                
               
                
            } catch (err) {
                console.log("ocurrio un error: ".err);
            }
            
        }
        
    }
    


});