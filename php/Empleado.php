<?php
require_once("autoload.php");
class Empleado extends Conexion{
    private $Cedula;
    private $Nombre;
    private $Apellido;
    private $Celular;
    private $Email;
    private $Domicilio;
    private $Rol;
    private $conexion;
 
    public function __construct(){
      $this->conexion=new Conexion();
      $this->conexion=$this->conexion->conect();
     }

     public function registrarEmpleado(int $cedula,string $nombre,string $apellido, int $celular,string $correo,string $domicilio,string $rol){

        try { 
         $this->Cedula=$cedula;
         $this->Nombre=$nombre;
         $this->Apellido=$apellido;
         $this->Celular=$celular;
         $this->Email=$correo;
         $this->Domicilio=$domicilio;
         $this->Rol=$rol;
  
        $sql = "INSERT INTO `empleado` VALUES ('$this->Cedula','$this->Nombre','$this->Apellido','$this->Celular','$this->Email','$this->Domicilio','$this->Rol')";
        $resultado=$this->conexion->prepare($sql);
         
        $resultado->execute();
      
        return 1;
        } catch(Exception $e){
           die("Error" . $e->getMessage());
           echo "linea del error".$e->getLine();
    
        }
             
       }

       
       public function crearInventario($fechaI,$fechaF){    
   try{
          
       $matriz = array();
       $sql = "SELECT * FROM pago_empenio INNER JOIN cliente on pago_empenio.cedula_cliente=cliente.cedula INNER JOIN empleado on empleado.cedula=pago_empenio.cedula_empleado WHERE (fecha BETWEEN '$fechaI' AND '$fechaF')  " ;
        $resultado=$this->conexion->prepare($sql);
        $resultado->execute();
        $numero_registro=$resultado->rowCount();
        if($numero_registro!=0){
            
            foreach ($this->conexion->query($sql, PDO::FETCH_ASSOC) as $item) $matriz[] = $item;
            echo json_encode($matriz);
         
                 
        }else{
          echo json_encode('no');
        }
         
    }catch(Exception $e){
       die("Error" . $e->getMessage());
       echo "linea del error".$e->getLine();
       
    }
   }

      
       public function buscarEmpleado($id){

        try{
        $this->Cedula=$id;
         $matriz = array();
          $sql="SELECT * FROM `empleado` WHERE cedula =  '$this->Cedula'";
          $resultado=$this->conexion->prepare($sql);
          $resultado->execute();
          $numero_registro=$resultado->rowCount();
          if($numero_registro!=0){

            return 1;
                
          }else{
              
            return -1;
            
          }
   
      }catch(Exception $e){
         die("Error" . $e->getMessage());
         echo "linea del error".$e->getLine();
   
      }
   }

 


}
$oEmpleado=new Empleado();


if(isset($_POST['registrarE'])){
$idE=$_POST['cedula'];


$busE=$oEmpleado->buscarEmpleado($idE);

    $nombreE=$_POST['nombre'];
    $apellidoE=$_POST['apellido'];
    $celularE=$_POST['celular'];
    $emailE=$_POST['email'];
    $domE=$_POST['domicilio'];
    $rolE=$_POST['rol'];

    if($busE==-1){
    $insert=$oEmpleado->registrarEmpleado($idE,$nombreE,$apellidoE,$celularE,$emailE,$domE,$rolE);
    if($insert==1){
        $user=$_POST['username'];
        $pass=$_POST['password'];
        $oUsuario=new Usuario();
        $oUsuario->registrarUsuario($user,$pass,$idE);
    }
    }else{
       echo json_encode("Existe");
    }
}elseif (isset($_POST['inventario'])) {
   $fechaIn=$_POST['fechaI'];
   $fechaFi=$_POST['fechaF'];
  $oEmpleado->crearInventario($fechaIn,$fechaFi);
}

 

?>