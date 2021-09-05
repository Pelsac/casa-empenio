<?php

require_once("autoload.php");

$oCliente=new Cliente();

$bus=$oCliente->buscarCliente(235445345);
if($bus==1){
    echo("Encontrado");
    
    }else{
    echo("No esta");
    }

?>