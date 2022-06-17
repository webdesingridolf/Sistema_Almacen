$(document).ready(function(){
    let base_url="/Sistema_Almacen/";
    tablaAlmacen=$('#example1').DataTable({ 
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
            "url": base_url+"almacenes/MostrarAlmacen", 
            "method": 'POST', //usamos el metodo POST
            //"data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
            
        },
        
        "columns":[
            {"data": "id"},
            {"data": "nombre"},
            {"data": "fecha"},
            
            
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
        ]
    });
    if (document.querySelector("#frmAlmacen")) {
   
        let base_url="/Sistema_Almacen/";
        let frmAlmacen=document.querySelector("#frmAlmacen");
        frmAlmacen.onsubmit=function(e){
            e.preventDefault();
            fntGuardar();
        }
        async function fntGuardar() {
            let nombre=document.querySelector("#nombre").value;
          
            
            
           
            
            try {
                const data=new FormData(frmAlmacen);
                let resp=await fetch(base_url+"almacenes/insertarAlmacen",{
                    method: 'POST',
                    mode: 'cors',
                    cache: 'no-cache',
                    body: data
    
                });
                json=await resp.json();
                if(json.status){
                    toastr.success(json.msg);
                    frmAlmacen.reset();
                  
                   
                    tablaAlmacen.ajax.reload(null, false);
    
                   
                   
                    
    
                   
    
    
                }else{
                    alert("nell",json.msg,"error");
                }
                
               
                
            } catch (err) {
                console.log("ocurrio un error: ".err);
            }
            
        }
        
    }
    


});