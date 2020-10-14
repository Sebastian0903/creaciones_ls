<?php  //abrimos php
require "BD/conexion.php";

session_start();

  if (($_SESSION['iniciar'])!="") {
$objConexion = Conectarse();
$sql="SELECT tipo_producto, id_producto, img, nombre_producto, precio_producto  FROM products AS P INNER JOIN tipo_product AS DP ON P.id_producto = DP.id_producto";


$resultado = $objConexion->query($sql);



//cerramos php ?>  


<!DOCTYPE html> 
<html lang="es">
<head>
<meta charset="utf-8">
<title>Formulario de Registro</title>
<link href="css/estilopro.css" rel="stylesheet" type="text/css">
</head>

<script type="text/javascript">
  function goBack() {
  window.history.back();
}
</script>

<body>

<img onclick="goBack()" src="../imgs/atras.png" align="left" width=80 height=80>

<div class="group">
  <form action="registro.php" method="POST" enctype="multipart/form-data">
  <h2><em>Registro de nuevo artículo</em></h2>
  
     
        
      
      <label for="apellido">ID <span><em>(requerido)</em></span></label>
      <input type="text" name="codigo" class="form-input" required/>             
      
      <label for="apellido">imagen <span><em>(requerido)</em></span></label>
      <input placeholder="imagen.jpg" type="file" name="imagen" class="form-input" required/>     
      
      <label for="email">Nombre <span><em>(requerido)</em></span></label>
      <input type="text" name="nombreart" class="form-input" />
        
      <label for="email">Tipo de producto<span><em>(requerido)
      <select name="tipoart" class="button1">
                    <option id="tipo1" value="Maletas">Maleta</option>
                    <option id="tipo2" value="chalecos">Chaleco</option>
                    <option id="tipo1" value="Chaquetas">Chaqueta</option>
                    <option id="tipo2" value="Gorras">Gorra</option>
                    <option id="tipo1" value="Bolsas">Bolsa</option>
                    
                </select>
        
        
      <label for="email">Estado de producto <span><em>(requerido)
       <select name="estado" class="button1">
                    <option id="tipo1" value="Activo">Activo</option>
                    <option id="tipo2" value="Inactivo">Inactivo</option>
                </select>
        
      <label for="email">Fecha de registro <span><em>(requerido)</em></span></label>
      <input type="date" name="fecha" class="form-input" />
      
      <label for="email">precio <span><em>(requerido)</em></span></label>
      <input autocomplete="off" onKeyPress="return soloNumeros(event)" type="text" name="precioart" class="form-input" />
      
      
      <label for="email">Descripción <span><em>(requerido)</em></span></label>
      <input type="text" name="describ" class="form-input" />
      
      <label for="email">Unidades disponibles<span><em>(requerido)</em></span></label>
      <input autocomplete="off" onKeyPress="return soloNumeros(event)" type="text" name="dispo" class="form-input" />
      
      <label for="email">IVA<span><em>(requerido)</em></span></label>
      <input onKeyPress="return soloNumeros(event)" id="bloquear" type="text" name="iva" class="form-input" autocomplete="off"/>

     <center> <input class="form-btn" name="submit" type="submit" value="Guardar información" /></center>
    </p>
  </form>
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


</style>
<script type="text/javascript">
// Solo permite ingresar numeros.
function soloNumeros(e){
  var key = window.Event ? e.which : e.keyCode
  return (key >= 48 && key <= 57)
}

 function goBack() {
  window.history.back();
}
    
    
    
    
    window.onload = function() {
  var myInput = document.getElementById('bloquear');
  myInput.onpaste = function(e) {
    e.preventDefault();
    alert("esta acción está prohibida");
  }
  
  myInput.oncopy = function(e) {
    e.preventDefault();
    alert("esta acción está prohibida");
  }
}
    
    
    
    
    
</script>