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
         $sql ="SELECT id,idPago,nombreC,nombre,apellido,fecha,fecha_final,valor_empenio,valor_pagado,estado FROM cliente INNER JOIN producto ON producto.cedula_cliente=cliente.cedula INNER JOIN pago_empenio ON cliente.cedula=pago_empenio.cedula_cliente WHERE producto.cedula_cliente=$id AND producto.estado='Empeniado'  ORDER BY pago_empenio.fecha DESC " ;
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
    

   public function registrarPago(int $valor, string $fecha , int $idC,int $idP){

    try { 
        $this->Valor=$valor;
        $this->Fecha=$fecha;
       $sql = "INSERT INTO `pago_empenio` VALUES ('','$this->Valor','$this->Fecha',$idC,$idP)";
       $resultado=$this->conexion->prepare($sql);
        
       $resultado->execute();
       echo json_encode("si");
      
       } catch(Exception $e){
          die("Error" . $e->getMessage());
          echo "linea del error".$e->getLine();
   
       }
            
      }

    
   }

   $oPagos=new PagosEmpenio();
 
  
   if(isset($_POST['buscarC'])){
    $oCliente=new Cliente();
    $oProducto=new Producto();
    $idC=$_POST['ccbuscar'];
   
    $busC=$oCliente->buscarCliente($idC);

    if($busC==-1){
    echo json_encode("No");
    }else{
        $cons=$oProducto->consultarProductos($idC);
      if($cons!=-1  ){
         $pagos=$oPagos->getPagosRealizados($idC);
      if($pagos!=-1){
      echo json_encode($pagos);
       
       }
      }
  

}
}else if(isset($_POST['pagar'])){

  $valor=$_POST['valor'];
  $fecha=$_POST['fecha'];
  $idC=$_POST['ccbuscar'];
  $idP=$_POST['idProducto'];
  $oPagos->registrarPago($valor,$fecha,$idC,$idP);


}




?>