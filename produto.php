<?php
include("conexao.php");

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conexao, $_GET['id']);
    $sql = "SELECT * FROM produtos WHERE id = '$id'";
    $resultado = mysqli_query($conexao, $sql);
    $produto = mysqli_fetch_assoc($resultado);
    
    if (!$produto) {
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $produto['nome']; ?> - Bella Fagundes Imports</title>
    <link rel="stylesheet" href="style.css?v=5">
    <style>
        .container-detalhes { max-width: 1000px; margin: 50px auto; padding: 20px; display: flex; gap: 40px; background: #fff; border-radius: 8px; }
        .foto-produto img { max-width: 400px; width: 100%; border-radius: 4px; }
        .info-produto { flex: 1; }
        .info-produto h1 { font-size: 28px; margin-bottom: 5px; color: #333; }
        .marca-sub { color: #bfa37c; font-weight: bold; text-transform: uppercase; margin-bottom: 20px; }
        .preco-detalhe { font-size: 26px; color: #333; font-weight: bold; margin: 20px 0; }
        .descricao-longa { line-height: 1.6; color: #666; margin-bottom: 30px; }
        .btn-whats-detalhe { display: inline-block; background-color: #bfa37c; color: white; padding: 15px 30px; text-decoration: none; font-weight: bold; border-radius: 4px; text-align: center; }
    </style>
</head>
<body>
    <div style="max-width: 1000px; margin: 20px auto; padding: 0 20px;">
        <a href="index.php" style="color: #666; text-decoration: none;">← Voltar para o catálogo</a>
    </div>
    <main class="container-detalhes">
        <div class="foto-produto">
            <img src="IMG-Bellafagundes/<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['nome']; ?>">
        </div>
        <div class="info-produto">
            <h1><?php echo $produto['nome']; ?> (<?php echo $produto['ml']; ?>ml)</h1>
            <p class="marca-sub"><?php echo $produto['marca']; ?> | <?php echo $produto['categoria']; ?></p>
            <p class="descricao-longa"><?php echo $produto['descricao']; ?></p>
            <p class="preco-detalhe">R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></p>
            <p style="color: #999; margin-bottom: 20px;">Estoque: <?php echo $produto['quantidade']; ?> un</p>
            
            <a href="https://wa.me/5543984381586?text=<?php echo urlencode($produto['nome']); ?>" target="_blank" class="btn-whats-detalhe">
                Quero Comprar pelo WhatsApp
            </a>
        </div>
    </main>
</body>
</html>
