<?php

  require("../BD/conexion.php");
extract ($_REQUEST);
$objConexion=Conectarse();

$sql="UPDATE `products` SET `id_producto`='$_REQUEST[id_producto]',
`img`='$_REQUEST[imagen]',
`img_lat`='$_REQUEST[img_lat]',
`img_back`='$_REQUEST[img_back]',
`nombre_producto`='$_REQUEST[nombreart]',
`estado_producto`='$_REQUEST[estado_producto]',
`precio_producto`='$_REQUEST[precioart]',
`tipo_product`='$_REQUEST[tipo_product]' WHERE id_producto = '$_REQUEST[id_producto]' ";
      
      
$resultado=$objConexion->query($sql);

if ($resultado){
	echo '<script>
          alert("Dato Actualizado");
          location.href = "../actualizar_art.html";
        </script>';

  }else{
    
  echo '<script>
          alert("Llena el campo");
          // window.history.go(-1);
        </script>';

  }





?>
