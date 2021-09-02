 //declaracion de mis variables de trabajos 
 const formulario=document.getElementById('formularioEmpleado');
 const idE = document.getElementById('cedula');
 const nombre = document.getElementById('nombre');
 const apellido = document.getElementById('apellido');
 const celular = document.getElementById('celular');
 const correo = document.getElementById('email');
 const mensaje=document.getElementById('mensaje');
 const domicilio=document.getElementById('domicilio');

 const username=document.getElementById('username');
 const password=document.getElementById('password');
 const rol=document.getElementById('rol');
 const btnVerificar=document.getElementById('verificar');



 

// creamos el evento addEventListener para octener la fecha actual 

 //creamos el meto para mandar los datos a la BD 

 function insertarDatosEmpleado(){
   /*
  var fecha = new Date();
  const anoActual = fecha.getFullYear();
  const dia = fecha.getDate();
  const mesActual = fecha.getMonth() + 1;
  var fechaInicio= anoActual+'-'+mesActual+'-'+dia;

  console.log(fechaInicio);*/
   var datos = new FormData(formulario);
   datos.append('registrarE',true);

  
 for (var p of datos.entries()){
     
  console.log (p);
  }
   var url='../php/Empleado.php';
   fetch(url,{
       method: 'POST',
       body: datos
   })
   .then( res => res.json())
   .then( data => {
     if(data==='Si'){
      mensaje.innerHTML = `
      <div class="alert alert-danger" role="alert">
           Registro exitoso !!
      </div>
      `;
     formulario.reset();
       console.log('Datos Insertados');
     }else{
      mensaje.innerHTML = `
      <div class="alert alert-danger" role="alert">
            El empleado ya se encuentra registrado !!
      </div>
      `;
      mensaje.style.display='block';
      console.log("Error");
    }
     
   });
}
// Metodo para verificar que todo los campos esten llenos 
function verificarCampos(){
 if(idE.value==''|| nombre.value=='' || apellido.value=='' || celular.value==''||
  correo.value==''|| domicilio.value=='' || rol.value=='' || password.value=='' ){
   mensaje.innerHTML = `
   <div class="alert alert-danger" role="alert">
            ¡LLene todo los campos para continuar con el registro!
   </div>
   `;
   mensaje.style.display='block';
 }else{
  
  insertarDatosEmpleado();
 }
}

// cevento submit 
formulario.addEventListener('submit', e=>{
  e.preventDefault();

  // aca verifico que ese campo no este vacio 
  if(username.value==""){
   mensaje.innerHTML = `
   <div class="alert alert-danger" role="alert">
             LLene el campo Username para verificar que este disponible!
   </div>
   `;
   mensaje.style.display='block';
  }else{
   VerificarUsuario();
  }
 
 // en esta parte elimino el mensaje al trascurir 2 minutos 
 setTimeout(() => {
   mensaje.style.display='none';
 }, 2000);
});


// con este metodo verifico si el Username existe en la BD 
function VerificarUsuario(){
  var bsU=true;
 var datosE = new FormData(formulario);
 datosE.append('buscarU',bsU);
 for (var p of datosE.entries()){
     
  console.log (p);
  }
 var url='../php/Usuario.php';
 fetch(url,{
     method: 'POST',
     body: datosE
 })
 .then( res => res.json())
 .then( data => {
   if(data==='No'){
  
    verificarCampos();
   }else{
    mensaje.innerHTML = `
    <div class="alert alert-danger" role="alert">
              El username ya existe!
    </div>
    `;
    
    mensaje.style.display='block';
    setTimeout(() => {
      mensaje.style.display='none';
    }, 2000);
    console.log("Existe");
}
 }

 )}
// boton verifica si el cliente existe 




