$(document).ready(function(){
    //document.getElementById("Ingresos").style.display='none';
    //document.getElementById("Salidas").style.display='none';
    let base_url="/Sistema_Almacen/";
    tablaingresos=$('#Ingresos').DataTable({ 
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
                className: 'btn btn-info',
                title: '<div class="container"><div class="img1"><img src="img1.png" alt=""></div><div class="centro"><h1>GOBIERNO REGIONAL DEL CUSCO</h1><h2>DIRECCIÓN REGIONAL DE TRABAJO Y PROMOCIÓN DEL EMPLEO - CUSCO</h2><h3>“Año de la Universalización de la Salud”</h3></div><div class="img2"><img src="img2.png" alt=""></div></div>'
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
            {"data": "ordenCompra"}
            
            
           
        ]
    });

    tablasalidas=$('#Salidas').DataTable({ 
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
            "url": base_url+"salidas/MostrarListaSalidas", 
            "method": 'POST', //usamos el metodo POST
            //"data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
            
        },
        
        "columns":[
            
            {"data": "detalle"},
            {"data": "area"},
            {"data": "fecha"},
            {"data": "cantidad"},
            {"data": "cUnidad"},
            {"data": "oc"},
            {"data": "nPecosa"},
            {"data": "especifica"},
            
            
        ]
    });
    $("#Salidas_wrapper").hide();
    
    
    document.getElementById("btningresos").addEventListener("click", CargarIngresos);

    function CargarIngresos() {
        $("#Salidas_wrapper").hide();
        
        $("#Ingresos_wrapper").show();
        
        
    }
    document.getElementById("btnSalidas").addEventListener("click", CargarSalidas);
    function CargarSalidas() {
        $("#Salidas_wrapper").show();
        
        $("#Ingresos_wrapper").hide();
        
        
    }
    
   





});