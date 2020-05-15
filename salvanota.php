<?php
// Incluir arquivo de configuração
require_once "conexao.php";
 
// Definir variáveis ​​e inicializar com valores vazios

$AV1 = $_POST['av1'];
$AV2 = $_POST['av2'];
$AV3 = $_POST['av3'];


$sql = "INSERT INTO tbnotas (nome, disciplina, av1, av2, av3,)  VALUES ('$NOME', '$DISCIPLINA', '$AV1', '$AV2', '$AV3')";

if (mysqli_query($conn, $sql)){
echo "disciplina cadastrada com sucesso";
}else{
    echo "erro: " . $sql . "<br>" . mysqli_error($conn);
}
 mysqli_close($conn);

?>