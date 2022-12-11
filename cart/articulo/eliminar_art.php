<?php

require("../BD/conexion.php");
extract ($_REQUEST);
$objConexion=Conectarse();




// $sql = "delete products, tipo_product from products join tipo_product on products.id_producto=tipo_product.id_producto where tipo_product.id_producto='$_REQUEST[id_producto]'";
$sql = "DELETE FROM `products` WHERE `id_producto` = '$_REQUEST[id_producto]'";
      
      
$resultado=$objConexion->query($sql);


echo '<script>
        alert("Dato Eliminado");
        location.href = "../actualizar_art.html";
      </script>';


?>
