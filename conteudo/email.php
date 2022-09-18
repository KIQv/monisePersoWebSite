<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'email/vendor/autoload.php';

if(isset($_POST['enviar']))
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'kaiqueoliveira257@gmail.com';          //SMTP username
        $mail->Password   = 'tbzdfhihyeqxrxwf';                     //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //RECEBIMENTO
        $mail->setFrom('kaiqueoliveira257@gmail.com', 'Site');
        $mail->addAddress('kaiqueoliveira257@gmail.com', 'Kaique');     //Add a recipient
        //$mail->addAddress('ellen@example.com');                         //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Mensagem recebida do Site Monise Personalizados';

        $corpo = "Enviado pelo site:<br>
        Nome: ".$_POST['nome']."<br>
        Tel: ".$_POST['tel']."<br>
        Email: ".$_POST['email']."<br>
        Mensagem:<br>".$_POST['mensagem'];

        $mail->Body    = $corpo;
        $mail->AltBody = 'Mensagem recebida pelo site: consultar sistema';

        $mail->send();
        echo 'Mensagem enviada com sucesso!';

        require_once("index.php");

    } catch (Exception $e) {
        echo "Mensagem não pode ser enviada.\n Erro: {$mail->ErrorInfo}";
    }
}