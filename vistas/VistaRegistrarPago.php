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
    <header>

    <div id="titulo">
        <h2>Casa De Empeño</h2>
      
        </div>  
        <img src="../imagenes/img2.jpg">
    <nav>
     <ul>
             <a href="Vistaprincipal.php">Empeño</a> 
             <a href="VistaRegistrarCliente.php"><samp class="glyphicon  glyphicon-plus" ></samp> Registro clientes </a>
             <a href="#"> <samp class="glyphicon  glyphicon-plus" ></samp> Registrar Producto</a>
             <a href="#"><samp class="glyphicon glyphicon-list-alt" > Editar Datos </samp></a>
             <a href="#"><samp class="glyphicon glyphicon-log-in" ></samp>  Salir</a>
      
       </ul>
    </nav>
    </header>
    
   <nav class="varra">
  
         <form form method="post" class="row" id="formulario-buscar">

                 <label for="cc">Cedula</label> 
                 <input type="text" class="form-control" placeholder="cedula" id="cc-buscar" name="cc-buscar">
              
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
          <h2>Registrar Pago</h2>
         <form method="post" id ="form_RegistrarPago"  class="form-inline formularioRegistro">
        
            
                 <div class="valor">
                    <label for="valor">Valor</label><br>   
                    <input type="text" class="form-control" placeholder="valor" name="valor" id="valor">
                 </div><br>
                 
                  <button class="btn btn-primary  form-control" id="registrarPago">Guardar</button>
          
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
                 <th>FECHA</th>
                 <th>VALOR</th>
             </tr>
            </thead>
            
             </table>
             </div>
      
    </section>
    

    <footer><p>Casa de empeño &</p></footer>
   <script src="../js/funcionesEmpleado.js"></script>
    </body>
</html>