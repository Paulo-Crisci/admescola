
<?php
// Inclui o arquivo config.php
require_once "conexao.php";
 
// Define as variáveis e coloca um valor vazio
$av1 = $av2 = $av3 = "";

 
// Processa os dados do formulário quando o formulário é submetido
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Obter valor de entrada oculto
    $id = $_POST["id"];
    
    // Validando nome
    $nome_informado = trim($_POST["nome"]);
    if(empty($nome_informado)){
        $nome_erro = "Por favor, entre com um nome.";
    } elseif(!filter_var($nome_informado, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $nome_erro = "Por favor, entre com um nome válido.";
    } else{
        $nome = $nome_informado;
    }
    
    // Validando endereco
    $endereco_informado = trim($_POST["endereco"]);
    if(empty($endereco_informado)){
        $endereco_erro = "Por favor, entre com um endereço.";     
    } else{
        $endereco = $endereco_informado;
    }
    
    // Validate salario
    $input_salario = trim($_POST["salario"]);
    if(empty($input_salario)){
        $salario_erro = "Por favor, entre com um valor numérico referente ao salário.";     
    } elseif(!ctype_digit($input_salario)){
        $salario_erro = "Por favor, entre com um valor positivo inteiro.";
    } else{
        $salario = $input_salario;
    }
    
    // Checa os erros de entrada antes de inserir no banco
    if(empty($nome_erro) && empty($endereco_erro) && empty($salario_erro)){
        // Prepara a declaração de UPDATE
        $sql = "UPDATE empregados SET nome=?, endereco=?, salario=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Vincular variáveis ​​à instrução preparada como parâmetros
            mysqli_stmt_bind_param($stmt, "sssi", $param_nome, $param_endereco, $param_salario, $param_id);
            
            // Set parametros
            $param_nome = $nome;
            $param_endereco = $endereco;
            $param_salario = $salario;
            $param_id = $id;
            
            // Tentativa de executar a instrução
            if(mysqli_stmt_execute($stmt)){
                // dados atualizados com sucesso, retorna para index
                header("location: index.php");
                exit();
            } else{
                echo "Algo deu errado. Tente novamente.";
            }
        }
         
        // Fecha declaração
        mysqli_stmt_close($stmt);
    }
    
    // fecha conexão
    mysqli_close($link);
} else{
    // Verifica a existência do parâmetro id antes de processar
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Pega o parâmetro URL
        $id =  trim($_GET["id"]);
        
        // Prepara a declaração de select
        $sql = "SELECT * FROM empregados WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Tentativa de executar a declaração
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Busque a linha de resultados como uma matriz associativa. Desde o conjunto de resultados
                    contém apenas uma linha, não precisamos usar o loop while */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $nome = $row["nome"];
                    $endereco = $row["endereco"];
                    $salario = $row["salario"];
                } else{
                    // A URL não possui um ID válido
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Algo deu errado, tente novamente mais tarde.";
            }
        }
        
        // Fecha declaração
        mysqli_stmt_close($stmt);
        
        // Fecha conexão
        mysqli_close($link);
    }  else{
        // URL não contém o parâmetro ID.
        header("location: error.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Insere dados</title>
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
                        <h2>Alterar Notas</h2>
                    </div>
                    <p>Altere as notas abaixo caso ocorra alterações nas mesmas</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group ">
                            <label>Escolha o Aluno</label>
                            <select name="baluno"> <br><br>
                               
                            <option value="bdisciplina">Aluno</option>
    </select>                
                        </div>
                        
                        <div class="form-group ">
                            <label>Escolha a Disciplina</label>
                            <select name="disciplina"> <br><br>
                               
                            <option value="Disciplina">Escolha a Disciplina</option>
    </select>      
                        </div>
                        <input type="submit" class="btn btn-primary" value="Buscar Aluno">
                        <br><br>
                        <div class="form-group">
                            <label>Atividade 1</label>
                            <input type="text" name="a1" class="form-control">
                            
                        </div>
                        <div class="form-group">
                            <label>Atividade 2</label>
                            <input type="text" name="a2" class="form-control">
                            
                        </div>
                        <div class="form-group">
                            <label>Atividade 3</label>
                            <input type="text" name="a3" class="form-control">
                            
                        </div>
                        
                        <input type="submit" class="btn btn-primary" value="Alterar nota">
                        <a href="index.php" class="btn btn-default">Voltar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>