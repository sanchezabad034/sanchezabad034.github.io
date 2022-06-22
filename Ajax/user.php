<?php 

require_once "../modelos/Users.php";

$users=new Users();

$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$apellido=isset($_POST["apellido"])? limpiarCadena($_POST["apellido"]):"";
$tel=isset($_POST["tel"])? limpiarCadena($_POST["tel"]):"";
$tipo = 1;
$clave=isset($_POST["clave"])? limpiarCadena($_POST["clave"]):"";
$email=isset($_POST["email"])? limpiarCadena($_POST["email"]):"";
$img=isset($_POST["img"])? limpiarCadena($_POST["img"]):"";
$avatar=isset($_POST["avatar"])? limpiarCadena($_POST["avatar"]):"";
$opcion=isset($_POST["op"])?$_POST["op"]:$_REQUEST["op"];

switch ($opcion){
	case 'guardaryeditar':

			if (!file_exists($_FILES['img']['tmp_name']) || !is_uploaded_file($_FILES['img']['tmp_name']))
			{
				$img=$_POST["ia1"];
			}
			else 
			{
				$ext = explode(".", $_FILES["img"]["name"]);
				if ($_FILES['img']['type'] == "image/jpg" || $_FILES['img']['type'] == "image/jpeg" || $_FILES['img']['type'] == "image/png")
				{
					$img = round(microtime(true)) . '.' . end($ext);
					move_uploaded_file($_FILES["img"]["tmp_name"], "../Public/img/users" . $img);
				}
			}

			$rspta=$users->insertar($nombre,$apellido,$tipo,$clave,$email,$img,$tel,$avatar);
			echo $rspta ? "Usuario registrado" : "Usuario no se pudo registrar";

		break;
	break;

	case 'desactivar':
		$rspta=$users->desactivar($id_user);
 		echo $rspta ? "Usuario Desactivado" : "Usuario no se puede desactivar";
 		break;
	break;

	case 'activar':
		$rspta=$users->activar($id_user);
 		echo $rspta ? "Usuario activado" : "Usuario no se puede activar";
 		break;
	break;

	case 'mostrar':
		$id_user=$_POST['id_user'];
		$rspta=$users->mostrar($id_user);
		while ($row = $rspta->fetch_object()){
	        $user_arr[] = $row;
	    }
 		//Codificar el resultado utilizando json
 		echo json_encode($user_arr);
 		break;
	break;

	case 'listar':
		$rspta=$users->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->id_user.')"><i class="fa fa-pencil"></i></button>',
 			    "1"=>$reg->nombre.' '.$reg->apellido, 				
 				"2"=>$reg->tipo,
 				"3"=>$reg->password,
				"4"=>$reg->email,
				"5"=>"<img src='../cms/stuff/user/".$reg->img."' height='50px' width='50px'>",
				"6"=>$reg->tel,
				"7"=>$reg->avatar,
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;
	case 'verificar':
  		$user_name=$_POST['logina'];
		$user_key=$_POST['clavea'];
		$rspta=$users->verificar($user_name,$user_key);

		while ($row = $rspta->fetch_object()){
	        $user_arr[] = $row;
	    }


		 if ($user_arr)
	     {
	     	session_start();
	         //Declaramos las variables de sesión
	         $_SESSION["id_user"]=$user_arr[0]->id_user;
	         $_SESSION["nombre"]=$user_arr[0]->nombre;
			 $_SESSION["apellido"]=$user_arr[0]->apellido;
	         $_SESSION["img"]=$user_arr[0]->img;
	         $_SESSION['acceso']=$user_arr[0]->tipo;
	         $_SESSION['tel']=$user_arr[0]->tel;
	         $_SESSION['email']=$user_arr[0]->email;
			 $_SESSION['avatar']=$user_arr[0]->avatar;
	     }
	     //var_dump( $_SESSION["nombre"]);
	    echo json_encode(array('data'=>$user_arr));
	break;
	case 'updatePwd':
  		$user_name=$_POST['id_user'];
		$curr_pwd=$_POST['clave_actual'];
		$new_pwd=$_POST['clave_nueva'];
		$rspta=$users->verificar2($user_name,$curr_pwd);
		$error = '';
		$data = '';
		while ($row = $rspta->fetch_object()){
	        $user_arr[] = $row;
	    }
		
	    if (empty($user_arr)) {
	    	// echo json_encode(array('data'=>'','error'=>'error' ));
	    	 $error = 'error';
   				
	    }
	    else  	
 		{
			$actualiza=$users->updatePwd($user_name,$new_pwd);
			$data = $actualiza ? "Contraseña actualizada" : "";
			
 		}

		

		 echo json_encode(array('data'=>$data ,'error'=>$error ));
			 
	     //var_dump( $_SESSION["nombre"]);
	
	break;

	case 'salir':
		//Limpiamos las variables de sesión   
        session_unset();
        //Destruìmos la sesión
        session_destroy();
        //Redireccionamos al login
        header("Location: ../index.php");

	break;

}

?>