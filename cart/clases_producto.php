<?php
/**
 * @author César Cuéllart
 * @version 1.0
 * @created 31-oct-2013 04:28:23 p.m.
 */
class Producto
{

	Private $codigo;
	Private $imagen;
	Private $nombreart;
	Private $estado;
	Private $fecha;
	Private $precioart;
	private $describ;
    Private $dispo;
    Private $iva;
    Private $tipoart;
	//Constructor
	public function Producto()
	{
		
	}

	public function getCodigo()
	{
		return $this->codigo;
	}

	public function getImagen()
	{
		return $this->imagen;
	}

	public function getNombreArt()
	{
		return $this->nombreart;
	}

	public function getEstado()
	{
		return $this->estado;
	}

	public function getFecha()
	{
		return $this->fecha;
	}

	public function getPrecioart()
	{
		return $this->precioart;
	}

    public function getDescrib()
	{
		return $this->describ;
	}
    
    public function getDispo()
	{
		return $this->dispo;
	}
    
    public function getIva()
	{
		return $this->iva;
	}
    
    public function getTipoArt()
	{
		return $this->tipoart;
	}
   
    
	/**
	 * 
	 * @param newVal
	 */
	public function setCodigo($newVal)
	{
		$this->codigo = $newVal;
	}

	/**
	 * 
	 * @param newVal
	 */
	public function setImagen($newVal)
	{
		$this->imagen = $newVal;
	}

	/**
	 * 
	 * @param newVal
	 */
	public function setNombreArt($newVal)
	{
		$this->nombreart = $newVal;
	}

	/**
	 * 
	 * @param newVal
	 */
	public function setEstado($newVal)
	{
		$this->estado = $newVal;
	}

	/**
	 * 
	 * @param newVal
	 */
	public function setFecha($newVal)
	{
		$this->fecha = $newVal;
	}

	/**
	 * 
	 * @param newVal
	 */
	public function setPrecioart($newVal)
	{
		$this->precioart = $newVal;
	}
	
    
    public function setEspecialidad($newVal)
	{
		$this->Especialidad = $newVal;
	}
	
    
    public function setDescrib($newVal)
	{
		$this->describ = $newVal;
	}
    
    public function setDispo($newVal)
	{
		$this->dispo = $newVal;
	}
    
    public function setIva($newVal)
	{
		$this->iva = $newVal;
	}
    
    public function setTipoArt($newVal)
	{
		$this->tipoart = $newVal;
	}
    
    
	public function CrearProducto($codigo,$imagen,$nombreart,$estado,$fecha,$precioart,$describ,$dispo,$iva,$tipoart)
	{
		$this->codigo=$codigo;
		$this->imagen=$_FILES['imagen']['name'];
		$this->nombreart=$nombreart;
		$this->estado=$estado;
		$this->fecha=$fecha;
		$this->precioart=$precioart;
        $this->describ=$describ;
		$this->dispo=$dispo;
		$this->iva=$iva;
        $this->tipoart=$tipoart;
	}
	
	public function ingresarProducto()
	{	
		$this->Conexion=Conectarse();
		$sql="INSERT INTO  products (id_producto, img, nombre_producto, estado_producto, fecha_registro, precio_producto,descripcion,unidades_dispo,IVA) VALUES ('$this->codigo','$this->imagen','$this->nombreart','$this->estado','$this->fecha','$this->precioart','$this->describ','$this->dispo','$this->iva')";
        
        
        
		$resultado=$this->Conexion->query($sql,sql2);
		$this->Conexion->close();
		return $resultado;	
	}
	
    public function ingresarProducto2()
	{	
		$this->Conexion=Conectarse();
		$sql="INSERT INTO  tipo_product (id_producto,tipo_producto) VALUES ('$this->codigo','$this->tipoart') ";
        
        
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}
    
    
    
    
	public function consultarProductos()
	{
		$this->Conexion=Conectarse();
		$sql="SELECT tipo_producto, id_producto, img, nombre_producto, precio_producto  FROM products AS P INNER JOIN tipo_product AS DP ON P.id_producto = DP.id_producto";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}
    
	
	public function consultarProducto($identificacion)
	{
		$this->Conexion=Conectarse();
		$sql="select * from products where id_producto='$identificacion'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}
    
    
    public function borrarProducto($identificacion)
	{
		$this->Conexion=Conectarse();
		$sql="delete from products where id_producto='$identificacion'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}


}
?>