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
          
         return 1;
       
 
       }else{
        
         return -1;
       }

   }catch(Exception $e){
      die("Error" . $e->getMessage());
      echo "linea del error".$e->getLine();

   }
}
public function consultarEmpeniosActivos($id){
   try{
  
    $matriz = array();
     $sql="SELECT cedula_cliente FROM producto WHERE cedula_cliente = '$id'";
     $resultado=$this->conexion->prepare($sql);
     $resultado->execute();
     $numero_registro=$resultado->rowCount();
     if($numero_registro!=0){
         
         foreach ($this->conexion->query($sql, PDO::FETCH_ASSOC) as $item) $matriz[] = $item;
        
       echo("1");
     

     }else{
      
       echo("-1");
     }

 }catch(Exception $e){
    die("Error" . $e->getMessage());
    echo "linea del error".$e->getLine();

 }
}


}


$oCliente =new Cliente();

if(isset($_POST['registrar'])){
   $idc=$_POST['cedula'];
   $nombrec=$_POST['nombre'];
   $apellidoc=$_POST['apellido'];
   $telefonoc=$_POST['celular'];
   $emailc=$_POST['email'];

  $bus=$oCliente->buscarCliente($idc);
if($bus==-1){
$oCliente->registrarcliente($idc,$nombrec,$apellidoc,$telefonoc,$emailc);
}else{
echo json_encode("existe");
}

}elseif (isset($_POST['buscar'])) {
   $idc=$_POST['cedula'];
   $ob=$oCliente->buscarCliente($idc);
   if($ob==-1){
      echo json_encode("No");
   }else{
      echo json_encode("existe");
   }
}


?>
 