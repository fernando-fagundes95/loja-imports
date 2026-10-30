<?php
// listar-produtos.php
include("conexao.php");

// Puxa todos os produtos do banco de dados, mostrando os mais recentes primeiro
$sql = "SELECT * FROM produtos ORDER BY id DESC";
$resultado = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Produtos - Bella Fagundes</title>
    <link href="https://googleapis.com" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #fcf6f7;
            color: #40343a;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
        }
        h2 {
            text-align: center;
            color: #49343d;
            margin-bottom: 25px;
        }
        .btn-voltar {
            display: inline-block;
            background-color: #b77b8e;
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 20px;
        }
        /* Estilo da lista adaptada para Celular */
        .item-produto {
            display: flex;
            align-items: center;
            background: white;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.03);
            border: 1px solid #f0e1e4;
        }
        .item-produto img {
            width: 60px;
            height: 60px;
            object-fit: contain;
            border-radius: 6px;
            margin-right: 15px;
            background-color: #f9f9f9;
        }
        .info-produto {
            flex: 1;
        }
        .info-produto h3 {
            margin: 0 0 5px 0;
            font-size: 16px;
            color: #49343d;
        }
        .info-produto p {
            margin: 0;
            font-size: 14px;
            color: #b77b8e;
            font-weight: 600;
        }
        .btn-excluir {
            background-color: #d9534f;
            color: white;
            text-decoration: none;
            padding: 10px 14px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            transition: background 0.2s;
        }
        .btn-excluir:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>

<div class="container">
    <a href="admin.php" class="btn-voltar">← Voltar ao Cadastro</a>
    <h2>Gerenciar Perfumes</h2>

    <?php if ($resultado->num_rows > 0): ?>
        <?php while($produto = $resultado->fetch_assoc()): ?>
            <div class="item-produto">
                <!-- Mostra a miniatura do perfume -->
                <img src="IMG-Bellafagundes/<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['nome']; ?>">
                
                <div class="info-produto">
                    <h3><?php echo $produto['nome']; ?></h3>
                    <p>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></p>
                </div>

                <!-- Botão Editar -->
        <a href="editar-produto.php?id=<?php echo $produto['id']; ?>" class="btn-editar" style="background-color: #f0ad4e; color: white; text-decoration: none; padding: 10px 14px; border-radius: 8px; font-size: 13px; font-weight: 600; margin-right: 5px; display: inline-block; margin-bottom: 5px;">
           Editar
        </a>
                <!-- Botão que passa o ID do produto para o arquivo de exclusão -->
                <a href="excluir-produto.php?id=<?php echo $produto['id']; ?>" 
                   class="btn-excluir" 
                   onclick="return confirm('Tem certeza que deseja apagar o perfume <?php echo $produto['nome']; ?>?');">
                   Excluir
                </a>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p style="text-align:center; color:#827078;">Nenhum perfume cadastrado ainda.</p>
    <?php endif; ?>
</div>

</body>
</html>
