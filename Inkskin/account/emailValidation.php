<?php
    echo '<html lang="en">';
    echo '<head>';
    echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
    echo '</head>';
    echo '<body>';
    
    session_start();

    if (isset( $_SESSION['getKeyGen'])) {
        $setKeyGen = $_SESSION['getKeyGen'];
        
        require '../mailer/class.phpmailer.php';
        require '../mailer/class.smtp.php';

        $userEmail = $_SESSION['email_user'];
        
        $mail = new PHPMailer;

        $mail->IsSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.mandrillapp.com';                 // Specify main and backup server
        $mail->Port = 587;                                    // Set the SMTP port
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'marcio_augusto_09@hotmail.com';    // SMTP username
        $mail->Password = 'j6DmQrdkpDOobPdSjdJrYQ';           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

        $mail->From = 'marcio_augusto_09@hotmail.com';
        $mail->FromName = 'Inkskin';
        $mail->AddAddress($userEmail);   // Add a recipient

        $mail->IsHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'INKSKIN - Código de Ativação';
        $mail->Body    = "Sua conta foi criada com sucesso!<br/><br/>".
            "O Código de Ativação de sua conta é <strong>". $setKeyGen ."</strong>.<br/>".
            "Por favor copie e cole este código na página de ativação ".
            "do navegador do site. <a href'=http://localhost/Inkskin/pages/activation.php'>Acesse aqui</a>.<br/><br/>".
            "Obrigado,<br/><br/>Equipe Inkskin.";

        //header('Content-type: text/plain; charset=utf-8');
        //iconv(mb_detect_encoding($mail, mb_detect_order(), true), "UTF-8", $mail);
        
        if(!$mail->Send()) {
           echo "<label style='color:#cc0;'>Mensagem não pôde ser enviada.</label><br>";
           echo "<strong style='color: #c00;;'>Mailer Erro: ' . $mail->ErrorInfo . '</strong>";
           exit;
        }

        //print("<div style='color: green;'>Mensagem enviada!</div><br/>");
        //print("<a href='../pages/login.php'>Retornar ao Login de Acesso</a>");

        session_destroy();
        //exit;
        header('location: ../pages/login.php');
    }
    echo '</body>';
    echo '</html>';
?>