<?php

include_once 'conexao.php';


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
                        <h2>Cadastrar Aluno</h2>
                    </div>
                    <p>Preencha os campos abaixo para fazer o cadastro do aluno</p>
                    <form action="salvanota.php" method="post">

                    <div class="form-groupp ">
                            <label><p>Escolha o Aluno</p></label>
                            <select name="nome"> <br><br>
                            <option value="">Escolha o Aluno</option>
                            <?php
                            
                            $sql = "SELECT * FROM tbaluno WHERE 1";
    
                            if($stmt = mysqli_prepare($conn, $sql)){                               
                                // Tentativa de executar a declaração preparada
                                if(mysqli_stmt_execute($stmt)){
                                    $result = mysqli_stmt_get_result($stmt);
                            
                                    if(mysqli_num_rows($result) > 0){
                                        //var_dump("into");
                                        /* Busque a linha de resultados como uma matriz associativa. Desde o conjunto de resultados
                                        contém apenas uma linha, não precisamos usar o loop while */
                                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                            echo "<option value='{$row['ID']}'>{$row['nome']}</option>";
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
                                            echo "<option value='{$row['ID']}'>{$row['disciplina']}</option>";
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
                       

                        <div class="form-group">
                            <label>Avaliação 1</label>
                            <input type="text" name="av1" class="form-control">
                            
                        </div>
                        <div class="form-group">
                            <label>Avaliação 2</label>
                           
                            <input type="av2" name="av2" class="form-control" ></input>  
                        </div>
                        
                    
                        
                       
                        <div class="form-group">
                            <label>Avaliação 3</label>
                            <input type="text" name="av3" class="form-control" ></input> 
                            
                        </div>
                        
                        
                        <input type="submit" name="submit" class="btn btn-primary" value="Enviar">
                        
                        <a href="index.php" class="btn btn-default">Voltar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>