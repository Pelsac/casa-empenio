<?php
require_once("autoload.php");
class Estanteria extends Conexion{
    private $Id;
    private $Nombre;
    private $Filas;
    private $Columnas;
 
    private $conexion;
 
    public function __construct(){
      $this->conexion=new Conexion();
      $this->conexion=$this->conexion->conect();
     }

     public function consultarEstanteria(){
        try{
            
             $matriz = array();
              $sql="SELECT * FROM `estanteria`";
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
     }

?>