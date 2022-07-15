$(document).ready(function(){
	//---------------------------------------Cargar datos-----------------------------------------------------------
		let base_url="/Sistema_Almacen/";
		tablaUnidadMedida=$('#example1').DataTable({ 
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
				"url": base_url+"UnidadMedida/MostrarUnidadMedida", 
				"method": 'POST', //usamos el metodo POST
				//"data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
				"dataSrc":""
				
			},
			
			"columns":[
			  
				{"data": "id"},
				{"data": "UnidadMedida"},
				{"data": "Simbolo"},
				{"data": "FechaRegistro"},
				{"defaultContent": "<div class='text-center'><div class='btn-group'><button type='button' id='editar' class='editar btn btn-primary' data-toggle='modal' data-target='#modalActualizar'><i class='fas fa-edit'></i></button>	<button type='button' id='Eliminar' class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminar' ><i class='fas fa-trash'></i></button></div></div>"}
			]
		});
	//-----------------------fin Cargar datos--------------------------------------------------------------------------------------------------------
	   
	//------------------------Registrar Unidad de Medida------------------------------------------------------------------------------
		if (document.querySelector("#frmUnidadMedida")) {
	   
			let base_url="/Sistema_Almacen/";
			let frmUnidadMedida=document.querySelector("#frmUnidadMedida");
			frmUnidadMedida.onsubmit=function(e){
				e.preventDefault();
				fntGuardar();
			}
			async function fntGuardar() {
	
				try {
					const data=new FormData(frmUnidadMedida);
					let resp=await fetch(base_url+"UnidadMedida/Registrar",{
						method: 'POST',
						mode: 'cors',
						cache: 'no-cache',
						body: data
		
					});
					json=await resp.json();
					if(json.status){
						toastr.success(json.msg);
						frmUnidadMedida.reset();
						tablaUnidadMedida.ajax.reload(null, false);
					}else{
						toastr.success(json.msg);
						alert("nell",json.msg,"error");
					}
					
				   
					
				} catch (err) {
					console.log("ocurrio un error: ".err);
				}
				
			}
			
		}
	
	//-----------------------------------fin Registrar  Unidad de Medida---------------------------------------------------------------
	
	//-------------------------------------------Cargar datos en el modal Actualizar---------------------------------------------------------
		
	$("#example1").on("click", "#editar", function(){
		var datos=tablaUnidadMedida.row($(this).parents("tr")).data();
	  // forma de llamar a los objetos datos.nombre d ela columna
	  $("#upId").val(datos.id);
	  $("#upUnidadMedida").val(datos.UnidadMedida);
	  $("#upSimbolo").val(datos.Simbolo);
	 
	 
	
	  console.log(datos);
	});
	
	
	
	//-------------------------------------------Cargar datos en el modal Actualizar---------------------------------------------------------
	//-------------------------------------------Cargar datos en el modal eliminar---------------------------------------------------------
	
	$("#example1").on("click", "#Eliminar", function(){
	var datos=tablaUnidadMedida.row($(this).parents("tr")).data();
	// forma de llamar a los objetos datos.nombre d ela columna
	$("#id").val(datos.id);
	
	});
	
	
	
	//-------------------------------------------Cargar datos en el modal eliminar---------------------------------------------------------
	
	//---------------------------------------------llamar actualizar Producto---------------------------------------------------------
	document.getElementById("ActualizarUnidadMedida").addEventListener("click", fntActualizar);
	//---------------------------------------------fin llamar actualizar Producto---------------------------------------------------------
	
	//---------------------------------------------llamar eliminar Producto---------------------------------------------------------
	document.getElementById("eliminarUnidadMedida").addEventListener("click", fntEliminar);
	//---------------------------------------------fin llamar eliminar Producto---------------------------------------------------------
	
	
	//-------------------------------------------actualizar producto-----------------------------------------------------------
		
	function fntActualizar() {
		frmActualizar=document.querySelector("#frmActualizar");
		actualizar();
	   async function actualizar(){
		  // id=document.querySelector("#id");
		   
	
		   try {
			   const data=new FormData(frmActualizar) ;
			   let resp=await fetch(base_url+"UnidadMedida/Actualizar",{
				   method: 'POST',
				   mode: 'cors',
				   cache: 'no-cache',
				   body: data
	
			   });
			   
			   json=await resp.json();
			   if(json.status){
				   toastr.success(json.msg);
				   tablaUnidadMedida.ajax.reload(null, false);
				   $("#modalActualizar").modal('hide');
			   }else{
				   toastr.error(json.msg);
				   
			   }               
		   } catch (err) {
			   
			   toastr.error("Error al eliminar producto");
		   }
		   
	
	   }     
	   
	 }
	
	
	   
		
	
	//-------------------------------------------fin actualizar producto---------------------------------------------------------
	//-------------------------------------------eliminar producto---------------------------------------------------------
		
	function fntEliminar() {
	   
		
		frmeliminar=document.querySelector("#frmEliminar");
		eliminar();
	   async function eliminar(){
		   
	
		   try {
			   const data=new FormData(frmeliminar) ;
			   let resp=await fetch(base_url+"UnidadMedida/Eliminar",{
				   method: 'POST',
				   mode: 'cors',
				   cache: 'no-cache',
				   body: data
	
			   });
			   
			   json=await resp.json();
			   if(json.status){
				   toastr.success(json.msg);
				   tablaUnidadMedida.ajax.reload(null, false);
				   $("#modalEliminar").modal('hide');
			   }else{
				   toastr.error(json.msg);
				   
			   }               
		   } catch (err) {
			   console.log("ocurrio un error: ".err);
		   }
	
	   }    
	   
	 }
	
	
	
	//-------------------------------------------fin eliminar producto---------------------------------------------------------
	
		
	
	
	});
