
 //Arreglos Globales
    var nom=[]; 
    var proc=[];
   
    
    //Funcion que captura la informacion en los Textfield y Select
    function capturar(){

        var nomb= document.getElementsByName("nombreSeleccionado").innerHTML = "Hello World";
        var proces= document.getElementsByName("procesoSeleccionado")[0].value;
       

        nom[nom.length]= nomb.trim();
        proc[proc.length]= proces.trim();
        actualizarTabla();
    }


    //Actualizando la tabla dinamica con la informacion en Array Globales       
    function actualizarTabla(){
        var num = 1;
        
            for (var i = 0; i < nom.length ; i++) {
                document.getElementById("fila"+i).style.display="table-row";
                document.getElementById("num"+i).value = num;
                document.getElementById("nombre"+i).value = nom[i];
                 document.getElementById("proceso"+i).value = proc[i];
                num++;
            }
            document.getElementById("contador").value = num-1;
    }

    

 



