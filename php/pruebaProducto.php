<?php

require_once("autoload.php");

$oProducto=new Producto();
$bus=$oProducto->consultarProductosEmpeniado(2345);
echo json_encode($bus);
/*$update=$oProducto->retirarProducto(13,2345,'Retirado','2021-09-08 11:57:00');
if($update==1){
    echo("Retirado");
    
    }else{
    echo("No esta");
    }
*/
?>