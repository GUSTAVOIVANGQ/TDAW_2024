$(document).ready(()=>{
  const validarDatosGenerales = new JustValidate("form#datosGenerales",{
    tooltip:{
      position:"bottom"
    }
  });

  validarDatosGenerales
  .addField("input#boleta",[
    {
      rule:"required",
      errorMessage:"Falta tu número de boleta"
    },
    {
      rule:"integer",
      errorMessage:"Deben ser solo digitos"
    },
    {
      rule:"minLength",
      value:8,
      errorMessage:"Deben ser al menos 8 digitos"
    },
    {
      rule:"maxLength",
      value:10,
      errorMessage:"No deben ser mas de 10 digitos"
    }
  ])
  .addField("input#nombre",[
    {
      rule:"required",
      errorMessage:"Falta tu nombre"
    }
  ])
  .addField("input#apellidos",[
    {
      rule:"required",
      errorMessage:"Faltan tus apellidos"
    }
  ])
  .addField("input#correo",[
    {
      rule:"required",
      errorMessage:"Falta tu correo electrónico"
    },
    {
      rule:"email",
      errorMessage:"Formato incorrecto del correo electrónico"
    }
  ])
  .addField("input#contrasena",[
    {
      rule:"required",
      errorMessage:"Falta tu contraseña"
    },
    {
      rule:"strongPassword",
      errorMessage:"8min, 1may, 1min, 1num, 1esp"
    }
  ])
  .onSuccess((evt)=>{
    evt.preventDefault();
    Swal.fire({
      title:"TDAW - 20242",
      text:"Formulario validado",
      icon:"success",
      didDestroy:()=>{
        window.location.reload();
      }
    });
  });
});