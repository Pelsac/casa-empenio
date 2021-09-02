<?php
require_once("autoload.php");
 class PagosEmpenio extends Conexion{
 private $Valor;
 private $Fecha;
 public function __construct(){
    $this->conexion=new Conexion();
    $this->conexion=$this->conexion->conect();
   }

   public function registrarPago(int $valor, string $fecha ){



    try { 
        $this->Valor=$valor;
        $this->Fecha=$fecha;
       $sql = "INSERT INTO `pago_empenio` VALUES ('','$this->Valor','$this->Fecha',123,1010)";
       $resultado=$this->conexion->prepare($sql);
        
       $resultado->execute();
       echo("Si");
      
       } catch(Exception $e){
          die("Error" . $e->getMessage());
          echo "linea del error".$e->getLine();
   
       }
            
      }

    
   }




?>