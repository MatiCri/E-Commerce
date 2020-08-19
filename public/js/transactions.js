window.addEventListener('load', function(){

  var titulos =  document.querySelectorAll(".compra")



  titulos.forEach(function(titulo){
    var div = titulo.nextElementSibling.children;

    titulo.addEventListener('click', function(e){


      for (var i = 0; i < div.length; i++) {
        if (div[i].style.display == "none") {
          console.log('mostrar divs');
          div[i].style.display = "block";
        } else {
          console.log('ocultar divs');
          div[i].style.display = "none";
        }

      }

    })

  })


})
