<?php 

	$conexion=mysqli_connect('localhost','root','','programacion');

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>mostrar datos</title><meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
</head>
<script type="text/javascript">
  function goBack() {
  window.history.back();
}</script>
<body>

<br>
<img onclick="goBack()" src="../imgs/atras.png" align="left" width=80 height=80>
<div id="centro">
	
	<table align="center" border="1" >
		<tr>
			<td class="arrib"><center>ID</center></td>
			<td class="arrib"><center>Nombre</center></td>
			<td class="arrib"><center>Imagen</center></td>
			<td class="arrib"><center>Precio</center></td>
			<td class="arrib"><center>Acción</center></td>	
		</tr>

		<?php 
		$sql="SELECT * from tbproduct";
		$result=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr>
			<td class="ident"> <strong> <center><?php echo $mostrar['id'] ?></strong></center></td>
			<td><center> <strong> <?php echo $mostrar['name'] ?></strong></center></td>
			<td><center><img src="../cart/imgs/<?php echo $mostrar['img'];?>" class="img-responsive" /></center></td>
			<td class="precio"><center> <strong>$<?php echo $mostrar['precio'] ?></strong><td><a href="../cart/articulo/eliminar_art.php?id=<?php echo $mostrar['id']; ?>">Borrar</a><br><br><a href="../cart/articulo/modificar_art.php?id=<?php echo $mostrar['id']; ?>">Actualizar información</a></td></center></td>
			
		</tr>
	<?php 
	}
	 ?>
	</table>
</div>
</body>
</html>






<style type="text/css">
	
 body {


font-family: DejaVu Sans Mono;
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


#centro{float: center;}


table{

	border-collapse: collapse;
    align-content: center;
}


.img-responsive{

max-width: 60%;
max-height: auto;

}

td.ident{
    font-size: 30px;
	width: 20%;
}


td.precio{
    font-size: 20px;
	margin-left: 2px;
	margin-right: 2px;
	width: 20%;
}

td{border: 2px solid blue;}

td,th{background-color: #E8E8E8;}



td.arrib{

	background-color: lime;
	height: 40px;

}
</style>