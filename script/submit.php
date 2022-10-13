<?php
//Variáveis

require_once('./PHPMailer/Exception.php');
require_once('./PHPMailer/PHPMailer.php');
require_once('./PHPMailer/SMTP.php');

//session_destroy();
session_start();
if(isset($_SESSION['quantidade'])){
  unset($_SESSION["mensagem"]);
  unset($_SESSION['quantidade']);
  unset($_SESSION['quantidadeMod']);
}else if(isset($_SESSION['mensagem'])){
  unset($_SESSION["mensagem"]);
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
$system = $_POST['system'];
$version = $_POST['version'];
$data_envio = date('d/m/Y');
$hora_envio = date('H:i:s');

$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Host       = 'smtp.trt7.jus.br';
$mail->SMTPAuth   = false;
$mail->Port       = 25;

$mail->setFrom('mariojr@trt7.jus.br', 'Mario');
$mail->addAddress('ddti@trt7.jus.br', 'Jira');

$mail->isHTML(false);

$qtdModulos = 0;
$qtd = 0;

if ($system == "PJe-JT") {
  if (isset($_POST['module1']) && isset($_POST['PJE'])) {
    echo " ".$_POST['PJE-body']." -- ".$_POST['PJE'];
    $qtdModulos = $qtdModulos + 1;
    try {
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system - Versão 2.8. $version"); // melhorar para o exemplo abaixo e mandar um email para cada modulo
      $mail->Body    = utf8_decode($_POST['PJE-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
      if ($mail->send()) {
      }
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
  if (isset($_POST['module2']) && isset($_POST['AUD'])) {
    $qtdModulos = $qtdModulos + 1;
    try {
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system - Módulo " . $_POST['module2'] . " Versão " . $_POST['AUD']); // melhorar para o exemplo abaixo e mandar um email para cada modulo
      $mail->Body    = utf8_decode($_POST['AUD-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
      if ($mail->send()) {
      }
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
  if (isset($_POST['module3']) && isset($_POST['JTE'])) {
    $qtdModulos = $qtdModulos + 1;
    try {
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system - Módulo " . $_POST['module3'] . " Versão " . $_POST['JTE']); // melhorar para o exemplo abaixo e mandar um email para cada modulo
      $mail->Body    = utf8_decode($_POST['JTE-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
      if ($mail->send()) {
      }
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
  if (isset($_POST['module4']) && isset($_POST['PjeCalc'])) {
    $qtdModulos = $qtdModulos + 1;
    try {
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system - Módulo " . $_POST['module4'] . " Versão " . $_POST['PjeCalc']); // melhorar para o exemplo abaixo e mandar um email para cada modulo
      $mail->Body    = utf8_decode($_POST['PjeCalc-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
      if ($mail->send()) {
      }
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
  if (isset($_POST['module5']) && isset($_POST['SIF'])) {
    $qtdModulos = $qtdModulos + 1;
    try {
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system  - Módulo " . $_POST['module4'] . " Versão " . $_POST['SIF']); // melhorar para o exemplo abaixo e mandar um email para cada modulo
      $mail->Body    = utf8_decode($_POST['SIF-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
      if ($mail->send()) {
      }
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
} else if ($system == "SIGEP-JT") {
  if (isset($_POST['module1']) && isset($_POST['SIGEP-Modulo'])) {
    $qtdModulos = $qtdModulos + 1;
    try {
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system 1.30. $version - Módulo " . $_POST['module1'] . " Versão " . $_POST['SIGEP-Modulo']); // melhorar para o exemplo abaixo e mandar um email para cada modulo
      $mail->Body    = utf8_decode($_POST['SIGEP-Modulo-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
      if ($mail->send()) {
      }
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
  if (isset($_POST['module2']) && isset($_POST['SIGEP-Online'])) {
    $qtdModulos = $qtdModulos + 1;
    try {
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system 1.30. $version - Módulo " . $_POST['module2'] . " Versão " . $_POST['SIGEP-Online']); // melhorar para o exemplo abaixo e mandar um email para cada modulo
      $mail->Body    = utf8_decode($_POST['SIGEP-Online-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
      if ($mail->send()) {
      }
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
  if (isset($_POST['module3']) && isset($_POST['FolhaWeb'])) {
    $qtdModulos = $qtdModulos + 1;
    try {
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system 1.30. $version - Módulo " . $_POST['module3'] . " Versão " . $_POST['FolhaWeb']); // melhorar para o exemplo abaixo e mandar um email para cada modulo
      $mail->Body    = utf8_decode($_POST['FolhaWeb-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
      if ($mail->send()) {
      }
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
  if (isset($_POST['module4']) && isset($_POST['SIGS'])) {
    $qtdModulos = $qtdModulos + 1;
    try {
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system 1.30. $version - Módulo " . $_POST['module4'] . " Versão " . $_POST['SIGS']); // melhorar para o exemplo abaixo e mandar um email para cada modulo
      $mail->Body    = utf8_decode($_POST['SIGS-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
      if ($mail->send()) {
      }
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
  if (isset($_POST['module5']) && isset($_POST['GEST'])) {
    $qtdModulos = $qtdModulos + 1;
    try {
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system 1.30. $version - Módulo " . $_POST['module5'] . " Versão " . $_POST['GEST']); // melhorar para o exemplo abaixo e mandar um email para cada modulo
      $mail->Body    = utf8_decode($_POST['GEST-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
      if ($mail->send()) {
      }
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
}

if ($qtd == 0) {
  $_SESSION['mensagem'] = "success";
  unset($_POST);
  header('Location: ..');
} else {
  $_SESSION['mensagem'] = "danger";
  $_SESSION['quantidade'] = $qtd;
  $_SESSION['quantidadeMod'] = $qtdModulos;
  unset($_POST);
  header('Location: ..');
}

// try {
//     //echo utf8_decoMódulo de("[ATUALIZACAO] $system Versão - 1.30.$version");
//     //Módulo echo "Sistema: $system \n VeMódulo rsão: 2.8.$version \n Modulos/Versão \n $txtModule";
//     //Server settings
//     $mail->isSMTP();                                            //Send using SMTP
//     $mail->SMTPDebug = 0;                      //Enable verbose debug output
//     $mail->Host       = 'smtp.trt7.jus.br';                     //Set the SMTP server to send through
//     $mail->SMTPAuth   = false;                                   //Enable SMTP authentication
//     // $mail->Username   = 'user@example.com';                     //SMTP username
//     // $mail->Password   = 'secret';                               //SMTP password
//     //$mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
//     $mail->Port       = 25;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
//     //Recipients
//     $mail->setFrom('mariojr@trt7.jus.br', 'Mario'); // trocar email para o de alghuem do trt7
//     $mail->addAddress('ddti@trt7.jus.br', 'Jira');     //Add a recipient
  
//     // $mail->addAddress('ellen@example.com');               //Name is optional
//     // $mail->addReplyTo('info@example.com', 'Information');
//     // $mail->addCC('cc@example.com');
//     // $mail->addBCC('bcc@example.com');
  
//     //Attachments
//     // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

//   //Content
//   $mail->isHTML(false);                                  //Set email format to HTML
//   $mail->Subject = "[ATUALIZACAO] Atualizar $system 2.8.$version - "; // melhorar para o exemplo abaixo e mandar um email para cada modulo
//   $mail->Body    = "Sistema: $system \n Versao: 2.8.$version \n Modulos/Versao \n $txtModule"; // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
//   //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

//   if ($mail->send()) {
//     $_SESSION['mensagem'] = "success";
//     header('Location: http://localhost:8085/formulario-Jira/');
//   }
// } catch (Exception $e) {
//   $_SESSION['mensagem'] = "danger";
//   header('Location: http://localhost:8085/formulario-Jira/');
// }