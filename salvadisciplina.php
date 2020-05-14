<?php
// Incluir arquivo de configuração
require_once "conexao.php";
 
// Definir variáveis ​​e inicializar com valores vazios
$N_MATERIA = $_POST['materia'];

$sql = "INSERT INTO tbmateria (DISCIPLINA)  VALUES ('$N_MATERIA')";

if (mysqli_query($conn, $sql)){
echo "disciplina cadastrada com sucesso";
}else{
    echo "erro: " . $sql . "<br>" . mysqli_error($conn);
}
 mysqli_close($conn);

?>