
 const botonGuardar=document.getElementById('registrarPago');
 const formularioBuscar=document.getElementById('formulario-buscar');
 const ccBuscar=document.querySelector('#ccbuscar');
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
    datosInsertar.append('ccbuscar',ccBuscar.value);
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
          errorm2.innerHTML=`<div class="alert alert-success" role="alert">Error al realizar pago</div>`
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
      
            if(data==='No'){
                errorm1.innerHTML=`<div class="alert alert-danger" role="alert">El cliente no se encuentra registrado</div>`
                errorm1.style.display='block';
             setTimeout(() => {
                  errorm1.style.display='none';
             },3000);
            
            }else if(data[0].valor_pagado){

             
  
           var costoPagar,suma=0;
          let tbody=document.createElement('tbody');
          
          
          
          
          for(let i=0; i< data.length; i++){
            if(data[i].estado==="Empeniado" || data[i].estado==="Venta" ){
            tbody.innerHTML +=`<tr>
            <td>${data[i].nombreC}</td>  
            <td>${data[i].apellido}</td>
            <td>${data[i].nombre}</td>  
          
            <td>${data[i].valor_pagado}</td>
            <td>${data[i].fecha}</td>
            <td>${data[i].estado}</td>
            <td>${data[i].fecha_final}</td>
            </tr>
             
              `;
              suma+=parseInt(data[i].valor_pagado);
             
              costoPagar=parseInt(data[i].valor_empenio)-suma;
                if(costoPagar<=0){
                deuda.textContent='DEUDA CANCELADA'
                deuda.style.background='#2EED03';
                }else{

                  
                   if(data[i].estado==="Venta"){
                    deuda.textContent=` El producto empeñado ha pasado a propiedad de la casa de empeño por vencimiento de tiempo`;
                  }else{
                    deuda.textContent=`Deuda Pendiente: $ ${costoPagar}`;
                    valorEmpeno.innerText=`Valor de Empeño: $ ${data[i].valor_empenio}`;
                  }
                
                }
          
           
              }
  
          }
         
       
          
          tabla.appendChild(tbody);
         
         
         
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
  
  
  
  
  
  