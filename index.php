<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN - FINANÇAS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        include_once "scripts/conexao.php";

        if (is_null($connection)) {
            echo "<div class='alert alert-danger fw-bold text-center'>$errorMsg</div>";
            exit();
        }

        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_STRING);
        
        if($email && $senha){
            $sql = "SELECT email, senha FROM realizar_login WHERE email = :email";
            $params = [
                "email" => $email
            ];
            $stmt = $connection->prepare($sql);
            $stmt->execute($params);
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$resultado) {
                $mensagem = "Realize LOGIN para acessar seus dados financeiros!";
                $alertColor = "danger";
            } elseif ($email != $resultado['email'] || $senha != $resultado['senha']) {
                $mensagem = "E-Mail ou Senha incorretos!";
                $alertColor = "danger";
            } else {
                $mensagem = "Login realizado com sucesso!";
                $alertColor = "success";
                header('Location: paginas/financa.php');
                exit();
            }
        } else {
            $mensagem = "Por favor, preencha todos os campos!";
            $alertColor = "warning";
        }
    ?>

    <div class="container">
        <form action="" method="post">
            <div id="login">       
                <div class="text-left">
                    <span class="blur1"></span>
                    <span class="blur1"></span>

                    <h2 class="text-center">LOGIN</h2>
                    <label for="email" class="form-label">E-Mail</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" name="senha" id="senha" class="form-control" maxlength="15" required>

                    <span class="blur2"></span>
                    <span class="blur2"></span>
                </div>
                <div id="cadastro">
                    <a href="cadastro.php">Cadastrar</a>
                </div>
                <div class="d-flex justify-content-between align-items-center my-3">
                    <button type="submit" id="btn" class="btn btn-outline-success my-2 d-block mx-auto">Entrar</button>
                </div>
                <div class="alert alert-<?=$alertColor?> my-2 text-center">
                    <?=$mensagem?>
                </div>
            </div>   
        </form>
    </div>
</body>
</html>