<?php
/**
 * @author César Cuéllart
 * @version 1.0
 * @created 31-oct-2013 04:28:23 p.m.
 */
class Empleado
{

    Private $id_empleado;
    Private $nombre;
	Private $apellido;
	Private $tipo_usr;
	Private $correo;
	Private $usuario_n;
	private $contrasena;
    Private $fecha_ingreso;
    Private $telefono;
	//Constructor
	public function Empleado()
	{
		
	}

	
    
    public function getIdEmpleado()
	{
		return $this->id_empleado;
	}
    
    
    public function getNombre()
	{
		return $this->nombre;
	}
    
    
    public function getApellido()
	{
		return $this->apellido;
	}
    
    
    public function getTipo_usr()
	{
		return $this->tipo_usr;
	}
    
    
    public function getCorreo()
	{
		return $this->correo;
	}
    
    
    public function getUsuarioN()
	{
		return $this->usuario_n;
	}
    
    
    public function getContrasena()
	{
		return $this->contrasena;
	}
    
    
    public function getFechaIngreso()
	{
		return $this->fecha_ingreso;
	}
    
    
    public function getTelefono()
	{
		return $this->telefono;
	}
	
    
    
    
    
    


	 public function setIdEmpleado($newVal)
	{
		$this->id_empleado = $newVal;
	}
    
    
    public function setNombre($newVal)
	{
		$this->nombre = $newVal;
	}
    
    
    public function setApellido($newVal)
	{
		$this->apellido = $newVal;
	}
    
    
    public function setTipo_usr($newVal)
	{
		$this->tipo_usr = $newVal;
	}
    
    
    public function setCorreo($newVal)
	{
		$this->correo = $newVal;
	}
    
    
    public function setUsuarioN($newVal)
	{
		$this->usuario_n = $newVal;
	}
    
    
    public function setContrasena($newVal)
	{
		$this->contrasena = $newVal;
	}
    
    
    public function setFechaIngreso($newVal)
	{
		$this->fecha_ingreso = $newVal;
	}
    
    
    public function setTelefono($newVal)
	{
		$this->telefono = $newVal;
	}
	
    
    



    
	public function crearEmpleado($id_empleado,$nombre,$apellido,$tipo_usr,$correo,$usuario_n,$contrasena,$fecha_ingreso,$telefono)
	{
		$this->id_empleado=$id_empleado;
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->tipo_usr=$tipo_usr;
        $this->correo=$correo;
        $this->usuario_n=$usuario_n;
        $this->contrasena=$contrasena;
        $this->fecha_ingreso=$fecha_ingreso;
        $this->telefono=$telefono;
	}
	
	public function agregarEmpleado()
	{	
		$this->Conexion=Conectarse();
		$sql="INSERT INTO  usuario (id_empleado,nombre,apellido,tipo_usr,correo,usuario_n,contrasena,fecha_ingreso,telefono) VALUES 
        ('$this->id_empleado','$this->nombre','$this->apellido','$this->tipo_usr','$this->correo','$this->usuario_n','$this->contrasena','$this->fecha_ingreso','$this->telefono)";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}
	
    
    
    
    
    public function consultarEmpleado()
	{
		$this->Conexion=Conectarse();
		$sql="SELECT * FROM usuario";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}
    
	public function validarEmpleado()
	{
		$this->Conexion=Conectarse();
		$sql="select * from usuario where correo = '$this->correo' and contrasena = '$this->contrasena'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}
	

}
?>