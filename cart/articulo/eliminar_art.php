<?php

require("../BD/conexion.php");
extract ($_REQUEST);
$objConexion=Conectarse();



$sql="DELETE FROM products WHERE id_producto='$_REQUEST[id_producto]'"; 


      
      
$resultado=$objConexion->query($sql);


echo '<script>
                            alert("Dato Eliminado");
                            location.href = "../actualizar_art.html";
                          </script>';



?>
