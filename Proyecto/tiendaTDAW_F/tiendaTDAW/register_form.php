<div class="wait overlay">
    <div class="loader"></div>
</div>
<style>
.input-borders {
    border-radius: 30px;
}
</style>

<div class="container-fluid">
    <form id="signup_form" onsubmit="return false" class="login100-form">
        <div class="billing-details jumbotron">
            <div class="section-title">
                <h2 class="login100-form-title p-b-49">Registrarte aquí</h2>
            </div>
            <div class="form-group">
                <input class="input form-control input-borders" type="text" name="f_name" id="f_name" placeholder="Nombre">
            </div>
            <div class="form-group">
                <input class="input form-control input-borders" type="text" name="l_name" id="l_name" placeholder="Apellido">
            </div>
            <div class="form-group">
                <input class="input form-control input-borders" type="email" name="email" placeholder="Correo electrónico">
            </div>
            <div class="form-group">
                <input class="input form-control input-borders" type="password" name="password" id="password" placeholder="Contraseña">
            </div>
            <div class="form-group">
                <input class="input form-control input-borders" type="password" name="repassword" id="repassword" placeholder="Confirma tu contraseña">
            </div>
            <div class="form-group">
                <input class="input form-control input-borders" type="text" name="mobile" id="mobile" placeholder="Número telefonico">
            </div>
            <div class="form-group">
                <input class="input form-control input-borders" type="text" name="address1" id="address1" placeholder="Dirección">
            </div>
            <div class="form-group">
                <input class="input form-control input-borders" type="text" name="address2" id="address2" placeholder="Ciudad">
            </div>
            <div class="form-group">
                <input class="primary-btn btn-block" value="Registrarse" type="submit" name="signup_button">
            </div>
            <div class="text-pad">
                <a href="#" id="openLoginModal" data-toggle="modal">¿Ya tienes una cuenta? Inicia sesión</a>
            </div>
        </div>
    </form>

    <div class="login-marg">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8" id="signup_msg">
            </div>
            <!--Alert desde el formulario de registro-->
            <div class="col-md-2">
            </div>
        </div>
    </div>
</div>
