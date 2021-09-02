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
       public function consultarUbicacionDisponible($id){
        try{
            
          $matriz = array();
           $sql="SELECT * FROM `estanteria` where id='$id' ";
           $resultado=$this->conexion->prepare($sql);
           $resultado->execute();
           $numero_registro=$resultado->rowCount();
           if($numero_registro!=0){
            foreach ($this->conexion->query($sql, PDO::FETCH_ASSOC) as $item) $matriz[] = $item;
              $consult=$matriz;
            
                    echo json_encode($matriz);     
                   
           }
    
       }catch(Exception $e){
          die("Error" . $e->getMessage());
          echo "linea del error".$e->getLine();
    
       }

       }
     }

   $oEstanteria=new Estanteria();
 
     if(isset($_POST['buscarEs'])){
      $id=$_POST['estanteria'];
$oEstanteria->consultarUbicacionDisponible($id);

     }

?>