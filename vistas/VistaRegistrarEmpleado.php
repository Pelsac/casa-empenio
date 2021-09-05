<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empeño</title>
    <link rel="stylesheet" href="../css/vistaE.css">
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

      <div class="formularioEmpleado">
          <h2>Registrar empleado</h2>
          <h4>Datos empleado</h4>
          <div id="mensaje" class="mensaje" ></div>
         <form id="formularioEmpleado"  method="post">
             <div class="cedula">
             <label for="cedula">Cedula</label><br>
             <input type="text" class="form-control" id="cedula" name="cedula">
             </div>

             <div class="nombre">
             <label for="nombre">Nombres</label><br>   
              <input type="text"  class="form-control" id="nombre" name="nombre">
             </div>
           <br>
           <br>
               <div class="apellido">
                 <label for="precio">Apellidos</label>
                 <input type="text" class="form-control" id="apellido" name="apellido">
             </div>
             
             <div class="celular">
                <label for="celular">Celular</label>
                 <input type="number" class="form-control" placeholder="Nº Celular" id="celular" name="celular">
             </div>
             <br>
             <br>
             <div class="correo">
                <label for="correo">Correo</label>
                 <input type="email" class="form-control" placeholder="Email" id="email" name="email">
             </div>
            
             <div class="rol">
             <label for="rol">Selecionar Rol</label>
             <style> option{font-size:15px}</style>
             <select name="rol" id="rol" class="custom-select">
             <option selected value="">Selecione una opcion</option>
             <option value="ADMINISTRADOR">Administrador</option>
             <option value="VENDEDOR">Vendedor</option>
  
             </select>
             </div>
             <div class="domicilio">
             <label for="domicilio">Domicilio</label>
             <input type="text" class="form-control" placeholder="Domicilio" id="domicilio" name="domicilio">
             </div>
              <br>
              <br>
              <br>
              <br>
             <h4>Datos usuario</h4>
             <div class="username">
                <label for="username">Username</label>
                 <input type="text" class="form-control" placeholder="Nombre de usuario" id="username" name="username">
            </dv>
            <div class="password">
                <label for="password">Password</label>
                 <input type="password" class="form-control"  id="password" name="password">
            </dv>
            <div class="buton">
              <button  type="submit" name="registrarE" id="registrarE" class="btn btn-primary form-control">Registrar</button>
              
              
              <button type="reset" class="btn form-control" id="cancelar">Cancelar</button>
             </div>

           
         </form>
      
        
      </div>
    </section>
    <aside>

    </aside>
<br>
<br>
    <footer><p>Casa de empeño &</p></footer>
    <script src="../js/Empleado.js"></script>
  
</body>
</html>

