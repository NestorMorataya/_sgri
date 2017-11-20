
 //Arreglos Globales
    var dispo=[];
    var conf=[];
    var inte=[];
    var valor=[];
    var ame=[];
    var vu=[];
    var vuN=[];
    var ameN=[];
    var prob=[];
    var degra=[];
    var impa=[];
    var impacNom=[];
    var ries=[];
    var riesNombre=[];


    //Funcion que captura la informacion en los Textfield y Select
    function capturar(){
    //alert('capturar');
        var dispSeleccionada = document.getElementsByName("dispSeleccionada")[0].value;
        var confSeleccionada= document.getElementsByName("confSeleccionada")[0].value;
        var intSeleccionada = document.getElementsByName("intSeleccionada")[0].value;
        var valorCalc = document.getElementsByName("valorCalc")[0].value;
        var amenazaSeleccionada = document.getElementsByName("amenazaSeleccionada")[0].value;
        var probabilidadSeleccionada = document.getElementsByName("probabilidadSeleccionada")[0].value;

        var vulneSeleccionada = document.getElementsByName("vulnerabilidadSeleccionada")[0].value;
        var degradacionSeleccionada = document.getElementsByName("degradacionSeleccionada")[0].value;
        var impactoCalc = document.getElementsByName("impactoCalc")[0].value;
        var impacN = document.getElementsByName("impacNom")[0].value;
        var riesgoCalc = document.getElementsByName("riesgoCalc")[0].value;
        var riesNom = document.getElementsByName("riesNom")[0].value;
       
        //arreglo[arreglo.length]= _arreglo.trim();  ?
 
        dispo[dispo.length]= dispSeleccionada.trim();
        conf[conf.length]= confSeleccionada.trim();
        inte[inte.length]= intSeleccionada.trim();
        valor[valor.length]= valorCalc.trim();
        ame[ame.length]= amenazaSeleccionada.substring(1,2).trim();
         ameN[ameN.length]= amenazaSeleccionada.substring(2,15).trim();
vu[vu.length]= vulneSeleccionada.substring(1,2).trim();
vuN[vuN.length]= vulneSeleccionada.substring(2,15).trim();
        prob[prob.length]= probabilidadSeleccionada.trim();
        degra[degra.length]= degradacionSeleccionada.trim();
        impa[impa.length]= impactoCalc.trim();
        impacNom[impacNom.length]= impacN.trim();
        ries[ries.length]= riesgoCalc.trim();
        riesNombre[riesNombre.length]= riesNom.trim();

        actualizarTabla();
        //document.getElementById("select").value="0";
    }

    //Actualizando la tabla dinamica con la informacion en Array Globales       
    function actualizarTabla(){
        var num = 1;

            //alert('actualizar');
            for (var i = 0; i < dispo.length ; i++) {
                document.getElementById("fila"+i).style.display="table-row";
                document.getElementById("disp"+i).value = dispo[i];
                document.getElementById("conf"+i).value = conf[i];
                document.getElementById("int"+i).value = inte[i];
                document.getElementById("valor"+i).value = valor[i];
                document.getElementById("ame"+i).value = ame[i];
                document.getElementById("ameN"+i).value = ameN[i];

                document.getElementById("vuln"+i).value = vu[i];
                document.getElementById("vulN"+i).value = vuN[i];

                document.getElementById("prob"+i).value = prob[i];
                document.getElementById("degra"+i).value = degra[i];
                document.getElementById("impac"+i).value = impa[i];
                document.getElementById("impacNom"+i).value = impacNom[i];
                document.getElementById("ries"+i).value = ries[i];
                document.getElementById("riesNomb"+i).value = riesNombre[i];
         

                num++;
            }
            document.getElementById("contador").value = num-1;
           
    }


    function prueba(){

        var value = document.getElementsByName("select")[0].value;
        var ubicacion=document.getElementById("select2");

        ubicacion.options[0].selected=true;
        if(value=='default'){

             for (var i = 1; i < ubicacion.options.length; i++) {
                ubicacion.options[i].style.display="block";
            }   
        }
        else
        {
            for (var i = 1; i < ubicacion.options.length; i++) {
                var valorCorto=ubicacion.options[i].value.substring(0,1);
                if(valorCorto==value)
                {
                    ubicacion.options[i].style.dispay="block";

                }else{

                    ubicacion.options[i].style.display="none";
                }

            }
        }
    }



