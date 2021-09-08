<?php
require_once("autoload.php");
class Usuario extends Conexion{
 private $Username;
 private $Password;
 private $lastSesion;


    public function __construct(){
        $this->conexion=new Conexion();
        $this->conexion=$this->conexion->conect();
       }

       public function registrarUsuario(string $user,string $pass,int $c_empleado){

        try { 
            $this->Username=$user;
            $this->Password=$pass;
            $this->lastSesion='';
  
        $sql = "INSERT INTO `usuario` VALUES ('$this->Username','$this->Password','$this->lastSesion','$c_empleado')";
        $resultado=$this->conexion->prepare($sql);
         
        $resultado->execute();
  
        echo json_encode("Si");
        
        } catch(Exception $e){
           die("Error" . $e->getMessage());
           echo "linea del error".$e->getLine();
    
        }
             
       }
  

    public function iniciarSesion($user,$pass){

      
        try{
        $this->Username=$user;
        $this->Password=$pass;
       
        $matriz = array();
        $sql="SELECT * FROM usuario INNER JOIN empleado ON usuario.cedula_empleado=empleado.cedula WHERE username ='$this->Username' AND password = '$this->Password'";
        $resultado=$this->conexion->prepare($sql);
        $resultado->execute();
        $numero_registro=$resultado->rowCount();

        if($numero_registro!=0){
            session_start();
            $_SESSION["usuarios"]='$this->Username';
            foreach ($this->conexion->query($sql, PDO::FETCH_ASSOC) as $item) $matriz[] = $item;
            
            echo json_encode($matriz);
                 return 1;             
        
        }else{
            echo json_encode('No');

        }

        }catch(Exception $e){
       die("Error" . $e->getMessage());
       echo "linea del error".$e->getLine();

       }
    }


public function lastSesion($fecha,$user){
try{
       
    $matriz = array();
     $sql="UPDATE `usuario` SET `ultima_sesion`='$fecha' WHERE usuario.username='$user'";
     $resultado=$this->conexion->prepare($sql);
     $resultado->execute();
   

 }catch(Exception $e){
    die("Error" . $e->getMessage());
    echo "linea del error".$e->getLine();

 }
}
    public function buscarUsername($id){
        try{
       
         $matriz = array();
          $sql="SELECT * FROM `usuario` WHERE username = BINARY '$id'";
          $resultado=$this->conexion->prepare($sql);
          $resultado->execute();
          $numero_registro=$resultado->rowCount();
          if($numero_registro!=0){
              
              foreach ($this->conexion->query($sql, PDO::FETCH_ASSOC) as $item) $matriz[] = $item;
              echo json_encode("Si");
           
                
          }else{
            echo json_encode('No');
          }
   
      }catch(Exception $e){
         die("Error" . $e->getMessage());
         echo "linea del error".$e->getLine();
   
      }
   }
}

$oUsuario=new Usuario();

 
if (isset($_POST['iniciarS'])) { 
    $usuario=$_POST['usuario'];
    $clave=$_POST['clave'];
   
    $insert=$oUsuario->iniciarSesion($usuario,$clave);
    if($insert==1){
        $fecha=$_POST['fechaUpdate'];
        $oUsuario->lastSesion($fecha,$usuario);
    }
    }elseif (isset($_POST['buscarU'])) {
        $uNma= $_POST['username'];
        $oUsuario->buscarUsername($uNma);
    }


         
        
     


    


?>