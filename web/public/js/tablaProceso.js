
 //Arreglos Globales
   
  
    var ries=[];
     var riesCalc=[];
    var contr=[]; 
    var contrName=[]; 
    

    //Funcion que captura la informacion en los Textfield y Select
    function capturar(){
      
      
        var rie= document.getElementsByName("riesS")[0].value;
        var control = document.getElementsByName("controlSeleccionado")[0].value;
        var rieC= document.getElementsByName("rie")[0].value;
       
     
        ries[ries.length]= rie.trim();
        riesCalc[riesCalc.length]= rieC.trim();
        contr[contr.length]= control.substring(0,1).trim();
        contrName[contrName.length]= control.substring(1,30).trim();
        actualizarTabla(); 
    }

    //Actualizando la tabla dinamica con la informacion en Array Globales       
    function actualizarTabla(){
           
        var num = 1;
           
            for (var i = 0; i < riesCalc.length ; i++) {
                document.getElementById("fila"+i).style.display="table-row";
                document.getElementById("num"+i).value = num;
                document.getElementById("ries"+i).value = ries[i];
                document.getElementById("riesN"+i).value = riesCalc[i];
                document.getElementById("contr"+i).value = contr[i];
                document.getElementById("contrN"+i).value = contrName[i];
                num++;
            }
            document.getElementById("contador").value = num-1;
    }





