<?php
// editar-produto.php
include("conexao.php");

if (!isset($_GET['id'])) {
    header("Location: listar-produtos.php");
    exit;
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM produtos WHERE id = $id";
$resultado = $conexao->query($sql);

if ($resultado->num_rows == 0) {
    header("Location: listar-produtos.php");
    exit;
}

$produto = $resultado->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfume - Bella Fagundes</title>
    <link href="https://googleapis.com" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #fcf6f7;
            padding: 20px;
            color: #40343a;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border: 1px solid #f0e1e4;
        }

        h2 {
            text-align: center;
            color: #49343d;
            margin-top: 0;
        }

        label {
            font-weight: 600;
            display: block;
            margin-top: 15px;
            font-size: 14px;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #f0e1e4;
            border-radius: 8px;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        .btn-salvar {
            background-color: #b77b8e;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            margin-top: 20px;
            cursor: pointer;
        }

        .btn-cancelar {
            display: block;
            text-align: center;
            color: #827078;
            text-decoration: none;
            margin-top: 15px;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Editar Perfume</h2>

        <form action="atualizar-produto.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">

            <label>Nome do Perfume:</label>
            <input type="text" name="nome" value="<?php echo htmlspecialchars($produto['nome']); ?>" required>

            <label>Marca:</label>
            <input type="text" name="marca" value="<?php echo htmlspecialchars($produto['marca']); ?>">

            <label>Preço (R$):</label>
            <input type="number" step="0.01" name="preco" value="<?php echo $produto['preco']; ?>" required>

            <input type="text" name="ml" value="<?php echo isset($produto['ml']) ? htmlspecialchars($produto['ml']) : ''; ?>">

            <label>Quantidade em Estoque:</label>
            <input type="number" name="quantidade" value="<?php echo isset($produto['quantidade']) ? intval($produto['quantidade']) : 0; ?>" required>

            <label>Descrição:</label>
            <textarea name="descricao" rows="4"><?php echo htmlspecialchars($produto['descricao']); ?></textarea>

            <button type="submit" class="btn-salvar">Salvar Alterações</button>
            <a href="listar-produtos.php" class="btn-cancelar">Cancelar</a>
        </form>
    </div>

</body>

</html>