<?php

  require("../BD/conexion.php");
extract ($_REQUEST);
$objConexion=Conectarse();



$sql="update products set id_producto='$_REQUEST[id_producto]', 
img = '$_REQUEST[imagen]',
nombre_producto = '$_REQUEST[nombreart]', 

estado_producto = '$_REQUEST[estado]', fecha_registro = '$_REQUEST[fecha]', 
precio_producto = '$_REQUEST[precioart]', descripcion = '$_REQUEST[describ]', 
unidades_dispo = '$_REQUEST[dispo]', IVA = '$_REQUEST[iva]'

where id_producto = '$_REQUEST[id_producto]' ";

      
      
      
      
      
$resultado=$objConexion->query($sql);

if ($resultado){
	echo '<script>
                            alert("Dato Actualizado");
                            location.href = "../actualizar_art.html";
                          </script>';

  }else{
					echo '<script>
                            alert("Llena el campo");
                            window.history.go(-1);
                          </script>';

  }





?>
