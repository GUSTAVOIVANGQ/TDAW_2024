<?php
include "db.php";
include "header.php";
//  seccion de la base de datos 'Tiendatdaw.sql' que registra la orden de los productos
/*
CREATE TABLE `orders` (
    `order_id` int(11) NOT NULL AUTO_INCREMENT,
    `user_id` int(10) NOT NULL,
    `order_date` datetime NOT NULL,
    `product_id` int(100) NOT NULL,
    `quantity` int(11) NOT NULL,
    `price` decimal(10,2) NOT NULL,
    `total_amount` decimal(10,2) NOT NULL,
    PRIMARY KEY (`order_id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

   CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `monedero_virtual` DECIMAL(10,2) NOT NULL DEFAULT 10000;
  `address1` varchar(300) NOT NULL,
  `address2` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

*/  

?>
					
<section class="section">       
	<div class="container-fluid">
		<div class="row-checkout">
		<?php
		if(isset($_SESSION["uid"])){
			$sql = "SELECT * FROM user_info WHERE user_id='$_SESSION[uid]'";
			$query = mysqli_query($con,$sql);
			$row=mysqli_fetch_array($query);
		
		echo'
			<div class="col-75">
				<div class="container-checkout">
				<form id="checkout_form" action="checkout_process.php" method="POST" class="was-validated">

					<div class="row-checkout">
					
					<div class="col-50">
						<h3>Billing Address</h3>
						<label for="fname"><i class="fa fa-user" ></i> Full Name</label>
						<input type="text" id="fname" class="form-control" name="firstname" pattern="^[a-zA-Z ]+$"  value="'.$row["first_name"].'">
						<label for="email"><i class="fa fa-envelope"></i> Email</label>
						<input type="text" id="email" name="email" class="form-control" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$" value="'.$row["email"].'" required>
						<label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
						<input type="text" id="adr" name="address" class="form-control" value="'.$row["address1"].'" required>
						<label for="city"><i class="fa fa-institution"></i> City</label>
						<input type="text" id="city" name="city" class="form-control" value="'.$row["address2"].'" pattern="^[a-zA-Z ]+$" required>

						<div class="row">
						<div class="col-50">
							<label for="state">State</label>
							<input type="text" id="state" name="state" class="form-control" value="'."Mexico".'" pattern="^[a-zA-Z ]+$" required>
						</div>
						</div>
						<!-- Método de Pago ComboBox -->
						<div class="form-group">
							<label for="paymentMethod">Método de Pago</label>
							<select class="form-control" id="paymentMethod" name="paymentMethod" required onchange="togglePaymentMethod()">
								<option value="">Seleccione un método</option>
								<option value="wallet">Monedero Electrónico</option>
								<!--<option value="creditCard">Tarjeta de Crédito</option>-->
							</select>
						</div>
					</div>
										
					<div class="col-50">
						<h3>Payment</h3>
					<!-- Campos para Monedero Electrónico -->
						<div id="walletFields" style="display:none;">
							<label for="walletBalance">Saldo</label>
							<input type="text" id="monedero_virtual" name="monedero_virtual" class="form-control" value="'.$row["monedero_virtual"].'" required readonly>
							
							<label for="walletNumber">Número de Monedero</label>
							<input type="text" id="Numbero_monedero" name="Numbero_monedero" class="form-control" value="'.$row["user_id"].'" required readonly>
						</div>					
					<!-- Campos para Tarjeta de Crédito -->
					<div id="creditCardFields" style="display:none;">
						<h3>Pago</h3>
						<label for="fname">Tarjetas Aceptadas</label>
						<div class="icon-container">
						<i class="fa fa-cc-visa" style="color:navy;"></i>
						<i class="fa fa-cc-amex" style="color:blue;"></i>
						<i class="fa fa-cc-mastercard" style="color:red;"></i>
						<i class="fa fa-cc-discover" style="color:orange;"></i>
						</div>
						<label for="cname">Nombre en la Tarjeta</label>
						<input type="text" id="cname" name="cardname" class="form-control" pattern="^[a-zA-Z ]+$">
						
						<div class="form-group" id="card-number-field">
							<label for="cardNumber">Número de Tarjeta</label>
							<input type="text" class="form-control" id="cardNumber" name="cardNumber">
						</div>
						<label for="expdate">Fecha de Expiración</label>
						<input type="text" id="expdate" name="expdate" class="form-control" pattern="^((0[1-9])|(1[0-2]))/(\d{2})$" placeholder="12/22">
						
						<div class="form-group CVV">
							<label for="cvv">CVV</label>
							<input type="text" class="form-control" name="cvv" id="cvv">
						</div>
					</div>

					<!-- Visibilidad de los campos para Tarjeta de Crédito -->
						<script>
							function togglePaymentMethod() {
								var paymentMethod = document.getElementById("paymentMethod").value;
								if(paymentMethod == "wallet") {
									document.getElementById("walletFields").style.display = "block";
									document.getElementById("creditCardFields").style.display = "none";
								} else if(paymentMethod == "creditCard") {
									document.getElementById("walletFields").style.display = "none";
									document.getElementById("creditCardFields").style.display = "block";
								} else {
									document.getElementById("walletFields").style.display = "none";
									document.getElementById("creditCardFields").style.display = "none";
								}
							}
						</script>

					</div>
					</div>
					<label><input type="CHECKBOX" name="q" class="roomselect" value="conform" required> La dirección de envío es la misma que la de facturación
					</label>';
					$i=1;
					$total=0;
					$total_count=$_POST['total_count'];
					while($i<=$total_count){
						$item_name_ = $_POST['item_name_'.$i];
						$amount_ = $_POST['amount_'.$i];
						$quantity_ = $_POST['quantity_'.$i];
						$total=$total+$amount_ ;
						$sql = "SELECT product_id FROM products WHERE product_title='$item_name_'";
						$query = mysqli_query($con,$sql);
						$row=mysqli_fetch_array($query);
						$product_id=$row["product_id"];
						
						echo "	
						<input type='hidden' name='product_title_$i' value='$item_name_'>
						<input type='hidden' name='product_id_$i' value='$product_id'>
						<input type='hidden' name='prod_qty_$i' value='$quantity_'>						
						<input type='hidden' name='prod_price_$i' value='$amount_'>
						";
						$i++;
					}
					
				echo'	
					<input type="hidden" name="total_count" value="'.$total_count.'">
					<input type="hidden" name="total_price" value="'.$total.'">
					
					<input type="submit" id="submit" value="Continue to checkout" class="checkout-btn">
				</form>

				</div>
			</div>
			';
			
		}else{
			echo"<script>window.location.href = 'cart.php'</script>";
		}
		?>

			<div class="col-25">
				<div class="container-checkout">
				
				<?php
				if (isset($_POST["cmd"])) {
				
					$user_id = $_POST['custom'];
					
					
					$i=1;
					echo
					"
					<h4>Cart 
					<span class='price' style='color:black'>
					<i class='fa fa-shopping-cart'></i> 
					<b>$total_count</b>
					</span>
				</h4>

					<table class='table table-condensed'>
					<thead><tr>
					<th >no</th>
					<th >product title</th>
					<th >	qty	</th>
					<th >	amount</th></tr>
					</thead>
					<tbody>
					";
					$total=0;
					while($i<=$total_count){
						$item_name_ = $_POST['item_name_'.$i];
						
						$item_number_ = $_POST['item_number_'.$i];
						
						$amount_ = $_POST['amount_'.$i];
						
						$quantity_ = $_POST['quantity_'.$i];
						$total=$total+$amount_ ;
						$sql = "SELECT product_id FROM products WHERE product_title='$item_name_'";
						$query = mysqli_query($con,$sql);
						$row=mysqli_fetch_array($query);
						$product_id=$row["product_id"];
					
						echo "	

						<tr><td><p>$item_number_</p></td><td><p>$item_name_</p></td><td ><p>$quantity_</p></td><td ><p>$amount_</p></td></tr>";
						
						$i++;
					}

				echo"

				</tbody>
				</table>
				<hr>
				
				<h3>total<span class='price' style='color:black'><b>$$total</b></span></h3>";
					
				}
				?>
				</div>
			</div>
		</div>
	</div>
</section>
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Sign Up for the <strong>NEWSLETTER</strong></p>
							<form >
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		
<?php
include "footer.php";
?>