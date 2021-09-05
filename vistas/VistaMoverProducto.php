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
    
   
   <aside>
   <div class="Mover_Productos">

          <h2>MOVER PRODUCTOS A VENTAS  </h2>
         <form method="post" id ="form_RegistrarPago"  class="form-inline formularioRegistro">
                                  
         </form>
    
      </div>
      <style>
    div.Mover_Productos{
	text-align: center;
}
    </style>
    
   </aside>
    <section id="container">
    <div id="tablaMP">
    <table class="table  table-striped table-hover tabla" >
            <thead class="thead-dark">
             <tr style="color:#000000;">
                 
                
                 <th>ID</th>
                 <th>NOMBRE</th>
                 <th>VALOR DE EMPEÑO</th>
                 <th>ESTADO</th>
                 <th>DESCRIPCION</th>
                 <th>FECHA FINAL</th>
                 <th>CEDULA CLIENTE</th>
                 <th>CLIENTE</th>
                
             </tr>
            </thead>
            
             </table>
             </div>
      
    </section>
    

    <footer><p>Casa de empeño &</p></footer>
   <script src="../js/Pago_empenio.js"></script>
    </body>
</html>