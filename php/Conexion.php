<?php
class Conexion{

    private $servidor_bd = "localhost";
    private $usuario_bd  = "root";
    private $clave_bd    = "";
    private $bd = "casa-empenio";
    private $conect;

    public function __construct(){
        $conexionS="mysql:host=".$this->servidor_bd.";dbname=".$this->bd.";charset=utf8";

        try {
            $this->conect=new PDO($conexionS,$this->usuario_bd,$this->clave_bd);
            $this->conect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
   
        } catch (Exception $e) {
            
            $this->conect='Error de conexion';
            echo($this->conect)."\n";
            echo "ERROR:". $e->getMessage()."\n";
            echo "linea del error".$e->getLine();
              
}
}
public function conect(){
    return $this->conect;
}

}


?>