// declaramos las variables
const formulario=document.getElementById('formularios');
const usuario=document.querySelector('#usuario');
const clave=document.querySelector('#clave');
const mensaje=document.querySelector('.mensaje');

//metodo para validar si los datos de ingreso son correctos o existen en la base de datos 


function iniciarSesion(){
 let iniciarS=true;
    let datos = new FormData(formulario);
   datos.append('iniciarS',iniciarS);
   //Verificar datos de del formulario
   for (var p of datos.entries()){
     
    console.log (p);
    }
     var url='php/Usuario.php';
    fetch(url,{
        method: 'POST',
        body: datos
    })
        .then( res => res.json())
        .then( data => {
        // en esta parte verificamos si los datos devueltos por el .json son correctos
          if(data==='No'){
            formulario.reset();
             mensaje.innerHTML=`<div class="alert alert-danger" role="alert">Password o Usuario Incorrectos</div>`
             mensaje.style.display = 'block';
            }else{
            
             
               localStorage.setItem('cedula_empleado',data[0].cedula_empleado); 
               if(data[0].rol==='ADMINISTRADOR'){
                location.href='vistas/VistaRegistrarEmpleado.php';   
              } else{
                location.href='vistas/VistaPrincipal.php';   
              }
            
          }
          
        });
  }


  // con este metodo validamos que  los campos esten llenos 

  function validarFormulario(){
  
      if(usuario.value==='' || clave.value===''){
        mensaje.innerHTML=`<div class="alert alert-danger">LLene todo los campos</div>`;
        mensaje.style.display = 'block';
      }else{
        iniciarSesion();
      }   
  }
  // creamos el evento submit 

  formulario.addEventListener('submit', (e)=>{
       e.preventDefault();
      
         validarFormulario();

         // en esta parte el mensaje se oculta 
         
         setTimeout(() => {
             mensaje.style.display = 'none';
         }, 2000);

        
  });
