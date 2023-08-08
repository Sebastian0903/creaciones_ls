<?php

require "../cart/BD/conexion.php";
$objConexion=Conectarse();

$nombre = $_POST['nombre'];
$identificacion = $_POST['identificacion'];
$tipo_documento = $_POST['tipo_documento'];
$numero_celular = $_POST['numero_celular'];
$direccion = $_POST['direccion'];
$maquinas_trabajadas = implode(",", $_POST['maquinas']);
$hoja_vida_pdf = $_FILES['hoja_vida_pdf']['name'];
// $tmp_name = $_FILES['hoja_vida_pdf']['tmp_name'];

$archivo_temporal = $_FILES['hoja_vida_pdf']['tmp_name'];
$archivo_nombre = $_FILES['hoja_vida_pdf']['name'];
$archivo_destino = "../cart/hojas_de_vida/" . $archivo_nombre; 
move_uploaded_file($archivo_temporal, $archivo_destino);

$consulta_iddb="SELECT * FROM trabajadores WHERE identificacion=$identificacion";

$result_iddb=$objConexion->query($consulta_iddb);
$compara_iddb=mysqli_num_rows($result_iddb);

if($compara_iddb > 0){
  echo '<script>
          alert("Este id ya esta en uso, por favor digita otro");
          window.history.go(-1);
        </script>';
  exit;
}

// Insertar los datos en la tabla trabajadores
$sql = "INSERT INTO trabajadores (nombre, identificacion, tipo_documento, numero_celular, direccion, maquinas_trabajadas, hoja_vida_pdf) VALUES ('$nombre', '$identificacion', '$tipo_documento', '$numero_celular', '$direccion', '$maquinas_trabajadas', '$hoja_vida_pdf')";
$result_guardar = $objConexion->query($sql);
if ($result_guardar) {
  echo '<script>
          alert("Se ha enviado solicitud correctamente");
          window.history.go(-1);
        </script>';
} else {
  echo "Error: " . $sql . "<br>" ;
}

// Cerrar la conexión a la base de datos
// mysqli_close($conn);

?>