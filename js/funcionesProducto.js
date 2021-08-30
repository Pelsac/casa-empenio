const formulario=document.getElementById('formularioEmpeno');
  const idC = document.querySelector('#idC');
  const producto = document.querySelector('#producto');

  const precio = document.querySelector('#precio');
  const descripcion = document.querySelector('#descrip');
  const fechafinal = document.querySelector('#fecha-final');
  const idA = localStorage.getItem('cedula_empleado');
  const mensaje=document.getElementById('mensaje');
  const btnVerificar=document.getElementById('verificar');
  console.log(idA);


  

 // creamos el evento addEventListener para octener la fecha actual 
 
     
  
 let fecha = new Date();
 let anoActual = fecha.getFullYear();
 let dia = fecha.getDate();
 let mesActual = fecha.getMonth() + 1;
 let fechaInicial= anoActual+'-'+mesActual+'-'+dia;

  console.log(fechaInicial);
  //creamos el meto para mandar los datos a la BD 

  function insertarDatosEmpeno(){

  let fecha = new Date();
  let anoActual = fecha.getFullYear();
  let dia = fecha.getDate();
  let mesActual = fecha.getMonth() + 1;
  let fechaInicial= anoActual+'-'+mesActual+'-'+dia;

    var datos = new FormData(formulario);
    var url='../php/REmpeno.php';
    fetch(url,{
        method: 'POST',
        body: datos
    })
    .then( res => res.json())
    .then( data => {
      if(data==='si'){
        console.log('Datos Insertados');
      }
    });
}
// Metodo para verificar que todo los campos esten llenos 
function verificarCampos(){
  if(idC.value==''|| producto.value=='' || fechaInicio.value=='' || precio.value==''||
   descripcion.value==''|| fechafinal.value=='' || idA.value=='' ){
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


 // con este metodo verifico si el cliente existe en la BD 
 function VerificarCliente(){
  var datosC = new FormData(formulario);
  var url='../php/buscarCliente.php';
  fetch(url,{
      method: 'POST',
      body: datosC
  })
  .then( res => res.json())
  .then( data => {
    if(data==='no'){
      mensaje.innerHTML = `
      <div class="alert alert-danger" role="alert">
              EL CLIENTE NO EXISTE !!
      </div>
      `;
      mensaje.style.display='block';
    }else{
      for(let i=0; i<data.length; i++){
           alert(`Nombres : ${data[i].Nombres} Apellidos: ${data[i].Apellidos} Telefono: 
           ${data[i].Celular} `);
       } 
    }
    
  });
}
 // boton verifica si el cliente existe 

 btnVerificar.addEventListener('click',(e)=>{
   e.preventDefault();

   // aca verifico que ese campo no este vacio 
   if(idC.value==""){
    mensaje.innerHTML = `
    <div class="alert alert-danger" role="alert">
              LLene el Campo Para Verificar!
    </div>
    `;
    mensaje.style.display='block';
   }else{
    VerificarCliente();
   }
  
  // en esta parte elimino el mensaje al trascurir 2 minutos 
  setTimeout(() => {
    mensaje.style.display='none';
  }, 2000);
  
 })

