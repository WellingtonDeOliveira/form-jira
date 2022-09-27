<?php
//Variáveis

$system = $_POST['system'];
$version = $_POST['version'];
$module = $_POST['module'];
$data_envio = date('d/m/Y');
$hora_envio = date('H:i:s');

// Compo E-mail
$arquivo = "
<style type='text/css'>
body {
margin:0px;
font-family:Verdane;
font-size:12px;
color: #666666;
}
a{
color: #666666;
text-decoration: none;
}
a:hover {
color: #FF0000;
text-decoration: none;
}
</style>
  <html>
      <table width='510' border='1' cellpadding='1' cellspacing='1' bgcolor='#CCCCCC'>
          <tr>
            <td>
<tr>
               <td width='500'>Sistema:$system</td>
              </tr>
              <tr>
                <td width='320'>Versão:<b>$version</b></td>
   </tr>
    <tr>
                <td width='320'>Modulo:<b>$module</b></td>
              </tr>
          </td>
        </tr>
        <tr>
          <td>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></td>
        </tr>
      </table>
  </html>
";

//enviar

  // emails para quem será enviado o formulário
  //$destino = "fra.wellington.oliveira@gmail.com";
  $destino = "erick.barreto@trt7.jus.br";
  $assunto = "Teste formulario criação card jira";

  // É necessário indicar que o formato do e-mail é html
  $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      $headers .= 'From: $nome <$email>';
  //$headers .= "Bcc: $EmailPadrao\r\n";

  $enviaremail = mail($destino, $assunto, $arquivo, $headers);
  if($enviaremail){
  $mgm = "E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o e-mail fornecido no formulário";
  echo "<meta http-equiv='refresh' content='10;URL=contato.php'>";
  } else {
  $mgm = "ERRO AO ENVIAR E-MAIL!";
  echo "";
  }
?>