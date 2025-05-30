<?php

namespace Classes;
use PHPMailer\PHPMailer\PHPMailer;

class Email{
    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token ){
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    
    //Enviar email con token 
    public function enviarConfirmacion(){
        //Crear objeto de email 
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '82f304233f1150';
        $mail->Password = '51350647113a0a';

        $mail->setFrom('cuentas@SSPP.com');
        $mail->addAddress('cuentas@SSPP.com', 'SSPP.com');
        $mail->Subject = 'Confirma tu cuenta';

        //Usaremos html
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->email . "</strong> Has creado tu cuenta, solo debes confirmarla presionando el siguiente enlace</p>";
        $contenido .= "<p>Presiona aqui: <a href = 'http://localhost:3000/confirmar-cuenta?token=". $this->token ."'>Confirmas Cuenta</a> </p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
        $contenido .= "</html>";
        
        $mail->Body = $contenido;
        
        //Enviar el email
        $mail->send();
        

    }

    public function enviarInstrucciones()
    {
        //Crear objeto de email 
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '82f304233f1150';
        $mail->Password = '51350647113a0a';

        $mail->setFrom('cuentas@SSPP.com');
        $mail->addAddress('cuentas@SSPP.com', 'SSPP.com');
        $mail->Subject = 'Restablece tu password';

        //Usaremos html
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has solicitado restablecer tu passsword, sigue el siguiente enlace para hacerlo. </p>";
        $contenido .= "<p>Presiona aqui: <a href = 'http://localhost:3000/recuperar?token=". $this->token ."'>Restablecer Password</a> </p>";
        $contenido .= "<p>Si tu no solicitaste este cambio, puedes ignorar el mensaje</p>";
        $contenido .= "</html>";
        
        $mail->Body = $contenido;
        
        //Enviar el email
        $mail->send();
    }
}