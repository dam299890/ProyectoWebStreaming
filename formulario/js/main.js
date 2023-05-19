// obtener la categoria seleccionada
// Obtener la lista desplegable y todos sus elementos
const listaDesplegable = document.querySelector('.dropdown-menu');
const elementos = listaDesplegable.querySelectorAll('.dropdown-item');

// Agregar un listener de click a cada elemento
elementos.forEach(elemento => {
  elemento.addEventListener('click', function() {
    // Obtener el texto del elemento seleccionado
    const categoriaSeleccionada = this.innerText;
    
    // Guardar el texto en localStorage para usarlo en otra página
    localStorage.setItem('categoriaSeleccionada', categoriaSeleccionada);
    
    // Ir a la página destino
    window.location.href = "categorias.php?categoria=" + categoriaSeleccionada.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase();


  });
});

const categoriaSeleccionada = localStorage.getItem('categoriaSeleccionada');



// Obtener todas las filas y flechas
const filas = document.querySelectorAll('.contenedor-carousel');
const flechasIzquierda = document.querySelectorAll('.flecha-izquierda');
const flechasDerecha = document.querySelectorAll('.flecha-derecha');
const peliculas = document.querySelectorAll('.pelicula');
const contenedores = document.querySelectorAll('.contenedor-titulo-control');

filas.forEach(fila => {
  const peliculas = fila.querySelectorAll('.pelicula');
  const cantidadPeliculas = peliculas.length;
});





flechasDerecha.forEach((flechaDerecha, i) => {
    flechaDerecha.addEventListener('click', () => {
      filas[i].scrollLeft += filas[i].offsetWidth;
  
      const indicadorActivo = contenedores[i].querySelector('.indicadores .activo');


      if (indicadorActivo.nextSibling) {
          indicadorActivo.nextSibling.classList.add('activo');
          indicadorActivo.classList.remove('activo');
      }
  
    });
  });



// Agregar evento de clic a cada flecha
flechasIzquierda.forEach((flechaIzquierda, i) => {
    flechaIzquierda.addEventListener('click', () => {
      filas[i].scrollLeft -= filas[i].offsetWidth;
  
      // Seleccionar el indicador activo dentro de la fila actual
      const indicadorActivo = contenedores[i].querySelector('.indicadores .activo');

    console.log(indicadorActivo);

      if (indicadorActivo.previousSibling) {
        indicadorActivo.previousSibling.classList.add('activo');
        indicadorActivo.classList.remove('activo');
    }
    });
  });




//-----------paginacion
let index=0;
   
filas.forEach(fila => {
    const peliculas = fila.querySelectorAll('.pelicula');
    const cantidadPeliculas = peliculas.length;
    const numeroPagina = Math.ceil(cantidadPeliculas / 4);
    
    // Crear nuevo contenedor de indicadores para esta fila
    const contenedorIndicadores = document.createElement('div');
    contenedorIndicadores.classList.add('indicadores');
    fila.closest('.contenedor').querySelector('.contenedor-titulo-control').appendChild(contenedorIndicadores);
  
    // Crear botones para este contenedor de indicadores
    for (let i = 0; i < numeroPagina; i++) {
      const indicador = document.createElement('button');
      if (i == 0) {
        indicador.classList.add('activo');

      }
      
      contenedorIndicadores.appendChild(indicador);
  
      indicador.addEventListener('click', (e) => {
        const fila = e.target.closest('.contenedor-carousel').querySelector('.fila');
        fila.scrollLeft = i * fila.offsetWidth;
  
        contenedorIndicadores.querySelector('.activo').classList.remove('activo');
        e.target.classList.add('activo');
      });
    }
  });
  


//-----------hover

peliculas.forEach((pelicula)=>{

    pelicula.addEventListener('mouseenter',(e) =>{

        const elemento = e.currentTarget;
        setTimeout(()=>{

            peliculas.forEach(pelicula => pelicula.classList.remove('hover'));
            elemento.classList.add('hover');
        },300);
    })
})


