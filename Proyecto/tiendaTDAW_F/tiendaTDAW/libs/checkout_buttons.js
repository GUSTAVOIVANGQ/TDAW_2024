function confirmPurchase() {
    Swal.fire({
        icon: "success",
        title: "Gracias por su compra",
        text: "Ha culminado exitosamente su compra",
        confirmButtonText: "Seguir comprando",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "index.php";
        }
    });
}

function generateReceipt() {
    // Redirigir a receipt.php con los datos de la sesión 'order'
    window.location.href = "receipt.php";
}