
 //Arreglos Globales
    var idpla=[];
    var pla=[];
    var ries=[];
    var contr=[]; 
    

    //Funcion que captura la informacion en los Textfield y Select
    function capturar(){
        var idS = document.getElementsByName("idS")[0].value;
        var planS = document.getElementsByName("planS")[0].value;
        var riesS= document.getElementsByName("riesS")[0].value;
        var controlSeleccionado = document.getElementsByName("controlSeleccionado")[0].value;
        
        idpla[idpla.length]= idS.trim();
        pla[pla.length]= planS.trim();
        ries[ries.length]= riesS.trim();
        contr[contr.length]= controlSeleccionado.substring(1,2).trim();
        actualizarTabla(); 
    }

    //Actualizando la tabla dinamica con la informacion en Array Globales       
    function actualizarTabla(){
        var num = 1;
            //alert('actualizar');
            for (var i = 0; i < id.length ; i++) {
                document.getElementById("fila"+i).style.display="table-row";
                 document.getElementById("id"+i).value = idpla[i];
                document.getElementById("plan"+i).value = pla[i];
                document.getElementById("ries"+i).value = ries[i];
                document.getElementById("control"+i).value = contr[i];
                num++;
            }
            document.getElementById("contador").value = num-1;
    }





