<?php

require_once("autoload.php");

$oProducto=new Producto();
//$oProducto->consultarProductosEmpeñados(2345);
$oProducto->registrarProducto("Televisor",239000,"Lg 40 pulgas","2021-09-1","2021-12-05",3,3,446890,2,1003065861);
?>