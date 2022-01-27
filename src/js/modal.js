const btnModales = document.querySelectorAll('.btn-beneficio');
const modales = document.querySelectorAll('.modal-beneficio');




btnModales.forEach(  btnModal => {
    btnModal.addEventListener( 'click', abrirModal );
});




function abrirModal ( event ) {
    event.preventDefault();

    const btn = event.target.getAttribute('id');

    const btnId = parseInt(btn.slice(-1));
    
    const modalSeleccionado = document.querySelector(`#modal-${btnId}`);
    
    modalSeleccionado.classList.add('modal-open');

    modalSeleccionado.addEventListener('click', cerrarModal )
}


function cerrarModal ( event ) {

    const modal = event.target;

    if ( modal.classList.contains('modal-open') ) {
        modal.classList.remove('modal-open');
    }
}