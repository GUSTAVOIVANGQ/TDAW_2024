$(document).ready(function(){
	cat();
    cathome();
	brand();
	product();
    producthome();
    
    
	//cat() es una función que obtiene el registro de categoría de la base de datos cada vez que se carga la página
	function cat(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{category:1},
			success	:	function(data){
				$("#get_category").html(data);
				
			}
		})
	}
    function cathome(){
		$.ajax({
			url	:	"homeaction.php",
			method:	"POST",
			data	:	{categoryhome:1},
			success	:	function(data){
				$("#get_category_home").html(data);
				
			}
		})
	}
	//brand() es una función que obtiene el registro de la marca de la base de datos cada vez que se carga la página
	function brand(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{brand:1},
			success	:	function(data){
				$("#get_brand").html(data);
			}
		})
	}
	//product() es una función que obtiene el registro del producto de la base de datos cada vez que se carga la página
	function product(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{getProduct:1},
			success	:	function(data){
				$("#get_product").html(data);
			}
		})
	}
    gethomeproduts();
    function gethomeproduts(){
		$.ajax({
			url	:	"homeaction.php",
			method:	"POST",
			data	:	{gethomeProduct:1},
			success	:	function(data){
				$("#get_home_product").html(data);
			}
		})
	}
    function producthome(){
		$.ajax({
			url	:	"homeaction.php",
			method:	"POST",
			data	:	{getProducthome:1},
			success	:	function(data){
				$("#get_product_home").html(data);
			}
		})
	}
   
    
	/*	Cuando la página se carga correctamente, aparece una lista de categorías. 
	Cuando el usuario hace clic en una categoría, obtenemos el ID de la categoría y, 
	según el ID, mostramos los productos.
	*/
	$("body").delegate(".category","click",function(event){
		$("#get_product").html("<h3>Loading...</h3>");
		event.preventDefault();
		var cid = $(this).attr('cid');
		
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{get_seleted_Category:1,cat_id:cid},
			success	:	function(data){
				$("#get_product").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})
	
	})
    $("body").delegate(".categoryhome","click",function(event){
		$("#get_product").html("<h3>Loading...</h3>");
		event.preventDefault();
		var cid = $(this).attr('cid');
		
			$.ajax({
			url		:	"homeaction.php",
			method	:	"POST",
			data	:	{get_seleted_Category:1,cat_id:cid},
			success	:	function(data){
				$("#get_product").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})
	
	})

	/*	Cuando la página se carga correctamente, aparece una lista de marcas. 
	Cuando el usuario hace clic en una marca, obtenemos la identificación de la marca y, 
	según la identificación de la marca, mostramos los productos.
	*/
	$("body").delegate(".selectBrand","click",function(event){
		event.preventDefault();
		$("#get_product").html("<h3>Loading...</h3>");
		var bid = $(this).attr('bid');
		
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{selectBrand:1,brand_id:bid},
			success	:	function(data){
				$("#get_product").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})
	
	})
	/*
		En la parte superior de la página hay un cuadro de búsqueda con un botón de búsqueda. 
		Cuando el usuario ingresa el nombre del producto, tomamos la cadena dada por el usuario y, 
		con la ayuda de una consulta SQL, hacemos coincidir la cadena dada por el usuario con la columna 
		de palabras clave de nuestra base de datos. Luego, el producto que coincida lo mostraremos.
	*/
	$("#search_btn").click(function(){
		$("#get_product").html("<h3>Loading...</h3>");
		var keyword = $("#search").val();
		if(keyword != ""){
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{search:1,keyword:keyword},
			success	:	function(data){ 
				$("#get_product").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})
		}
	})

	/*
		Aquí #login es el ID del formulario de inicio de sesión y este formulario está disponible en la página index.php
		desde aquí los datos de entrada se envían a la página login.php si obtiene la cadena login_success de la página
		login.php significa que el usuario ha iniciado sesión correctamente y window.location se usa para redirigir al
		usuario desde la página de inicio a la página profile.php
	*/
	$("#login").on("submit", function(event){
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url: "login.php",
			method: "POST",
			data: $("#login").serialize(),
			success: function(data){
				$(".overlay").hide();
				if(data === "login_success"){
					window.location.href = "index.php";
				} else if(data === "cart_login"){
					window.location.href = "cart.php";
				} else if(data === "login_success_a"){
					window.location.href = "admin/index.php";
					console.log("Se ingresó como admin");
				} else if(data === "incorrect_password"){
					Swal.fire({
						icon: "error",
						title: "Contraseña incorrecta",
						text: "Por favor, intenta de nuevo."
					});
				} else if(data === "account_not_exist"){
					Swal.fire({
						icon: "error",
						title: "Cuenta no existente",
						text: "Favor de registrarse."
					});
				} else {
					Swal.fire({
						icon: "error",
						title: "Error",
						text: "Algo salió mal. Por favor, intenta de nuevo."
					});
				}
			},
			error: function(xhr, status, error){
				$(".overlay").hide();
				console.log("AJAX error: " + error);
				Swal.fire({
					icon: "error",
					title: "Error de servidor",
					text: "Algo salió mal. Por favor, intenta de nuevo más tarde."
				});
			}
		});
	});
	

	//Aqui se obtiene la información del usuario antes de realizar el pago
	$("#signup_form").on("submit",function(event){
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url : "register.php",
			method : "POST",
			data : $("#signup_form").serialize(),
			success : function(data){
				$(".overlay").hide();
				if (data == "register_success") {
					window.location.href = "cart.php";
				}else{
					$("#signup_msg").html(data);
				}
				
			}
		})
	})
	
	
    $("#offer_form").on("submit",function(event){
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url : "offersmail.php",
			method : "POST",
			data : $("#offer_form").serialize(),
			success : function(data){
				$(".overlay").hide();
				$("#offer_msg").html(data);
				
			}
		})
	})

	//Añadir productos al carrito
	$("body").delegate("#product","click",function(event){
		var pid = $(this).attr("pid");
		
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {addToCart:1,proId:pid,},
			success : function(data){
				count_item();
				getCartItem();
				$('#product_msg').html(data);
				$('.overlay').hide();
			}
		})
	})

	//Función de contar artículos del carrito del usuario
	count_item();
	function count_item(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {count_item:1},
			success : function(data){
				$(".badge").html(data);
			}
		})
	}

	//Obtener un artículo del carrito desde la base de datos al menú desplegable
	getCartItem();
	function getCartItem(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {Common:1,getCartItem:1},
			success : function(data){
				$("#cart_product").html(data);
                net_total();
                
			}
		})
	}

	/*
		Cada vez que el usuario cambia la cantidad, actualizaremos inmediatamente su monto total mediante la función 
		keyup pero cada vez que el usuario ingresa algo (como ?''"",.()''etc) que no sea un número, haremos que la 
		cantidad sea igual a 1 si el usuario ingresa una cantidad igual a 0 o menor que 0, la volveremos a establecer 
		en 1, cantidad = 1 ('.total').each() esta es una función de bucle que se repite para la clase .total y en cada 
		repetición realizaremos la operación de suma del valor de la clase .total y luego mostraremos el resultado 
		en la clase .net_total
	*/
	$("body").delegate(".qty","keyup",function(event){
		event.preventDefault();
		var row = $(this).parent().parent();
		var price = row.find('.price').val();
		var qty = row.find('.qty').val();
		if (isNaN(qty)) {
			qty = 1;
		};
		if (qty < 1) {
			qty = 1;
		};
		var total = price * qty;
		row.find('.total').val(total);
		var net_total=0;
		$('.total').each(function(){
			net_total += ($(this).val()-0);
		})
		$('.net_total').html("Total : $ " +net_total);

	}) 

	/*
		Cada vez que el usuario haga clic en la clase .remove, tomaremos el ID del producto de esa fila y 
		lo enviaremos a action.php para realizar la operación de eliminación del producto.
	*/ 
    $("body").delegate(".remove","click",function(event){
        var remove = $(this).parent().parent().parent();
        var remove_id = remove.find(".remove").attr("remove_id");
        $.ajax({
            url	:	"action.php",
            method	:	"POST",
            data	:	{removeItemFromCart:1,rid:remove_id},
            success	:	function(data){
                $("#cart_msg").html(data);
                checkOutDetails();
                }
            })
    })
    
	/*
		Cada vez que el usuario haga clic en la clase .update, tomaremos el ID del producto de esa fila y 
		lo enviaremos a action.php para realizar la operación de actualización de la cantidad del producto.
	*/
	$("body").delegate(".update","click",function(event){
		var update = $(this).parent().parent().parent();
		var update_id = update.find(".update").attr("update_id");
		var qty = update.find(".qty").val();
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{updateCartItem:1,update_id:update_id,qty:qty},
			success	:	function(data){
				$("#cart_msg").html(data);
				checkOutDetails();
			}
		})


	})

	checkOutDetails();
	net_total();
	/*
		La función checkOutDetails() funciona con dos propósitos:
		Primero, habilitará la función isset($_POST["Common"]) de PHP en la página action.php y dentro de ella
		hay dos funciones isset, que son isset($_POST["getCartItem"]) y otra es isset($_POST["checkOutDetials"])
		getCartItem se utiliza para mostrar el artículo del carrito en el menú desplegable
		checkOutDetails se utiliza para mostrar el artículo del carrito en la página Cart.php
	*/
	function checkOutDetails(){
	 $('.overlay').show();
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {Common:1,checkOutDetails:1},
			success : function(data){
				$('.overlay').hide();
				$("#cart_checkout").html(data);
					net_total();
			}
		})
	}

	/*
		La función net_total se utiliza para calcular la cantidad total de artículos del carrito.
	*/
	function net_total(){
		var net_total = 0;
		$('.qty').each(function(){
			var row = $(this).parent().parent();
			var price  = row.find('.price').val();
			var total = price * $(this).val()-0;
			row.find('.total').val(total);
		})
		$('.total').each(function(){
			net_total += ($(this).val()-0);
		})
		$('.net_total').html("Total : $ " +net_total);
	}

	//Eliminar producto del carrito
	page();
	function page(){
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{page:1},
			success	:	function(data){
				$("#pageno").html(data);
			}
		})
	}
	$("body").delegate("#page","click",function(){
		var pn = $(this).attr("page");
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{getProduct:1,setPage:1,pageNumber:pn},
			success	:	function(data){
				$("#get_product").html(data);
			}
		})
	})
})