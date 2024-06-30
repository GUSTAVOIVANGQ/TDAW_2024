<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        .chart-container {
            width: 80%;
            margin: 20px auto;
        }
        #categorySelector {
            display: block;
            margin: 20px auto;
            padding: 10px;
            font-size: 16px;
            -webkit-text-fill-color: #FFFFFF
        }
        #categorySelector {
            background-color: #800080; /* Cambia #f0f0f0 al color que prefieras */
        }
    </style>
</head>
<?php

include "sidenav.php";
include "topheader.php";?>

<!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
                <div class="col-md-7 grid-margin stretch-card">
                  <div class="card bg-gradient-success card-img-holder text-white">
                    <div class="card-header card-header-primary">
                      <h4 class="font-weight-normal mb-3">Ingresos por Producto<i class="fas fa-dollar-sign mdi-24px float-right"></i></h4>
                    </div>
                    <div class="card-body">
                      <!-- Reemplazado por un icono de FontAwesome -->
                      <?php
                      include("./chartjs/get_product_income.php");
                      ?>
                      <div class="chart-container">
                              <select id="categorySelector">
                                  <option value="all">Todas las categorías</option>
                              </select>
                              <canvas id="productIncomeChart"></canvas>
                          </div>
                          <script>
                          var categoryList = <?php echo $category_list_json; ?>;
                          var productRevenueData = <?php echo $product_revenue_json; ?>;
                          </script>
                          <script src="./chartjs/product_income_chart_script.js"></script>
                    </div>
                  </div>
                </div>
                <div class="col-md-5 grid-margin stretch-card">
                      <div class="card bg-gradient-success card-img-holder text-white">
                      <div class="card-header card-header-primary">
                        <h4 class="font-weight-normal mb-3">Stock Disponible<i class="fas fa-dollar-sign mdi-24px float-right"></i></h4>
                      </div>
                      <div class="card">
                      <div class="card-body">
                          <!-- Reemplazado por un icono de FontAwesome -->
                          <?php
                          include("./chartjs/get_stock_data.php");
                          ?>
                              <div style="width: 80%; margin: auto;">
                                  <canvas id="stockChart"></canvas>
                              </div>
                              <script>
                              var productsData = <?php echo $productsJSON; ?>;
                              var stocksData = <?php echo $stocksJSON; ?>;
                              </script>
                              <script src="./chartjs/stock_chart_script.js"></script>
                        </div>
                      </div>
                  </div>
                </div>
          </div>
        
<?php
session_start();
include("../db.php");
error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
  $product_id=$_GET['product_id'];
  ///////picture delete/////////
  $result=mysqli_query($con,"select product_image from products where product_id='$product_id'")
  or die("query is incorrect...");

  list($picture)=mysqli_fetch_array($result);
  $path="../product_images/$picture";

  if(file_exists($path)==true)
  {
    unlink($path);
  }
  else
  {}
  /*this is delet query*/
  mysqli_query($con,"delete from products where product_id='$product_id'")or die("query is incorrect...");
}

///pagination

$page=$_GET['page'];

if($page=="" || $page=="1")
{
$page1=0;	
}
else
{
$page1=($page*10)-10;	
} 
?>
         <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Lista de Productos </h4>                
              </div>
              
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter " id="page1">
                    <thead class=" text-primary">
                      <tr><th>Imagen</th><th>Nombre</th><th>Precio</th><th>
                      <a class=" btn btn-primary" href="addproduct.php">Agregar Nuevo</a></th></tr></thead>
                    <tbody>
                      <?php 

                        $result=mysqli_query($con,"select product_id,product_image, product_title,product_price from products  where  product_cat=2 or product_cat=3 or product_cat=4 Limit $page1,12")or die ("query 1 incorrect.....");

                        while(list($product_id,$image,$product_name,$price)=mysqli_fetch_array($result))
                        {
                        echo "<tr><td><img src='$image' style='width:50px; height:50px; border:groove #000'></td><td>$product_name</td>
                        <td>$price</td>
                        <td>

                        <a class='btn btn-danger' href='productlist.php?action=delete&product_id=$product_id'>Borrar</a>
                        </td></tr>";
                        }

                        ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                 <?php 
//counting paging

                $paging=mysqli_query($con,"select product_id,product_image, product_title,product_price from products");
                $count=mysqli_num_rows($paging);

                $a=$count/10;
                $a=ceil($a);
                
                for($b=1; $b<=$a;$b++)
                {
                ?> 
                <li class="page-item"><a class="page-link" href="productlist.php?page=<?php echo $b;?>"><?php echo $b." ";?></a></li>
                <?php	
}
?>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Siguiente</span>
                  </a>
                </li>
              </ul>
            </nav>
            
           

          </div>
          
          
        </div>
      </div>
      <?php
include "footer.php";
?>
