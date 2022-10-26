<?php
//Variáveis

require_once('./PHPMailer/Exception.php');
require_once('./PHPMailer/PHPMailer.php');
require_once('./PHPMailer/SMTP.php');

//clearstatcache();
//session_destroy();
session_start();
if (isset($_SESSION['quantidade'])) {
  unset($_SESSION["mensagem"]);
  unset($_SESSION['quantidade']);
  unset($_SESSION['quantidadeMod']);
} else if (isset($_SESSION['mensagem'])) {
  unset($_SESSION["mensagem"]);
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
$system = $_POST['system'];
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
$bool = false;

echo $_POST['observadores'];

if ($system == "PJe-JT") {
  if (isset($_POST['version-pje']) && $_POST['version-pje'] != '' && $_POST['version-pje'] != null) {
    $version = $_POST['version-pje'];
    $qtdModulos = $qtdModulos + 1;
    try {
      $bool = true;
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system - Versão 2.8." . $version); // melhorar para o exemplo abaixo e mandar um email para cada modulo
      $mail->Body    = utf8_decode($_POST['descricao']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
      if ($mail->send()) {
      }
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
  if (isset($_POST['module2']) && isset($_POST['AUD'])) {
    $qtdModulos = $qtdModulos + 1;
    try {
      $bool = true;
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system - Módulo " . $_POST['module2'] . " Versão " . $_POST['AUD']); // melhorar para o exemplo abaixo e mandar um email para cada modulo
      $mail->Body    = utf8_decode($_POST['AUD-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2

      for ($ct = 0, $ctMax = count($_FILES['AUDFile']['tmp_name']); $ct < $ctMax; $ct++) {
        $ext = PHPMailer::mb_pathinfo($_FILES['AUDFile']['name'][$ct], PATHINFO_EXTENSION);
        $uploadfile = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['AUDFile']['name'][$ct])) . '.' . $ext;
        $filename = $_FILES['AUDFile']['name'][$ct];
        if (move_uploaded_file($_FILES['AUDFile']['tmp_name'][$ct], $uploadfile)) {
          if (!$mail->addAttachment($uploadfile, $filename)) {
          }
        }
      }
      if ($mail->send()) {
      }
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
  if (isset($_POST['module3']) && isset($_POST['JTE'])) {
    $qtdModulos = $qtdModulos + 1;
    try {
      $bool = true;
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system - Módulo " . $_POST['module3'] . " Versão " . $_POST['JTE']); // melhorar para o exemplo abaixo e mandar um email para cada modulo
      $mail->Body    = utf8_decode($_POST['JTE-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
      for ($ct = 0, $ctMax = count($_FILES['JTEFile']['tmp_name']); $ct < $ctMax; $ct++) {
        $ext = PHPMailer::mb_pathinfo($_FILES['JTEFile']['name'][$ct], PATHINFO_EXTENSION);
        $uploadfile = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['JTEFile']['name'][$ct])) . '.' . $ext;
        $filename = $_FILES['JTEFile']['name'][$ct];
        if (move_uploaded_file($_FILES['JTEFile']['tmp_name'][$ct], $uploadfile)) {
          if (!$mail->addAttachment($uploadfile, $filename)) {
          }
        }
      }
      if ($mail->send()) {
      }
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
  if (isset($_POST['module4']) && isset($_POST['PjeCalc'])) {
    $qtdModulos = $qtdModulos + 1;
    try {
      $bool = true;
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system - Módulo " . $_POST['module4'] . " Versão " . $_POST['PjeCalc']); // melhorar para o exemplo abaixo e mandar um email para cada modulo
      $mail->Body    = utf8_decode($_POST['PjeCalc-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
      for ($ct = 0, $ctMax = count($_FILES['PjeCalcFile']['tmp_name']); $ct < $ctMax; $ct++) {
        $ext = PHPMailer::mb_pathinfo($_FILES['PjeCalcFile']['name'][$ct], PATHINFO_EXTENSION);
        $uploadfile = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['PjeCalcFile']['name'][$ct])) . '.' . $ext;
        $filename = $_FILES['PjeCalcFile']['name'][$ct];
        if (move_uploaded_file($_FILES['PjeCalcFile']['tmp_name'][$ct], $uploadfile)) {
          if (!$mail->addAttachment($uploadfile, $filename)) {
          }
        }
      }
      if ($mail->send()) {
      }
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
  if (isset($_POST['module5']) && isset($_POST['SIF'])) {
    $qtdModulos = $qtdModulos + 1;
    try {
      $bool = true;
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system  - Módulo " . $_POST['module4'] . " Versão " . $_POST['SIF']); // melhorar para o exemplo abaixo e mandar um email para cada modulo
      $mail->Body    = utf8_decode($_POST['SIF-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
      for ($ct = 0, $ctMax = count($_FILES['SIFFile']['tmp_name']); $ct < $ctMax; $ct++) {
        $ext = PHPMailer::mb_pathinfo($_FILES['SIFFile']['name'][$ct], PATHINFO_EXTENSION);
        $uploadfile = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['SIFFile']['name'][$ct])) . '.' . $ext;
        $filename = $_FILES['SIFFile']['name'][$ct];
        if (move_uploaded_file($_FILES['SIFFile']['tmp_name'][$ct], $uploadfile)) {
          if (!$mail->addAttachment($uploadfile, $filename)) {
          }
        }
      }
      if ($mail->send()) {
      }
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
} else if ($system == "SIGEP-JT") {
  $version = $_POST['version-sigep'];
  if (isset($_POST['module1']) && isset($_POST['SIGEP-Modulo'])) {
    $qtdModulos = $qtdModulos + 1;
    try {
      $bool = true;
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system 1.30." . $version . " - Módulo " . $_POST['module1'] . " Versão " . $_POST['SIGEP-Modulo']); // melhorar para o exemplo abaixo e mandar um email para cada modulo
      $mail->Body    = utf8_decode($_POST['SIGEP-Modulo-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
      for ($ct = 0, $ctMax = count($_FILES['SIGEP-ModuloFile']['tmp_name']); $ct < $ctMax; $ct++) {
        $ext = PHPMailer::mb_pathinfo($_FILES['SIGEP-ModuloFile']['name'][$ct], PATHINFO_EXTENSION);
        $uploadfile = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['SIGEP-ModuloFile']['name'][$ct])) . '.' . $ext;
        $filename = $_FILES['SIGEP-ModuloFile']['name'][$ct];
        if (move_uploaded_file($_FILES['SIGEP-ModuloFile']['tmp_name'][$ct], $uploadfile)) {
          if (!$mail->addAttachment($uploadfile, $filename)) {
          }
        }
      }
      if ($mail->send()) {
      }
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
  if (isset($_POST['module2']) && isset($_POST['SIGEP-Online'])) {
    $qtdModulos = $qtdModulos + 1;
    try {
      $bool = true;
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system 1.30." . $version . " - Módulo " . $_POST['module2'] . " Versão " . $_POST['SIGEP-Online']); // melhorar para o exemplo abaixo e mandar um email para cada modulo
      $mail->Body    = utf8_decode($_POST['SIGEP-Online-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
      for ($ct = 0, $ctMax = count($_FILES['SIGEP-OnlineFile']['tmp_name']); $ct < $ctMax; $ct++) {
        $ext = PHPMailer::mb_pathinfo($_FILES['SIGEP-OnlineFile']['name'][$ct], PATHINFO_EXTENSION);
        $uploadfile = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['SIGEP-OnlineFile']['name'][$ct])) . '.' . $ext;
        $filename = $_FILES['SIGEP-OnlineFile']['name'][$ct];
        if (move_uploaded_file($_FILES['SIGEP-OnlineFile']['tmp_name'][$ct], $uploadfile)) {
          if (!$mail->addAttachment($uploadfile, $filename)) {
          }
        }
      }
      if ($mail->send()) {
      }
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
  if (isset($_POST['module3']) && isset($_POST['FolhaWeb'])) {
    $qtdModulos = $qtdModulos + 1;
    try {
      $bool = true;
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system 1.30." . $version . " - Módulo " . $_POST['module3'] . " Versão " . $_POST['FolhaWeb']); // melhorar para o exemplo abaixo e mandar um email para cada modulo
      $mail->Body    = utf8_decode($_POST['FolhaWeb-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
      for ($ct = 0, $ctMax = count($_FILES['FolhaWebFile']['tmp_name']); $ct < $ctMax; $ct++) {
        $ext = PHPMailer::mb_pathinfo($_FILES['FolhaWebFile']['name'][$ct], PATHINFO_EXTENSION);
        $uploadfile = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['FolhaWebFile']['name'][$ct])) . '.' . $ext;
        $filename = $_FILES['FolhaWebFile']['name'][$ct];
        if (move_uploaded_file($_FILES['FolhaWebFile']['tmp_name'][$ct], $uploadfile)) {
          if (!$mail->addAttachment($uploadfile, $filename)) {
          }
        }
      }
      if ($mail->send()) {
      }
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
  if (isset($_POST['module4']) && isset($_POST['SIGS'])) {
    $qtdModulos = $qtdModulos + 1;
    try {
      $bool = true;
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system 1.30." . $version . " - Módulo " . $_POST['module4'] . " Versão " . $_POST['SIGS']); // melhorar para o exemplo abaixo e mandar um email para cada modulo
      $mail->Body    = utf8_decode($_POST['SIGS-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
      for ($ct = 0, $ctMax = count($_FILES['SIGSFile']['tmp_name']); $ct < $ctMax; $ct++) {
        $ext = PHPMailer::mb_pathinfo($_FILES['SIGSFile']['name'][$ct], PATHINFO_EXTENSION);
        $uploadfile = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['SIGSFile']['name'][$ct])) . '.' . $ext;
        $filename = $_FILES['SIGSFile']['name'][$ct];
        if (move_uploaded_file($_FILES['SIGSFile']['tmp_name'][$ct], $uploadfile)) {
          if (!$mail->addAttachment($uploadfile, $filename)) {
          }
        }
      }
      if ($mail->send()) {
      }
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
  if (isset($_POST['module5']) && isset($_POST['GEST'])) {
    $qtdModulos = $qtdModulos + 1;
    try {
      $bool = true;
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system 1.30." . $version . " - Módulo " . $_POST['module5'] . " Versão " . $_POST['GEST']); // melhorar para o exemplo abaixo e mandar um email para cada modulo
      $mail->Body    = utf8_decode($_POST['GEST-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
      for ($ct = 0, $ctMax = count($_FILES['GESTFile']['tmp_name']); $ct < $ctMax; $ct++) {
        $ext = PHPMailer::mb_pathinfo($_FILES['GESTFile']['name'][$ct], PATHINFO_EXTENSION);
        $uploadfile = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['GESTFile']['name'][$ct])) . '.' . $ext;
        $filename = $_FILES['GESTFile']['name'][$ct];
        if (move_uploaded_file($_FILES['GESTFile']['tmp_name'][$ct], $uploadfile)) {
          if (!$mail->addAttachment($uploadfile, $filename)) {
          }
        }
      }
      if ($mail->send()) {
      }
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
}

if ($qtd == 0 && $bool) {
  $_SESSION['mensagem'] = "success";
  unset($_POST);
  //header('Location: ..');
} else if ($qtd > 0) {
  $_SESSION['mensagem'] = "danger";
  $_SESSION['quantidade'] = $qtd;
  $_SESSION['quantidadeMod'] = $qtdModulos;
  unset($_POST);
  //header('Location: ..');
} else {
  //header('Location: ..');
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