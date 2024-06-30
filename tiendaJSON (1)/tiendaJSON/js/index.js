document.addEventListener("DOMContentLoaded", ()=>{
  let objProductos = JSON.parse(productos);
  
  let filas = "";
  let columnas = 0;
  objProductos.forEach((objeto, indice)=>{
    if(indice % 4 == 0) filas += `<div class="row">`;
    filas += `
        <div class="col-s-12 col-m-6 col-l-3">
          <h3 class="nombreProducto">${objeto.title}</h3>
          <img src="${objeto.images[0]}">
          <h4 class="precioProducto">$ ${objeto.price} <i class="fa-solid fa-cart-shopping" data-id="${objeto.id}"></i></h4>
          <p class="descProducto">${objeto.description}</p>
        </div>
    `;

    if(columnas == 3){
      filas += "</div> <!-- /row -->";
      columnas = 0;
    }else{
      columnas++;
    }
  });

  let verProductos = document.querySelector("div#verProductos");
  verProductos.innerHTML = filas;

  let iconos = document.querySelectorAll("i.fa-solid");
  iconos.forEach((icono, indice)=>{
    icono.addEventListener("click", ()=>{
      console.log(icono.getAttribute("data-id"));
    });

    // icono.onclick = ()=>{
    //   console.log("Click");
    // }
  });

});