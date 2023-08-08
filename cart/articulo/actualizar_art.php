<?php

  require("../BD/conexion.php");
extract ($_REQUEST);
$objConexion=Conectarse();
$imagen = $_FILES['imagen']['name'];
$img_lat = $_FILES['img_lat']['name'];
$img_back = $_FILES['img_back']['name'];

$carpetaImgs = '../imgs/'; // Ruta de la carpeta donde se encuentran las imágenes existentes
$carpetaImgsLat = '../imgs_lat/'; // Ruta de la carpeta donde se encuentran las imágenes existentes
$carpetaImgsBack = '../imgs_back/'; // Ruta de la carpeta donde se encuentran las imágenes existentes

// $nuevaImagen = $_FILES['nueva_imagen']['tmp_name']; // Ruta temporal de la nueva imagen cargada desde el formulario
$infoProducts="SELECT * FROM products WHERE id_producto='$_REQUEST[id_producto]'";
$result = $objConexion->query($infoProducts);
$producto = $result->fetch_object();
// echo $producto->img;
$tipo = $_FILES['imagen']['type'];
$temp  = $_FILES['imagen']['tmp_name'];
$temp2  = $_FILES['img_lat']['tmp_name'];
$temp3  = $_FILES['img_back']['tmp_name'];

if( !((strpos($tipo,'gif') || strpos($tipo,'jpeg') || strpos($tipo,'webp') || strpos($tipo,'png')))){
  $_SESSION['mensaje'] = 'solo se permite archivos jpeg, gif, webp, png';
  $_SESSION['tipo'] = 'danger';
}

  if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    // Verificar si la imagen existente existe en la carpeta
    if (file_exists($carpetaImgs . $producto->img)) {
        // Eliminar la imagen existente
        unlink($carpetaImgs . $producto->img);

        // Mover la nueva imagen a la carpeta
        move_uploaded_file($temp, $carpetaImgs . $imagen);
    } else {
        move_uploaded_file($temp,$carpetaImgs.$imagen);
    }
  } else {
    $imagen = $producto->img;
  }

  if (isset($_FILES['img_lat']) && $_FILES['img_lat']['error'] === UPLOAD_ERR_OK) {
    // Verificar si la imagen existente existe en la carpeta
    if (file_exists($carpetaImgsLat . $producto->img_lat)) {
        // Eliminar la imagen existente
        unlink($carpetaImgsLat . $producto->img_lat);
        // Mover la nueva imagen a la carpeta
        move_uploaded_file($temp2, $carpetaImgsLat . $img_lat);

    } else {
        move_uploaded_file($temp2, $carpetaImgsLat . $img_lat);
    }
  } else {
    echo "No se ha seleccionado una nueva imagen.<br />";
    $img_lat = $producto->img_lat;
  }

  if (isset($_FILES['img_back']) && $_FILES['img_back']['error'] === UPLOAD_ERR_OK) {
    // Verificar si la imagen existente existe en la carpeta
    if (file_exists($carpetaImgsBack . $producto->img_back)) {
        // Eliminar la imagen existente
        unlink($carpetaImgsBack . $producto->img_back);

        // Mover la nueva imagen a la carpeta
        move_uploaded_file($temp3, $carpetaImgsBack . $img_back);

        echo "La imagen ha sido reemplazada correctamente.<br />";
    } else {
        echo "La imagen existente no fue encontrada.<br />";
        move_uploaded_file($temp3, $carpetaImgsBack . $img_back);  
    }
  } else {
    echo "No se ha seleccionado una nueva imagen.<br />";
    $img_back = $producto->img_back;
  }

$sql="UPDATE `products` SET `id_producto`='$_REQUEST[id_producto]',
`img`='$imagen',
`img_lat`='$img_lat',
`img_back`='$img_back',
`nombre_producto`='$_REQUEST[nombreart]',
`estado_producto`='$_REQUEST[estado_producto]',
`precio_producto`='$_REQUEST[precioart]',
`tipo_product`='$_REQUEST[tipo_product]',
`descripcion`='$_REQUEST[descripcion]' WHERE id_producto = '$_REQUEST[id_producto]' ";
      
$resultado=$objConexion->query($sql);

if ($resultado){
	echo '<script>
          alert("Dato Actualizado");
          location.href = "tabla_art.php";
        </script>';
  }else{
    
  echo '<script>
          alert("Llena el campo");
         window.history.go(-1);
        </script>';

  }





?>
