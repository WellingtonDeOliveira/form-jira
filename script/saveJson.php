<?php
$dados = $_POST['data'];

$json = json_encode($dados);
try{
    file_put_contents('../perfil.json', $json);
}catch(Exception $e){

}
echo json_encode($response);

?>