filas.forEach(fila => {
    fila.addEventListener('mouseleave', ()=>{

        peliculas.forEach(pelicula => pelicula.classList.remove('hover'));
    
    })
  });


  //-----------inicializar popovers
  const popoverTriggers = document.querySelectorAll('[data-bs-toggle="popover"]');

  popoverTriggers.forEach(trigger => {
    const container = trigger.closest('.icon-container');
    new bootstrap.Popover(trigger, {
      container: container
    });
  });
  

  //-------Agregar a favoritos

  function insertarDatos(dato1) {
    const xmlhttp = new XMLHttpRequest();


    xmlhttp.onreadystatechange = function() {
      if (this.readyState === 4 && this.status === 200) {


        console.log(this.responseText); // para imprimir la respuesta en la consola
      }
    };
    xmlhttp.open("POST", "php/agregar-favoritos.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(`id_contenido=${dato1}`); // aquí puedes enviar los datos que quieras en formato de consulta URL codificada
  }


    //-------botones para filtrar contenido por serie o pelicula


  function cambiarBotonSeleccionado(boton) {
    // Obtener todos los botones
    var botones = document.getElementsByClassName("btn-lista");
  
    // Iterar sobre todos los botones y cambiar sus clases según el botón seleccionado
    for (var i = 0; i < botones.length; i++) {
      if (botones[i] === boton) {
        botones[i].classList.remove("btn-secondary");
        botones[i].classList.add("btn-primary");
      } else {
        botones[i].classList.remove("btn-primary");
        botones[i].classList.add("btn-secondary");
      }
    }
  }
  
    //-------filtrar contenido favorito por serie o pelicula



   function cargarPagina() {
 
      filtrarcontenido(4,0,0);
    }
    
  
      window.onload = cargarPagina();
   
    

    function filtrarcontenido(tipo,cuenta,tarifa) {

      
      const xmlhttp = new XMLHttpRequest();
  
  
      xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
          document.getElementById("resultado").innerHTML = this.responseText;
        }
      };
      
      xmlhttp.open("POST", "php/filtrar-contenido.php", true);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.send(`tipo=${tipo}&cuenta=${cuenta}&tarifa=${tarifa}`); // aquí puedes enviar los datos que quieras en formato de consulta URL codificada
    }


    
 //-------cambiar informacion en configuracion
 const btnInfos = document.querySelectorAll(".btn-campo");

    console.log( btnInfos);
    btnInfos.forEach((btn) => {
      btn.addEventListener('click', function() {
        const classes = this.classList;
        const campoSeleccionado = classes[3];
        const p = document.getElementById(campoSeleccionado);
        let input = document.createElement('input');
        
        if (p.tagName === 'INPUT') {
          input = p; // si el elemento ya es un input, reemplazar el p original con el input
          p.replaceWith(input);
          this.textContent = 'Editar ' + campoSeleccionado;
        } else {

          input.value = p.textContent;
          p.replaceWith(input);
          input.id= campoSeleccionado;
          this.textContent = 'Guardar';
          switch (campoSeleccionado) {
              case "nombre":
                 input.type = "text";
                 input.pattern = '^[A-Za-z]+$';
                 break;
              case "email":
                  input.type = "email";
                  break;
              case "telefono":
                  input.type = "tel";
                  input.pattern = '[0-9]';
                  break;
              default:
                input.type = "text";
              }


        }
        
        this.addEventListener('click', function() {
          p.innerText = input.value;
          input.replaceWith(p);
          if (btn.textContent=="Guardar") {
            btn.textContent = 'Guardar';
          }
          

        });
      });
    });



function cambiarInformacion(campo,cliente) {
  var nuevaInformacion = document.getElementById(campo).value;
  var idCliente = cliente;
  var xhttp = new XMLHttpRequest();
  console.log('nueva info:'+nuevaInformacion);

 
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

      document.getElementById(campo).innerHTML = this.responseText;
      // Manejar la respuesta del servidor si es necesario
    }
  };
  xhttp.open("POST", "php/cambiar-informacion-personal.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("id_cliente=" + idCliente + "&nuevaInfo=" + nuevaInformacion + "&campo=" + campo);
}




  //-------boton favoritos
  const btnFavs = document.querySelectorAll(".btn-fav");

  btnFavs.forEach((btn) => {
    btn.addEventListener("click", () => {
      const icon = btn.querySelector("i.fa-star");
  
      if (icon.classList.contains("fa-regular")) {
        icon.classList.remove("fa-regular");
        icon.classList.add("fa-solid");
      } else {
        icon.classList.remove("fa-solid");
        icon.classList.add("fa-regular");
      }
    });
  });


  function toggleFav(btn) {
    const icon = btn.querySelector("i.fa-star");
    
    if (icon.classList.contains("fa-regular")) {
      icon.classList.remove("fa-regular");
      icon.classList.add("fa-solid");
    } else {
      icon.classList.remove("fa-solid");
      icon.classList.add("fa-regular");
    }
  }
  

//buscador webservice


