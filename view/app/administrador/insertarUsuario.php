<?php

include_once("../../../config/context.php");
require_once(FOLDER_PROJECT . "/model/Usuario.php");

$cedula = $_POST['cedula'];
$email = $_POST['email'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$estado="Activo";
$contrasena = $_POST['contrasena'];
$fecha = $_POST['fecha'];


if (isset($_POST['registrar'])) {
    
    $usuario= new Usuario();
    
    try {
        $usuario->registrar($cedula, $nombres, $apellidos, $fecha, $email, $estado, $contrasena);
        echo  '<script language="javascript">alert("Registro exitoso");</script>'; 
        header('location: listarResidentes.php');
        
    } catch (Exception $exc) {
        echo '<script language="javascript">alert("Ocurrieron problemas y no se pudo registrar");</script>' . $exc->getTraceAsString();
        header('location: listarResidentes.php');
    }
    
   
    
}