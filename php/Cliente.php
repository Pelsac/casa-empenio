<?php
require_once("autoload.php");
class Cliente extends Conexion{
   private $Cedula;
   private $Nombre;
   private $Apellido;
   private $Celular;
   private $Email;
   private $conexion;

   public function __construct(){
     $this->conexion=new Conexion();
     $this->conexion=$this->conexion->conect();
    }

  
   public function registrarCliente(int $cedula,string $nombre,string $apellido, int $celular,string $correo){

      try { 
       $this->Cedula=$cedula;
       $this->Nombre=$nombre;
       $this->Apellido=$apellido;
       $this->Celular=$celular;
       $this->Email=$correo;

      $sql = "INSERT INTO `cliente` VALUES ('$this->Cedula','$this->Nombre','$this->Apellido','$this->Celular','$this->Email')";
      $resultado=$this->conexion->prepare($sql);
       
      $resultado->execute();

      echo json_encode("Si");
      
      } catch(Exception $e){
         die("Error" . $e->getMessage());
         echo "linea del error".$e->getLine();
  
      }
           
     }

     public function buscarCliente($id){
     try{
    
      $matriz = array();
       $sql="SELECT * FROM `cliente` WHERE cedula = '$id'";
       $resultado=$this->conexion->prepare($sql);
       $resultado->execute();
       $numero_registro=$resultado->rowCount();
       if($numero_registro!=0){
           
           foreach ($this->conexion->query($sql, PDO::FETCH_ASSOC) as $item) $matriz[] = $item;
          
           echo json_encode("existe");
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


$oCliente =new Cliente();
$idc=$_POST['cedula'];
if(isset($_POST['registrar'])){


   $nombrec=$_POST['nombre'];
   $apellidoc=$_POST['apellido'];
   $telefonoc=$_POST['celular'];
   $emailc=$_POST['email'];

  $bus=$oCliente->buscarCliente($idc);
if($bus==-1){
$oCliente->registrarcliente($idc,$nombrec,$apellidoc,$telefonoc,$emailc);
}

}elseif (isset($_POST['buscar'])) {
   $oCliente->buscarCliente($idc);
}


?>
 