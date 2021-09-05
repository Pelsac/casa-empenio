<?php

require_once("autoload.php");

#$oCliente=new Cliente();
#$oCliente->buscarCliente(446890);

$oEmpleado=new Empleado();
$bus=$oEmpleado->buscarEmpleado(1003065861);
if($bus==1){
echo("Encontrado");

}else{
echo("No esta");
}
#$oUsuario=new Usuario();
#$oUsuario->iniciarSesion('admin','admin61');
//$oEmpleado->buscarEmpleado(1003065861);
#$oEstan->asignarOcupacion(1,2,2);
#$oPagosE=new PagosEmpenio();
#$oProduc=new Producto();
#$oProduc->registrarProducto("Televisor",239000,"Lg 40 pulgas","2021-09-1","2021-12-05",3,3,446890,2,1003065861);
#$oEstanteria=new Estanteria();
      #$oEstanteria->asignarOcupacion(2,2,2);
#oPagosE->registrarPago(2349,"2021-08-30");
#$oEstan->consultarEstanteria();

#$ej=$oEmpleado->buscarEmpleado(1010);
#echo($ej);
#$oUsuario->registrarUsuario('adrs','pass',1012);
#$oUsuario=new Usuario();
#$oUsuario->buscarUsername("admin");
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