<?php
session_start();

 if (($_SESSION['iniciar'])!="") {

require_once 'conexion.php';
if(isset($_POST['agregar']))
{
    if(isset($_SESSION['add_carro']))
    {
        $articulo = array_column($_SESSION['add_carro'],'item_id');
        if(!in_array($_GET['id'],$articulo))
        {

            $count= count($_SESSION['add_carro']);
            $item_array = array(
                'item_id'        => $_GET['id'],
                'item_nombre'    => $_POST['hidden_nombre'],
                'item_precio'    => $_POST['hidden_precio'],
                'item_cantidad'  => $_POST['cantidad'],
            );

            $_SESSION['add_carro'][$count]=$item_array;
        }
        else
            {
              echo '<script>alert("El Producto ya existe!");</script>';
            }
    }
    else
        {
            $item_array = array(
                'item_id'        => $_GET['id'],
                'item_nombre'    => $_POST['hidden_nombre'],
                'item_precio'    => $_POST['hidden_precio'],
                'item_cantidad'  => $_POST['cantidad'],
            );

            $_SESSION['add_carro'][0] = $item_array;
        }
}
if(isset($_GET['action']))
{
    if($_GET['action']=='delete')
    {
        foreach ($_SESSION['add_carro'] AS $key => $value)
        {
            if($value['item_id'] == $_GET['id'])
            {
                unset($_SESSION['add_carro'][$key]);
                echo '<script>alert("El Producto Fue Eliminado!");</script>';
                echo '<script>window.location="index.php";</script>';
            }

        }

    }

}
?>




<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/carrs.css">
    <title>Carrito</title>
</head>

<script type="text/javascript">
  function goBack() {
  window.history.back();
}
</script>

<body>

<a href="../Index.html" ><img src="../imgs/boton.png" width=80 height=80></a>

<br>

<div class="container">

    <h1 align="center">Seleccione los artículos para encargar </h1>
    <?php
$sql="SELECT * FROM products where estado_producto='Activo'";
$resul= mysqli_query($conexion,$sql);
if(mysqli_num_rows($resul) > 0){
    while ($row=mysqli_fetch_array($resul)){
?>
    <div class="col-md-3">
        <form method="post" action="index.php?action=add&id=<?php echo $row['id_producto']; ?>">
            <?php

            ?>
            <div class="carro" align="center">
                <img src="imgs/<?php echo $row['img'];?>" class="img-responsive" onclick="document.getElementById('<?php echo $row['id_producto']; ?>').style.display='block'" style="width:auto;"/><br />
                <h4 class="text-info"><?php echo $row['nombre_producto'];?></h4>
                <h4 class="text-danger">$<?php echo $row['precio_producto'];?></h4>
                <input type="text" name="cantidad" class="form-control" value="1" />
                <input type="hidden" name="hidden_nombre" value="<?php echo $row['nombre_producto'];?>" />
                <input type="hidden" name="hidden_precio" value="<?php echo $row['precio_producto'];?>" />
                <input type="submit" name="agregar" style="margin-top:5px;" class="btn btn-success" value="Agregar" />
            </div>
            
            
        
    
        </form>
    </div>
       <div id="<?php echo $row['id_producto']; ?>" class="modales">
  
  <form class="modal-content animate">
    <div class="imgcontainer">
      <span onclick="document.getElementById('<?php echo $row['id_producto']; ?>').style.display='none'" class="close" title="Close Modal">&times;</span>
      <div id="raro"><h4 class="descripcion"><?php echo $row['descripcion'];?></h4></div>
      <img src="imgs/<?php echo $row['img'];?>" alt="Avatar" class="avatar">
      
    </div>
</form>
</div>
        <?php
    }
}
    ?>
    <div style="clear:both"></div>
    <br />
    <h3>Detalle de la Orden</h3>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th width="40%">Item Nombre</th>
                <th width="10%">Cantidad</th>
                <th width="20%">Precio</th>
                <th width="15%">Total</th>
                <th width="5%">Acción</th>
            </tr>
            <?php
            if(!empty($_SESSION["add_carro"]))
            {
                $total = 0;
                foreach($_SESSION["add_carro"] as $keys => $values)
                {
                    ?>
                    <tr>
                        <td><?php echo $values["item_nombre"]; ?></td>
                        <td><?php echo $values["item_cantidad"]; ?></td>
                        <td>$ <?php echo $values["item_precio"]; ?></td>
                        <td>$ <?php echo number_format($values["item_cantidad"] * $values["item_precio"], 2);?></td>
                        <td><a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remover</span></a></td>
                    </tr>
                    <?php
                    $total = $total + ($values["item_cantidad"] * $values["item_precio"]);
                }
                ?>
                <tr>
                    <td colspan="3" align="right">Total</td>
                    <td align="right">$ <?php echo number_format($total, 2); ?></td>
                    <td></td>
                </tr>
                <?php
            }else{
                ?>
                <tr>
                    <td colspan="4" style="color: red" align="center"><strong>No hay Producto Agregado!</strong></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>
<h3 align="center">Mirar encargo<a href="imprimir.php"> aquí</a></h3>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
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

<style>


button:hover {
  opacity: 0.8;
}



/* Center the image and position the close button */
.imgcontainer {
  
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

    h4.descripcion{
        position: inherit;
        float: left;
    }

    #raro{
        width: 50%;
        height: auto;
        
        float: right;
        margin-right: 10%;
    }
    
    
    
/* The Modal (background) */
.modales {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>

<script>
// Get the modal
var modal = document.getElementById('<?php echo $row['id_producto']; ?>');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>