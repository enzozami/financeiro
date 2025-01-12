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

        $pesquisar = filter_input(INPUT_POST, "pesquisa", FILTER_DEFAULT);

        $sql = "SELECT descricao, valor, dataRealizada, tipo.nome, realizar_login.nome
        FROM dado
        INNER JOIN tipo
            ON tipo_id = id_tipo
        INNER JOIN realizar_login
            ON login_id = id_login
        WHERE descricao LIKE :descr OR realizar_login.nome LIKE :nome OR tipo.nome LIKE :nomeTipo";

        $params = [
            "descr" => "%$pesquisar%",
            "nome" => "%$pesquisar%",
            ":nomeTipo" => "%$pesquisar%"
        ];
        $stmt = $connection->prepare($sql);
        $stmt->execute($params);
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="container">
        <form action="" method="post">
            <div id="formulario">
                <h2>Histórico || Zamineli</h2>

                <div class="row">
                    <div class="col">
                        <label for="pesquisa" class="form-label">Pesquisar</label>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" id="pesquisa" name="pesquisa" placeholder="Pesquise algum dado específico">
                            <button type="submit" class="btn btn-outline-success">Pesquisar</button>
                            <a href="historico.php" class="btn btn-outline-danger">Limpar</a>
                        </div>
                    </div>
                </div>

                <?php 
                    if(count($dados) > 0){ ?>
                        <table class="table table-striped table-hover table-border mt-3">
                            <thead class="table-dark">
                                <tr>
                                    <th class="text-center">Descrição </th>
                                    <th class="text-center">Valor </th>
                                    <th class="text-center">Data Realizada </th>
                                    <th class="text-center">Tipo </th>
                                    <th class="text-center">Nome </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach($dados as $dado) { ?>
                                    <tr>
                                        <td class="text-center"><?= $dado['descricao'] ?></td>
                                        <td class="text-center"><?= $dado['valor'] ?></td>
                                        <td class="text-center"><?= date_format( new DateTime($dado['dataRealizada']), "d/m/Y") ?></td>
                                        <td class="text-center"><?= $dado['nome'] ?></td>
                                        <td class="text-center"><?= $dado['nome'] ?></td>
                                    </tr>
                                <?php
                                    }
                                    ?>
                            </tbody>
                        </table>
                    <?php
                        } else {
                            echo"<div class='alert alert-warning my-3 text-center fw-bold'> Nenhum registro foi encontrado... </div>";
                        }
                    ?>
            </div>
        </form>
    </div>
</body>
</html>