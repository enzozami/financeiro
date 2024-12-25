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
<div class="container">
        <form action="index.php" method="post">
            <div id="login">    
                <div class="text-left">
                    <span class="blur1"></span>
                    <span class="blur1"></span>

                    <h2 class="text-center">CADASTRO</h2>
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" id="nome" name="nome" class="form-control" required>
                    <label for="email" class="form-label">E-Mail</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" id="senha" name="senha" class="form-control" required>

                    <span class="blur2"></span>
                    <span class="blur2"></span>
                </div>
                <div id="cadastro">
                    <a href="index.php">Login</a>
                </div>
                <div class="d-flex justify-content-between align-items-center my-3">
                    <button type="submit" id="btn" class="btn btn-outline-success my-2 d-block mx-auto">CADASTRAR</button>
                </div>
            </div>    
        </form>
    </div>
</body>
</html>