<?php
include "header.php";
?>
<!-- <script id="jsbin-javascript">
(function (global) {
	if(typeof (global) === "undefined")
	{
		throw new Error("window is undefined");
	}
    var _hash = "!";
    var noBackPlease = function () {
        global.location.href += "#";
        global.setTimeout(function () {
            global.location.href += "!";
        }, 50);
    };	
	
    global.onhashchange = function () {
        if (global.location.hash !== _hash) {
            global.location.hash = _hash;
        }
    };
    global.onload = function () {        
		noBackPlease();
		// desactiva el retroceso en la página excepto en los campos de entrada y el área de texto.
		document.body.onkeydown = function (e) {
            var elm = e.target.nodeName.toLowerCase();
            if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
                e.preventDefault();
            }
           // detener el evento que se propaga en el árbol DOM.
            e.stopPropagation();
        };		
    };
})(window); -->
</script>

<div class="main main-raised">     
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<button class="aside-toggle" id="aside-toggle">
					<i class="fa fa-bars"></i> Mostrar Menú
                </button>
				<!-- ASIDE -->
				<div id="aside-content" class="col-md-3 aside-content">
					<!-- aside Widget -->
					<div id="get_category">
					</div>
					<!-- /aside Widget -->

					<!-- aside Widget -->
					<div id="get_brand">
					</div>
					<!-- /aside Widget -->

					<!-- aside Widget -->
					<div class="aside">
						<h3 class="aside-title">Más vendidos</h3>
						<div id="get_product_home">
							<!-- product widget -->
							<!-- product widget -->
						</div>
					</div>
					<!-- /aside Widget -->
				</div>
				<!-- /ASIDE -->

				<!-- STORE -->
				<div id="store" class="col-md-9">
					<!-- store products -->
					<div class="row" id="product-row">
						<div class="col-md-12 col-xs-12" id="product_msg"></div>
						<!-- product -->
						<div id="get_product">
							<!--Se obtienen los productos mediante AJAX-->
						</div>
						<!-- /product -->
					</div>
					<!-- /store products -->
				</div>
				<!-- /STORE -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
</div>

<?php
include "newslettter.php";
include "footer.php";
?>