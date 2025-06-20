fetch('index.php?url=categorias&action=consultar')
  .then(response => response.json())
  .then(data => {
    console.log(data);
    const tbody = document.getElementById('tabla');
    tbody.innerHTML = ''; // Limpiar contenido previo

    data.forEach((categoria, index) => {
      const fila = document.createElement('tr');

      fila.innerHTML = `
        <td>${index + 1}</td>
        <td>${categoria.categoria_nombre}</td>
        <td>
          <div class="form-button-action">
            <button
              type="button"
              data-bs-toggle="tooltip"
              title="Editar"
              class="btn btn-link btn-primary btn-lg"
              onclick="editarCategoria(${categoria.categoria_id}, '${categoria.categoria_nombre.replace(/'/g, "\\'")}')"
            >
              <i class="fa fa-edit"></i>
            </button>
            <button
              type="button"
              data-bs-toggle="tooltip"
              title="Eliminar"
              class="btn btn-link btn-danger"
              onclick="eliminarCategoria(${categoria.categoria_id})"
            >
              <i class="fa fa-times"></i>
            </button>
          </div>
        </td>
      `;

      tbody.appendChild(fila);
    });
  })
  .catch(error => {
    console.error('Error:', error);
    document.getElementById('error').textContent = 'Error al cargar las categorías.';
  });

    function editarCategoria(id, nombre) {
  // Aquí puedes abrir un modal y llenar los campos con id y nombre
  console.log('Editar categoría:', id, nombre);
  // Ejemplo:
  document.getElementById('id').value = id;
  document.getElementById('nombre').value = nombre;
  // Mostrar modal...
}

function eliminarCategoria(id) {
  if (confirm('¿Estás seguro de eliminar esta categoría?')) {
    // Lógica para eliminar categoría por id (AJAX o formulario)
    console.log('Eliminar categoría:', id);
  }
}
