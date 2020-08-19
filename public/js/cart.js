window.addEventListener('load', function(){
  var inputs = document.querySelectorAll(".productcant");
  var final = document.querySelector(".total").firstElementChild;
console.log(final.innerText);

  inputs.forEach(function(input){
    var precio = input.parentElement.childNodes[3].innerText
    var subtotalContainer = input.parentElement.parentElement.nextElementSibling.firstElementChild.firstElementChild
    var subtotal = input.parentElement.parentElement.nextElementSibling.firstElementChild.firstElementChild.innerHTML


    input.addEventListener('change', function(e){

      subtotal = precio*this.value
      subtotalContainer.innerText = subtotal;

      var total = 0
      var total2 = document.querySelectorAll('.subtotal')

      total2.forEach(function(elemento){
         total += parseFloat(Number(elemento.innerText).toFixed(2))

      });

      final.innerText = total;

    })

  })






})
