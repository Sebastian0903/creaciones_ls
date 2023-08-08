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
    <link rel="stylesheet" type="text/css" href="../css/estilopro.css">

</head>

<script type="text/javascript">
function goBack() {
    window.history.back();
}


const prueba = (file) => {
    const imgs = file.files
    const namImg = file.name

    $imagenPrevisualizacion = document.querySelector('#' + namImg);
    if (!imgs || !imgs.length) {
        $imagenPrevisualizacion.src = "";
        return;
    }

    const primerArchivo = imgs[0];
    // Lo convertimos a un objeto de tipo objectURL
    const objectURL = URL.createObjectURL(primerArchivo);
    // Y a la fuente de la imagen le ponemos el objectURL
    $imagenPrevisualizacion.src = objectURL;
}
</script>

<body>

    <img onclick="goBack()" src="../imgs/atras.png" align="left" width=80 height=80>

    <div class="group">
    <div class="logo" style="width: 15%; height:15% ; position: absolute; right:12px;">
        <img src="../imgs/logo_kert.svg" alt="logo_kert" class="logo-img">
    </div>
        <form action="registro.php" method="POST" enctype="multipart/form-data">
            <h2><em>Registro de nuevo artículo</em></h2>
            <div class="form-img dp-flex" style="margin-bottom: 30px;">
                <div class="input-txt">
                    <label for="email">Nombre 
                        </label>
                    <input type="text" name="nombreart" class="form-input w10" />
                </div>
                <div class="input-txt">
                    <label for="email">precio
                    <input autocomplete="off" onKeyPress="return soloNumeros(event)" type="text" name="precioart" class="form-input w10" />
                    </label>
                </div>
                <div class="input-txt">
                    
                </div>
            </div>
            <div class="form-img dp-flex">
              <div class="inp-img">
                <label for="apellido">Imagen principal</label>
                <!-- <label class="custom-file-upload"> -->
                    <input onchange="prueba(this)" class="w-i" name="imagen" type="file" required />
                <!-- </label> -->
                <img id="imagen" class='img-prev'>
              </div>
              <div class="inp-img">
                <label for="apellido">Imagen lateral</label>
                <!-- <label class="custom-file-upload"> -->
                    <input onchange="prueba(this)" class="w-i" name="img_lat" type="file" />
                <!-- </label> -->
                <img id="img_lat" class='img-prev'>
              </div>
              <div class="inp-img">
                    <label for="apellido">Imagen trasera</label>
                    <!-- <label class="custom-file-upload"> -->
                        <input onchange="prueba(this)" class="w-i" name="img_back" type="file" />
                    <!-- </label> -->
                    <img id="img_back" class='img-prev'>
                </div>
              
            </div>
            <div class="form-img dp-flex">
                <div class="input-select">
                    <label for="email">Tipo de producto
                    <select name="tipoart" class="button1 w10">
                        <option id="tipo1" value="Maletas">Maleta</option>
                        <option id="tipo2" value="chalecos">Chaleco</option>
                        <option id="tipo1" value="Chaquetas">Chaqueta</option>
                        <option id="tipo2" value="Gorras">Gorra</option>
                        <option id="tipo1" value="Bolsas">Bolsa</option>
                        <option id="tipo2" value="camisetas">Camiseta</option>
                        <option id="tipo1" value="camisas">Camisa</option>
                        <option id="tipo1" value="overoles">Overol</option>
                        <option id="tipo2" value="piernero">Piernero</option>
                        <option id="tipo1" value="maletin">Maletín</option>
                    </select>
                </div>
                <div class="input-select">
                    <label for="email">Estado</label>
                    <select name="estado" class="button1 w10">
                        <option id="tipo1" value="Activo">Activo</option>
                        <option id="tipo2" value="Inactivo">Inactivo</option>
                    </select>
                </div>
                <div class="input-select w4">
                    <label for="descripcion">Descripción </label>
                    <textarea name="descripcion" class="estilotextarea"></textarea>
                </div>
            </div>
            <div class="dp-flex jf-c mrg-t2">
                <input class="form-btn" name="submit" type="submit" value="Guardar información" />
            </div>
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

<script type="text/javascript">
// Solo permite ingresar numeros.
function soloNumeros(e) {
    var key = window.Event ? e.which : e.keyCode
    return (key >= 48 && key <= 57)
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


const $seleccionArchivos = document.querySelector("#seleccionArchivos"),
    // $imagenPrevisualizacion = document.querySelector("#imagenPrevisualizacion");

// Escuchar cuando cambie
// $seleccionArchivos.addEventListener("change", () => {

//   // Los archivos seleccionados, pueden ser muchos o uno
//   const archivos = $seleccionArchivos.files;
//   console.log(archivos)
//   // Si no hay archivos salimos de la función y quitamos la imagen
//   if (!archivos || !archivos.length) {
//     $imagenPrevisualizacion.src = "";
//     return;
//   }
//   // Ahora tomamos el primer archivo, el cual vamos a previsualizar
//   const primerArchivo = archivos[0];
//   // Lo convertimos a un objeto de tipo objectURL
//   const objectURL = URL.createObjectURL(primerArchivo);
//   // Y a la fuente de la imagen le ponemos el objectURL
//   $imagenPrevisualizacion.src = objectURL;
// });
</script>