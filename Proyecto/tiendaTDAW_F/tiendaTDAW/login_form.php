<?php
#esta es la página del formulario de inicio de sesión, si el usuario ya inició sesión, no le permitiremos acceder a esta página ejecutando 
#isset($_SESSION["uid"]) si la siguiente declaración es verdadera, enviaremos al usuario a su página perfil.php
//en la página action.php, si el usuario hace clic en el botón "listo para pagar", en ese momento pasaremos los datos en un formulario 
//desde la página action.php
if (isset($_POST["login_user_with_product"])) {
	//esta es el arreglo de la lista de productos
	$product_list = $_POST["product_id"];
	//aquí estamos convirtiendo el arreglo al formato json porque el arreglo no se puede almacenar en una cookie
	$json_e = json_encode($product_list);
	//aquí estamos creando una cookie y el nombre de la cookie es product_list
	setcookie("product_list",$json_e,strtotime("+1 day"),"/","","",TRUE);
}
?>

	<div class="wait overlay">
		<div class="loader"></div>
	</div>
	<div class="container-fluid">
				<!-- row -->
				

					<div class="login-marg">
						<!-- Billing Details -->
						
						
						<!-- /Billing Details -->
								<form id="login" class="login100-form ">
									<div class="billing-details jumbotron">
										<div class="section-title">
											<h2 class="login100-form-title p-b-49" >Ingresa a tu cuenta</h2>
											<p class="login100-form-title p-b-49"> Ingresa tu correo y contraseña</p>
										</div>
																		
										<div class="form-group">
										<label for="email">Correo</label>
											<input class="input input-borders" type="email" name="email" placeholder="Correo" id="password" required>
										</div>
										
										<div class="form-group">
										<label for="email">Contraseña</label>
											<input class="input input-borders" type="password" name="password" placeholder="Contraseña" id="password" required>
										</div>                                 
										<input class="primary-btn btn-block"   type="submit"  Value="Login">
										<div class="text-pad">
                							<a href="#" id="openRegisterModal" data-toggle="modal">No tienes cuenta?, registrate aquí</a>
           								</div>                                       
                                	</div>                                
								</form>

					
                           
						<!-- Shiping Details -->
						
						<!-- /Shiping Details -->

						<!-- Order notes -->
						
						<!-- /Order notes -->
					</div>

					<!-- Order Details -->
					
					<!-- /Order Details -->
				
				<!-- /row -->
			</div>