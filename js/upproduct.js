let editaModal = document.getElementById('editaModal')

editaModal.addEventListener('shown.bs.modal', event => {
    let button = event.relatedTarget
    let id = button.getAttribute('data-bs-id')

    let inputid = editaModal.querySelector('.modal-body input#id')
    let inputNombre = editaModal.querySelector('.modal-body #nombreup')
    let inputApellido = editaModal.querySelector('.modal-body #apellidoup')
    let inputNaci = editaModal.querySelector('.modal-body #naciup')
    let inputCorreo = editaModal.querySelector('.modal-body #correoup')
    let inputTelefono = editaModal.querySelector('.modal-body #telefonoup')
    let inputDni = editaModal.querySelector('.modal-body #dniup')

    let url = "http://localhost:8085/jhardsystex/ajax/modal.php"
    let formData = new FormData()
    formData.append('id', id)

    fetch(url, {
        method: "POST",
        body: formData
    }).then(response => response.json())
    .then(data => {
        inputid.value = data.id
        inputNombre.value = data.nombre
        inputApellido.value = data.apellido
        inputNaci.value = data.nacimiento
        inputCorreo.value = data.correo
        inputTelefono.value = data.telefono
        inputDni.value = data.dni
    }).catch( err => console.log(err))

})