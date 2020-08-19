window.addEventListener('load', function(){

  var titulos =  document.querySelectorAll("h6")
  console.log(titulos);


  titulos.forEach(function(titulo){
    var div = titulo.nextElementSibling;


    titulo.addEventListener('click', function(e){


      if (div.style.display == "none") {
        div.style.display = "block";
      } else {
        div.style.display = "none";
      }

    })

  })


})
