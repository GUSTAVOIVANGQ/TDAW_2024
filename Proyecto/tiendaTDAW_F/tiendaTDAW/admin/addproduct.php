  <?php
session_start();
include("../db.php");


if(isset($_POST['btn_save']))
{
  $product_title=$_POST['product_title'];
  $description=$_POST['description'];
  $product_price=$_POST['product_price'];
  $product_cat=$_POST['product_cat'];
  $product_brand=$_POST['product_brand'];
  $product_keywords=$_POST['product_keywords'];
  $stock=$_POST['stock'];
  //picture url
  $product_image=$_POST['product_image'];

  // Validar si la URL de la imagen es válida
  if (!filter_var($product_image, FILTER_VALIDATE_URL)) {
      // Manejar el error si la URL no es válida
      die("La URL de la imagen no es válida.");
  }
  mysqli_query($con,"insert into products (product_cat, product_brand,product_title,product_price, product_image,product_keywords, description, stock) values ('$product_cat','$product_brand','$product_title','$product_price','$product_image','$product_keywords','$description','$stock')") or die ("query incorrect");

  header("location: sumit_form.php?success=1");
  mysqli_close($con);
}
include "sidenav.php";
include "topheader.php";
?>

<style>
/* Estilo base para el select en modo oscuro */
.custom-select-dark {
  background-color: #333;
  color: #fff;
  padding: 10px 15px;
  border: 1px solid #444;
  border-radius: 5px;
  cursor: pointer;
  outline: none;
}

/* Estilo para las opciones en modo oscuro */
.custom-select-dark option {
  background: #555; /* Fondo más claro que el select para contraste */
  color: #ddd; /* Texto claro para leer fácilmente */
  padding: 10px;
}

/* Estilo para el select al hacer hover en modo oscuro */
.custom-select-dark:hover {
  background-color: #222; /* Un poco más oscuro al hacer hover */
  box-shadow: 0 4px 8px rgba(0,0,0,0.5);
}

/* Estilo para el select al estar enfocado en modo oscuro */
.custom-select-dark:focus {
  box-shadow: 0 4px 12px rgba(0,0,0,0.6);
  transition: box-shadow 0.2s ease-in-out;
}
</style>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
          <div class="row">
          
                
         <div class="col-md-7">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Agregar Producto</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group custom-select-dark">
                        <label>Titulo del Producto</label>
                        <input type="text" id="product_title" required name="product_title" class="form-control" placeholder="Ingrese el nombre del producto">
                      </div>
                    </div>
                    <div class="col-md-12"> <!-- Cambiado de col-md-4 a col-md-12 -->
                      <div class="form-group custom-select-dark">
                        <label for="picture">URL Imagen</label>
                        <input type="url" name="product_image" required id="product_image" class="form-control" placeholder="Ingrese la URL de la imagen">
                      </div>
                    </div>
                     <div class="col-md-12">
                      <div class="form-group custom-select-dark">
                        <label>Descripcion</label>
                        <textarea rows="4" cols="80" id="description" required name="description" class="form-control"placeholder="Ingrese detalles del producto"></textarea>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group custom-select-dark">
                        <label>Precio</label>
                        <input type="number" id="product_price" name="product_price" required class="form-control" step="0.01" min="0" max="99999.99" placeholder="Ejemplo: 19.99">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group custom-select-dark">
                        <label>Stock</label>
                        <input type="number" id="stock" name="stock" required class="form-control" step="1" min="0" max="9999" placeholder="Ejemplo: 150">
                      </div>
                    </div> 
                  </div>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Categories</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Categoria de Producto</label>
                        <select id="cat_title" name="cat_title" required class="form-control custom-select-dark">
                          <?php
                          $result = mysqli_query($con, "SELECT * FROM categories");
                          while($row = mysqli_fetch_array($result)) {
                              echo "<option style='color: black; background-color: white; text ' value='" . $row['cat_id'] . "'>" . $row['cat_title'] . "</option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Marca del producto</label>
                        <select id="product_brand" name="product_brand" required class="form-control custom-select-dark">
                          <?php
                          $result = mysqli_query($con, "SELECT * FROM brands");
                          while($row = mysqli_fetch_array($result)) {
                              echo "<option style='color: black; background-color: white;' value='" . $row['brand_id'] . "'>" . $row['brand_title'] . "</option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group custom-select-dark">
                        <label>Tags del Producto</label>
                        <input type="text" id="product_keywords" name="product_keywords" required class="form-control" placeholder="Ingrese palabras clave del producto">
                      </div>
                    </div>
                  </div>
              </div>
              <div class="card-footer">
                  <button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Agregar Producto</button>
              </div>
            </div>
          </div>
          
        </div>
         </form>
          
        </div>
      </div>
      <?php
include "footer.php";
?>