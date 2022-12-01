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
if(isset($_POST['responsavel']) && isset($_POST['observadores'])){
  $camposCC = $_POST['responsavel'].','.$_POST['observadores'];
  $arrayTemp = explode(",",$camposCC);
}else{
  $arrayTemp = '';
}

$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Host       = 'smtp.trt7.jus.br';
$mail->SMTPAuth   = false;
$mail->Port       = 25;


$mail->setFrom('mariojr@trt7.jus.br', 'Mario');
$mail->addAddress('ddti@trt7.jus.br', 'Jira');
if(!($arrayTemp == '')){
  for($i = 0; $i < count($arrayTemp); $i++){
    $mail->addCC($arrayTemp[$i]);
    //echo $arrayTemp[$i];
  }
}

/* Criar campos para receber os emails cc */

$mail->isHTML(false);

$qtdModulos = 0;
$qtd = 0;
$bool = false;

//echo $camposCC;

if ($system == "PJe-JT") {
  if (isset($_POST['version-pje']) && $_POST['version-pje'] != '' && $_POST['version-pje'] != null) {
    $version = $_POST['version-pje'];
    $qtdModulos = $qtdModulos + 1;
    try {
      $bool = true;
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system - Versão 2.8." . $version); 
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
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system - Módulo " . $_POST['module2'] . " Versão " . $_POST['AUD']); 
      $mail->Body    = utf8_decode($_POST['AUD-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2

      for ($ct = 0, $ctMax = count($_FILES['AUDFile']['tmp_name']); $ct < $ctMax; $ct++) {
        $ext = PHPMailer::mb_pathinfo($_FILES['AUDFile']['name'][$ct], PATHINFO_EXTENSION);
        $uploadfile1 = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['AUDFile']['name'][$ct])) . '.' . $ext;
        $filename1 = $_FILES['AUDFile']['name'][$ct];
        if (move_uploaded_file($_FILES['AUDFile']['tmp_name'][$ct], $uploadfile1)) {
          if (!$mail->addAttachment($uploadfile1, $filename1)) {
          }
        }
      }
      if ($mail->send()) {
      }
      unlink($uploadfile1);
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
  if (isset($_POST['module3']) && isset($_POST['JTE'])) {
    $qtdModulos = $qtdModulos + 1;
    try {
      $bool = true;
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system - Módulo " . $_POST['module3'] . " Versão " . $_POST['JTE']); 
      $mail->Body    = utf8_decode($_POST['JTE-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
      for ($ct = 0, $ctMax = count($_FILES['JTEFile']['tmp_name']); $ct < $ctMax; $ct++) {
        $ext = PHPMailer::mb_pathinfo($_FILES['JTEFile']['name'][$ct], PATHINFO_EXTENSION);
        $uploadfile2 = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['JTEFile']['name'][$ct])) . '.' . $ext;
        $filename2 = $_FILES['JTEFile']['name'][$ct];
        if (move_uploaded_file($_FILES['JTEFile']['tmp_name'][$ct], $uploadfile2)) {
          if (!$mail->addAttachment($uploadfile2, $filename2)) {
          }
        }
      }
      if ($mail->send()) {
      }
      unlink($uploadfile2);
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
  if (isset($_POST['module4']) && isset($_POST['PjeCalc'])) {
    $qtdModulos = $qtdModulos + 1;
    try {
      $bool = true;
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system - Módulo " . $_POST['module4'] . " Versão " . $_POST['PjeCalc']); 
      $mail->Body    = utf8_decode($_POST['PjeCalc-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
      for ($ct = 0, $ctMax = count($_FILES['PjeCalcFile']['tmp_name']); $ct < $ctMax; $ct++) {
        $ext = PHPMailer::mb_pathinfo($_FILES['PjeCalcFile']['name'][$ct], PATHINFO_EXTENSION);
        $uploadfile3 = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['PjeCalcFile']['name'][$ct])) . '.' . $ext;
        $filename3 = $_FILES['PjeCalcFile']['name'][$ct];
        if (move_uploaded_file($_FILES['PjeCalcFile']['tmp_name'][$ct], $uploadfile3)) {
          if (!$mail->addAttachment($uploadfile3, $filename3)) {
          }
        }
      }
      if ($mail->send()) {
      }
      unlink($uploadfile3);
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
  if (isset($_POST['module5']) && isset($_POST['SIF'])) {
    $qtdModulos = $qtdModulos + 1;
    try {
      $bool = true;
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system  - Módulo " . $_POST['module5'] . " Versão " . $_POST['SIF']); 
      $mail->Body    = utf8_decode($_POST['SIF-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
      for ($ct = 0, $ctMax = count($_FILES['SIFFile']['tmp_name']); $ct < $ctMax; $ct++) {
        $ext = PHPMailer::mb_pathinfo($_FILES['SIFFile']['name'][$ct], PATHINFO_EXTENSION);
        $uploadfile4 = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['SIFFile']['name'][$ct])) . '.' . $ext;
        $filename4 = $_FILES['SIFFile']['name'][$ct];
        if (move_uploaded_file($_FILES['SIFFile']['tmp_name'][$ct], $uploadfile4)) {
          if (!$mail->addAttachment($uploadfile4, $filename4)) {
          }
        }
      }
      if ($mail->send()) {
      }
      unlink($uploadfile4);
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
  if (isset($_POST['module6']) && isset($_POST['EXE-PJE'])) {
    $qtdModulos = $qtdModulos + 1;
    try {
      $bool = true;
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system  - Módulo " . $_POST['module6'] . " Versão " . $_POST['EXE-PJE']); 
      $mail->Body    = utf8_decode($_POST['EXE-PJE-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
      for ($ct = 0, $ctMax = count($_FILES['EXE-PJEFile']['tmp_name']); $ct < $ctMax; $ct++) {
        $ext = PHPMailer::mb_pathinfo($_FILES['EXE-PJEFile']['name'][$ct], PATHINFO_EXTENSION);
        $uploadfile5 = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['EXE-PJEFile']['name'][$ct])) . '.' . $ext;
        $filename5 = $_FILES['EXE-PJEFile']['name'][$ct];
        if (move_uploaded_file($_FILES['EXE-PJEFile']['tmp_name'][$ct], $uploadfile5)) {
          if (!$mail->addAttachment($uploadfile5, $filename5)) {
          }
        }
      }
      if ($mail->send()) {
      }
      unlink($uploadfile5);
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
  if (isset($_POST['module7']) && isset($_POST['Nugep'])) {
    $qtdModulos = $qtdModulos + 1;
    try {
      $bool = true;
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system  - Módulo " . $_POST['module7'] . " Versão " . $_POST['Nugep']); 
      $mail->Body    = utf8_decode($_POST['Nugep-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
      for ($ct = 0, $ctMax = count($_FILES['NugepFile']['tmp_name']); $ct < $ctMax; $ct++) {
        $ext = PHPMailer::mb_pathinfo($_FILES['NugepFile']['name'][$ct], PATHINFO_EXTENSION);
        $uploadfile6 = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['NugepFile']['name'][$ct])) . '.' . $ext;
        $filename6 = $_FILES['NugepFile']['name'][$ct];
        if (move_uploaded_file($_FILES['NugepFile']['tmp_name'][$ct], $uploadfile6)) {
          if (!$mail->addAttachment($uploadfile6, $filename6)) {
          }
        }
      }
      if ($mail->send()) {
      }
      unlink($uploadfile6);
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
  if (isset($_POST['module8']) && isset($_POST['Acervo-Digital'])) {
    $qtdModulos = $qtdModulos + 1;
    try {
      $bool = true;
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system  - Módulo " . $_POST['module8'] . " Versão " . $_POST['Acervo-Digital']); 
      $mail->Body    = utf8_decode($_POST['Acervo-Digital-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
      for ($ct = 0, $ctMax = count($_FILES['Acervo-DigitalFile']['tmp_name']); $ct < $ctMax; $ct++) {
        $ext = PHPMailer::mb_pathinfo($_FILES['Acervo-DigitalFile']['name'][$ct], PATHINFO_EXTENSION);
        $uploadfile7 = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['Acervo-DigitalFile']['name'][$ct])) . '.' . $ext;
        $filename7 = $_FILES['Acervo-DigitalFile']['name'][$ct];
        if (move_uploaded_file($_FILES['Acervo-DigitalFile']['tmp_name'][$ct], $uploadfile7)) {
          if (!$mail->addAttachment($uploadfile7, $filename7)) {
          }
        }
      }
      if ($mail->send()) {
      }
      unlink($uploadfile7);
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
  if (isset($_POST['module9']) && isset($_POST['SHODO'])) {
    $qtdModulos = $qtdModulos + 1;
    try {
      $bool = true;
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system  - Módulo " . $_POST['module9'] . " Versão " . $_POST['SHODO']); 
      $mail->Body    = utf8_decode($_POST['SHODO-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
      for ($ct = 0, $ctMax = count($_FILES['SHODOFile']['tmp_name']); $ct < $ctMax; $ct++) {
        $ext = PHPMailer::mb_pathinfo($_FILES['SHODOFile']['name'][$ct], PATHINFO_EXTENSION);
        $uploadfile8 = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['SHODOFile']['name'][$ct])) . '.' . $ext;
        $filename8 = $_FILES['SHODOFile']['name'][$ct];
        if (move_uploaded_file($_FILES['SHODOFile']['tmp_name'][$ct], $uploadfile8)) {
          if (!$mail->addAttachment($uploadfile8, $filename8)) {
          }
        }
      }
      if ($mail->send()) {
      }
      unlink($uploadfile8);
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
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system 1.30." . $version . " - Módulo " . $_POST['module1'] . " Versão " . $_POST['SIGEP-Modulo']); 
      $mail->Body    = utf8_decode($_POST['SIGEP-Modulo-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
      for ($ct = 0, $ctMax = count($_FILES['SIGEP-ModuloFile']['tmp_name']); $ct < $ctMax; $ct++) {
        $ext = PHPMailer::mb_pathinfo($_FILES['SIGEP-ModuloFile']['name'][$ct], PATHINFO_EXTENSION);
        $uploadfile1 = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['SIGEP-ModuloFile']['name'][$ct])) . '.' . $ext;
        $filename1 = $_FILES['SIGEP-ModuloFile']['name'][$ct];
        if (move_uploaded_file($_FILES['SIGEP-ModuloFile']['tmp_name'][$ct], $uploadfile1)) {
          if (!$mail->addAttachment($uploadfile1, $filename1)) {
          }
        }
      }
      if ($mail->send()) {
      }
      unlink($uploadfile1);
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
  if (isset($_POST['module2']) && isset($_POST['SIGEP-Online'])) {
    $qtdModulos = $qtdModulos + 1;
    try {
      $bool = true;
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system 1.30." . $version . " - Módulo " . $_POST['module2'] . " Versão " . $_POST['SIGEP-Online']); 
      $mail->Body    = utf8_decode($_POST['SIGEP-Online-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
      for ($ct = 0, $ctMax = count($_FILES['SIGEP-OnlineFile']['tmp_name']); $ct < $ctMax; $ct++) {
        $ext = PHPMailer::mb_pathinfo($_FILES['SIGEP-OnlineFile']['name'][$ct], PATHINFO_EXTENSION);
        $uploadfile2 = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['SIGEP-OnlineFile']['name'][$ct])) . '.' . $ext;
        $filename2 = $_FILES['SIGEP-OnlineFile']['name'][$ct];
        if (move_uploaded_file($_FILES['SIGEP-OnlineFile']['tmp_name'][$ct], $uploadfile2)) {
          if (!$mail->addAttachment($uploadfile2, $filename2)) {
          }
        }
      }
      if ($mail->send()) {
      }
      unlink($uploadfile2);
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
  if (isset($_POST['module3']) && isset($_POST['FolhaWeb'])) {
    $qtdModulos = $qtdModulos + 1;
    try {
      $bool = true;
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system 1.30." . $version . " - Módulo " . $_POST['module3'] . " Versão " . $_POST['FolhaWeb']); 
      $mail->Body    = utf8_decode($_POST['FolhaWeb-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
      for ($ct = 0, $ctMax = count($_FILES['FolhaWebFile']['tmp_name']); $ct < $ctMax; $ct++) {
        $ext = PHPMailer::mb_pathinfo($_FILES['FolhaWebFile']['name'][$ct], PATHINFO_EXTENSION);
        $uploadfile3 = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['FolhaWebFile']['name'][$ct])) . '.' . $ext;
        $filename3 = $_FILES['FolhaWebFile']['name'][$ct];
        if (move_uploaded_file($_FILES['FolhaWebFile']['tmp_name'][$ct], $uploadfile3)) {
          if (!$mail->addAttachment($uploadfile3, $filename3)) {
          }
        }
      }
      if ($mail->send()) {
      }
      unlink($uploadfile3);
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
  if (isset($_POST['module4']) && isset($_POST['SIGS'])) {
    $qtdModulos = $qtdModulos + 1;
    try {
      $bool = true;
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system 1.30." . $version . " - Módulo " . $_POST['module4'] . " Versão " . $_POST['SIGS']); 
      $mail->Body    = utf8_decode($_POST['SIGS-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
      for ($ct = 0, $ctMax = count($_FILES['SIGSFile']['tmp_name']); $ct < $ctMax; $ct++) {
        $ext = PHPMailer::mb_pathinfo($_FILES['SIGSFile']['name'][$ct], PATHINFO_EXTENSION);
        $uploadfile4 = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['SIGSFile']['name'][$ct])) . '.' . $ext;
        $filename4 = $_FILES['SIGSFile']['name'][$ct];
        if (move_uploaded_file($_FILES['SIGSFile']['tmp_name'][$ct], $uploadfile4)) {
          if (!$mail->addAttachment($uploadfile4, $filename4)) {
          }
        }
      }
      if ($mail->send()) {
      }
      unlink($uploadfile4);
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
  if (isset($_POST['module5']) && isset($_POST['GEST'])) {
    $qtdModulos = $qtdModulos + 1;
    try {
      $bool = true;
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system 1.30." . $version . " - Módulo " . $_POST['module5'] . " Versão " . $_POST['GEST']); 
      $mail->Body    = utf8_decode($_POST['GEST-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
      for ($ct = 0, $ctMax = count($_FILES['GESTFile']['tmp_name']); $ct < $ctMax; $ct++) {
        $ext = PHPMailer::mb_pathinfo($_FILES['GESTFile']['name'][$ct], PATHINFO_EXTENSION);
        $uploadfile5 = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['GESTFile']['name'][$ct])) . '.' . $ext;
        $filename5 = $_FILES['GESTFile']['name'][$ct];
        if (move_uploaded_file($_FILES['GESTFile']['tmp_name'][$ct], $uploadfile5)) {
          if (!$mail->addAttachment($uploadfile5, $filename5)) {
          }
        }
      }
      if ($mail->send()) {
      }
      unlink($uploadfile5);
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
  if (isset($_POST['module6']) && isset($_POST['Esocial'])) {
    $qtdModulos = $qtdModulos + 1;
    try {
      $bool = true;
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system 1.30." . $version . " - Módulo " . $_POST['module6'] . " Versão " . $_POST['Esocial']); 
      $mail->Body    = utf8_decode($_POST['Esocial-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
      for ($ct = 0, $ctMax = count($_FILES['EsocialFile']['tmp_name']); $ct < $ctMax; $ct++) {
        $ext = PHPMailer::mb_pathinfo($_FILES['EsocialFile']['name'][$ct], PATHINFO_EXTENSION);
        $uploadfile6 = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['EsocialFile']['name'][$ct])) . '.' . $ext;
        $filename6 = $_FILES['EsocialFile']['name'][$ct];
        if (move_uploaded_file($_FILES['EsocialFile']['tmp_name'][$ct], $uploadfile6)) {
          if (!$mail->addAttachment($uploadfile6, $filename6)) {
          }
        }
      }
      if ($mail->send()) {
      }
      unlink($uploadfile6);
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
  if (isset($_POST['module7']) && isset($_POST['TEIID'])) {
    $qtdModulos = $qtdModulos + 1;
    try {
      $bool = true;
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system 1.30." . $version . " - Módulo " . $_POST['module7'] . " Versão " . $_POST['TEIID']); 
      $mail->Body    = utf8_decode($_POST['TEIID-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
      for ($ct = 0, $ctMax = count($_FILES['TEIIDFile']['tmp_name']); $ct < $ctMax; $ct++) {
        $ext = PHPMailer::mb_pathinfo($_FILES['TEIIDFile']['name'][$ct], PATHINFO_EXTENSION);
        $uploadfile7 = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['TEIIDFile']['name'][$ct])) . '.' . $ext;
        $filename7 = $_FILES['TEIIDFile']['name'][$ct];
        if (move_uploaded_file($_FILES['TEIIDFile']['tmp_name'][$ct], $uploadfile7)) {
          if (!$mail->addAttachment($uploadfile7, $filename7)) {
          }
        }
      }
      if ($mail->send()) {
      }
      unlink($uploadfile7);
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
  if (isset($_POST['module8']) && isset($_POST['Progecom'])) {
    $qtdModulos = $qtdModulos + 1;
    try {
      $bool = true;
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system 1.30." . $version . " - Módulo " . $_POST['module8'] . " Versão " . $_POST['Progecom']); 
      $mail->Body    = utf8_decode($_POST['Progecom-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
      for ($ct = 0, $ctMax = count($_FILES['ProgecomFile']['tmp_name']); $ct < $ctMax; $ct++) {
        $ext = PHPMailer::mb_pathinfo($_FILES['ProgecomFile']['name'][$ct], PATHINFO_EXTENSION);
        $uploadfile8 = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['ProgecomFile']['name'][$ct])) . '.' . $ext;
        $filename8 = $_FILES['ProgecomFile']['name'][$ct];
        if (move_uploaded_file($_FILES['ProgecomFile']['tmp_name'][$ct], $uploadfile8)) {
          if (!$mail->addAttachment($uploadfile8, $filename8)) {
          }
        }
      }
      if ($mail->send()) {
      }
      unlink($uploadfile8);
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
  if (isset($_POST['module9']) && isset($_POST['EJUD'])) {
    $qtdModulos = $qtdModulos + 1;
    try {
      $bool = true;
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system 1.30." . $version . " - Módulo " . $_POST['module9'] . " Versão " . $_POST['EJUD']); 
      $mail->Body    = utf8_decode($_POST['EJUD-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
      for ($ct = 0, $ctMax = count($_FILES['EJUDFile']['tmp_name']); $ct < $ctMax; $ct++) {
        $ext = PHPMailer::mb_pathinfo($_FILES['EJUDFile']['name'][$ct], PATHINFO_EXTENSION);
        $uploadfile9 = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['EJUDFile']['name'][$ct])) . '.' . $ext;
        $filename9 = $_FILES['EJUDFile']['name'][$ct];
        if (move_uploaded_file($_FILES['EJUDFile']['tmp_name'][$ct], $uploadfile9)) {
          if (!$mail->addAttachment($uploadfile9, $filename9)) {
          }
        }
      }
      if ($mail->send()) {
      }
      unlink($uploadfile9);
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
  if (isset($_POST['module10']) && isset($_POST['Passivos'])) {
    $qtdModulos = $qtdModulos + 1;
    try {
      $bool = true;
      $mail->Subject = utf8_decode("[ATUALIZACAO] Atualizar $system 1.30." . $version . " - Módulo " . $_POST['module10'] . " Versão " . $_POST['Passivos']); 
      $mail->Body    = utf8_decode($_POST['Passivos-body']); // [ATUALIZACAO]  Atualizar SIGEP 1.30.3 - Módulo SIGS Versão 2.2.2
      for ($ct = 0, $ctMax = count($_FILES['PassivosFile']['tmp_name']); $ct < $ctMax; $ct++) {
        $ext = PHPMailer::mb_pathinfo($_FILES['PassivosFile']['name'][$ct], PATHINFO_EXTENSION);
        $uploadfile10 = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['PassivosFile']['name'][$ct])) . '.' . $ext;
        $filename10 = $_FILES['PassivosFile']['name'][$ct];
        if (move_uploaded_file($_FILES['PassivosFile']['tmp_name'][$ct], $uploadfile10)) {
          if (!$mail->addAttachment($uploadfile10, $filename10)) {
          }
        }
      }
      if ($mail->send()) {
      }
      unlink($uploadfile10);
    } catch (Exception $e) {
      $qtd = $qtd + 1;
    }
  }
}

if ($qtd == 0 && $bool) {
  $_SESSION['mensagem'] = "success";
  unset($_POST);
  header('Location: ..');
} else if ($qtd > 0) {
  $_SESSION['mensagem'] = "danger";
  $_SESSION['quantidade'] = $qtd;
  $_SESSION['quantidadeMod'] = $qtdModulos;
  unset($_POST);
  header('Location: ..');
} else {
  header('Location: ..');
}