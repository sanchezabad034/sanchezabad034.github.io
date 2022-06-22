<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/conexion.php";

Class Users
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Método para insertar registros
	public function insertar($nombre,$apellido,$tipo,$clave,$email,$img,$avatar,$tel)
	{
		$sql="INSERT INTO users (nombre,apellido,tipo,password,email,img,avatar,tel)
		VALUES ('$nombre','$apellido','$tipo','$clave','$email','$img','$avatar','$tel')";
		return ejecutarConsulta($sql);
	}

	//Método para editar registros
	public function editar($id_user,$nombre,$apellido,$tipo,$clave,$email,$img,$avatar,$tel)
	{
		$sql="UPDATE users SET nombre='$nombre',apellido = '$apellido',tipo='$tipo', password='$clave', email='$email', img='$img', avatar='$avatar' tel='$tel'  WHERE id_user='$id_user'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar usuario admin
	public function desactivar($id_user)
	{
		$sql="UPDATE users SET tipo='1' WHERE id_user='$id_user'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar usuario admin
	public function activar($id_user)
	{
		$sql="UPDATE users SET tipo='0' WHERE id_user='$id_user'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id_user)
	{
		$sql="SELECT * FROM users WHERE id_user='$id_user'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM users";
		return ejecutarConsulta($sql);		
	}

	//Implementar un método para validar o actualizar la contraseña 
	public function verificar($user_name,$user_key)
	{
		$sql="SELECT * FROM users WHERE avatar='$user_name' and password ='$user_key'";
		
		return ejecutarConsulta($sql);		
	}
	public function verificar2($user_name,$user_key)
	{
		$sql="SELECT * FROM users WHERE id_user='$user_name' and password ='$user_key'";
		
		return ejecutarConsulta($sql);		
	}
	public function updatePwd($id_user,$new_pwd)
	{
		$sql="UPDATE users SET  password='$new_pwd'  WHERE id_user='$id_user'";
		return ejecutarConsulta($sql);
	}

}
?>