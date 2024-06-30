$(document).ready(()=>{
  let objProductos = JSON.parse(productos);
  let filas = "";
  let columnas = 0;
  objProductos.forEach((objeto, indice)=>{
    if(indice % 4 == 0) filas += `<div class="row">`;
    filas += `
        <div class="col-sm-12 col-md-6 col-lg-3">
          <div class="card">
            <div id="carousel_id_${indice}" class="carousel slide">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="${objeto.images[0]}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="${objeto.images[1]}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="${objeto.images[2]}" class="d-block w-100" alt="...">
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carousel_id_${indice}" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carousel_id_${indice}" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
            <div class="card-body">
              <h5 class="card-title">${objeto.title}</h5>
              <p class="card-text text-truncate">${objeto.description}</p>
              <div class="d-grid">
                <button type="button" class="btn btn-primary btnCarrito" data-id="${objeto.id}"><i class="fa-solid fa-cart-shopping"></i> $ ${objeto.price}</button>
              </div>
            </div>
          </div>
        </div>
    `;

    if(columnas == 3){
      filas += "</div> <!-- /row -->";
      columnas = 0;
    }else{
      columnas++;
    }
  });

  $("div#verProductos").html(filas);
  $("button.btnCarrito").on("click", function(){
    console.log($(this).attr("data-id"));
  });
});