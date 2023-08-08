<?php
require "../BD/conexion.php";
session_start();

if (($_SESSION['iniciar'])!="") {
	
extract ($_REQUEST);


$objConexion=Conectarse();
    
    $sql="SELECT * FROM products";
    $result = $objConexion->query($sql);
    $compara_usr=mysqli_num_rows($result);
    if($compara_usr <= 0){
        echo '<script type="text/javascript">
                  // alert("no hay registros");
                  // window.history.go(-1);
                  </script>';
                exit;
    }else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/boton.css">
<title>Edición artículo</title>
</head>

<body>
  <a href="../gestion.php">
    <img onclick="goBack()" src="../../imgs/atras.png" align="left" width=80 height=80>
  </a>
  
<div class="logo" style="width: 10%; height:10% ; position: absolute; right:20px; top:20px;">
    <img src="../../imgs/logo_kert.svg" alt="logo_kert" class="logo-img">
</div>
<h1 class='mg3' align="center"> Edición de producto</h1>
<div class="dpf just-center">
  <div class="filters dpf pdh2">
    <div class='inputs-style dpf'>
      <label for="filtroTipoProducto">Filtrar por Tipo de producto:</label>
      <select class="input-select" id="filtroTipoProducto">
        <option value="">Todos</option>
        <option value="Maletas">Maleta</option>
        <option value="chalecos">Chaleco</option>
        <option value="Chaquetas">Chaqueta</option>
        <option value="Gorras">Gorra</option>
        <option value="Bolsas">Bolsa</option>
        <option value="camisetas">Camiseta</option>
        <option value="camisas">Camisa</option>
        <option value="overoles">Overol</option>
        <option value="piernero">Piernero</option>
        <option value="maletin">Maletín</option>
      </select>
    </div>
    <div class='inputs-style dpf'>
      <label for="filtroNombre">Filtrar por Nombre del producto:</label>
      <input class="form-input" type="text" id="filtroNombre">
    </div>
    </div>
</div>
<table width="89%" border="0" align="center" id="tablaDatos">
  <thead>
    <tr align="center" class="head-table">
      <td width="16%">Nombre</td>
      <td width="10%">Tipo de producto</td>
      <td width="6%">Precio</td>
      <td width="11%">Imagen</td>
      <td width="10%">Editar</td>
      <td width="10%">Eliminar</td>
    </tr>
  </thead>
  <tbody>
<?php
  //vamos agregar cada fila de la tabla de acuerdo al número de empleados de forma dinamica
  
  while ($producto = $result->fetch_object())
  {
?>

  <tr>
    <td class="pd1"><?php  echo $producto-> nombre_producto ?></td>
    <td class="pd1"><?php  echo $producto-> tipo_product ?></td>  
    <td class="pd1"><?php  echo $producto-> precio_producto ?></td>
    
    <td class="pdh1" style="text-align-last: center;"><img src="../imgs/<?php  echo $producto->img  ?>" width="auto" height="120" alt=""></td>        
    <td align="center"><a href="modificar_art.php?id_producto=<?php  echo $producto->id_producto?>"><img src="../../imgs/descarga.png" width="39" height="34" /></a></td>
    
    
    <td align="center"><a href="eliminar_art.php?id_producto=<?php  echo $producto->id_producto?>"><img src="../../imgs/descarga1.png" width="39" height="34" /></a></td>
  </tr>
<?php  
        }
    }

  }else{

    echo '<script>
            alert("Inicia sesion");
            location.href = "../../php/form_inicio.php";
          </script>';
    exit;
  }
    ?>
 </tbody>
</table>
</style>
<script src="../js/filtro-tabla.js"></script>
</body>
</html>