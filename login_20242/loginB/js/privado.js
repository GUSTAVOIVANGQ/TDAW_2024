if(!sessionStorage.getItem("boleta")){
  window.location.href = "./../";
}
$(document).ready(()=>{
  let boleta = sessionStorage.getItem("boleta");

  $("button#cerrarSesion").click(()=>{
    sessionStorage.removeItem("boleta");
    window.location.href = "./../";
  });

  $.ajax({
    url:"./privado_AX.php",
    type:"POST",
    data:{boleta:boleta},
    cache:false,
    success:(respAX)=>{
      let objAX = JSON.parse(respAX);
      $("h1#infEstudiante").text(objAX.data.nombre);
    }
  });
});