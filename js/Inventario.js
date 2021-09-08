const tabla=document.querySelector('.tabla');
const   totalIngresos=document.getElementById('Valor-empeno');
const  formularioRegistro=document.querySelector('.formularioRegistro');
const  fechaI=document.getElementById('fechaI');
const  fechaF=document.getElementById('fechaF');
const  errorm1=document.getElementById('ErrorM1');
const  errorm2=document.getElementById('ErrorM2');

// motodo para el evento submit

function crearInventario(){
 
    let datos = new FormData(formularioRegistro);
    datos.append('inventario','');
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
                errorm1.innerHTML=`<div class="alert alert-danger" role="alert">No hay ingresos en la fecha</div>`
                errorm1.style.display='block';
             setTimeout(() => {
                  errorm1.style.display='none';
             },3000);
            
            }else{
                console.log(data)
    
           var suma=0;
          let tbody=document.createElement('tbody');
           
          for(let i=0; i< data.length; i++){
            tbody.innerHTML +=`<tr>
            <td>${data[i].cedula_empleado}</td>
            <td>${data[i].nombre}</td>
            <td>${data[i].cedula_cliente}</td>
            <td>${data[i].nombreC}</td>
            <td>${data[i].apellido}</td>
            <td>${data[i].fecha}</td>
            <td>${data[i].valor_pagado}</td>
            </tr>
             
              `;
            
           suma+=parseInt(data[i].valor_pagado);
          }
          totalIngresos.textContent=`El total de Ingreso: ${suma}`;
          tabla.appendChild(tbody);
          
         
            }
          
        });
  }

  // la validamos los campos del formulario 

  function validar(){
     
    let añoSI=parseInt(fechaI.value.substr(0,4));
    let mesSI=parseInt(fechaI.value.substr(5,7));
    let diaSI=parseInt(fechaI.value.substr(8,10));


    let añoS=parseInt(fechaF.value.substr(0,4));
    let mesS=parseInt(fechaF.value.substr(5,7));
    let diaS=parseInt(fechaF.value.substr(8,10));

      if(fechaI.value =="" || fechaF.value==""){
        errorm1.innerHTML=`<div class="alert alert-danger" role="alert">LLene todo los campos</div>`
        errorm1.style.display='block';
     setTimeout(() => {
          errorm1.style.display='none';
     },3000);  

      }else{

        if((añoS<añoSI || mesS<mesSI) || diaS<diaS ){
            errorm1.innerHTML=`<div class="alert alert-danger" role="alert">Fecha final Inavalida</div>`
            errorm1.style.display='block';
         setTimeout(() => {
              errorm1.style.display='none';
         },3000);  
         console.log(añoSI);
        }else{

        crearInventario();
        }
      }
  }

formularioRegistro.addEventListener('submit',(e)=>{
     e.preventDefault();
      validar();  
}) 


