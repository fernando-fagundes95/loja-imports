<?php
// Inclui a conexão existente sem alterar nada nela
include("conexao.php");

// Busca os produtos usando a sua variável padrão $conexao
$sql = "SELECT * FROM produtos ORDER BY id DESC";
$query = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Perfumes</title>
    <style>
        .painel-gerenciar {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
            font-family: sans-serif;
        }
        .btn-voltar {
            background-color: #d1a7a7;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 30px;
        }
        .titulo-gerenciar {
            text-align: center;
            color: #333;
            margin-bottom: 40px;
            font-size: 24px;
        }
        .linha-produto {
            display: flex;
            align-items: center;
            background: #fff;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        .foto-produto {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 4px;
            margin-right: 20px;
        }
        .info-produto {
            flex: 1;
        }
        .nome-prod {
            font-weight: bold;
            color: #444;
            font-size: 16px;
            margin-bottom: 5px;
        }
        .preco-prod {
            color: #a87d7d;
            font-size: 14px;
        }
        .acoes {
            display: flex;
            gap: 10px;
        }
        .btn-editar {
            background-color: #f0ad4e;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
        }
        .btn-excluir {
            background-color: #d9534f;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body style="background-color: #fdfbfb;">

    <div class="painel-gerenciar">
        <a href="admin.php" class="btn-voltar">← Voltar ao Cadastro</a>

        <h1 class="titulo-gerenciar">Gerenciar Perfumes</h1>

        <?php 
        if(mysqli_num_rows($query) == 0) {
            echo "<p style='text-align:center;'>Nenhum perfume cadastrado ainda.</p>";
        } else {
            while($produto = mysqli_fetch_assoc($query)) { 
        ?>
            <div class="linha-produto">
                <!-- Puxa direto da sua pasta mapeada -->
                <img src="IMG-Bellafagundes/<?php echo $produto['imagem']; ?>" alt="Foto" class="foto-produto">
                
                <div class="info-produto">
                    <div class="nome-prod"><?php echo $produto['nome']; ?></div>
                    <div class="preco-prod">R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></div>
                </div>
                
                <div class="acoes">
                    <a href="editar-produto.php?id=<?php echo $produto['id']; ?>" class="btn-editar">Editar</a>
                    <a href="excluir-produto.php?id=<?php echo $produto['id']; ?>" class="btn-excluir" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                </div>
            </div>
        <?php 
            } 
        }
        ?>
    </div>

</body>
</html>
