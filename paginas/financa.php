<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FINANÇA || ZAMINELI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <?php
        session_start();
        include_once "../scripts/conexao.php";
        include_once "../template/navBar.php";

        $mensagem = "Insira os dados para registro.";

        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $descricao = filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_STRING);
            $valor = filter_input(INPUT_POST, "valor", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $tipo = filter_input(INPUT_POST, "tipo", FILTER_SANITIZE_NUMBER_INT);
            $data = filter_input(INPUT_POST, "data", FILTER_DEFAULT);

            $real = (float)$valor;

            if(empty($descricao) || empty($valor) || empty($tipo) || empty($data)){
                $mensagem = "Todos os campos são obrigatórios.";
            }

            $sql = "INSERT INTO dado(descricao, valor, dataRealizada, tipo_id)
                    VALUES (:descr, :val, :datarealizada, :tipo)";
            $params = [
                "descr" => $descricao,
                "val" => $valor,
                "datarealizada" => $data,
                "tipo" => $tipo
            ];

            try {
                $stmt = $connection->prepare($sql);
                $stmt->execute($params);

                if ($stmt->rowCount() > 0) {
                    $mensagem = "Registro inserido com sucesso!";
                    // Retorna à mensagem padrão após 5 segundos
                    echo "<script>
                            setTimeout(function() {
                                window.location.href = window.location.href;
                            }, 5000);
                          </script>";
                } else {
                    $mensagem = "O registro não foi realizado. Tente novamente.";
                }
            } catch (PDOException $e) {
                $mensagem = "Erro ao registrar: " . $e->getMessage(); 
            }
        }
    ?>

    <div class="container">
        <form action="" method="post">
            <div id="formulario">
                <h2>Finança || Zamineli</h2>

                <div class="row">
                    <div class="col-6">
                        <label for="descricao" class="form-label">Descrição</label>
                        <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Insira para o que foi utilizado o dinheiro" required>
                    </div>
                    <div class="col-6">
                        <label for="valor" class="form-label">Valor</label>
                        <input type="number" step="any" class="form-control" name="valor" id="valor" placeholder="Insira o valor" required>
                    </div>    
                </div>

                <div class="row">
                    <div class="col-6">    
                        <label for="tipo" class="form-label">Tipo</label>
                        <select name="tipo" id="tipo" class="form-control rounded-pill" required>
                            <option value="">Selecione...</option>
                            <option value="1">Salário</option>
                            <option value="2">Conta</option>
                            <option value="3">Investimento</option>
                            <option value="4">Lazer</option>
                            <option value="5">Entrada</option>
                            <option value="6">Saída</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="data" class="form-label">Data</label>
                        <input type="date" name="data" id="data" class="form-control" required>
                    </div>
                </div>

                <div class="text-center mt-2">
                    <p><?= $mensagem ?></p>
                </div>

                <div class="d-flex justify-content-center align-items-center mt-3">
                    <div class="text-center">
                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Botão SALVAR -->
                            <button type="submit" class="btn btn-outline-success d-block" style="width: 200px;">Registrar</button>
                            <!-- Botão LIMPAR -->
                            <a href="financa.php" class="btn btn-outline-danger" style="width: 200px;">Limpar</a>
                        </div>
                    </div>
                </div>

                <span class="blur3"></span>
                <span class="blur3"></span>
                <span class="blur4"></span>
                <span class="blur4"></span>
                <span class="blur5"></span>
                <span class="blur5"></span>
                <span class="blur6"></span>
                <span class="blur6"></span>
            </div>
        </form>
    </div>
</body>
</html>