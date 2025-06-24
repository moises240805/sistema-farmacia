function ObtenerCategoria(id) {

  fetch('index.php?url=categorias&action=obtener&ID=' + id)
    
    .then(response => response.json())
    
    .then(data => {
    
      //console.log(data);
    
      document.getElementById('id').value = data.categoria_id;
    
      document.getElementById('nombreCategoriaEdit').value = data.categoria_nombre;
    
    })
    
    .catch(error => {
    
      console.error('Error:', error);
    
    });
  
  }