$(document).ready(function () {
    let $departamento=document.querySelector('#departamento')
    let $provincia=document.querySelector('#provincia')
    let $distrito=document.querySelector('#distrito')

    function CargarDepartamentos() {
        $.ajax({
            url: '../Controladores/datos.php',
            type: 'GET',
            success: function(response) {
                const departamentos = JSON.parse(response);
                let template = '<option  selected disabled>-- Seleccione --</option>'
    
                departamentos.forEach(departamento => {
                    template += `<option  value="${departamento.codDepartamento}">${departamento.nomDepartamento}</option>`;
                })

                $departamento.innerHTML = template;
            }
        });
    }
    CargarDepartamentos()
    function cargarProvincias(sendDatos) {
        $.ajax({
            url: '../Controladores/datos.php',
            type: 'POST',
            data: sendDatos,
            success: function(response) {
                const respuestas = JSON.parse(response);
                let template = '<option  selected disabled>-- Seleccione --</option>'
    
                respuestas.forEach(respuesta => {
                    template += `<option  value="${respuesta.codProvincia}">${respuesta.nomProvincia}</option>`;
                })

                $provincia.innerHTML = template;
            }
        })
    }

    $departamento.addEventListener('change', () => {
        const codDepartamento = $departamento.value

        
        const sendDatos = {
            'codigoDepar': codDepartamento
        }
        
        cargarProvincias(sendDatos)

        $distrito.innerHTML = ''
    })
    function cargarDistritos(sendDatos) {
        $.ajax({
            url: '../Controladores/datos.php',
            type: 'POST',
            data: sendDatos,
            success: function(response) {
                const respuestas = JSON.parse(response);
                let template = '<option  selected disabled>-- Seleccione --</option>'
    
                respuestas.forEach(respuesta => {
                    template += `<option  value="${respuesta.codDistrito}">${respuesta.nomDistrito}</option>`;
                })

                $distrito.innerHTML = template;
            }
        })
    }
    $provincia.addEventListener('change', () => {
        const codProvincia = $provincia.value

        const sendDatos = {
            'codigoProv': codProvincia
        }
        
        cargarDistritos(sendDatos)
    })











})