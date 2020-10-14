<?php
  session_start();

  if (($_SESSION['iniciar'])!="") {
    
?>


<DOCTYPE html>

<html lang="es">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8"/>
<head>
  <title></title>
  
</head>

<script type="text/javascript">
  function goBack() {
  window.history.back();
}
</script>

<body>
<div class="container">
<a href="../principal.html"><img src="../imgs/atras.png" align="left" width=80 height=80></a>
<center> <div class="box"><a href="registro_car.php"><img class = "pa" src = "imgs/subir_datos2.png"/><br>Subir información</a></div></center>
 <center><div class="box1"><a href="actualizar_art.html"><img class = "pa2" src = "imgs/logo wiiii2.png"/><br>Actualizar información</a></div></center>


</div>
</body>
</html>
<?php

}else{

  echo '<script>
                            alert("Inicia sesion");
                            location.href = "../php/form_inicio.php";
                          </script>';
                    exit;
}

?>

<style type="text/css">


body {

/* Ubicación de la imagen */

background-image: url(imgs/fondo%20de%20in.jpg);

/* Para dejar la imagen de fondo centrada, vertical y

horizontalmente */

background-position: center center;

/* Para que la imagen de fondo no se repita */

background-repeat: no-repeat;

/* La imagen se fija en la ventana de visualización para que la altura de la imagen no supere a la del contenido */

background-attachment: fixed;

/* La imagen de fondo se reescala automáticamente con el cambio del ancho de ventana del navegador */

background-size: cover;

/* Se muestra un color de fondo mientras se está cargando la imagen

de fondo o si hay problemas para cargarla */

background-color: #66999;

}







 .container{
  width: 100%;
  height: auto;
  
  align-content: center;

   margin:auto;
  margin-top:50px;


  display: flex;
  flex-direction: row;
  justify-content: space-around;
  flex-flow: wrap;

  }

  .box{
    width: 500px;
    height: 500px;
    background: orange;
    margin: 20px;
    box-sizing: border-box;
    font-size: 50px;
    border: 2px solid black;

  }

  .box1{
    width: 500px;
    height: 500px;
    background: white;
    margin: 20px;
    box-sizing: border-box;
    font-size: 50px;
    border: 2px solid black;

  }



  @media screen and (max-width: 1200px){
     .box{
      width: 40%;
     }

     
  }

  @media screen and (max-width: 600px){
     .box{
      width: 90%;
     }
  }


   @media screen and (max-width: 1200px){
     .box1{
      width: 40%;
     }
  }

  @media screen and (max-width: 600px){
     .box1{
      width: 90%;
     }
  }




  img.pa{

    margin:auto;
  margin-top:10px;

    width:70%; 
    height:70%;

  }

  img.pa2{

    margin:auto;
  margin-top:10px;

    width:70%; 
    height:70%;

  }

</style>
