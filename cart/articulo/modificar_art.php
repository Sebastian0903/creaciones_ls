<?php
  session_start();
  require("../BD/conexion.php");
?>

<?php
 

$objConexion=Conectarse();
?>

<!DOCTYPE html>

<html>

<head>

	<title>MODIFICACION</title>
	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximun-scale=1, minium-scale=1">
  	

</head>

<body>

	

		<?php 

			$codigo=$_REQUEST['id_producto'];
			$sql="SELECT * FROM products WHERE id_producto='$codigo'";
			$result = $objConexion->query($sql);
      $compara_usr=mysqli_num_rows($result);
      $type=false;
      if($compara_usr != 1){
          echo '<script type="text/javascript">
                            alert("no esta registrado");
                           
                          </script>';
                    exit;
        }else{

     
     ?>

		 
		
		 <table border="6">
		 <form autocomplete="off" action="actualizar_art.php?id_producto=<?php echo $codigo=$_REQUEST['id_producto']; ?>" method="POST">
		 	<thead>
		    
		    <th colspan="7"><img src="../imgs/new_log.png" width="30%" height="auto"></th>
		  </thead>
		  <tr align="center" bgcolor="#FFFF99">
     <td width="11%">ID</td>
    <td width="16%">Imagen Principal</td>
    <td width="16%">Imagen Lateral</td>
    <td width="16%">Imagen Trasera</td>
             </tr>
     
      
      
      
      
       <?php
  //vamos agregar cada fila de la tabla de acuerdo al número de empleados de forma dinamica
  
  while ($producto = $result->fetch_object())
  {
	?>
		  <tr>
		  <td><input name="id_producto" type="text" value="<?php  echo $producto->id_producto?>" disabled="disabled"/></td>
      <td><input name="imagen" type="text" value="<?php  echo $producto->img?>" /></td>
      <td><input name="img_lat" type="text" value="<?php  echo $producto->img_lat?>"/></td>
      <td><input name="img_back" type="text" value="<?php  echo $producto->img_lat?>"/></td>
        </tr>
        
        <tr align="center" bgcolor="#FFFF99">
    <td width="19%">Nombre</td>
    <td width="12%">Estado</td>
    <td width="7%">Precio</td>
    <td width="10%">Unidades disponibles</td>
  </tr>
        <tr>
        <td><input name="nombreart" type="text" value="<?php  echo $producto->  nombre_producto?>" /> </td>
        <td>
        
        <select name="estado_producto" id="genero" style="width:270px">
          <option value="<?php  echo $producto-> estado_producto ?>">Seleccione</option>
          <option value="Activo">Activo</option>
          <option value="Inactivo">Inactivo</option>
      </select>
        
        </td>
        <td><input name="precioart" type="text" value="<?php  echo $producto-> precio_producto ?>" onKeyPress="return soloNumeros(event)"/></td>
		<td><select name="tipo_product" class="button1">
          <option id="tipo1" value="Maletas" <?php if($producto-> tipo_product == 'Maletas'){echo("selected");}?>>Maleta</option>
          <option id="tipo2" value="chalecos" <?php if($producto-> tipo_product == 'chalecos'){echo("selected");}?>>Chaleco</option>
          <option id="tipo1" value="Chaquetas" <?php if($producto-> tipo_product == 'Chaquetas'){echo("selected");}?>>Chaqueta</option>
          <option id="tipo2" value="Gorras" <?php if($producto-> tipo_product == 'Gorras'){echo("selected");}?>>Gorra</option>
          <option id="tipo1" value="Bolsas" <?php if($producto-> tipo_product == 'Bolsas'){echo("selected");}?>>Bolsa</option>
          <option id="tipo2" value="camisetas" <?php if($producto-> tipo_product == 'camisetas'){echo("selected");}?>>Camiseta</option>
          <option id="tipo1" value="camisas" <?php if($producto-> tipo_product == 'camisas'){echo("selected");}?>>Camisa</option>
          <option id="tipo1" value="overoles" <?php if($producto-> tipo_product == 'overoles'){echo("selected");}?>>Overol</option>
          <option id="tipo2" value="piernero" <?php if($producto-> tipo_product == 'piernero'){echo("selected");}?>>Piernero</option>
          <option id="tipo1" value="maletin" <?php if($producto-> tipo_product == 'maletin'){echo("selected");}?>>Maletín</option>
      </select></td>
		  </tr>
		  <?php  
        }
      
    ?>  	
		  <tr>
		  	<td colspan="5"><center><input type="submit" value="Modificar" name="boton" class="boton"></center></td>
		  </tr>
		  </form>
		 </table>

 
<?php  
        }
    
    ?>  	
	

</body>
</html>
		 </table>

 

	

</body>

</html>
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

    table{
        margin: 20px;
        margin-left: 10%;
        margin-right: 10%;
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
<script type="text/javascript">
// Solo permite ingresar numeros.
function soloNumeros(e){
  var key = window.Event ? e.which : e.keyCode
  return (key >= 48 && key <= 57)
}

 function goBack() {
  window.history.back();
}
</script>