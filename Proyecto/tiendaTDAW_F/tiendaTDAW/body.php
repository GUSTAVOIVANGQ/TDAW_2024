<div class="main main-raised">
        <div class="container mainn-raised" style="width:100%;">
  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
   

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="img/banner1.jpg"  style="width:100%;">
        
      </div>

      <div class="item">
        <img src="img/banner2.jpg" style="width:100%;">
        
      </div>
    
      <div class="item">
        <img src="img/banner3.jpg" style="width:100%;">
        
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control _26sdfg" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only" >Previous</span>
    </a>
    <a class="right carousel-control _26sdfg" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<div class="col-md-12 col-xs-12" id="product_msg"></div>
<!-- SECCION DEL SLIDER DE LAPTOPS -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">Laptops</h3>
				</div>
			</div>
			<!-- /section title -->

			<!-- Products tab & slick -->
			<div class="col-md-12 mainn mainn-raised">
				<div class="row">
					<div class="products-tabs">
						<!-- tab -->
						<div id="tab2" class="tab-pane fade in active">
							<div class="products-slick" data-nav="#slick-nav-2">
								<!-- product -->
								<?php
			include 'db.php';
						
			
		$product_query = "SELECT * FROM products,categories WHERE product_cat=7 AND product_id BETWEEN 78 AND 82";
		$run_query = mysqli_query($con,$product_query);
		if(mysqli_num_rows($run_query) > 0){

			while($row = mysqli_fetch_array($run_query)){
				$pro_id    = $row['product_id'];
				$pro_cat   = $row['product_cat'];
				$pro_brand = $row['product_brand'];
				$pro_title = $row['product_title'];
				$pro_price = $row['product_price'];
				$pro_image = $row['product_image'];

				$cat_name = $row["cat_title"];

				echo "
		
					
						
						<div class='product'>
							<a href='product.php?p=$pro_id'><div class='product-img'>
								<img src='$pro_image' style='max-height: 170px;' alt=''>
							</div></a>
							<div class='product-body'>
								
								<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
								<h4 class='product-price header-cart-item-info'>$ $pro_price</h4>
							</div>
							<div class='add-to-cart'>
								<button pid='$pro_id' id='product' class='add-to-cart-btn block2-btn-towishlist' href='#'><i class='fa fa-shopping-cart'></i> Agregar al carrito</button>
							</div>
						</div>
						
					
				
	";
}
;

}
?>
								
								<!-- /product -->
							</div>
							<div id="slick-nav-2" class="products-slick-nav"></div>
						</div>
						<!-- /tab -->
					</div>
				</div>
			</div>
			<!-- /Products tab & slick -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECCION DEL SLIDER DE LAPTOPS -->
<br>
<br>		
<!-- SECTION -->
<div class="section mainn mainn-raised">


	<!-- container -->
	<div class="container">
	
		<!-- row -->
		<div class="row">
			<!-- shop -->
			<div class="col-md-4 col-xs-6">
				<a href="product.php?p=78"><div class="shop">
					<div class="shop-img">
						<img src="img/shop01.png" alt="">
					</div>
					<div class="shop-body">
						<h3>Coleccion de<br>Portatiles</h3>
						<a href="product.php?p=78" class="cta-btn">Compra ahora <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div></a>
			</div>
			<!-- /shop -->

			<!-- shop -->
			<div class="col-md-4 col-xs-6">
				<a href="product.php?p=12"><div class="shop">
					<div class="shop-img">
						<img src="img/shop02.png" alt="">
					</div>
					<div class="shop-body">
						<h3>Muebleria</h3>
						<a href="product.php?p=12" class="cta-btn">Compra ahora <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div></a>
			</div>
			<!-- /shop -->

			<!-- shop -->
			<div class="col-md-4 col-xs-6">
				<a href="product.php?p=96"><div class="shop">
					<div class="shop-img">
						<img src="img/shop03.png" alt="">
					</div>
					<div class="shop-body">
						<h3>Coleccion de<br>relojes</h3>
						<a href="product.php?p=96" class="cta-btn">Compra ahora <i class="fa fa-arrow-circle-right"></i></a>
					</div>
					</div></a>
			</div>
			<!-- /shop -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->
<br>
<br>
<!-- SECCION DEL SLIDER DE PRODUCTOS DE COCINA -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">ARTICULOS DE COCINA</h3>
				</div>
			</div>
			<!-- /section title -->

			<!-- Products tab & slick -->
			<div class="col-md-12 mainn mainn-raised">
				<div class="row">
					<div class="products-tabs">
						<!-- tab -->
						<div id="tab1" class="tab-pane active">
							<div class="products-slick" data-nav="#slick-nav-1" >
							
							<?php
			include 'db.php';
						
			
		$product_query = "SELECT * FROM products,categories WHERE product_cat=cat_id AND product_id BETWEEN 70 AND 75";
		$run_query = mysqli_query($con,$product_query);
		if(mysqli_num_rows($run_query) > 0){

			while($row = mysqli_fetch_array($run_query)){
				$pro_id    = $row['product_id'];
				$pro_cat   = $row['product_cat'];
				$pro_brand = $row['product_brand'];
				$pro_title = $row['product_title'];
				$pro_price = $row['product_price'];
				$pro_image = $row['product_image'];

				$cat_name = $row["cat_title"];

				echo "
		
				
						
						<div class='product'>
							<a href='product.php?p=$pro_id'><div class='product-img'>
								<img src='$pro_image' style='max-height: 170px;' alt=''>
							</div></a>
							<div class='product-body'>
								<p class='product-category'>$cat_name</p>
								<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
								<h4 class='product-price header-cart-item-info'>$ $pro_price</h4>
							</div>
							<div class='add-to-cart'>
								<button pid='$pro_id' id='product' class='add-to-cart-btn block2-btn-towishlist' href='#'><i class='fa fa-shopping-cart'></i> add to cart</button>
							</div>
						</div>
						
					
				
	";
}
;

}
?>
								<!-- product -->
								

								<!-- /product -->
								
								
								<!-- /product -->
							</div>
							<div id="slick-nav-1" class="products-slick-nav"></div>
						</div>
						<!-- /tab -->
					</div>
				</div>
			</div>
			<!-- Products tab & slick -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECCION DEL SLIDER DE PRODUCTOS DE COCINA -->

</div>
		