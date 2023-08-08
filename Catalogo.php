<?php
require_once 'cart/conexion.php';
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/carrs.css">
    <link rel="stylesheet" href="css/estilos2.css">
	

	<script src="js/jquery-3.2.1.js"></script>
	<script src="js/script.js"></script>
  <link rel="stylesheet" href="css/galeria_nueva/galeria2023.css" type="text/css" media="all">



  <link rel="stylesheet" href="css/galeria.css" type="text/css" media="all">
<!-- <script src="js/jquery-1.10.2.min.js"></script> -->
<script language="javascript" src="js/imagen.js" type="text/javascript"></script>

  <meta name="viewport" content="width=device-width">

<link rel="stylesheet" type="text/css" href="content_slider_style.css" />
<script type="text/javascript" src="js/jquery.1.3.2.min.js" ></script>
<script type="text/javascript" src="js/jquery-ui.min.js" ></script>
    <title>Carrito</title>
</head>

<script type="text/javascript">
$(document).ready(function() {
  let self;
  $(".thumbnail").click(function() {
    const imgSrc = $(this).find("img").attr("src");
    // $("#mainImage").css("opacity", 0);  Establecer la opacidad a 0

    // Esperar a que se complete la transición antes de cambiar la imagen
    // setTimeout(function() {
      $(".main-image img").attr("src", imgSrc);
     // $("#mainImage").css("opacity", 1);  Restablecer la opacidad a 1
    // }, 500);  Tiempo de espera de la transición en milisegundos (ajustar según la duración de la transición CSS)
  });

  
});

  function goBack() {
  window.history.back();
}
const openModal = (opt,img) =>{
 
  document.getElementById(opt).style.display='block'
}

const closeModal = (opt) =>{
  document.getElementById(opt).style.display='none'
}
</script>

<body>


<div class="wrap">
		<h1>Escoge un producto</h1>
		<div class="store-wrapper">
			<div class="category_list">
				<a href="#" class="category_item" category="all">Todo</a>
				<a href="#" class="category_item" category="Maletas">Maletas</a>
				<a href="#" class="category_item" category="chalecos">Chalecos</a>
				<a href="#" class="category_item" category="Chaquetas">Chaquetas</a>
				<a href="#" class="category_item" category="Gorras">Gorras</a>
				<a href="#" class="category_item" category="Bolsas">Bolsas</a>
				<a href="#" class="category_item" category="camisetas">Camisetas</a>
				<a href="#" class="category_item" category="camisas">Camisas</a>
				<a href="#" class="category_item" category="piernero">Piernero</a>
				<a href="#" class="category_item" category="maletin">Maletín</a>
				<a href="#" class="category_item" category="overoles">Overoles</a>
			</div>
			<section class="products-list">


<div class="container">

    
    <?php
    $sql="SELECT * FROM products where estado_producto='Activo' ORDER BY nombre_producto ASC";
    $resul= mysqli_query($conexion,$sql);

    if(mysqli_num_rows($resul) > 0){
        while ($row=mysqli_fetch_array($resul)){
    ?>
    <div class="col-md-3 product-item" category="<?php echo $row['tipo_product'];?>">
        <form method="post" action="index.php?action=add&id=<?php echo $row['id_producto']; ?>">
            <?php

            ?>
            <div class="carro" align="center"category="<?php echo $row['tipo_product'];?>">
                <img src="cart/imgs/<?php echo $row['img'];?>" class="img-responsive" onclick="openModal(<?php echo $row['id_producto']; ?>,'cart/imgs/<?php echo $row['img'];?>')" style="width:auto;"/><br />
                <h4 class="text-info"><?php echo $row['nombre_producto'];?></h4>
                <h4 class="text-danger">$<?php echo $row['precio_producto'];?></h4>
            </div>
        </form>
    </div>
       
       
       
       <div id="<?php echo $row['id_producto']; ?>" class="modales">
  
  <form class="modal-content animate">
    <div class="imgcontainer">
      <span onclick="closeModal(<?php echo $row['id_producto']; ?>)" class="close" title="Close Modal">&times;</span>
      <h4 class="descripcion"><?php echo $row['nombre_producto'];?></h4>
      <div id="raro" class="desc-parraf">
      
        <div class="w4" style="height: 100%;">
        <p><?php echo $row['descripcion'];?></p>
        </div>
      </div>
      <br />
      <!-- <img src="cart/imgs/<?php echo $row['img'];?>" alt="Avatar" class="avatar"> -->
      <div class="gallery-container">
        <section id="slider">
          <!-- <div class="dp-flex w10"> -->
            <input type="radio" name="slider" id="s1" checked>
            <input type="radio" name="slider" id="s2">
            <input type="radio" name="slider" id="s3">              
          <!-- </div> -->
          <label for="s1" id="slide1"><img src="cart/imgs/<?php echo $row['img'];?>" id="<?php echo $row['id_producto']; ?>" alt="Avatar"></label>
          <label for="s2" id="slide2"><img src="cart/imgs_lat/<?php echo $row['img_lat'];?>" id="<?php echo $row['id_producto']; ?>" alt="Avatar"></label>
          <label for="s3" id="slide3"><img src="cart/imgs_back/<?php echo $row['img_back'];?>" id="<?php echo $row['id_producto']; ?>" alt="Avatar"></label>
        </section>
      </div>



    </div>
  </form>
</div>
        
        <?php
    }
}
    ?>
    
    
    
              
     
     
     
    <div style="clear:both"></div>
    <br />
    
</div>





<script src="cart/js/jquery.min.js"></script>
<script src="cart/js/bootstrap.min.js"></script>
</body>
</html>



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