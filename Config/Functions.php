<?php
   
require_once ("DataBase.php");

if (isset($_POST['accion'])){ 
    
    switch ($_POST['accion']){

            case 'acceso_user';
            acceso_user();
            break;

		}

	}

function acceso_user() {

    $correo = $_POST['correo'];
    $contrasenia = $_POST['contrasenia'];
    session_start();
    $_SESSION['correo']=$correo;

    $conexion=mysqli_connect("localhost","root","","MediStock");
    $consulta= "SELECT * FROM usuario WHERE correoUsuario='$correo' AND contraseniaUsuario='$contrasenia'";
    $resultado=mysqli_query($conexion, $consulta);
    $filas=mysqli_fetch_array($resultado);

    if($filas['fk_id_rol'] == 1){ //Administrador

        header('Location: ../App/Views/Administrador/AdministradorUsuarios.php');

    }else if($filas['fk_id_rol'] == 2){ //PersonalMedico

        header('Location: ../App/Views/PersonalMedico/PersonalMedicoUsuarios.php');

    }else{

        header('Location: ../App/LogIn.php');
        session_destroy();

    }

}






