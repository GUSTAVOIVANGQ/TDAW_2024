<?php
include "db.php";
include "header.php";
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
				<form id="checkout_form" action="index.php" method="POST" class="was-validated">

					<div class="row-checkout">
					
					<div class="col-50">
						<h3>Billing Address</h3>
						<label for="fname"><i class="fa fa-user" ></i> Full Name</label>
						<input type="text" id="fname" class="form-control" name="firstname" pattern="^[a-zA-Z ]+$"  value="'.$row["first_name"].'" readonly>
						<label for="email"><i class="fa fa-envelope"></i> Email</label>
						<input type="text" id="email" name="email" class="form-control" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$" value="'.$row["email"].'" required readonly>
						<label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
						<input type="text" id="adr" name="address" class="form-control" value="'.$row["address1"].'" required readonly>
						<label for="city"><i class="fa fa-institution"></i> City</label>
						<input type="text" id="city" name="city" class="form-control" value="'.$row["address2"].'" pattern="^[a-zA-Z ]+$" required readonly>

						<div class="row">
						<div class="col-50">
							<label for="state">State</label>
							<input type="text" id="state" name="state" class="form-control" value="'."Mexico".'" pattern="^[a-zA-Z ]+$" required readonly>
						</div>
						</div>
					</div>
										
					<div class="col-50">
						<h3>Payment</h3>
					<!-- Campos para Monedero Electrónico -->
						<div id="walletFields" style="display:enable;">
							<label for="walletBalance">Saldo</label>
							<input type="text" id="monedero_virtual" name="monedero_virtual" class="form-control" value="'.$row["monedero_virtual"].'" required readonly>
							
							<label for="walletNumber">Número de Monedero</label>
							<input type="text" id="Numbero_monedero" name="Numbero_monedero" class="form-control" value="'.$row["user_id"].'" required readonly>
						</div>					
					</div>
					</div>
					<input type="submit" id="submit" value="Regresar" class="checkout-btn">
				</form>
				</div>
			</div>
			';
			
		}else{
			echo"<script>window.location.href = 'index.php'</script>";
		}
				?>
				</div>
			</div>
</section>
<?php
include "footer.php";
?>