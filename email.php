<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'email/vendor/autoload.php';
require 'admin/conexao.php';

if(isset($_POST['enviar'])) //PARA A EMPRESA/FUNCIONÁRIO RECEBER MSG DO SITE
{

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output /mensagens debug
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'kaiqueoliveira257@gmail.com';               //SMTP username
        $mail->Password   = 'tbzdfhihyeqxrxwf';                               //SMTP password //senha gerada pós confirmação duas etapas
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('kaiqueoliveira257@gmail.com', 'Site');             //quem vai enviar a msg
        $mail->addAddress('kaiqueoliveira257@gmail.com', 'Kaique');               //Add a recipient/quemvaireceber pode ser de diferentes corres @gmail @hotmail etc
        //$mail->addAddress('ellen@example.com');                         //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');            //backup
        //$mail->addCC('cc@example.com');                                  //copia oculta, reenvia msg para um funcionario a parte(oculto)
        //$mail->addBCC('bcc@example.com');

        //Attachments/anexo
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name /enviar foto

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Mensagem recebida do Site Monise Personalizados';

        $corpo = "Enviado pelo site:<br>
        Nome: ".$_POST['nome']."<br>
        Telefone: ".$_POST['tel']."<br>
        E-mail: ".$_POST['email']."<br>
        Mensagem:<br>".$_POST['mensagem'];

        $mail->Body    = $corpo;
        $mail->AltBody = 'Mensagem recebida pelo site: consultar sistema'; //mensagem direta

        $mail->send();
        echo 'Mensagem enviada com sucesso!';

        require_once("index.php"); //após enviar msg, o cliente volta à página index/home

        //RESPOSTA AUTOMÁTICA PARA O CLIENTE

        $mailResposta = new PHPMailer(true);

        $mailResposta->isSMTP();                                       
        $mailResposta->Host       = 'smtp.gmail.com';                       
        $mailResposta->SMTPAuth   = true;                                   
        $mailResposta->Username   = 'kaiqueoliveira257@gmail.com';            
        $mailResposta->Password   = 'tbzdfhihyeqxrxwf';                              
        $mailResposta->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;   
        $mailResposta->Port       = 465;  

      
        $mailResposta->setFrom('kaiqueoliveira257@gmail.com', 'Monise Personalizados');
        $mailResposta->addAddress($_POST['email'], 'CONTATO DO SITE'); //email do cliente destinatário

      
        $mailResposta->isHTML(true);                                  
        $mailResposta->Subject = 'Resposta do Site Monise Personalizados';

        $corpoResposta = "Em breve entraremos em contato<br>
        Nome: ".$_POST['nome']."<br>
        Mensagem:<br>".$_POST['mensagem'];

        $mailResposta->Body    = $corpoResposta;
        $mailResposta->AltBody = 'Em breve entraremos em contato - Monise Personalizados';

        $mailResposta->send();

        ///fimrespcliente

        //                BANCO DE DADOS
        $nome = $_POST['nome'];
        $fone = $_POST['tel'];
        $email = $_POST['email'];
        $mensagem = $_POST['mensagem'];

        $inserir = "INSERT INTO contato VALUES (DEFAULT,'$nome','$email','$fone','$mensagem')"; //insert simplificado, sem campos

        mysqli_query($con,$inserir);
        
        //Fimbanco



    } catch (Exception $e) {
        echo "Mensagem não pode ser enviada.\n Erro: {$mail->ErrorInfo}";
    }
}