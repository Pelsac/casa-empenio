<?php
require_once("autoload.php");
 class PagosEmpenio extends Conexion{
 private $Valor;
 private $Fecha;
 public function __construct(){
    $this->conexion=new Conexion();
    $this->conexion=$this->conexion->conect();
   }

   public function consultarPagosRealizados($id){
      try{
      
    
         $matriz = array();
         $sql ="SELECT cedula_cliente,id_producto FROM pago_empenio 
         WHERE pago_empenio.cedula_cliente='$id' " ;
          $resultado=$this->conexion->prepare($sql);
          $resultado->execute();
          $numero_registro=$resultado->rowCount();
         
          if($numero_registro!=0){
           
            foreach ($this->conexion->query($sql, PDO::FETCH_ASSOC) as $item) $matriz[] = $item;
         
          return $matriz;
        
   
        }else{
         
          return -1;
        }
           
      }catch(Exception $e){
         die("Error" . $e->getMessage());
         echo "linea del error".$e->getLine();
         
      }
      
     
    }

    public function getPagosRealizados($id){
      try{
      
    
         $matriz = array();
         $sql ="SELECT id,idP,nombreC,nombre,apellido,fecha,fecha_final,valor_empenio,valor_pagado,estado FROM cliente INNER JOIN producto ON producto.cedula_cliente=cliente.cedula INNER JOIN pago_empenio ON cliente.cedula=pago_empenio.cedula_cliente WHERE producto.cedula_cliente=$id AND producto.estado='Empeniado' " ;
          $resultado=$this->conexion->prepare($sql);
          $resultado->execute();
          $numero_registro=$resultado->rowCount();
         
          if($numero_registro!=0){
           
            foreach ($this->conexion->query($sql, PDO::FETCH_ASSOC) as $item) $matriz[] = $item;
         
          return $matriz;
        
   
        }else{
         
          return -1;
        }
           
      }catch(Exception $e){
         die("Error" . $e->getMessage());
         echo "linea del error".$e->getLine();
         
      }
      
     
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