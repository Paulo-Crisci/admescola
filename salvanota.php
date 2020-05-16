<?php
// Incluir arquivo de configuração
require_once "conexao.php";
 
// Definir variáveis ​​e inicializar com valores vazios

$NOME = $_POST['nome'];
$DISCIPLINA = $_POST['disciplina'];
$AV1 = $_POST['av1'];
$AV2 = $_POST['av2'];
$AV3 = $_POST['av3'];
$MEDIA = 0;
$CONCEITO = 0;


$sql = "INSERT INTO tbnotas (nome, disciplina, av1, av2, av3, media, conceito) VALUES ('$NOME', '$DISCIPLINA', '$AV1', '$AV2', '$AV3', '$MEDIA', '$CONCEITO')";

if (mysqli_query($conn, $sql)){
echo "disciplina cadastrada com sucesso";
}else{
    echo "erro: " . $sql . "<br>" . mysqli_error($conn);
}
 mysqli_close($conn);

?>