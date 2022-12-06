let editaModal = document.getElementById('productoupdate')

editaModal.addEventListener('shown.bs.modal', event => {
    let button = event.relatedTarget
    let id = button.getAttribute('data-bs-id')

    let inputid = editaModal.querySelector('.modal-body input#uppid')
    let inputNombre = editaModal.querySelector('.modal-body #uppname')
    let inputPrecio = editaModal.querySelector('.modal-body #uppprecio')
    let inputDescripcion = editaModal.querySelector('.modal-body #uppdescripcion')
    let inputColor = editaModal.querySelector('.modal-body #uppcolor')
    let inputCategoria = editaModal.querySelector('.modal-body #uppcategoria')
    let inputSctock = editaModal.querySelector('.modal-body #uppstock')
    let inputImagen = editaModal.querySelector('.modal-body #uppimagensrc')

    let url = "http://localhost:8085/Tienda-Carteras/view/ajax/modal.php"
    let formData = new FormData()
    formData.append('id', id)

    fetch(url, {
        method: "POST",
        body: formData
    }).then(response => response.json())
    .then(data => {
        inputid.value = data.idproducto
        inputNombre.value = data.producto
        inputPrecio.value = data.precio
        inputDescripcion.value = data.descripcion
        inputColor.value = data.idcolor
        inputCategoria.value = data.idcategoria
        inputSctock.value = data.stock
        inputImagen.src = './' + data.imagen
    }).catch( err => console.log(err))

})