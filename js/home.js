var btnNuevaPublicacion = document.getElementById('btnNuevaPublicacion')
var containerMain = document.getElementsByClassName('container-main')[0]
var containerNuevaPublicacion = document.getElementsByClassName('container-nueva-publicacion')[0]
var btnPublicarNuevaPublicacion = document.getElementById('btnPublicarNuevaPublicacion')
var imgSubida = ""

var f = new Date();
// document.write(f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear());
document.getElementById('fecha').value = f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear()

function limpiarTextArea() {
  var textAreas = document.getElementsByClassName('area')
  for (var i = 0; i < textAreas.length; i++) {
    textAreas[i].value = ""
  }
}

function agregarComentario() {
  var comentarios = document.getElementsByClassName('area')
  console.log("comentarios(area)"+comentarios);
  for (var i = 0; i < comentarios.length; i++) {
    if (comentarios[i].value.length!=0) {
      var comentario = comentarios[i].value
      var contenedorComentario = document.getElementsByClassName('contenedorComentarios')[i]
      console.log("contenedorComentarios"+contenedorComentarios);
    }
  }

  var estructuraComentario = document.createElement("div")
  estructuraComentario.className="row columns comment"
  contenedorComentario.appendChild(estructuraComentario)

  var filaComentario = document.createElement("div")
  filaComentario.className="row"

  var iconoComentario = document.createElement("div")
  iconoComentario.className="large-2 medium-2 small-2 columns;"

  var imgIcono=document.createElement("img")
  imgIcono.setAttribute("src","img/hombre.png")

  var contenedorContenidoComentario = document.createElement("div")
  contenedorContenidoComentario.className="large-10 medium-10 small-10 columns align-self-middle"
  contenedorContenidoComentario.style="word-wrap: break-word;"
  var contenidoComentario = document.createElement("p")
  contenidoComentario.innerHTML="<strong>Usuario: </strong>"+comentario

  contenedorContenidoComentario.appendChild(contenidoComentario)
  iconoComentario.appendChild(imgIcono)
  filaComentario.appendChild(iconoComentario)
  filaComentario.appendChild(contenedorContenidoComentario)
  estructuraComentario.appendChild(filaComentario)

  limpiarTextArea()

}

function agregarPublicacion(evt) {
  var titulo = document.getElementById('titulo').value
  var fecha = document.getElementById('fecha').value
  var descripcion = document.getElementById('descripcion').value
  var foto = document.getElementById('list').value

  //creamos un div que contenga la nueva lista
  var publicacionNueva=document.createElement("div")
  //le agregamos un className al div creado
  publicacionNueva.className="row columns publicacion"
  //lo añadimos al contenedor
  document.getElementById("container-publicaciones").appendChild(publicacionNueva)
  //creamos un titulo
  var tituloNuevo=document.createElement("h1")
  tituloNuevo.innerHTML = titulo
  //creamos una fecha
  var fechaNueva=document.createElement("time")
  fechaNueva.innerHTML = fecha

  // Insertamos la imagen
  var imgNueva=document.createElement("img")
  imgNueva.setAttribute("src",imgSubida.result)

  //creamos un salto en blanco
  var saltoEnBlanco = document.createElement("br")

  //creamos una descripcion
  var descripcionNueva=document.createElement("p")
  descripcionNueva.innerHTML = descripcion

  //los añadimos al nuevo div
  publicacionNueva.appendChild(tituloNuevo)
  publicacionNueva.appendChild(fechaNueva)
  publicacionNueva.appendChild(imgNueva)
  publicacionNueva.appendChild(saltoEnBlanco)
  publicacionNueva.appendChild(descripcionNueva)

// hasta aca se agrego el titulo,fecha,foto,descripcion
//ahora vamos a añadir el textArea para que puedan hacer comentarios


  var contenedorEscribirComentarios=document.createElement("div")
  contenedorEscribirComentarios.className="row columns"
  var escribirComentarios=document.createElement("div")
  escribirComentarios.className="row columns"
  var commentWrapper=document.createElement("div")
  commentWrapper.className="comment-wrapper"
  var textArea=document.createElement("textarea")
  textArea.className="area"
  textArea.id="txtComment"
  textArea.placeholder="Escriba un Comentario"
  var btnTextArea=document.createElement("a")
  btnTextArea.href="#"
  btnTextArea.className="button alert boton "
  var iconoTextArea=document.createElement("i")
  iconoTextArea.className="step fi-torso"
  var contenedorBotonPublicar=document.createElement("div")
  contenedorBotonPublicar.className="row columns boton-class"
  var btnPublicarComment=document.createElement("a")
  btnPublicarComment.href="#"
  btnPublicarComment.className="button alert "
  btnPublicarComment.id="btnPublicarComment"
  btnPublicarComment.onclick=function(){agregarComentario()};

  btnPublicarComment.innerHTML=" Publicar"
  var iconoBtnPublicar=document.createElement("i")
  iconoBtnPublicar.className="step fi-pencil"

  var contenedorComentarios = document.createElement("div")
  contenedorComentarios.className = "row columns contenedorComentarios"
  contenedorComentarios.id = "contenedorComentarios"

  btnTextArea.appendChild(iconoTextArea)

  commentWrapper.appendChild(textArea)
  commentWrapper.appendChild(btnTextArea)

  escribirComentarios.appendChild(commentWrapper)

  btnPublicarComment.appendChild(iconoBtnPublicar)
  contenedorBotonPublicar.appendChild(btnPublicarComment)

  contenedorEscribirComentarios.appendChild(escribirComentarios)
  contenedorEscribirComentarios.appendChild(contenedorBotonPublicar)

  publicacionNueva.appendChild(contenedorEscribirComentarios)
  publicacionNueva.appendChild(contenedorComentarios)



}

function escribirNuevaPublicacion() {
  containerMain.className = "container-main hide"
  containerNuevaPublicacion.className = "container-nueva-publicacion"

}

function publicarNuevaPublicacion() {
  containerMain.className = "container-main "
  containerNuevaPublicacion.className = "container-nueva-publicacion hide"

  agregarPublicacion()

}


btnNuevaPublicacion.addEventListener('click', function(e) {
  e.preventDefault()
  escribirNuevaPublicacion()
})


btnPublicarNuevaPublicacion.addEventListener('click', function(e) {
  e.preventDefault()
  publicarNuevaPublicacion()
})


function archivo(evt) {
  var files = evt.target.files; // FileList object

  // Obtenemos la imagen del campo "file".
  for (var i = 0, f; f = files[i]; i++) {
    //Solo admitimos imágenes.
    if (!f.type.match('image.*')) {
      continue;
    }

    var reader = new FileReader();

    reader.onload = (function(theFile) {
      return function(e) {
        // Insertamos la imagen
        document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
        imgSubida = e.target
      };
    })(f);

    reader.readAsDataURL(f);
  }
}

document.getElementById('files').addEventListener('change', archivo, false);
