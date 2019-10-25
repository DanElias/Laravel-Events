

var button = document.getElementById("logoutButton");

button.addEventListener('click', function(e) {

    fetch('/cerrarSesion', {
    method: 'POST',
    headers: {
        "Content-Type": "application/json"
    },
    })
    .then(function(response) {
      if(response.ok) {
        window.location.pathname = '/'
        return;
      }
      throw new Error('Ocurrió un error inesperado al cerrar la sesión');
    })
    .catch(function(error) {
      alert(error);
    });
    
});




