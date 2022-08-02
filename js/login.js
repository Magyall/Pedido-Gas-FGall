$(document).ready(function () {
	$("#imgloading").hide();

    $('#btnlogin').click(function () {
        $.ajax({
            type: "POST",
            url: "./controladores/login_controlador.php",
            data: $('#frm_datos').serialize(),
            success: function (r) {
                console.info(r);
                switch (r){
                	case '-1':
                		alertify.error("Usuario o Contraseña incorrectos.");
                	break;
                	case '1':
                		window.location = "./miperfil/panel.php";
                	break;
                	case '2':
                		window.location = "./pedido.php";
                	break;
            		case '3':
                		window.location = "./app/pedidorepartidor.php";
                	break;
                }
            }
        });
    });

    $('#btnenviar').click(function () {
    	$("#imgloading").show();
        $.ajax({
            type: "POST",
            url: "./controladores/login_controlador.php",
            data: $('#frmrecuperar').serialize(),
            success: function (r) {
                console.info(r);
                if(r==1){
                	$("#imgloading").hide();
            		alertify.success("Correo electronico enviado correctamente.");
                }else{
                	$("#imgloading").hide();
                	alertify.error("Error al enviar el correo electronico.");
                }
            }
        });
    });

    $('#btnrecuperar').click(function () {
        var valoresinput = [$('#txtpassnew').val(),
                    $('#txtpassconfirm').val()];

        error = 0;

        if(valoresinput[0] != valoresinput[1]){
            mensajeerror = mensajeerror+"<br> Las contraseñas no coinciden.";
            error = 1;
        }   

        if(error == 1){
            alertify.error(mensajeerror);
            return;
        }

        if(validarpassword(valoresinput[0]) == 1){
            return;
        }

        $.ajax({
            type: "POST",
            url: "./controladores/login_controlador.php",
            data: $('#frm_recovery').serialize(),
            success: function (r) {
                console.info(r);
                if(r==1){
                    alertify.success("Contraseña actualizada correctamente.");
                    window.setTimeout(function(){window.location = "./login.php?ver=1";}, 2000);
                }else{
                    alertify.error("Error al actualizar la contraseña.");
                }
            }
        });
    });

    $('#btnregistrarse').click(function () {
        var valoresinput = [$('#txtcedula').val(),
                    $('#txtnombre').val(),
                    $('#txtapellido').val(),
                    $('#txtemail').val(),
                    $('#txtpassword').val(),
                    $('#txtconfpassword').val()];

        mensajeerror = "Llenar: ";
        error = 0;

        for (i = 0; i < valoresinput.length; i++)
        {
            switch (i) {
                case 0:
                    if(!validarcedula(valoresinput[i])){
                        mensajeerror = mensajeerror+"<br> Cedula incorrecta.";
                        error = 1;
                    }
                break;

                case 1:
                    if(!unvacio(valoresinput[i])){
                        mensajeerror = mensajeerror+"<br> Nombre.";
                        error = 1;
                    }
                break;

                case 2:
                    if(!unvacio(valoresinput[i])){
                        mensajeerror = mensajeerror+"<br> Apellido.";
                        error = 1;
                    }
                break;

                case 3:
                    if(!validaremail(valoresinput[i])){
                        mensajeerror = mensajeerror+"<br> Email incorrecto.";
                        error = 1;
                    }
                break;
            }
        }   

        if(valoresinput[4] != valoresinput[5]){
            alertify.error("Las contraseñas no coinciden.");
            return;
        }

        if(validarpassword(valoresinput[4]) == 1){
            return;
        }

        $.ajax({
            type: "POST",
            url: "./controladores/login_controlador.php",
            data: $('#frmregistrarse').serialize(),
            success: function (r) {
                console.info(r);
                if(r==1){
                    alertify.success("Usuario registrado correctamente.");
                    window.setTimeout(function(){window.location = "./login.php?ver=1";}, 2000);
                }else{
                    alertify.error("Error al registrar el usuario.");
                }
            }
        });
    });
});