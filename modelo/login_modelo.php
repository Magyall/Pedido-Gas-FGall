<?php

class Login {

    private $db;

    function __construct() {
        $this->db = Conectar::conexion();
    }

    function inicio_sesion($datos){

        $sql="SELECT usr_RolId,
                        usr_UsuarioId 

                FROM usuario 
                WHERE usr_Email=?  
                    AND usr_Password=? 
                    AND usr_Estado='a'";
                    
        $stmt=$this->db->prepare($sql);
        $stmt->bind_param("ss",$datos[0], $datos[1]);
        $ok=$stmt->execute();
        $stmt->bind_result($idrol, $idusu);
        $contador=0;
        while($stmt->fetch()){
            $rol=$idrol;
            $user=$idusu;
            $contador+=1;
        }

        if($contador==1){
            $_SESSION['Rol']=$rol;
            $_SESSION['User']=$user;
            //$conf = 1;
            switch ($datos[2]) {
                case 1:
                    $conf = 1;
                break;
                case 2:
                    $conf = 2;
                break;
                case 3:
                    $conf = 3;
                break;
            }
        }else{
            $conf = -1;
        }

        return $conf;
        $stmt->close();
        $this->db->close();
    }

    function Listarusuario($mail){
        $sql="SELECT usr_UsuarioId,
                        usr_RolId,
                        usr_Identificacion,
                        usr_PrimerNombre,
                        usr_SegundoNombre,
                        usr_PrimerApellido,
                        usr_SegundoApellido,
                        usr_Email,
                        usr_Password,
                        usr_Direccion,
                        usr_Celular,
                        usr_FechaNacimiento,
                        usr_FechaRegistro,
                        usr_Foto,
                        usr_Estado,
                        usr_ActualizarPassword 

                FROM usuario 
                WHERE usr_Email = ?";

        $stmt=$this->db->prepare($sql);
        $stmt->bind_param("s",$mail);
        $ok=$stmt->execute();
        $stmt->bind_result($id, $idrol, $dni, $pnom, $snom, $pape, $sape, $ema, $pas, $dir, $cel, $nac, $reg, $fot, $est, $acor);
        $arr=array();
        while($stmt->fetch()){
            $arr[]=array('Id'=>$id,
                        'Idrol'=>$idrol,
                        'Dni'=>$dni,
                        'Pnom'=>$pnom,
                        'Snom'=>$snom,
                        'Pape'=>$pape,
                        'Sape'=>$sape,
                        'Ema'=>$ema,
                        'Pas'=>$pas,
                        'Dir'=>$dir,
                        'Cel'=>$cel,
                        'Nac'=>$nac,
                        'Reg'=>$reg,
                        'Fot'=>$fot,
                        'Est'=>$est,
                        'Acor'=>$acor);
        }
        return $arr;
        $stmt->close();
        $this->db->close();
    }

    function Actualizarestado($id){
            $sql='UPDATE usuario 
                    SET usr_ActualizarPassword = 1

                    WHERE usr_UsuarioId = ?';

            $stmt=$this->db->prepare($sql);
            $stmt->bind_param("i",$id);
            $ok=$stmt->execute();
            if($ok==1){
                $conf=1;
            }else{
                $conf=0;
            }
            return $conf;   
            $stmt->close();
            $this->db->close();
        }

