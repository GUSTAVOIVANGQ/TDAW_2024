<?php
session_start();

// Destruir todas las variables de sesión
$_SESSION = array();

// Si se desea destruir la sesión completamente, también hay que eliminar la cookie de sesión
// Nota: ¡Esto destruirá la sesión y no la información de la sesión!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destruir la sesión
session_destroy();

// Eliminar cookies específicas si las tienes
if (isset($_COOKIE['nombre_de_cookie'])) {
    setcookie('nombre_de_cookie', '', time() - 42000, '/');
}

// Redirigir al usuario a la página de inicio
header("Location: index.php");
exit();
?>
