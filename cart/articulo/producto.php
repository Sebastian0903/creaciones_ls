<?php

include_once "../BD/conexion.php";

$objConexion=Conectarse();

class producto extends DB{
    function obtenerProducto(){
       $query = $objConexion->query('SELECT * FROM products');
        return $query;
    
    }
}

?>