<?php
// Inclui o arquivo config.php
require_once "conexao.php";

if (isset($_POST['enviar'])):
    $AV1 = $_POST['av1'];
    $AV2 = $_POST['av2'];
    $AV3 = $_POST['av3'];
    $CONCEITO = '';

    $MEDIA = ($AV1 + $AV2 + $AV3 ) / 3;

    
    if ($MEDIA >= 8.5):
        $CONCEITO = "A";
    elseif (($MEDIA < 8.4) && ($MEDIA >= 7)):
        $CONCEITO = "B";
    elseif (($MEDIA < 6.9) && ($MEDIA >= 6)):
        $CONCEITO = "C";
    elseif (($MEDIA < 5.9) && ($MEDIA >= 4)):
        $CONCEITO = "D";
    else: 
        $CONCEITO ="F";
                
    endif;
    $sql = "INSERT INTO tbnotas (av1, av2, av3, media, conceito) VALUES ('$AV1', '$AV2', '$AV3', '$MEDIA', '$CONCEITO')";

if (mysqli_query($conn, $sql)){
echo "disciplina cadastrada com sucesso";
}else{
    echo "erro: " . $sql . "<br>" . mysqli_error($conn);
}
 mysqli_close($conn);


endif;
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
                    <form action="" method="post">
                    <div class="form-groupp ">
                            <label><p>Escolha o Aluno</p></label>
                            <select name="nome"> <br><br>
                            <option value="">Selecione o Aluno</option>
                            <?php
                            
                            $sql = "SELECT * FROM tbnotas WHERE 1";
    
                            if($stmt = mysqli_prepare($conn, $sql)){                               
                                // Tentativa de executar a declaração preparada
                                if(mysqli_stmt_execute($stmt)){
                                    $result = mysqli_stmt_get_result($stmt);
                            
                                    if(mysqli_num_rows($result) > 0){
                                        //var_dump("into");
                                        /* Busque a linha de resultados como uma matriz associativa. Desde o conjunto de resultados
                                        contém apenas uma linha, não precisamos usar o loop while */
                                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                            echo "<option value='{$row['id']}'>{$row['nome']}</option>";
                                        }
                                        
                                    } else{
                                        // O URL não contém um parâmetro de identificação válido. Redirecionar para a página de erro
                                        header("location: error.php");
                                        exit();
                                    }
                                    
                                } else{
                                    echo "Opa! Algo deu errado. Por favor, tente novamente mais tarde.";
                                }
                            }
                             
                            ?>
                            
                            </select>
                            
                        </div>
                        
                        <div class="form-groupp ">
                            <label><p>Escolha a Disciplina</p></label>
                            <select name="disciplina"> <br><br>
                            <option value="">Escolha a Disciplina</option>
                            <?php
                            
                            $sql = "SELECT * FROM tbmateria WHERE 1";
    
                            if($stmt = mysqli_prepare($conn, $sql)){                               
                                // Tentativa de executar a declaração preparada
                                if(mysqli_stmt_execute($stmt)){
                                    $result = mysqli_stmt_get_result($stmt);
                            
                                    if(mysqli_num_rows($result) > 0){
                                        //var_dump("into");
                                        /* Busque a linha de resultados como uma matriz associativa. Desde o conjunto de resultados
                                        contém apenas uma linha, não precisamos usar o loop while */
                                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                            echo "<option value='{$row['id']}'>{$row['disciplina']}</option>";
                                        }
                                        
                                    } else{
                                        // O URL não contém um parâmetro de identificação válido. Redirecionar para a página de erro
                                        header("location: error.php");
                                        exit();
                                    }
                                    
                                } else{
                                    echo "Opa! Algo deu errado. Por favor, tente novamente mais tarde.";
                                }
                            }
                             
                            ?>
                            
                            </select>
                            
                        </div>
                        <input type="submit" class="btn btn-primary" value="Buscar Aluno">
                        <br><br>
                        <div class="form-group">
                            <label>Atividade 1</label>
                            <input type="text" name="av1" class="form-control"value="<?php echo $AV1 ?>">
                            
                        </div>
                        <div class="form-group">
                            <label>Atividade 2</label>
                            <input type="text" name="av2" class="form-control"value="<?php echo $AV2 ?>">
                            
                        </div>
                        <div class="form-group">
                            <label>Atividade 3</label>
                            <input type="text" name="av3" class="form-control"value="<?php echo $AV3 ?>">
                            
                        </div>
                        
                        <input type="submit" name="enviar" class="btn btn-primary" value="Alterar nota">
                        <a href="index.php" class="btn btn-default">Voltar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>