<?php
require_once("autoload.php");
class Producto extends Conexion{
   
   private $Nombre;
   private $ValorE;
   private $Descripcion;
   private $FechaI;
   private $FechaF;
   private $UbicacionF;
   private$UbicacionC;
   private $conexion;

   public function __construct(){
     $this->conexion=new Conexion();
     $this->conexion=$this->conexion->conect();
    }

    

    public function consultarProductos($id){
      try{
      
    
         $matriz = array();
         $sql ="SELECT * FROM producto
         WHERE producto.cedula_cliente='$id'  " ;
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
  
   public function registrarProducto(string $nombre,int $valorE, string $descripcion,string $fechaI,string $fechaF,int $ubicacionF,int $ubicacionC,int $cedulaC,int $idEstanteria,int $cedulaE){

      try { 
     
        $this->Nombre=$nombre;
        $this->ValorE=$valorE;
        $this->Descripcion=$descripcion;
        $this->FechaI=$fechaI;
        $this->FechaF=$fechaF;
        $this->UbicacionF=$ubicacionF;
        $this->UbicacionC=$ubicacionC;
        
      $sql = "INSERT INTO `producto` VALUES ('','$this->Nombre','$this->ValorE','0','Empeniado','$this->Descripcion','$this->FechaI','$this->FechaF','$this->UbicacionF','$this->UbicacionC','$cedulaC','$idEstanteria','$cedulaE')";
      $resultado=$this->conexion->prepare($sql);
       
      $resultado->execute();

    return 1;
        
      } catch(Exception $e){
         die("Error" . $e->getMessage());
         echo "linea del error".$e->getLine();
  
      }
           
     }

    
}

$oProducto=new Producto();
if(isset($_POST['Insertar'])){
$nombreP=$_POST['producto'];
$cedulaC=$_POST['cedula'];
$valorEm=$_POST['precio'];
$descrip=$_POST['descrip'];
$fechaI=$_POST['fecha_inicial'];
$fechaF=$_POST['fechafinal'];
$cedulaE=$_POST['cedula_empleado'];
$id_Estant=$_POST['estanteria'];
$ubicaF=$_POST['ubicacionF'];
$ubicaC=$_POST['ubicacionC'];

    $insert=$oProducto->registrarProducto($nombreP,$valorEm,$descrip,$fechaI,$fechaF,$ubicaF,$ubicaC,$cedulaC,$id_Estant,$cedulaE);
if($insert==1){
   $oEStan=new Estanteria();
   $oEStan->asignarOcupacion($id_Estant,$ubicaF,$ubicaC);
   
}
}

?>
 