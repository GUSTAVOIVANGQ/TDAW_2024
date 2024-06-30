$(document).ready(function() {
    // Abre el modal de login desde el de registro
    $('#openLoginModal').on('click', function(e) {
        e.preventDefault();
        $('#Modal_register').modal('hide');
        $('#Modal_register').on('hidden.bs.modal', function() {
            $('#Modal_login').modal('show');
            $(this).off('hidden.bs.modal'); // Elimina el listener para evitar comportamiento inesperado en el futuro
        });
    });

    // Abre el modal de registro desde el de login
    $('#openRegisterModal').on('click', function(e) {
        e.preventDefault();
        $('#Modal_login').modal('hide');
        $('#Modal_login').on('hidden.bs.modal', function() {
            $('#Modal_register').modal('show');
            $(this).off('hidden.bs.modal'); // Elimina el listener para evitar comportamiento inesperado en el futuro
        });
    });
});