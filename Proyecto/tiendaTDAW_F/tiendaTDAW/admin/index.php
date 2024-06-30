<?php
session_start();
include("../db.php");
include "sidenav.php";
include "topheader.php";

// Verificar si el usuario es administrador
if (!isset($_SESSION["is_admin"]) || $_SESSION["is_admin"] !== true) {
  echo '
      <script>
          alert("Acceso denegado");
          window.location.href = "./../index.php"; // Redirigir a la página de login
      </script>
  ';
  exit();
  }
?>
<head>
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
  <!-- End Navbar -->
  <div class="content">
    <div class="container-fluid">
      <div class="panel-body">
        <a>
          <?php  //success message
                    if(isset($_POST['success'])) {
                    $success = $_POST["success"];
                    echo "<h1 style='color:#0C0'>Your Product was added successfully &nbsp;&nbsp;  <span class='glyphicon glyphicon-ok'></h1></span>";
                    }
          ?>
        </a>
      </div>
      <h2 style="text-align:center; color: #FFFFFF; font-family: 'Arial', sans-serif; font-size: 36px; margin-top: 20px; text-shadow: 2px 2px 4px #000000;"> Bienvenido Administrador </h2>        <!-- partial -->
        <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
                  <div class="card bg-gradient-danger card-img-holder text-white">
                    <div class="card-body">
                      <!-- Icono de ingresos, reemplazando la imagen -->
                      <h4 class="font-weight-normal mb-3">Ingresos Totales<i class="mdi mdi-chart-line mdi-24px float-right"><i class="fas fa-dollar-sign card-img-absolute"></i></i>
                      </h4>
                      <h2 class="mb-5">$ 15,0000</h2>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin">
                  <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                      <!-- Icono de ordenes, reemplazando la imagen -->
                      <h4 class="font-weight-normal mb-3">Pedidos registrados<i class="mdi mdi-bookmark-outline mdi-24px float-right"><i class="fas fa-clipboard-list card-img-absolute"></i></i>
                      </h4>
                      <h2 class="mb-5">10</h2>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin">
                  <div class="card bg-gradient-success card-img-holder text-white">
                    <div class="card-body">
                      <!-- Icono de usuarios, reemplazando la imagen -->
                      <h4 class="font-weight-normal mb-3">Usuarios registrados <i class="mdi mdi-diamond mdi-24px float-right"><i class="fas fa-users card-img-absolute"></i></i></h4>
                      <h2 class="mb-5">20</h2>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-12 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                <?php include("./chartjs/get_global_income.php"); ?>
                <!-- Reemplazado por un icono de FontAwesome -->
                  <div class="card-header card-header-primary">
                    <h4 class="font-weight-normal mb-3">Ingresos Globales<i class="fas fa-globe-americas mdi-24px float-right"></i></h4>
                  </div>
                  <div style="width: 80%; margin: auto;">
                    <canvas id="globalIncomeChart"></canvas>
                  </div>
                  <script>
                  var datesData = <?php echo $datesJSON; ?>;
                  var incomesData = <?php echo $incomesJSON; ?>;
                  </script>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                <?php include("./chartjs/get_top_products.php"); ?>
                  <div class="card-body">
                    <div class="clearfix">
                      <!-- Reemplazado por un icono de FontAwesome -->
                      <div class="card-header card-header-primary">
                        <h4  class="font-weight-normal mb-3">Productos Más Vendidos<i class="fas fa-chart-line mdi-24px float-right"></i></h4>
                      </div>
                    </div>
                    <div style="width: 80%; margin: auto;">
                      <canvas id="topProductsChart"></canvas>
                    </div>
                    <script>
                    var productsData = <?php echo $productsJSON; ?>;
                    var salesData = <?php echo $salesJSON; ?>;
                    </script>
                      <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>
                      </div>
                </div>
              </div>
              <div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                <?php include("./chartjs/get_top_categories.php"); ?>
                  <div class="card-body">
                    <!-- Reemplazado por un icono de FontAwesome -->
                    <div class="card-header card-header-primary">
                      <h4  class="font-weight-normal mb-3">Categorías Más Vendidas<i class="fas fa-tags mdi-24px float-right"></i></h4>
                    </div>
                    <div style="width: 80%; margin: auto;">
                      <canvas id="topCategoriesChart"></canvas>
                    </div>
                    <script>
                    var categoriesData = <?php echo $categoriesJSON; ?>;
                    var salesData = <?php echo $salesJSON; ?>;
                    </script>
                    <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white">
                      <div class="card-body">
                            <div class="card-header card-header-primary">
                              <h4 class="font-weight-normal mb-3">Stock Disponible<i class="fas fa-dollar-sign mdi-24px float-right"></i></h4>
                            </div>

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

            <div class="col-12 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                  <!-- Reemplazado por un icono de FontAwesome -->
                  <div class="card-header card-header-primary">
                  <h4 class="font-weight-normal mb-3">Ingresos por Producto<i class="fas fa-dollar-sign mdi-24px float-right"></i></h4>
                    </div>
                  <?php include("./chartjs/get_product_income.php"); ?>
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
                </div>
              </div>
            </div>


        <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title"> Users List</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                        <tr><th>ID</th><th>FirstName</th><th>LastName</th><th>Email</th><th>Password</th><th>Contact</th><th>Address</th><th>City</th>
                    </tr></thead>
                    <tbody>
                    <?php
                    include("../db.php");
                    ?>

                      <?php 
                        $result=mysqli_query($con,"select * from user_info")or die ("query 1 incorrect.....");

                        while(list($user_id,$first_name,$last_name,$email,$password,$phone,$address1,$address2)=mysqli_fetch_array($result))
                        {	
                        echo "<tr><td>$user_id</td><td>$first_name</td><td>$last_name</td><td>$email</td><td>$password</td><td>$phone</td><td>$address1</td><td>$address2</td>

                        </tr>";
                        }
                        ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
           <div class="row">
            <div class="col-md-6">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title"> Categories List</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                        <tr><th>ID</th><th>Categories</th><th>Count</th>
                    </tr></thead>
                    <tbody>
                      <?php 
                        $result=mysqli_query($con,"select * from categories")or die ("query 1 incorrect.....");
                        $i=1;
                        while(list($cat_id,$cat_title)=mysqli_fetch_array($result))
                        {	
                            $sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_cat=$i";
                            $query = mysqli_query($con,$sql);
                            $row = mysqli_fetch_array($query);
                            $count=$row["count_items"];
                            $i++;
                        echo "<tr><td>$cat_id</td><td>$cat_title</td><td>$count</td>

                        </tr>";
                        }
                        ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Brands List</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                        <tr><th>ID</th><th>Brands</th><th>Count</th>
                    </tr></thead>
                    <tbody>
                      <?php 
                        $result=mysqli_query($con,"select * from brands")or die ("query 1 incorrect.....");
                        $i=1;
                        while(list($brand_id,$brand_title)=mysqli_fetch_array($result))
                        {	
                            
                            $sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_brand=$i";
                            $query = mysqli_query($con,$sql);
                            $row = mysqli_fetch_array($query);
                            $count=$row["count_items"];
                            $i++;
                        echo "<tr><td>$brand_id</td><td>$brand_title</td><td>$count</td>

                        </tr>";
                        }
                        ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
           </div>
           <div class="col-md-5">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Subscribers</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                        <tr><th>ID</th><th>email</th>
                    </tr></thead>
                    <tbody>
                      <?php 
                        $result=mysqli_query($con,"select * from email_info")or die ("query 1 incorrect.....");

                        while(list($brand_id,$brand_title)=mysqli_fetch_array($result))
                        {	
                        echo "<tr><td>$brand_id</td><td>$brand_title</td>

                        </tr>";
                        }
                        ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
           
            
          
        </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <!-- Incluir el adaptador de fecha después de Chart.js -->
      <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns"></script></head>
      <script src="../js/Chart.min.js"></script>
      <script src="./chartjs/chart_script.js"></script>
      <script src="./chartjs/chart_script2.js"></script>
      <script src="./chartjs/income_chart_script.js"></script>
      <script src="./chartjs/stock_chart_script.js"></script>
      <script src="./chartjs/product_income_chart_script.js"></script>

<?php
include "footer.php";
?>