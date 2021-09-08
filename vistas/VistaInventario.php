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
  
        
         <div id="ErrorM1" class="error"></div>
        

             <div id="Valor-empeno" class="pago">
               
             </div>

          

   </nav>
   <aside>
   <div class="form_RegistrarPago">
          <h2>Generar inventario</h2>
         <form method="post" class="form-inline formularioRegistro">
        
            
               <div class="">  
                   <label for="fechaI">Fecha Inicio</label><br>
                 <input type="date" class="form-control" placeholder="Fecha inicio" name="fechaI" id="fechaI">
               </div>
             
                 <div class="">
                    <label for="fechaF">Fecha Final</label><br>   
                    <input type="date" class="form-control" placeholder="Fecha final" name="fechaF" id="fechaF">
                 </div><br>
                 
                  <button type="submit" class="btn btn-primary form-control " id="registra">calcular</button>
          
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
                 <th>ID EMPLEADO</th>
                 <th>NOMBRE EMPLEADO</th>
                 <th>ID CLIENTE</th>
                 <th>NOMBRES CLIENTE</th>
                 <th>APELLIDOS CLIENTE</th>
                 <th>FECHA</th>
                 <th>VALOR</th>
             </tr>
            </thead>
            
               
             </table>
             </div>
      
            
    </section>
    

    <footer><p>Casa de empeño &</p></footer>
   <script src="../js/Inventario.js"></script>
   
    </body>
</html>