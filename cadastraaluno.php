<?php
require_once "conexao.php";
		$nome=@$_POST['nome'];
		$cep=@$_POST['cep'];
		
		if ($nome == ''){
			$logradouro = "";
			$bairro		= "";
			$localidade = "";
			$uf			= "";
		}
		if ($cep!=''){
			$arq = file_get_contents('https://viacep.com.br/ws/'.$cep.'/json/');
			$json = json_decode($arq);
			$logradouro = $json->logradouro;
			$bairro		= $json->bairro;
			$localidade = $json->localidade;
			$uf			= $json->uf;
        }
        if (isset($_POST["submit"])){
            //var_dump($_POST);
            
 
            // Definir variáveis ​​e inicializar com valores vazios
            $NOME = $_POST['nome'];
            $CEP = $_POST['cep'];
            $RUA = $_POST['rua'];
            $BAIRRO = $_POST['bairro'];
            $CIDADE = $_POST['cidade'];
            $ESTADO = $_POST['estado'];
            $NUMERO = $_POST['numero'];
            $EMAIL = $_POST['email'];
            $TELEFONE = $_POST['telefone'];
            $DISCIPLINA = $_POST['disciplina'];
            
            $sql = "INSERT INTO tbalunos (nome, cep, rua, bairro, cidade, estado, numero, email, telefone, disciplina)  VALUES ('$NOME', '$CEP', '$RUA', '$BAIRRO', '$CIDADE', '$ESTADO', '$NUMERO', '$EMAIL', '$TELEFONE', '$DISCIPLINA')";
            
            if (mysqli_query($conn, $sql)){
            echo "disciplina cadastrada com sucesso";
            }else{
                echo "erro: " . $sql . "<br>" . mysqli_error($conn);
            }
             mysqli_close($conn);
        }
		?>
 
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Insere dados</title>
    <link rel="stylesheet" href="style3.css">
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
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Nome do Aluno</label>
                            <input type="text" name="nome" class="form-control" value="<?php echo $nome; ?>">
                            
                        </div>
                        <div class="form-group">
                            <label>Digite o CEP</label>
                           
                            <input name="cep" class="form-control" size="20" ><?php echo $cep; ?></input>  
                        </div>
                        <button type="submit">Verificar CEP</button>
                    
                        
                       
                        <div class="form-group">
                            <label>Rua</label>
                            <input type="text" name="rua" id="rua" class="form-control" value="<?php echo $logradouro;?>">
                            
                        </div>
                        <div class="form-group">
                            <label>Bairro</label>
                            <input type="text" name="bairro" class="form-control" value="<?php echo $bairro;?>">
                            
                        </div>
                        <div class="form-group">
                            <label>Cidade</label>
                            <input type="text" name="cidade" class="form-control" value="<?php echo $localidade;?>">
                            
                        </div>
                        <div class="form-group">
                            <label>Estado</label>
                            <input type="text" name="estado" class="form-control" size="30" value="<?php echo $uf;?>">
                            
                        </div>
                        <div class="form-group">
                            <label>Numero</label>
                            <input type="text" name="numero" class="form-control" size="30">
                            
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" >
                           
                        </div>
                        <div class="form-group">
                            <label>Telefone</label>
                            <input type="text" name="telefone" class="form-control">
                            
                        </div>
                        <div class="form-group ">
                            <label>Escolha a Disciplina</label>
                            <select name="disciplina"> <br><br>
                            <option value="Disciplina">Escolha a Disciplina</option>
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
                        <input type="submit" name="submit" class="btn btn-primary" value="Enviar">
                        
                        <a href="index.php" class="btn btn-default">Voltar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>