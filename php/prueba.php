<?php

require_once("autoload.php");

$oCliente=new Cliente();
$oUsuario=new Usuario();
$oEmpleado=new Empleado();
$oEstan=new Estanteria();
$oEstan->consultarEstanteria();
#$ej=$oEmpleado->buscarEmpleado(1010);
#echo($ej);
#$oUsuario->registrarUsuario('adrs','pass',1012);
#$oUsuario->buscarUsername("Admin");
#$oEmpleado->registrarEmpleado(1013,'Juan','Sanchez',31323,'asas@gmail.com','lorica','Administrador');
/*
$oCliente->registrarCliente(123,'Juan','Sanchez',31323,'asas@gmail.com');

#prueba registrar --Exitosa

$oCleinte =new Cliente();



#$usuario=$_POST['usuario'];
#$clave=$_POST['clave'];
$oUsuario=new Usuario();
$oUsuario->iniciarSesion('Admin','Admin');

$oConex =new Conexion();
$oConex->conect();
*/


#$oCliente->buscarCliente("103201");


?>