$(document).ready(()=>{
  const validarFormLogin = new JustValidate("#formLogin",{
    tooltip:{position:"bottom"}
  });

  validarFormLogin
  .addField("#boleta",[
    {
      rule:"required",
      errorMessage:"Falta boleta"
    },
    {
      rule:"integer",
      errorMessage:"Solo dígitos"
    },
    {
      rule:"minLength",
      value:8,
      errorMessage:"Al menos 8 dígitos"
    },
    {
      rule:"maxLength",
      value:10,
      errorMessage:"A lo más 10 dígitos"
    }
  ])
  .addField("#contrasena",[
    {
      rule:"required",
      errorMessage:"Falta contraseña"
    },
    {
      rule:"strongPassword",
      errorMessage:"8 caracteres (1 minus, 1 mayus, 1 dígito, 1 carEsp"
    }
  ])
  .onSuccess((evt)=>{
    evt.preventDefault();
    let boleta = $("#boleta").val();
    let contrasena = $("#contrasena").val();
    $.ajax({
      url:"./php/index_AX.php",
      type:"POST",
      data:{boleta:boleta, contrasena:contrasena},
      cache:false,
      success:(respAX)=>{
        let objRespAX = JSON.parse(respAX);
        let mensaje = "";
        if(objRespAX.cod == 1) mensaje = objRespAX.msj + " " + objRespAX.data;
        else mensaje = objRespAX.msj;
        Swal.fire({
          title:"TDAW-2024",
          text: mensaje,
          icon:objRespAX.icono,
          didDestroy:()=>{
            if(objRespAX.cod == 1){
              sessionStorage.setItem("boleta",boleta);
              window.location.href = "./php/privado.php";
            }else{
              window.location.reload();
            }
          }
        });
      }
    });
  });
})