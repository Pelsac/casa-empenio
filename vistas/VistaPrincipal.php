<?php
require_once("../php/autoload.php");
 $oEstanteria= new Estanteria();
 $consultE=$oEstanteria->consultarEstanterias();

 
  ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empeño</title>
    <link rel="stylesheet" href="../css/vistaP.css">
        <!--  Bootstrap  -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">  
   
    
</head>
<body>
    <header>

    <div id="titulo">
        <h2>Casa De Empeño</h2>
      
        </div>  
        <img src="../imagenes/img2.jpg">
    <nav>
     <ul>
             <a href="VistaRegistrarCliente.php"><samp class="glyphicon glyphicon-plus" ></samp> Registrar Cliente</a> 
             <a href="VistaRegistarProducto.php"><samp class="glyphicon  glyphicon-plus" ></samp> Registro Producto </a>
             <a href="VistaRegistrarPago.php"> <samp class="glyphicon  glyphicon-plus" ></samp> Registrar Pago</a>
             <a href="#"><samp class="glyphicon glyphicon-list-alt"> Editar Datos </samp></a>
             <a href="#"><samp class="glyphicon glyphicon-log-in"></samp>  Salir</a>
      
       </ul>
    </nav>
    </header>

    <aside></aside>
    <section id="container">

      <div class="formularioEmpeno">
          <h2>Registre el empeño</h2>
          <div id="mensaje" class="mensaje" ></div>
         <form id="formularioEmpeno"  method="post">
             <div class="id">
             <label for="id">Id Cliente</label><br>
             <input type="text" class="form-control" id="idC" name="cedula">
             </div>

             <div class="producto">
             <label for="producto">Producto</label><br>   
              <input type="text"  class="form-control" id="producto" name="producto">
             </div>
                 <div class="precio">
                 <label for="precio">Precio</label>
                 <input type="number" class="form-control" id="precio" name="precio">
             </div>
            

             <div class="descripcion">
                 <label for="des">descripcion</label><br>
                <textarea name="descrip" id="descrip" cols="50" rows="2" class="desc form-control" ></textarea>
             </div>
             <div class="fecha-final">
                 <label for="fecha">Fecha final</label><br>
                 <input type="date" class="form-control" id="fechafinal" name="fechafinal" >
             </div>

             <div class="estanteria">
             <label for="estanteria">Seleccionar estanteria</label>
             <style> option{font-size:15px}</style>
             <select name="estanteria" id="estanteria" class="custom-select">
             <option selected value=0>Selecione una opcion</option>
             <?php
             foreach ($consultE as $valores):
                $nombre=$valores['nombre'];
                            
                if($nombre!="Ventas" ) {
               
               echo '<option value="'.$valores["id"].'">'.$valores["nombre"].'</option>';
               
             
            }
        endforeach;
       
             ?>
  
             </select>
             </div>
             <div class="ubicacion">
             <label for="id">Ubicacion</label><br>
             <input type="text" class="form-control" id="ubicacion" name="ubicacion" disabled>
             </div>

            <div class="buton">
              <button  type="submit" class="btn btn-primary form-control">Registrar</button>
              
              
              <button type="reset" class="btn form-control" id="cancelar">Cancelar</button>
             </div>

             <button class="btn btn-primary  form-control" id="verificar">Verificar Cliente</button>
             <button class="btn btn-primary  form-control" id="asignar">Asignar Ubicacion</button>

           

         </form>
      
        
      </div>
    </section>
    <aside>

    </aside>

    <footer><p>Casa de empeño &</p></footer>
    <script src="../js/funcionesProducto.js">
   
</script>
  
</body>
</html>