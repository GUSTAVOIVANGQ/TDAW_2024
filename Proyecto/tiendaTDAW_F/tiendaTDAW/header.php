<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Politienda</title>

		<!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="./img/favicon.svg" />

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Tiny5&display=swap" rel="stylesheet">


		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
		<link type="text/css" rel="stylesheet" href="css/accountbtn.css"/>
		<link type="text/css" rel="stylesheet" href="css/checkout.css"/>
		<link rel="stylesheet" href="./css/header.css">
		<link rel="stylesheet" href="./css/store.css">
		<link rel="stylesheet" href="./css/checkout_tab.css">
		<link rel="stylesheet" href="./css/imagenes.css">
		<!-- SweetAlert CSS -->
		<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css"> -->
		<link rel="stylesheet" href="css/sweetalert.min.css">
		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					
					<ul class="header-links pull-right">
						<li><?php
                             include "db.php";
                            if(isset($_SESSION["uid"])){
                                $sql = "SELECT first_name FROM user_info WHERE user_id='$_SESSION[uid]'";
                                $query = mysqli_query($con,$sql);
                                $row=mysqli_fetch_array($query);
                                #Si el usuario a iniciado sesión se mostrará su nombre en esta sección
                                echo '
                               <div class="dropdownn">
                                  <a href="#" class="dropdownn" data-toggle="modal" data-target="#myModal" ><i class="fa fa-user-o"></i> Hola '.$row["first_name"].'</a>
                                  <div class="dropdownn-content">
                                    <a href="profile.php"><i class="fa fa-user-circle" aria-hidden="true" ></i>Mi perfil</a>
                                    <a href="./logout.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Cerrar sesion</a>
                                    
                                  </div>
                                </div>';

                            }else{ 
                                echo '
                                <div class="dropdownn">
                                  <a href="#" class="dropdownn" data-toggle="modal" data-target="#myModal" ><i class="fa fa-user-o"></i> Mi cuenta</a>
                                  <div class="dropdownn-content">
                                    <a href="" data-toggle="modal" data-target="#Modal_login"><i class="fa fa-sign-in" aria-hidden="true" ></i>Ingresar</a>
                                    <a href="" data-toggle="modal" data-target="#Modal_register"><i class="fa fa-user-plus" aria-hidden="true"></i>Registrarse</a>
                                    
                                  </div>
                                </div>';
                                
                            }
                                             ?>
                               
                                </li>				
					</ul>
					
				</div>
			</div>
			<!-- /TOP HEADER -->
			
			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-6">
							<div class="header-logo">
								<a href="index.php" class="logo">
									<span class="tiny5-regular">Poli Tienda</span>
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- BARRA DE BUSQUEDA -->
						<!-- <div class="col-md-6">
							<div class="header-search">
								<form>
									<input class="input" id="search" type="text" placeholder="Search here">
									<button type="submit" id="search_btn" class="search-btn">Search</button>
								</form>
							</div>
						</div> -->
						<!-- /BARRA DE BUSQUEDA -->

						<div class="col-md-6 clearfix">
							<div class="header-ctn">
								<!-- CARRITO -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Tu carrito</span>
										<div class="badge qty">0</div>
									</a>
									<div class="cart-dropdown"  >
										<div class="cart-list" id="cart_product">
											
										</div>
										
										<div class="cart-btns">
												<a href="cart.php" style="width:100%;"><i class="fa fa-edit"></i>Editar carrito</a>	
										</div>
									</div>
										
									</div>
								<!-- /CARRITO -->
								 <!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->	
							</div>
						</div>
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAV  -->
		<!-- <nav id='navigation'>
            <div class="container">
				<div id='responsive-nav'>
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php">Inicio</a></li>	
						<li><a href="store.php">Catalogo</a></li>
					</ul>
				</div>
            </div>				
		</nav> -->
		<!-- /NAV  -->

		<nav id='navigation'>
			<!-- container -->
            <div class="container" id="get_category_home">
                
            </div>
				<!-- responsive-nav -->
				
			<!-- /container -->
		</nav>
            
		<!-- FUNCIONES DEL MODAL -->
		<div class="modal fade" id="Modal_login" role="dialog">
            <div class="modal-dialog">									
            <!-- Contenido del modal-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>      
                    </div>
                	<div class="modal-body">
						<?php
							include "login_form.php";
						?>
          			</div>    
                </div>
			</div>
        </div>

		<div class="modal fade" id="Modal_register" role="dialog">
            <div class="modal-dialog">
            <!-- Contenido del modal-->
            	<div class="modal-content">
                    <div class="modal-header">
                    	<button type="button" class="close" data-dismiss="modal">&times;</button>      
                    </div>
                	<div class="modal-body">
                    	<?php
                    		include "register_form.php";
    
                        ?>
          			</div>        
                </div>
            </div>
        </div>
		<!-- /FUNCIONES DEL MODAL -->