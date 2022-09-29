<?php
//Variáveis

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('./PHPMailer/Exception.php');
require_once('./PHPMailer/PHPMailer.php');
require_once('./PHPMailer/SMTP.php');

$mail = new PHPMailer;
$system = $_POST['system'];
$version = $_POST['version'];

if(isset($_POST['module1']) || isset($_POST['mod-ver1'])){
  $module1 = $_POST['module1'];
  $moduleVersion1 = $_POST['mod-ver1'];
}
if(isset($_POST['module2'])){
  $module2 = $_POST['module2'];
  $moduleVersion2 = $_POST['mod-ver2'];
}
if(isset($_POST['module3'])){
  $module3 = $_POST['module3'];
  $moduleVersion3 = $_POST['mod-ver3'];
}
if(isset($_POST['module4'])){
  $module4 = $_POST['module4'];
  $moduleVersion4 = $_POST['mod-ver4'];
}
if(isset($_POST['module5'])){
  $module5 = $_POST['module5'];
  $moduleVersion5 = $_POST['mod-ver5'];
}

$data_envio = date('d/m/Y');
$hora_envio = date('H:i:s');

try {
  echo "teste: $module1 version: $moduleVersion1 <br>";
  echo "teste: $module2 version: $moduleVersion2 <br>";
  echo "teste: $module3 version: $moduleVersion3 <br>";
  echo "teste: $module4 version: $moduleVersion4 <br>";
  echo "teste: $module5 version: $moduleVersion5 <br>";
  //Server settings
  $mail->isSMTP();                                            //Send using SMTP
  $mail->SMTPDebug = 2;                      //Enable verbose debug output
  $mail->Host       = 'smtp.trt7.jus.br';                     //Set the SMTP server to send through
  $mail->SMTPAuth   = false;                                   //Enable SMTP authentication
  // $mail->Username   = 'user@example.com';                     //SMTP username
  // $mail->Password   = 'secret';                               //SMTP password
  $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
  $mail->Port       = 25;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //Recipients
  $mail->setFrom('wellington220100@gmail.com', 'Wellington');
  $mail->addAddress('fra.wellington.oliveira@gmail.com', 'Jira');     //Add a recipient
  // $mail->addAddress('ellen@example.com');               //Name is optional
  // $mail->addReplyTo('info@example.com', 'Information');
  // $mail->addCC('cc@example.com');
  // $mail->addBCC('bcc@example.com');

  //Attachments
  // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
  // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'Here is the subject';
  $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  if (!$mail->send()) {
    //The reason for failing to send will be in $mail->ErrorInfo
    //but it's unsafe to display errors directly to users - process the error, log it on your server.
    echo "Sorry, something went wrong. Please try again later. Erro: {$mail->ErrorInfo}";
  } else {
    echo 'Obrigado pelo seu Email';
  }
} catch (Exception $e) {
  echo "Email não mandado. Erro: {$mail->ErrorInfo}";
}

// $getdoc->
// // Corpo E-mail
// $arquivo = "
// <style type='text/css'>
// body {
// margin:0px;
// font-family:Verdane;
// font-size:12px;
// color: #666666;
// }
// a{
// color: #666666;
// text-decoration: none;
// }
// a:hover {
// color: #FF0000;
// text-decoration: none;
// }
// </style>
//   <html>
//       <table width='510' border='1' cellpadding='1' cellspacing='1' bgcolor='#CCCCCC'>
//           <tr>
//             <td>
// <tr>
//                <td width='500'>Sistema:$system</td>
//               </tr>
//               <tr>
//                 <td width='320'>Versão:<b>$version</b></td>
//    </tr>
//     <tr>
//                 <td width='320'>Modulo:<b>$module</b></td>
//               </tr>
//           </td>
//         </tr>
//         <tr>
//           <td>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></td>
//         </tr>
//       </table>
//   </html>
// ";

// //enviar

// //emails para quem será enviado o formulário
// //$destino = "fra.wellington.oliveira@gmail.com";
// $destino = "erick.barreto@trt7.jus.br";
// $assunto = "Teste formulario criação card jira";

// // É necessário indicar que o formato do e-mail é html
// $headers  = 'MIME-Version: 1.0' . "\r\n";
// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// $headers .= 'From: $nome <$email>';
// //$headers .= "Bcc: $EmailPadrao\r\n";

// $enviaremail = mail($destino, $assunto, $arquivo, $headers);
// if($enviaremail){
// $mgm = "E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o e-mail fornecido no formulário";
//   echo "<meta http-equiv='refresh' content='10;URL=contato.php'>";
// } else {
// $mgm = "ERRO AO ENVIAR E-MAIL!";
// echo "";
// }
clearstatcache();

?>