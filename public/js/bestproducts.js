window.addEventListener('load', function(){


    var titulos =  document.querySelectorAll(".titlebestproduct")



    titulos.forEach(function(titulo){
      var div = titulo.parentElement.nextElementSibling;




      titulo.addEventListener('click', function(e){

          if (div.style.display == "none") {
            div.style.display = "block";
          } else {
            div.style.display = "none";
          }



      })

    })



})
