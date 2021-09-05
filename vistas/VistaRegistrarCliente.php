<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empeño</title>
    <link rel="stylesheet" href="../css/estilo.css">
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
             <a href="VistaPrincipal.php">Empeño</a> 
             <a href="#"><samp class="glyphicon  glyphicon-plus" ></samp> Registro Producto </a>
             <a href="VistaRegistrarPago.php"> <samp class="glyphicon  glyphicon-plus" ></samp> Registrar Pago</a>
             <a href="#"><samp class="glyphicon glyphicon-list-alt" > Editar Datos </samp></a>
             <a href="#"><samp class="glyphicon glyphicon-log-in" ></samp>  Salir</a>
      
       </ul>
    </nav>
    </header>
    
   <nav></nav>
    <section id="container">

      <div class="formularioCliente">
      <div class="mensaje mt-5"></div>
         <div class="titulo">
              <h2  >Registrar Cliente </h2>
        </div>
       <style>
    div.titulo{
	text-align: center;
}
    </style>
         <form  id="formularioCliente" method="post">
        
                 <label for="cedula">Id Cliente</label><br>
                 <input type="text" class="form-control" placeholder="id" id="cedula" name="cedula" required/>
            
                 <label for="nombre">Nombres</label><br>   
                 <input type="text" class="form-control" placeholder="Nombres" id="nombre" name="nombre" required/>
              
                 <label for="apellidos">Apellidos</label>
                 <input type="text" class="form-control" placeholder="Apellidos" id="apellido" name="apellido" required/>
            
                 <label for="celular">Celular</label>
                 <input type="number" class="form-control" placeholder="Nº Celular" id="celular" name="celular"/ >

                 <label for="correo">Correo</label>
                 <input type="email" class="form-control" placeholder="Email" id="email" name="email"/><br>
                 <span id="asterisco" style="display: none;">*</span><br>

                <button type="submit" class="btn btn-primary form-control" id="registrar" name="registrar">Registrar</button>
         
           
                <button type="reset" class="btn form-control" id="cancelar">Cancelar</button>
               
        
         </form>
        
      </div>
    </section>
    

    <footer><p>Casa de empeño &</p></footer>
<script src="../js/Cliente.js"></script>
    
</body>
</html>