<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRO - FINANÇAS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
        include_once "scripts/conexao.php";

        if(is_null($connection)){        
            echo "<div class='alert alert-danger fw-bold text-center'>$errorMsg</div>";
            exit();
        }

        $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_STRING);

        if(empty($nome) || empty($email) || empty($senha)){
            $mensagem = "Por favor, preencha todos os campos.";
            $alertColor = "danger";
        } else {
            $sql = "INSERT INTO realizar_login(nome, email, senha) 
                    VALUE (:NOME, :EMAIL, :SENHA)";
            $params = [
                "NOME" => $nome,
                "EMAIL" => $email,
                "SENHA" => $senha
            ];
            $stmt = $connection->prepare($sql);

            if ($resultado = $stmt->execute($params)){
                $mensagem =  "Você foi cadastrado com sucesso!";
                $alertColor = "success";
            } else {
                $mensagem =  "Esse E-Mail já é cadastrado!";
                $alertColor = "danger";
            }
        }
    ?>

    <div class="container">
        <form action="" method="post">
            <div id="login" class="p-3">    
                <div class="text-left">
                    <span class="blur1"></span>
                    <span class="blur1"></span>
                    <h2 class="text-center">CADASTRO</h2>
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" id="nome" name="nome" class="form-control" required>
                    <label for="email" class="form-label">E-Mail</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" id="senha" name="senha" class="form-control" maxlength="15" placeholder="Máximo 15 caracteres" required>
                    <span class="blur2"></span>
                    <span class="blur2"></span>
                </div>
                <div id="cadastro">
                    <a href="index.php">Login</a>
                </div>
                <div class="d-flex justify-content-between align-items-center my-3">
                    <button type="submit" id="btn" href="http://localhost:8080/FINAN%c3%87AS-ZAMINELI/cadastro.php" class="btn btn-outline-success my-2 d-block mx-auto">CADASTRAR</button>
                </div>
                <div class="alert alert-<?=$alertColor?> my-2 text-center">
                    <?=$mensagem?>
                </div> 
            </div>
        </form>
    </div>
</body>
</html>