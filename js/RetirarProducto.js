const botonRetirar=document.getElementById('retirarProducto');
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
 var nombre=new Array(1);

 let fecha = new Date();
const anoActual = fecha.getFullYear();
const dia = fecha.getDate();
const mesActual = fecha.getMonth() + 1;
const horaE=fecha.getHours();
const min=fecha.getMinutes();
const seg=fecha.getSeconds();
let fechaA=anoActual+"-"+mesActual+"-"+dia+" "+horaE+":"+min+":"+seg;
console.log(fechaA);

function retirarProducto(){

  if(ccBuscar.value===''|| localStorage.getItem('deuda')===null  ){
    

    errorm2.innerHTML=`<div class="alert alert-danger" role="alert">¡Primero,busque el cliente!</div>`
   errorm2.style.display='block';
         
     
  }else {


  if(parseInt(localStorage.getItem('deuda')<=0)){
    errorm2.innerHTML=`<div class="alert alert-danger" role="alert">¡Deuda pendiente!</div>`
    errorm2.style.display='block';
 
    }else {
      let datosInsertar = new FormData();
      datosInsertar.append('fecha',fechaA);
      datosInsertar.append('id_producto',localStorage.getItem('id_producto'));
      datosInsertar.append('ccbuscar',ccBuscar.value);
      datosInsertar.append('estado','Recuperado');
      datosInsertar.append('id_estanteria',localStorage.getItem('id_estanteria'));
     datosInsertar.append('retirar','');
    
    for (var p of datosInsertar.entries()){
       
      console.log (p);
      }
    var url='../php/Producto.php';
    fetch(url,{
        method: 'POST',
        body: datosInsertar
    })
    .then( res => res.json())
    .then( data => {

      if(data==='Si'){
        errorm1.innerHTML=`<div class="alert alert-danger" role="alert">Puede entregar el procduto</div>`
        errorm1.style.display='block';
     setTimeout(() => {
          errorm1.style.display='none';
     },3000);
    
        
    }
  });
  }
   
  }
  setTimeout(() => {
    errorm2.style.display='none';
},2000);

}
  
  





   function buscarCliente(){
    let datos = new FormData(formularioBuscar);
  
    datos.append('buscarC','');
    var url='../php/PagosEmpenio.php';
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
            if(data[i].estado==="Empeniado" && data[0].estado==="Empeniado" ){
            tbody.innerHTML +=`<tr>
            <td>${data[i].nombreC}</td>  
            <td>${data[i].apellido}</td>
            <td>${data[i].nombre}</td>  
          
            <td>${data[i].estado}</td>
            <td>${data[i].descripcion}</td>
            
            </tr>
             
              `;
              suma+=parseInt(data[i].valor_pagado);
             
              costoPagar=parseInt(data[0].valor_empenio)-suma;
         
              localStorage.setItem('deuda',costoPagar);
              localStorage.setItem('valorEmpenio',data[0].valor_empenio);
              localStorage.setItem('id_producto',data[0].id);
              localStorage.setItem('id_estanteria',data[0].id_estanteria);
             
              if(costoPagar<=0){
                deuda.textContent='DEUDA CANCELADA'
                deuda.style.background='#2EED03';
                }else{
    
                    deuda.textContent=`Deuda Pendiente: $ ${costoPagar}`;
                    valorEmpeno.innerText=`Valor de Empeño: $ ${data[i].valor_empenio}`;
                  
                 
                   
                  }
            
          }else if(data[0].estado==="Venta"){
            deuda.textContent=` No hay pagos que mostrar`;

            }
            
         
            
            }
         
       
      
          tabla.appendChild(tbody);
         
         
            }else if(data==='0') {
              deuda.textContent=`No tiene  productos activos `;
                    
            }else {
                    localStorage.setItem('deuda',costoPagar);
                    localStorage.setItem('id_producto',data[0].id);
                    localStorage.setItem('id_estanteria',data[0].id_estanteria);
                    deuda.textContent=`Deuda Pendiente: $ ${data[0].valor_empenio}`;
                    valorEmpeno.innerText=`Valor de Empeño: $ ${data[0].valor_empenio}`;
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
  
    
    e.preventDefault();
    
        validar();
      
  });
  
  botonRetirar.addEventListener('click',(e)=>{
    console.log("Retirar");
    e.preventDefault();
    retirarProducto();
  })
  
  
  