<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Contactanos<div class="underline"><span></span></div></h3>
								
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>address</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>8825969040</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>politienda@gmail.com</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-6 text-center" style="margin-top:80px;">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
							
							</span>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Acerca de nosotros<div class="underline"><span></span></div> </h3>
								<ul class="footer-links">
								<li><p>Somos estudiantes de la materia de TDAW. ¡Bienvenidos a nuestra tienda online!</p></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->
                

			<!-- bottom footer -->
			
			<!-- /bottom footer -->
		</footer>

		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script> -->
		<script src="js/sweetalert.min.js"></script>
		<script src="js/jquery.payform.min.js" charset="utf-8"></script>
    	<script src="js/justValidate.min.js" charset="utf-8"></script>

		<!-- Scripts propios -->
		<script src="libs/main.js"></script>
		<script src="libs/actions.js"></script>
		<script src="libs/script.js"></script>
		<script src="libs/header.js"></script>
		<script src="libs/store.js"></script>
		<script src="libs/checkout_buttons.js"></script>

		<!-- Script para cerrar modal de registro en caso de que se tenga una cuenta -->
		<script>
			$(document).ready(function() {
				$('#openLoginModal').on('click', function(e) {
					e.preventDefault();
					$('#Modal_register').modal('hide');
					$('#Modal_register').on('hidden.bs.modal', function() {
						$(this).off('hidden.bs.modal'); // Elimina el listener para evitar comportamiento inesperado en el futuro
					});
				});
			});
		</script>

		<script>
			$(document).ready(function() {
				$('#openRegisterModal').on('click', function(e) {
					e.preventDefault();
					$('#Modal_login').modal('hide');
					$('#Modal_login').on('hidden.bs.modal', function() {
						$(this).off('hidden.bs.modal'); // Elimina el listener para evitar comportamiento inesperado en el futuro
					});
				});
			});
		</script>

		<script>var c = 0;
        function menu(){
          if(c % 2 == 0) {
            document.querySelector('.cont_drobpdown_menu').className = "cont_drobpdown_menu active";    
            document.querySelector('.cont_icon_trg').className = "cont_icon_trg active";    
            c++; 
              }else{
            document.querySelector('.cont_drobpdown_menu').className = "cont_drobpdown_menu disable";        
            document.querySelector('.cont_icon_trg').className = "cont_icon_trg disable";        
            c++;
              }
        }
           
		
</script>
    <script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>
	
