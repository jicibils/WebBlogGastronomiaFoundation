function guardarComentarios(comentario,publicacion,titulo) {

  $.ajax({
    url:"ApiWebGastronomia/registraComentarios.php",
    type:"POST",
    data:{"comentario":comentario,"tituloPubli":titulo},
    success: function(data) {

    }
  })
}


function publicarNuevaPublicacion() {
  containerMain.className = "container-main "
  containerNuevaPublicacion.className = "container-nueva-publicacion hide"
  var titulo = document.getElementById('titulo').value
  var descripcion = document.getElementById('descripcion').value
  var foto = imgSubida.result

  $.ajax({
    url:"ApiWebGastronomia/registraPublicaciones.php",
    type:"POST",
    data:{"titulo":titulo,"descripcion":descripcion,"foto":foto},
    success: function(data) {

    }
  })

  agregarPublicacion()


}


function recuperarComentarios() {
  $.ajax({
    url:"ApiWebGastronomia/recuperarComentarios.php",
    type:"GET",
    data:{},
    success: function(resultado) {
      var response = JSON.parse(resultado)
      for (var i = 0; i < response.length; i++) {
        var comentario = JSON.parse(response[i])
        cargarComentarios(comentario)
      }
    }
  })
}

function recuperarPublicaciones() {
  // Cada vez que se inicia el navegador, mostramos los datos de
  // la base de datos.
  $.ajax({
    url:"ApiWebGastronomia/recuperarPublicaciones.php",
    type:"GET",
    data:{},
    success: function(resultado) {
      var response = JSON.parse(resultado)
      for (var i = 0; i < response.length; i++) {
        var publicacion = JSON.parse(response[i])
        crearPublicacionGuardada(publicacion)
      }
      recuperarComentarios()
    }
  })
}


window.onload=function(){
  recuperarPublicaciones()

}
