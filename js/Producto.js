const formulario=document.getElementById('formularioEmpeno');
  const idC = document.querySelector('#idC');
  const producto = document.querySelector('#producto');
  const precio = document.querySelector('#precio');
  const descripcion = document.querySelector('#descrip');
  const idA = localStorage.getItem('cedula_empleado');
  const fechafinal = document.querySelector('#fechafinal');
  const estanteria=document.getElementById('estanteria');
  const ubicacion=document.getElementById('ubicacion');
  const mensaje=document.getElementById('mensaje');
  const btnVerificar=document.getElementById('verificar');
  const btnAsignar=document.getElementById('asignar');
  
  
 console.log(idA)

  


 // creamos el evento addEventListener para octener la fecha actual 
 
     
 var fecha = new Date();
 var anoActual = fecha.getFullYear();
 var dia = fecha.getDate();
 var mesActual = fecha.getMonth() + 1;
 var fechaInicial= anoActual+'-'+mesActual+'-'+dia;
//console.log(fechafinal.value); Falta verificar fecha
  //creamos el meto para mandar los datos a la BD 

  function insertarDatosEmpeno(){

if(fechafinal.value)
    var datos = new FormData(formulario);
    datos.append('fecha_inicial',fechaInicial);
    datos.append('cedula_empleado',idA);
    datos.append('ubicacionF',localStorage.getItem('filaU'));
    datos.append('ubicacionC',localStorage.getItem('columnaU'));
    datos.append('Insertar',1);

    var url='../php/Producto.php';
    for (var p of datos.entries()){
     
      console.log (p);
      }
    fetch(url,{
        method: 'POST',
        body: datos
    })
    .then( res => res.json())
    .then( data => {
      if(data==='Si'){
        formulario.reset();
        mensaje.innerHTML = `
        <div class="alert alert-danger" role="alert">
                 Registro Exitoso
        </div>
        `;
        mensaje.style.display='block';
        console.log('Datos Insertados');
      }else{
    console.log("Error");
      }
    });
}
// Metodo para verificar que todo los campos esten llenos 
function verificarCampos(){
  if(idC.value==''|| producto.value==''  || estanteria.value==''|| precio.value==''||
   descripcion.value==''|| ubicacion.value=='' ||fechafinal.value==''  ){
    mensaje.innerHTML = `
    <div class="alert alert-danger" role="alert">
              LLene todo los Campos
    </div>
    `;
    mensaje.style.display='block';
  }else{
  insertarDatosEmpeno();
  }
}


 // cevento submit 
 formulario.addEventListener('submit', e=>{
   e.preventDefault();
   verificarCampos();
  
   setTimeout(() => {
      mensaje.style.display='none';
   }, 2000);
 });



 //Obtiene la ubicacion asignada al producto


function obtenerUbicacion(){
  let bsU=true;
 var datosEs = new FormData(formulario);
 datosEs.append('buscarEs',bsU);
 for (var p of datosEs.entries()){
     
  console.log (p);
  }
 var url='../php/Estanteria.php';
 fetch(url,{
     method: 'POST',
     body: datosEs
 })
 .then( res => res.json())
 .then( data => {
  let fila=parseInt(data[0].filas_ocupadas);
  let colum=parseInt(data[0].columnas_ocupadas);
  if(parseInt(data[0].capacidad_filas)>fila&& parseInt(data[0].capacidad_columnas)>colum)  {
  fila=fila+1;
  colum=colum+1;

 console.log(fila);
 console.log(fila+1);
  ubicacion.value="("+fila+","+colum+")";
  
  localStorage.setItem('filaU',fila); 
  localStorage.setItem('columnaU',colum); 
  

   }else{
    ubicacion.value="";
    mensaje.innerHTML = `
    <div class="alert alert-danger" role="alert">
              ¡Estanteria llena!
    </div>
    `;
    mensaje.style.display='block';
    setTimeout(() => {
      mensaje.style.display='none';
    }, 2000);
}
   
}

)}


 // boton verifica si el cliente existe 
 // con este metodo verifico si el cliente existe en la BD 
 function VerificarCliente(){
  var datosC = new FormData(formulario);
  datosC.append("buscar",idC.value)
  for (var p of datosC.entries()){
     
    console.log (p);
    }
  var url='../php/Cliente.php';
  
  fetch(url,{
      method: 'POST',
      body: datosC
  })
  .then( res => res.json())
  .then( data => {
    if(data==='existe'){ 
        mensaje.innerHTML = `
      <div class="alert alert-danger" role="alert">
             Puede seguir con el registro !!
      </div>
      `;
     
      mensaje.style.display='block';
      setTimeout(() => {
        mensaje.style.display='none';
     }, 2000);
    }else{
     
     mensaje.innerHTML = `
      <div class="alert alert-danger" role="alert">
              EL CLIENTE NO EXISTE !!
      </div>
      `;
      mensaje.style.display='block';
        setTimeout(() => {
        mensaje.style.display='none';
     }, 1000);
    }
    
  });
}



 btnVerificar.addEventListener('click',(e)=>{
   e.preventDefault();

   // aca verifico que ese campo no este vacio 
   if(idC.value==""){
    mensaje.innerHTML = `
    <div class="alert alert-danger" role="alert">
              Ingrese el numero de identificacion del cliente!
    </div>
    `;
    mensaje.style.display='block';
    setTimeout(() => {
      mensaje.style.display='none';
   }, 2000);
   }else{
    VerificarCliente();
   }
  });


  btnAsignar.addEventListener('click',(e)=>{
    e.preventDefault();

    // aca verifico que ese campo no este vacio 
    if(estanteria.value==0){
     
        ubicacion.value="";
 
      mensaje.innerHTML = `
      <div class="alert alert-danger" role="alert">
               ¡Seleccione una estanteria!
      </div>
      `;
      mensaje.style.display='block';
      setTimeout(() => {
        mensaje.style.display='none';
     }, 2000);
    
    }else{
    obtenerUbicacion();
 

    }
  
  // en esta parte elimino el mensaje al trascurir 2 minutos 
  setTimeout(() => {
    mensaje.style.display='none';
  }, 2000);
  
 });