const contenido =  document.getElementById('contenido');

  let buscar = document.getElementById('buscar');
  
  buscar.addEventListener('click',()=>{
  
      pelicula = document.getElementById('peli').value;
  
      console.log('click')
      consultar(pelicula);

      contenido.classList.remove('d-none');
      contenido.classList.add('d-block');

      verificarPeliculaBD(pelicula);
    
      document.getElementById('disponible').classList.remove('d-none');
      document.getElementById('disponible').classList.add('d-block');
  
      
  })
  
  
  

  async function consultar(pelicula){


    let consulta = await fetch("http://www.omdbapi.com/?apikey=f651c225&t=" + pelicula + "&r=xml")
   
    let datos = await consulta.text();

    parser = new DOMParser();

    const xmlDoc = parser.parseFromString(datos, "text/xml");

    console.log(xmlDoc);

    const titulo = xmlDoc.getElementsByTagName('movie')[0].getAttribute('title');
    const genero = xmlDoc.getElementsByTagName('movie')[0].getAttribute('genre');
    const fecha = xmlDoc.getElementsByTagName('movie')[0].getAttribute('year');
    const duracion= xmlDoc.getElementsByTagName('movie')[0].getAttribute('runtime');
    const actores = xmlDoc.getElementsByTagName('movie')[0].getAttribute('actors');
    const director = xmlDoc.getElementsByTagName('movie')[0].getAttribute('director');
    const sinopsis = xmlDoc.getElementsByTagName('movie')[0].getAttribute('plot');
    const nota = xmlDoc.getElementsByTagName('movie')[0].getAttribute('imdbRating');
    const caratula = xmlDoc.getElementsByTagName('movie')[0].getAttribute('poster');

    let codigo = document.getElementById('contenido');
    

    codigo.innerHTML = `<div class="card mb-3 mx-auto shadow" style="width: 720px;">
    <div class="row g-0  bg-card text-white">
      <div class="col-md-4">
        <img src="${caratula}" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">${titulo} ${fecha}</h5>
          <p class="card-text">${sinopsis}</p>
          <p class="card-text"><small>${duracion}</small></p>
          <p class="card-text">Género: ${genero}</p>
      <p class="card-text">Director: ${director}</p>
      <p class="card-text">Actores: ${actores}</p>
      <p class="card-text">IMDB RATE: ${nota}</p>
      
        </div>
      </div>
    </div>
  </div> `;
 

    console.log(fecha)


 }

 const carrouselMain = document.getElementById('carr-main');

 function verificarPeliculaBD(pelicula) {
  const xmlhttp = new XMLHttpRequest();

 
  xmlhttp.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {

      
      document.getElementById('disponible').innerHTML = this.responseText;
      console.log("la pelicula es " +pelicula);
      carrouselMain.classList.add('d-none');
    }
  };
  xmlhttp.open("POST", "php/verificar-pelicula-BD.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send(`pelicula=${pelicula}`); // aquí puedes enviar los datos que quieras en formato de consulta URL codificada
}


// busqueda a tiempo real


function buscarPeliculas(pelicula) {
  const xmlhttp = new XMLHttpRequest();

 
  xmlhttp.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {

      
      document.getElementById('disponible').innerHTML = this.responseText;
      console.log("la pelicula es " +pelicula);
      carrouselMain.classList.add('d-none');
    }
  };
  xmlhttp.open("POST", "php/verificar-pelicula-BD.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send(`pelicula=${pelicula}`); // aquí puedes enviar los datos que quieras en formato de consulta URL codificada
}



function myFunction() {
  var filter, ul, li, a, i, txtValue;

  var input=document.getElementById("peli");
  filter = input.value.toUpperCase();

  
  var ulList = document.getElementsByClassName("contenedor");
  var firstMatch = true;
  var hList = document.getElementsByTagName("h3");
  var indicadoresList = document.getElementsByClassName("indicadores");
  var flechaIzList = document.getElementsByClassName("flecha-izquierda");
  var flechaDeList = document.getElementsByClassName("flecha-derecha");

  for (var i = 0; i < hList.length; i++) {
    hList[i].style.display = "none";

    if (filter === "") {
      hList[i].style.display = "";

      // Mostrar todos los elementos si el filtro está vacío
    }
  }

  for (var i = 0; i < indicadoresList.length; i++) {
    indicadoresList[i].style.display = "none";

    if (filter === "") {
      indicadoresList[i].style.display = "";

      // Mostrar todos los elementos si el filtro está vacío
    }
  }

  for (var i = 0; i < flechaIzList.length; i++) {
    flechaIzList[i].style.display = "none";
    flechaDeList[i].style.display = "none";

    if (filter === "") {
      flechaIzList[i].style.display = "";
      flechaDeList[i].style.display = "";
  

      // Mostrar todos los elementos si el filtro está vacío
    }
  }
  



for (var j = 0; j < ulList.length; j++) {
  var ul = ulList[j];
  var liList = ul.getElementsByClassName("li");
  var hList = ul.getElementsByTagName("h3");

  if (filter === "") {
    ul.style.display = "";
    // Mostrar todos los elementos si el filtro está vacío
  }
  for (var i = 0; i < liList.length; i++) {
    var li = liList[i];
    var a = li.getElementsByTagName("input")[0];
    var txtValue = a.value;
     
    if (filter === "") {
      li.style.display = "";
      

      // Mostrar todos los elementos si el filtro está vacío
    } else if (txtValue.toUpperCase().indexOf(filter) > -1) {
      if (firstMatch) {
        ul.style.display = "";
        li.style.display = ""; // Mantener visible el primer elemento coincidente
        firstMatch = false;
      } else {
        ul.style.display = "none";
        li.style.display = "none"; // Ocultar los demás elementos coincidentes
      }
    } else {
      li.style.display = "none"; // Ocultar elementos no coincidentes
    }
  }
  
}



}