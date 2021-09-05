const formulario = document.getElementById('formularioCliente');
const idc = document.querySelector('#cedula');
const nombre = document.querySelector('#nombre');
const apellido = document.getElementById('apellido');
const telefono = document.getElementById('celular');
const email = document.getElementById('email');
const mensaje = document.querySelector('.mensaje');
const boton = document.getElementById('registrar');
const  bntCancelar = document.getElementById('cancelar');




// la peticion para enviar datos 
function registrarCliente(){

let reg=true;
  

    let datos = new FormData(formulario);
   datos.append('registrar',reg);
   for (var p of datos.entries()){
     
    console.log (p);
    }
    var url='../php/Cliente.php';
    fetch(url,{
        method: 'POST',
        body: datos
    })
        .then( res => res.json())
        .then( data => {
          if(data==='Si'){
            formulario.reset()
           
            mensaje.innerHTML=`<div class="alert alert-danger" >Registro Exitoso</div>`;  
            mensaje.style.display='block';
            console.log('Datos Insertados');
                      
          }else{
            formulario.reset()
            mensaje.innerHTML=`<div class="alert alert-danger" >El cliente existe</div>`;  
            mensaje.style.display='block';
            console.log('Usuario ya existe');
          }
          
        });
  }


// validar formulario 

function  validarFormulario(){
    if(idc.value==='' || nombre.value==='' || apellido.value==='' || telefono.value==='' || email.value===''){
        mensaje.innerHTML=`<div class="alert alert-danger" >LLene todo los campos</div>`; 
        mensaje.style.display='block';
      console.log("Formulario vacio")
    }else{
       registrarCliente();
       
    }
}


// creo el evento click 

boton.addEventListener('click', (e)=>{
    e.preventDefault();
    validarFormulario();

     setTimeout(() => {
         mensaje.style.display='none';
     },2000);
});

// evento del boton cancelar 

bntCancelar.addEventListener('click', e=>{
    e.preventDefault();
    formulario.reset();
});
