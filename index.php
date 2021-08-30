<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <!--  Bootstrap  -->
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css" rel="stylesheet">
           <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">  
</head>
<body>
    <header>
       
        <div id="titulo">
        <h2>Casa De Empeño</h2>
      
        </div>  
        <img src="imagenes/img2.jpg">
    </header>

    <nav></nav>
    <section id="container" class="main">
    <div class="formulario">
            <form id="formularios"  method="post">
                <h5>LOGIN</h5>
                <label for="user">Usuario <samp class="glyphicon glyphicon-user" ></samp></label>
              <input type="text" class="form-control" placeholder="Usuario" id="usuario" name="usuario"><br>
              <label for="pass">Password <span class="glyphicon glyphicon-lock"></span></label>
              <input type="password" class="form-control" placeholder="Password" id="clave" name="clave">
              <button type="submit" id="registrar"   class="btn btn-primary form-control">Iniciar Sesion</button>
            </form>
            <div class="mensaje mt-4"></div>
        </div>
    </section>
    <footer><p>Casa de empeño &</p></footer>
      
      <script src="./js/funcionesUsuario.js"></script>
</body>
</html>