function openModal() {
    
    document.querySelector('.modal-title').innerHTML="Nuevo Cliente";
    document.querySelector('#formCliente').reset();

    $('#modalFormCliente').modal('show');

    
    
}