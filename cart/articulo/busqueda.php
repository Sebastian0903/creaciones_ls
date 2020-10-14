<?php
require "../BD/conexion.php";

	
extract ($_REQUEST);


$objConexion=Conectarse();

?>

<?php
      
      $sql="SELECT * FROM products WHERE id_producto='$_REQUEST[codigo]'";
          
      $result = $objConexion->query($sql);
      $compara_usr=mysqli_num_rows($result);
      if($compara_usr != 1){
          echo '<script type="text/javascript">
                            alert("no esta registrado");
                           window.history.go(-1);
                          </script>';
                    exit;
        }else{

     
     ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Listar Empleados:)</title>
</head>

<body>
<h1 align="center"> LISTAR EMPLEADOS</h1>
<table width="89%" border="0" align="center">
  <tr align="center" bgcolor="#FFFF99">
    <td width="11%">ID</td>
    <td width="16%">Imagen</td>
    <td width="19%">Nombre</td>
    <td width="12%">Estado</td>
    <td width="15%">Fecha de Ingreso</td>
    <td width="7%">Precio</td>
    <td width="10%">Descripción</td>
    <td width="10%">Unidades disponibles</td>
    <td width="10%">IVA</td>
    <td width="10%">Modificar</td>
    <td width="10%">Eliminar</td>
  </tr>
  
  <?php
  //vamos agregar cada fila de la tabla de acuerdo al número de empleados de forma dinamica
  
  while ($producto = $result->fetch_object())
  {
     
	?>
	<tr bgcolor="#CCCCFF">
        <td> <?php  echo $producto->id_producto?></td>
        <td><img src="../imgs/<?php  echo $producto->img  ?>" width="auto" height="220" alt="">  </td>
        <td><?php  echo $producto->  nombre_producto?></td>
        <td><?php  echo $producto-> estado_producto ?></td>
        <td><?php  echo $producto->fecha_registro  ?></td>
        <td><?php  echo $producto-> precio_producto ?></td>
        <td><?php  echo $producto-> descripcion ?></td>
        <td><?php  echo $producto-> unidades_dispo ?></td>
        <td><?php  echo $producto-> IVA ?>%</td>
        
        
    
        <td align="center"><a href="modificar_art.php?id_producto=<?php  echo $producto->id_producto?>"><img src="../../imgs/descarga.png" width="39" height="34" /></a></td>
        
        
        <td align="center"><a href="eliminar_art.php?id_producto=<?php  echo $producto->id_producto?>"><img src="../../imgs/descarga1.png" width="39" height="34" /></a></td>
        <?php  
        }
      
    ?>
        
        
        <?php  
        }
      
    ?>
         
  	</tr>

  
  
  
  
</table>
<p>


<style type="text/css">
  

  body {

/* Ubicación de la imagen */

background-image: url(../imgs/fondo%20de%20in.jpg);

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


.boton{
    background-color: blue;
    color: white;
    padding: 15px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;

}
td,th{background-color: #E8E8E8;}
</style>
</body>
</html>