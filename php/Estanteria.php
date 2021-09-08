<?php
require_once("autoload.php");
class Estanteria extends Conexion{
    private $Id;
    private $Nombre;
    private $Filas;
    private $Columnas;
    private $FilasO;
    private $ColumnasO;
    private $conexion;
 
    public function __construct(){
      $this->conexion=new Conexion();
      $this->conexion=$this->conexion->conect();
     }

     public function consultarEstanterias(){
        try{
            
             $matriz = array();
              $sql="SELECT * FROM `estanteria`";
              $resultado=$this->conexion->prepare($sql);
              $resultado->execute();
              $numero_registro=$resultado->rowCount();
              if($numero_registro!=0){
               foreach ($this->conexion->query($sql, PDO::FETCH_ASSOC) as $item) $matriz[] = $item;
              
               $consult=$matriz;
               
                       return $matriz;  
              }else{
                  
                return -1;
                
              }
       
          }catch(Exception $e){
             die("Error" . $e->getMessage());
             echo "linea del error".$e->getLine();
       
          }
       }

       function disminuirOcupacion(int $id){
        try{

          $this->Id=$id;
      
            
          $sql="UPDATE `estanteria` SET filas_ocupadas=estanteria.filas_ocupadas-1, columnas_ocupadas=estanteria.columnas_ocupadas-1 WHERE id=$this->Id ";
           $resultado=$this->conexion->prepare($sql);
           $resultado->execute();
           
             
           echo json_encode("Si");
    
       }catch(Exception $e){
          die("Error" . $e->getMessage());
          echo "linea del error".$e->getLine();
    
       }

       }

       function asignarOcupacion(int $id,int $fil,int $col){
        try{

          $this->Id=$id;
          $this->Filas=$fil;
          $this->Columnas=$col;
            
          $sql="UPDATE `estanteria` SET filas_ocupadas=$this->Filas, columnas_ocupadas=$this->Columnas WHERE id=$this->Id ";
           $resultado=$this->conexion->prepare($sql);
           $resultado->execute();
           
             
           echo json_encode("Si");
    
       }catch(Exception $e){
          die("Error" . $e->getMessage());
          echo "linea del error".$e->getLine();
    
       }

       }

       public function obtenerEstanteria($id){

        try{
        
      
          $matriz = array();
          $sql ="SELECT * FROM estanteria WHERE estanteria.id ='$id'" ;
           $resultado=$this->conexion->prepare($sql);
           $resultado->execute();
           $numero_registro=$resultado->rowCount();
          
           foreach ($this->conexion->query($sql, PDO::FETCH_ASSOC) as $item) $matriz[] = $item;
              
            
           echo json_encode($matriz);     
          
  
            
       }catch(Exception $e){
          die("Error" . $e->getMessage());
          echo "linea del error".$e->getLine();
          
       }

       }

       public function consultarEstanteriaOcupada($id){
        try{
        
      
           $matriz = array();
           $sql ="SELECT * FROM producto
           WHERE producto.id_estanteria='$id' AND producto.estado='Empeniado'" ;
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


       public function consultarUbicacionDisponible($id){
        try{
            
          $matriz = array();
           $sql="SELECT * FROM `estanteria` INNER JOIN producto on estanteria.id=producto.id_estanteria where estanteria.id=$id ORDER BY producto.ubicacion_fila DESC  ";
           $resultado=$this->conexion->prepare($sql);
           $resultado->execute();
           $numero_registro=$resultado->rowCount();
           if($numero_registro!=0){
            foreach ($this->conexion->query($sql, PDO::FETCH_ASSOC) as $item) $matriz[] = $item;
              
            
                    echo json_encode($matriz);     
                   
           }
    
       }catch(Exception $e){
          die("Error" . $e->getMessage());
          echo "linea del error".$e->getLine();
    
       }

       }
     }

   $oEstanteria=new Estanteria();
   $oProducto=new producto();
     if(isset($_POST['buscarEs'])){
      $id=$_POST['estanteria'];
      $idC=$_POST['cedula'];
      $consul=$oEstanteria->consultarEstanteriaOcupada($id);
      if($consul==-1){
       $oEstanteria->obtenerEstanteria($id);
      }else{
      $oEstanteria->consultarUbicacionDisponible($id);
      }

    }
    
     

   

?>