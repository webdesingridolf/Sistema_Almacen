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


            }else{
                alert("nell",json.msg,"error");
            }
            
           
            
        } catch (err) {
            console.log("ocurrio un error: ".err);
        }
        
    }
    
}






