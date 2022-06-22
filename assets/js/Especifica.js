$(document).ready(function(){
    let base_url="/Sistema_Almacen/";
    tablaEspecifica=$('#example1').DataTable({ 
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
            "url": base_url+"especifica/MostrarEspecifica", 
            "method": 'POST', //usamos el metodo POST
            //"data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
            
        },
        
        "columns":[
            {"data": "id"},
            {"data": "detalle"},
            {"data": "codigo"},
            {"data": "fecha"},
            
            
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button type='button' id='editar' class='editar btn btn-primary'><i class='fas fa-edit'></i></button>	<button type='button' id='Eliminar' class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminar' ><i class='fas fa-trash'></i></button></div></div>"}
        ]
    });
    if (document.querySelector("#frmEspecifica")) {
   
        let base_url="/Sistema_Almacen/";
        let frmEspecifica=document.querySelector("#frmEspecifica");
        frmEspecifica.onsubmit=function(e){
            e.preventDefault();
            fntGuardar();
        }
        async function fntGuardar() {
            let detalle=document.querySelector("#detalle").value;
            let codigo=document.querySelector("#codigo").value;
            
            
           
            
            try {
                const data=new FormData(frmEspecifica);
                let resp=await fetch(base_url+"especifica/insertarEspecifica",{
                    method: 'POST',
                    mode: 'cors',
                    cache: 'no-cache',
                    body: data
    
                });
                json=await resp.json();
                if(json.status){
                    toastr.success(json.msg);
                    frmEspecifica.reset();
                   
                   
                    tablaEspecifica.ajax.reload(null, false);
    
                   
                   
                    
    
                   
    
    
                }else{
                    alert("nell",json.msg,"error");
                }
                
               
                
            } catch (err) {
                console.log("ocurrio un error: ".err);
            }
            
        }
        
    }
    


});