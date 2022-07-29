
let btn = document.getElementById('form');

btn.addEventListener("submit",imprime);  // EVENTO SUBMIT


// FUNCION imprime
function imprime(){


    let radio = document.getElementsByClassName('dato');    
      let array_radio = new Array(); //DECLARAR ARRAYS DE HOBBIES

for (var i=0; i<radio.length; i++) {    

if (radio[i].checked) {         
     array_radio[i] = radio[i].value; // GUARDAR EN EL ARRAY LOS QUE SEAN SELECCIONADOS
 }
}
    //GUARDA LOS DATOS EN EL ARRAY
    let array =[document.getElementById('nombre').value,
            document.getElementById('apellidos').value,
            document.getElementById('tipodocumento').value,
            document.getElementById('documento').value,
            document.getElementById('direccion').value,
            document.getElementById('fecha').value,
            document.getElementById('correo').value,
            document.getElementById('celular').value,
            
        ];

        //IMPRIME LOS DATOS
    alert("Nombre : " +array[0] +
          "\napellido : " + array[1]+
          "\nTipo Documento : " + array[2] +
          "\nNumero de documento : " + array[3]+
          "\nDireccion de residencia : " + array[4]+ 
          "\nFecha de Nacimiento : " + array[5]+
          "\nEdad : " + edad()+ 
          "\nCorreo Electronico : " + array[6]+
          "\nCelular : " + array[7] +
          "\nHobies : " + array_radio);

}

//Calcula la edad
function edad() {
    let fecha=document.getElementById("fecha").value;
    var hoy = new Date();
    var cumpleanos = new Date(fecha);
    var edad = hoy.getFullYear() - cumpleanos.getFullYear();
    var m = hoy.getMonth() - cumpleanos.getMonth();

    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
        edad--;
    }

return edad;
   
}