    function mensaje_mail($usu, $dni, $ema, $id) {
        require '../config/mail.php';

        $html = '
            <table style="width: 100%; ">
                <tr style="background-color: white; border-radius: 20px;">
                    <td style="text-align: center;"><img style="padding: 40px 20px; width: 100px" src="' . $mailurl . 'complementos/images/logo.png"> </td>
                </tr>
                <tr style="background-color: #0763a9">
                    <td style="text-align: center; color: white; font-weight: 600; padding: 15px 15px;">RECUPERA TU CONTRASEÑA </td>
                </tr> 
            </table>
            <table style="width: 100%; padding-left: 10%;">
                <tr>
                    <td>
                        <br><br><label> Hola, ' . $usu . ' </label><br><br>
                        <label style="font-weight: 600;"> 
                            Haz clic en el enlace de abajo para recuperar las credenciales de inicio de sesión en. 
                        </label>
                        <a href="' . $mailurl . 'recuperarpass.php?id=' . $id . ' ">RECUPERAR CUENTA</a>
                    </td>
                </tr>
            </table>
            <table style="width: 100%; padding-left: 10%;">
                <tr>
                    <td>
                        <label style="font-weight: 600;"> 
                            Si no estás tratando de recuperar tus credenciales de inicio de sesión, por favor, ignora este correo electrónico. Es posible que otro usuario haya introducido incorrectamente su información de inicio de sesión.
                        </label>
                    </td>
                </tr>
            </table>
            <table style="width: 100%; padding-left: 100px; margin-top: 100px;">
                <tr>
                    <td style="width: 60%;">
                        <small> * Mensaje generado automáticamente, por favor no responder. </small>
                    </td>
                    <td style="width: 40%; text-align: right;">
                    </td>
                </tr>
            </table>';
        
        return $html;
    }
    /*
    function enviar_mail($mensaje, $email) {
        require '../complementos/plugins/phpmailer/PHPMailerAutoload.php';
        require '../config/mail.php';
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAutoTLS = true;
        $mail->Host = $mailhos;
        $mail->Port = $mailpor;

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        $mail->SMTPAuth = true;
        $mail->Username = $mailusu;
        $mail->Password = $mailpas;
        $mail->addAddress($email, 'Recuperar clave');
        $mail->Subject = 'Recuperar clave';
        $uniqueid = uniqid('np');
        $mail->CharSet = 'UTF-8';
        $mail->msgHTML($mensaje);
        $mail->AltBody = 'This is a plain-text message body';
        
        if ($mail->send()) {
            return 1;
        } else {
            return 2;
        }
    }
    */

    function enviar_mail($mensaje, $email) {
        $para  = $email;
        $título = "RECUPERAR PASS";
                
        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        
        $cabeceras .= 'To: No reply <noreply@ecugas.com>' . "\r\n";
        $cabeceras .= 'From: Recuperar password' . "\r\n";
        
        $send = mail($para, $título, $mensaje, $cabeceras);
        if ($send) {
            return 1;
        } else {
            return 0;
        }
    }



    function recuperar_pass($id){
        $sql="SELECT usr_Email,
                        usr_ActualizarPassword 

                FROM usuario 
                WHERE usr_UsuarioId = ?";

        $stmt=$this->db->prepare($sql);
        $stmt->bind_param("i",$id);
        $ok=$stmt->execute();
        $stmt->bind_result($mail, $acor);
        $arr=array();
        while($stmt->fetch()){
            $arr[]=array('Mail'=>$mail,
                        'Acor'=>$acor);
        }
        return $arr;
        $stmt->close();
        $this->db->close();
    }

    function Actualizarcontrasenia($datos){
        $sql='UPDATE usuario 
                SET usr_Password = ?,
                    usr_ActualizarPassword = 0

                WHERE usr_UsuarioId = ?';

        $stmt=$this->db->prepare($sql);
        $stmt->bind_param("si",$datos[1], $datos[0]);
        $ok=$stmt->execute();
        if($ok==1){
            $conf=1;
        }else{
            $conf=0;
        }
        return $conf;   
        $stmt->close();
        $this->db->close();
    }

    function Registrarse($datos){
            $sql="INSERT INTO usuario(usr_Identificacion, usr_PrimerNombre, usr_PrimerApellido, usr_Email, usr_Direccion, usr_Celular, usr_Password, usr_FechaRegistro, usr_Foto, usr_Estado, usr_ActualizarPassword, usr_RolId) 
                    VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";

            $stmt=$this->db->prepare($sql);
            $stmt->bind_param("ssssssssssii",$datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5],$datos[6],$datos[7],$datos[8],$datos[9],$datos[10],$datos[11]);
            $ok=$stmt->execute();
            if($ok==1){
                $conf=1;
            }else{
                $conf=0;
            }
            return $conf;
        }
}
?>
