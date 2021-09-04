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
       public function buscarEmpleado($id){

        try{
        $this->Cedula=$id;
         $matriz = array();
          $sql="SELECT * FROM `empleado` WHERE cedula = BINARY '$this->Cedula'";
          $resultado=$this->conexion->prepare($sql);
          $resultado->execute();
          $numero_registro=$resultado->rowCount();
          if($numero_registro!=0){

           echo json_encode("empleadoE");
           return $numero_registro;                
          }else{
              
            return -1;
            
          }
   
      }catch(Exception $e){
         die("Error" . $e->getMessage());
         echo "linea del error".$e->getLine();
   
      }
   }

   public function buscarClientePagar($id){
   
   try{
      
    
       $matriz = array();
       $sql ="SELECT cedula,nombreC,apellido,valor_empenio,valor_pagado,fecha FROM cliente INNER JOIN pago_empenio ON pago_empenio.cedula_cliente=cliente.cedula INNER JOIN producto ON producto.cedula_cliente=cliente.cedula where cedula=$id" ;
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

function registrarPago($valor,$fecha,$id_cliente){
try{
   
    $sql = "INSERT INTO pago_empenio VALUES ('', '$valor', '$fecha', '$id_cliente')";
    $resultado=$this->conexion->prepare($sql);
    $resultado->execute();
    echo json_encode('si');
      
 }catch(Exception $e){
    die("Error" . $e->getMessage());
    echo "linea del error".$e->getLine();

 }
}
}
$oEmpleado=new Empleado();
$idC=$_POST['cc-buscar'];
if(isset($_POST['registrarE'])){
$idE=$_POST['cedula'];


$bus=$oEmpleado->buscarEmpleado($idE);

    $nombreE=$_POST['nombre'];
    $apellidoE=$_POST['apellido'];
    $celularE=$_POST['celular'];
    $emailE=$_POST['email'];
    $domE=$_POST['domicilio'];
    $rolE=$_POST['rol'];

    if($bus==-1){
    $insert=$oEmpleado->registrarEmpleado($idE,$nombreE,$apellidoE,$celularE,$emailE,$domE,$rolE);
    if($insert==1){
        $user=$_POST['username'];
        $pass=$_POST['password'];
        $oUsuario=new Usuario();
        $oUsuario->registrarUsuario($user,$pass,$idE);
    }
    }
}else if(isset($_POST['buscarC'])){
  
$oEmpleado-> buscarClientePagar($idC);
}else if(isset($_POST['pagar'])){
$valor=$_POST['valor'];
$fecha=$_POST['fecha'];
    $oEmpleado->registrarPago($valor,$fecha,$idC);

}

?>