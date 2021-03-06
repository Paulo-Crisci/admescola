<?php
// Verifique a existência do parâmetro id antes de processar mais
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Incluir arquivo de configuração
    require_once "conexao.php";

    // Prepare uma declaração de seleção
    $sql = "SELECT * FROM tbnotas WHERE id = ?";

    if($stmt = mysqli_prepare($conn, $sql)){
        // Vincular variáveis ​​à instrução preparada como parâmetros
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Definir parâmetros
        $param_id = trim($_GET["id"]);

        // Tentativa de executar a declaração preparada
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result)  == 1){
                /* Busque a linha de resultados como uma matriz associativa. Desde o conjunto de resultados
                contém apenas uma linha, não precisamos usar o loop while */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                // Recuperar valor do campo individual
                $nome = $row["nome"];

            } else{
                // O URL não contém um parâmetro de identificação válido. Redirecionar para a página de erro
                header("location: error.php");
                exit();
            }

        } else{
            echo "Opa! Algo deu errado. Por favor, tente novamente mais tarde.";
        }
    }

    // Fecha declaração
    mysqli_stmt_close($stmt);

    // Fecha conexão
    mysqli_close($conn);
} else{
    // O URL não contém o parâmetro id. Redirecionar para a página de erro
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Visualizar Dados</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Visualizar Dados</h1>
                    </div>
                    <div class="form-group">
                        <label>Nome do aluno</label>
                        <p class="form-control-static"><?php echo $row["nome"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Nome da Disciplina</label>
                        <p class="form-control-static"><?php echo $row["disciplina"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Nota Avaliação 1</label>
                        <p class="form-control-static"><?php echo $row["av1"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Nota Avaliação 2</label>
                        <p class="form-control-static"><?php echo $row["av2"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Nota Avaliação 3</label>
                        <p class="form-control-static"><?php echo $row["av3"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Média das Provas</label>
                        <p class="form-control-static"><?php echo $row["media"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Situação</label>
                        <p class="form-control-static"><?php echo $row["conceito"]; ?></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Voltar</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>