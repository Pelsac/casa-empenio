<?php

require_once("autoload.php");

$oPagos=new PagosEmpenio();

$bus=$oPagos->getPagosRealizados(2345);
if($bus!=-1){
    echo json_encode($bus);
    
    }else{
    echo("No esta");
    }

?>