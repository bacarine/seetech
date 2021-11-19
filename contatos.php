
<?php

$nome=$_POST['inputName'];

$email=$_POST['inputEmail1'];

$website=$_POST['inputUrl'];

$texto=$_POST['textMessage'];

$headers = array("Content-Type: text/html; charset=UTF-8");

// Variável que junta os valores acima e monta o corpo do email

$Vai    = "Nome: $nome\n\nE-mail: $email\n\nWeb Site: $website\n\nMensagem: $texto";


require_once("classphpmailer.php");

define('GUSER', 'eb.lobato74@gmail.com');  // <-- Insira aqui o seu GMail
define('GPWD', 'pulagato210174');    // <-- Insira aqui a senha do seu GMail

function smtpmailer($para, $de, $de_nome, $assunto, $corpo) { 
  global $error;
  $mail = new PHPMailer();
  $mail->IsSMTP();    // Ativar SMTP
  $mail->SMTPDebug = 0;   // Debugar: 1 = erros e mensagens, 2 = mensagens apenas
  $mail->SMTPAuth = true;   // Autenticação ativada
  $mail->SMTPSecure = 'tls';  // tsl REQUERIDO pelo GMail
  $mail->Host = 'smtp.gmail.com'; // SMTP utilizado
  $mail->Port = 587;      // A porta 587 deverá estar aberta em seu servidor
  $mail->Username = GUSER;
  $mail->Password = GPWD;
  $mail->SetFrom($de, $de_nome);
  $mail->Subject = $assunto;
  $mail->Body = $corpo;
  $mail->CharSet="UTF-8";
  $mail->AddAddress($para);
  if(!$mail->Send()) {
    $error = 'Mail error: '.$mail->ErrorInfo; 
    echo $error;
    return false;
  } else {
    return true;
  }
}

smtpmailer('faleconosco@seetech.com.br', 'eb.lobato74@gmail.com', 'Cliente See Tech', 'Formulario do Web Site', $Vai, $headers);

header("location:http://www.seetech.com.br/index.html");

?> 