<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empeño</title>
    <link rel="stylesheet" href="../css/pago.css">
        <!--  Bootstrap  -->
    
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">  
   
</head>
<body>
<?php
    session_start();
    if(!isset($_SESSION["usuarios"])){
     header("location:../index.php");
     }
?>
    <header>

    <div id="titulo">
        <h2>Casa De Empeño</h2>
      
        </div>  
        <img src="../imagenes/img2.jpg">
        <nav>
     <ul>
             <a href="VistaRegistrarCliente.php"><samp class="glyphicon glyphicon-plus" ></samp>  Clientes</a> 
             <a href="VistaPrincipal.php"><samp class="glyphicon  glyphicon-plus" ></samp>  Productos </a>
             <a href="VistaRegistrarPago.php"> <samp class="glyphicon  glyphicon-plus" ></samp> Pagos</a>
             <a href="VistaRegistrarEmpleado.php"> <samp class="glyphicon  glyphicon-plus" ></samp> Empleado</a>
             <a href="VistaInventario.php"> <samp class="glyphicon  glyphicon-plus" id='inventario'></samp> Inventario</a>
             <a href="./cerrar_sesion.php"><samp class="glyphicon glyphicon-log-in"></samp>  Salir</a>
      
       </ul>
    </nav>
    </header>
    
   <nav class="varra">
  
         <form form method="post" class="row" id="formulario-buscar">

                 <label for="cc">Cedula</label> 
                 <input type="text" class="form-control" placeholder="cedula" id="ccbuscar" name="ccbuscar">
              
                <button class="btn btn-primary " id="buscar" name="buscar">Buscar</button>
               
         </form>
         <div id="ErrorM1" class="error"></div>
         
         <div id="deuda" class="pago">
             
             </div>

             <div id="Valor-empeno" class="pago">
               
             </div>

   </nav>
   <aside>
   <div class="form_RegistrarPago">
          <h2>Retirar producto</h2>
         <form method="post" id ="retirarProducto"  class="form-inline formularioRegistro">
        
            
             <br>
                 
                  <button class="btn btn-primary  form-control" id="retirarProducto">Retirar</button>
          
                  <button  type="reset" class="btn form-control " id="cancelar">Cancelar</button>
               
         </form>

         <div id="ErrorM2"></div>
      </div>
    
   </aside>
    <section id="container">
    <div id="tabla">
    <table class="table  table-striped table-hover tabla" >
            <thead class="thead-dark">
             <tr style="color:#000000;">
                 
                
                 <th>NOMBRES</th>
                 <th>APELLIDOS</th>
                 <th>PRODUCTO</th>
                 <th>ESTADO</th>
                 <th>DESCRIPCION</th>
                
             </tr>
            </thead>
            
             </table>
             </div>
      
    </section>
    

    <footer><p>Casa de empeño &</p></footer>
   <script src="../js/RetirarProducto.js"></script>
     </body>
</html>