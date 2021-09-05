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

       public function traerPagosCliente($id){
       try { 
           if(consultarNumeroPagos()==1){ 
          
        $sql = "SELECT nombreC,apellido,fecha,valor_pagado,valor_empenio* FROM cliente INNER JOIN producto on producto.cedula_cliente=cliente.cedula
        INNER JOIN pago_empenio on cliente.cedula=pago_empenio.cedula_cliente where cliente.cedula=$id";

           }else{ 

           }
        $resultado=$this->conexion->prepare($sql);
         $resultado->execute();
         
        } catch(Exception $e){
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

 

function registrarPago($valor,$fecha,$id_cliente){
try{
   
    $sql = "INSERT INTO pago_empenio VALUES ('', '$valor', '$fecha', '$id_cliente')";
    $resultado=$this->conexion->prepare($sql);
    $resultado->execute();
    echo json_encode('Si');
      
 }catch(Exception $e){
    die("Error" . $e->getMessage());
    echo "linea del error".$e->getLine();

 }
}
}
$oEmpleado=new Empleado();
$oPagos=new PagosEmpenio();
$oProducto=new Producto();
$oCliente=new Cliente();

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
}else if(isset($_POST['buscarC'])){
  
  

    $idC=$_POST['ccbuscar'];
   
    $busC=$oCliente->buscarCliente($idC);

    if($busC==-1){
    echo json_encode("No");
    }else{
        $cons=$oProducto->consultarProductos($idC);
      if($cons!=-1  ){
         $pagos=$oPagos->getPagosRealizados($idC);
      if($pagos!=-1)
      echo json_encode($pagos);
       
       }else{
       }
      }
  

}else if(isset($_POST['pagar'])){
   
   $idC=$_POST['ccbuscar'];

}
 

?>