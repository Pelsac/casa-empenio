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
 const btnRegistrar=document.getElementById('registrar');



 const botonGuardar=document.getElementById('registrarPago');
const formularioBuscar=document.getElementById('formulario-buscar');
const ccBuscar=document.querySelector('#cc-buscar');
const botonBuscar=document.querySelector('#buscar');
const tabla=document.querySelector('.tabla');
const valorEmpeno=document.getElementById('Valor-empeno');
const  formularioRegistro=document.getElementById('form_RegistrarPago');
const  valor=document.getElementById('valor');
const  deuda=document.getElementById('deuda');
const  errorm1=document.getElementById('ErrorM1');
const  errorm2=document.getElementById('ErrorM2');





 

let fecha = new Date();
const anoActual = fecha.getFullYear();
const dia = fecha.getDate();
const mesActual = fecha.getMonth() + 1;
let fechaA=anoActual+"-"+mesActual+"-"+dia;

 function insertarDatosEmpleado(){
  
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
if(btnRegistrar!=null){
btnRegistrar.addEventListener('submit', e=>{
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

}

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

 ////////////////////////////////////////////////////////////////

 function validarIsertarPago(){
  if(valor.value===''  ){
      errorm2.innerHTML=`<div class="alert alert-danger" role="alert">Ingrese un valor</div>`
      errorm2.style.display='block';
   
  }else if(ccBuscar.value===''  ){
    errorm2.innerHTML=`<div class="alert alert-danger" role="alert">Ingrese la cedula del cliente a buscar </div>`
      errorm2.style.display='block';
    
     
  }else {
  insertarPago();
  }
  setTimeout(() => {
      errorm2.style.display='none';
 },2000);

}


 function insertarPago(){
  var datosInsertar = new FormData(formularioRegistro);
  datosInsertar.append('cc-buscar',ccBuscar.value);
  datosInsertar.append('pagar','')
  datosInsertar.append('fecha',fechaA)
  for (var p of datosInsertar.entries()){
     
    console.log (p);
    }
  var url='../php/Empleado.php';
  fetch(url,{
      method: 'POST',
      body: datosInsertar
  })
  .then( res => res.json())
  .then( data => {
      if(data==='si'){
          errorm2.innerHTML=`<div class="alert alert-danger" role="alert">Pago Registrado Correctamente!!</div>`
          errorm2.style.display='block';
      }else{
        errorm2.innerHTML=`<div class="alert alert-success" role="alert">Pago Incorrecto</div>`
          errorm2.style.display='block';
      }
    setTimeout(() => {
      errorm2.style.display='none';
    }, 2000);
  });
}
 function buscarCliente(){
  let datos = new FormData(formularioBuscar);

  datos.append('buscarC','');
  var url='../php/Empleado.php';
  for (var p of datos.entries()){
   
    console.log (p);
    }
  fetch(url,{
      method: 'POST',
      body: datos
  })
      .then( res => res.json())
      .then( data => {
          if(data==='no'){
              errorm1.innerHTML=`<div class="alert alert-danger" role="alert">El cliente no se encuentra Registrado</div>`
              errorm1.style.display='block';
           setTimeout(() => {
                errorm1.style.display='none';
           },3000);
          
          }else{
           

         var costoPagar,suma=0;
        let tbody=document.createElement('tbody');
        
        
        
        
        for(let i=0; i< data.length; i++){
         
          tbody.innerHTML +=`<tr>
          <td>${data[i].nombreC}</td>  
          <td>${data[i].apellido}</td>
          <td>${data[i].fecha}</td>
          <td>${data[i].valor_pagado}</td>
          </tr>
           
            `;
          
         suma+=parseInt(data[i].valor_pagado);

        }
       
      //}
        
        tabla.appendChild(tbody);
        valorEmpeno.innerText=`Valor de Empeño: $ ${data[0].valor_empenio}`;
        costoPagar=parseInt(data[0].valor_empenio)-suma;
        if(costoPagar<=0){
        deuda.textContent='DEUDA CANCELADA'
        deuda.style.background='#2EED03';
        }else{
          deuda.textContent=`Deuda Pendiente: $ ${costoPagar}`;
        
        }
       
          }
        
      });
}



function validar(){
  if(ccBuscar.value==''){
     
      errorm1.innerHTML=`<div class="alert alert-danger" role="alert">Ingrese La CC a buscar</div>`
      errorm1.style.display='block';
   setTimeout(() => {
        errorm1.style.display='none';
   },3000);
  }else{
      buscarCliente();

  }
}
// creamos el evento click 
botonBuscar.addEventListener('click', (e)=>{

  console.log(formularioRegistro.value);
  e.preventDefault();
  
      validar();
    
});

botonGuardar.addEventListener('click',(e)=>{
  console.log("Guardar");
  e.preventDefault();
  validarIsertarPago();
})





