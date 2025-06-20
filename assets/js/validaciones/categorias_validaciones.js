function validar_nombre() {

  var nombre = document.getElementById('nombreCategoria');
  var error = document.getElementById('errorCategoria');
  var icono = document.getElementById('icono-validacionCategoria');
  error.textContent = ''; // limpia el mensaje
  icono.innerHTML = ''; // limpia el icono
  nombre.classList.remove('input-error' , 'input-valid');
  icono.classList.remove('error');

  const regex = /^[a-zA-Z]+$/;
  var valor = nombre.value.trim();

  // si el nombre esta vacio improme error
  if (valor === '') {
    error.textContent = 'Este campo no puede estar vacío.';
    nombre.classList.add('input-error');
    icono.innerHTML = '<i class="fa fa-times"></i>'; // ícono X
    icono.classList.add('error');
    nombre.classList.add('is-invalid');  // clase bootstrap para borde rojo
    nombre.classList.remove('is-valid');
    return false;
  }

  // valida si el nombre cumple con las longitudes de caracteres
  if (valor.length < 5 || valor.length > 20) {
    error.textContent = 'El nombre de la categoria debe tener minimo 5 y maximo 20 caracteres.';
    nombre.classList.add('input-error');
    icono.innerHTML = '<i class="fa fa-times"></i>'; // ícono X
    icono.classList.add('error');
    nombre.classList.add('is-invalid');  // clase bootstrap para borde rojo
    nombre.classList.remove('is-valid');
    return false;
  }

  // valida si el formato y es valido y los caracteres especiales admitidos
  if (!regex.test(valor)) {
    error.textContent = "El nombre de la categoria no debe tener catacteres especiales y tampoco numeros  ej:Bebida .";
    nombre.classList.add('input-error');
    icono.innerHTML = '<i class="fa fa-times"></i>'; // ícono X
    icono.classList.add('error');
    nombre.classList.add('is-invalid');  // clase bootstrap para borde rojo
    nombre.classList.remove('is-valid');
    return false;
  }

  // Si pasa todas las validaciones
  error.textContent = '';
  nombre.classList.add('input-valid');
  icono.innerHTML = '<i class="fa fa-check"></i>'; // ícono tilde
  icono.classList.remove('error');
  nombre.classList.add('is-valid');    // clase bootstrap para borde verde
  nombre.classList.remove('is-invalid');
  return true;
}

function validar_formulario() {

  // almacena el valor
  const nombre_valido = validar_nombre();

  // valida el resulto y retorna true o false
  if (nombre_valido) {
    Swal.fire({
      icon: 'success',
      title: '¡Éxito!',
      text: 'Formulario valido.',
      confirmButtonText: 'Aceptar',
      timer: 6000,
      timerProgressBar: true,

    })
    return true;
  }else{
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: 'Por favor corrige los campos.',
      confirmButtonText: 'Aceptar',
      timer: 6000,
      timerProgressBar: true,
    });
    return false;
  }
}