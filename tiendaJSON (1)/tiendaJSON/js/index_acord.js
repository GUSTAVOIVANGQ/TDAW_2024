document.addEventListener("DOMContentLoaded", ()=>{

  /* ***** Procesamiento de archivo JSON y generación automatica de la estructura responsiva del HTML ***** */
  let objProductos = JSON.parse(productos);
  let filas = "";
  let i = 0;
  let numColumnas = 3;

  objProductos.forEach((valorArr)=>{
    if(i % numColumnas == 0) filas += `<div class="row">`;
    filas += `
      <div class="col-s-12 col-m-6 col-l-${12/numColumnas}">
        <h2 class="titulo">${valorArr.title}</h2>
        <img class="fotoProducto" src="${valorArr.images[0]}">
        <h3 class="precio">$ ${valorArr.price} <i class="fa-solid fa-cart-shopping comprar" data-id="${valorArr.id}"></i></h3>
        <p class="descripcion">${valorArr.description}</p>
      </div>
    `;
    if(i == numColumnas-1) filas += "</div>";
    i++;
  });

  let verProductos = document.querySelector("div#verProductos");
  verProductos.innerHTML = filas;
  /* ****************************************************************************************************** */











































  
  // let btnsComprar = document.querySelectorAll(".comprar");
  // btnsComprar = Array.from(btnsComprar);
  // btnsComprar.forEach(btnComprar => {
  //   btnComprar.onclick = ()=>{
  //     let id = btnComprar.getAttribute("data-id");
  //     console.log(id);
  //   }
  // });
  

  // let imagenes = document.images;
  // imagenes = Array.from(imagenes);
  // imagenes.forEach(imagen => {
  //   imagen.addEventListener("mouseover", ()=>{
  //     imagen.style.filter = "grayscale(1)";
  //   });
  //   imagen.addEventListener("mouseout", ()=>{
  //     imagen.style.filter = "grayscale(0%)";
  //   });
  // });

});