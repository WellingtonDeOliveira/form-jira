<?php
$dados = $_POST['data'];

//$json = json_encode($dados);
$arquivo = '../perfil.json';
try{
    file_put_contents($arquivo, $dados);
}catch(Exception $e){
    echo $e;
}
echo $response;

?>