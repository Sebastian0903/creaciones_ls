<?php

function Conectarse()
{
	$Conexion=new mysqli("localhost","id21123214_kert","Sebas1003*","id21123214_programacion1");
	
	if ($Conexion->connect_errno) 
		echo "Problemas en la Conexion ". $Conexion->connect_error;
	else
		return $Conexion;
}
?>