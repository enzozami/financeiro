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
    <div class="container">
        <form action="paginas/financa.php" method="post">
            <div id="login">    
                <div class="text-left">
                    <span class="blur1"></span>
                    <span class="blur1"></span>

                    <h2 class="text-center">LOGIN</h2>
                    <label for="" class="form-label">E-Mail</label>
                    <input type="email" class="form-control">
                    <label for="" class="form-label">Senha</label>
                    <input type="password" class="form-control">

                    <span class="blur2"></span>
                    <span class="blur2"></span>
    
                </div>
                <div id="cadastro">
                    <a href="cadastro.php">Cadastrar</a>
                </div>
                <div class="d-flex justify-content-between align-items-center my-3">
                    <button type="submit" id="btn" class="btn btn-outline-success my-2 d-block mx-auto">Entrar</button>
                </div>
            </div>    
        </form>
    </div>
</body>
</html>