function soloLetras(e){
   key = e.keyCode || e.which;
   tecla = String.fromCharCode(key).toLowerCase();
   letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
   especiales = "8-37-39-46";

   tecla_especial = false
   for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla)==-1 && !tecla_especial){
        return false;
    }
}

function validarletras(dato){
    conf=true;

    var regex = /^[a-zA-Z]+$/;
    if(!regex.test(dato)){
        conf = false;
    }
    
    return conf;
}

function Solo_Numerico(variable){
	Numer=parseInt(variable);
    if (isNaN(Numer)){
        return "";
    }
    return Numer;Numer=parseInt(variable);
    if (isNaN(Numer)){
        return "";
    }
    return Numer;
}
    
function ValNumero(Control){
    Control.value=Solo_Numerico(Control.value);
}

function validarcedula(valor){
    d=valor.split('');
    coe=[2,1,2,1,2,1,2,1,2];
    res=[];
    prov=d[0]+''+d[1];
    
    if(parseInt(prov)>0 && parseInt(prov)<=24){

        if(parseInt(d[2])<6){
            for(i=0;i<9;i++){
                res[i]=d[i]*coe[i];
                if(res[i]>9){
                    res[i]=res[i]-9;
                }
                //console.info(res[i]);
            }

            sum=0;
            for(j=0;j<9;j++){
                sum+=parseInt(res[j]);
            }

            //console.info('Suma '+sum);

            residuo=sum%10;
            //console.info('Residuo '+residuo); 

            if(residuo==0){
                if(d[9]==0){
                    alert('correcto');
                    return true;
                }else{
                    alert('incorrecto');
                    return false;
                }
            }else{
                if((10-residuo)==d[9]){
                    //alert('correcto');
                    return true;
                }else{
                    //alert('incorrecto');
                    return false;
                }
            }   

        }else{
            //console.info('mayor-igual a 6');
            return false;
        }

    }else{
        //console.info('fuera de provincia');
        return false;
    }
}

function unvacio(valor){
    conf=false;

    if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
        //alertify.error('Campos vacíos');
        conf = false;
    }else{
        conf=true;
    }
    return conf;
}

function varvacio(valor){
	conf=false;

	long=valor.length;

	for(i=0;i<long;i++){
		if( valor[i] == null || valor[i].length == 0 || /^\s+$/.test(valor[i]) ) {
 			//alertify.error('Campos vacíos');
            //alert(i);
 			conf = false;
 			break;
		}else{
			conf=true;
		}
	}
	return conf;
}

function validaremail(dato){
	if(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(dato) ) {
	    return true;
	}else {
		return false;
	}	
}

function validarcelular(dato){
	if (/^([0-9])*$/.test(dato)) {
  		var arrn=Array.from(dato);

		ver=arrn[0]+arrn[1];
			
		if(ver==9 && dato.length==10){
			return true;
		}else {
			return false;
		}
	}else {
		return false;
	}	
}

function validartelefono(dato){
	if (/^([0-9])*$/.test(dato)) {
  		var arrn=Array.from(dato);

		ver=arrn[0]+arrn[1];
			
		if((ver>=2 && ver<=7) && dato.length==9){
			return true;
		}else {
			return false;
		}
	}else {
		return false;
	}	
}

function validarpassword(dato){
    mensajeerror = "La contraseña debe contener al menos:";
    error = 0;

    if(dato.length < 8){
        mensajeerror = mensajeerror+"<br>8 digitos.";
        error = 1;
    }

    if(!dato.match(/[A-z]/)){
        mensajeerror = mensajeerror+"<br>1 letra.";
        error = 1;
    }

    if(!dato.match(/[A-Z]/)){
        mensajeerror = mensajeerror+"<br>1 letra mayuscula.";
        error = 1;
    }

    if(!dato.match(/[a-z]/)){
        mensajeerror = mensajeerror+"<br>1 letra minuscula.";
        error = 1;
    }

    if(!dato.match(/\d/)){
        mensajeerror = mensajeerror+"<br>1 numero.";
        error = 1;
    }

    if(!dato.match(/([!,%,&,@,#,$,^,*,?,_,~])/)){
        mensajeerror = mensajeerror+"<br>1 caracter especial.";
        error = 1;
    }

    if(error == 1){
        alertify.error(mensajeerror);
    }

    return error;
}