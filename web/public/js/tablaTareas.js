
 //Arreglos Globales
    var plan=[];
    var nom=[];
    var control=[];
    


    //Funcion que captura la informacion en los Textfield y Select
    function capturar(){

        //alert('capturar');
        var planSeleccionado = document.getElementsByName("planSeleccionado")[0].value;
        var nomSeleccionado= document.getElementsByName("nomSeleccionado")[0].value;
        var contSeleccionada = document.getElementsByName("contSeleccionado")[0].value;
 
        plan[plan.length]= planSeleccionado.trim();
        nom[nom.length]= nomSeleccionada.trim();
        cont[cont.length]= contSeleccionada.trim();

        actualizarTabla();

    }

    //Actualizando la tabla dinamica con la informacion en Array Globales       
    function actualizarTabla(){
        var num = 1;
            //alert('actualizar');
            for (var i = 0; i < dispo.length ; i++) {
                document.getElementById("fila"+i).style.display="table-row";
                document.getElementById("plan"+i).value = dispo[i];
                document.getElementById("nom"+i).value = nom[i];
                document.getElementById("cont"+i).value = cont[i];
           
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



