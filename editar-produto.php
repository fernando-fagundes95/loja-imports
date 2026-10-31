<?php
include("conexao.php");

// Pega o ID do produto para carregar os dados atuais
if(isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM produtos WHERE id = '$id'";
    $query = mysqli_query($conexao, $sql);
    $produto = mysqli_fetch_assoc($query);

    if(!$produto) {
        die("Produto não encontrado.");
    }
} else {
    die("ID não informado.");
}

// Código que salva as alterações se o formulário for enviado
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $marca = mysqli_real_escape_string($conexao, $_POST['marca']);
    $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);
    $ml = mysqli_real_escape_string($conexao, $_POST['ml']);
    $preco = mysqli_real_escape_string($conexao, $_POST['preco']);
    $quantidade = mysqli_real_escape_string($conexao, $_POST['quantidade']);
    $promocao = mysqli_real_escape_string($conexao, $_POST['promocao']);
    $categoria = mysqli_real_escape_string($conexao, $_POST['categoria']);

    // Atualiza os campos de texto no banco de dados
    $sql_update = "UPDATE produtos SET 
        nome='$nome', 
        marca='$marca', 
        descricao='$descricao', 
        ml='$ml', 
        preco='$preco', 
        quantidade='$quantidade', 
        promocao='$promocao', 
        categoria='$categoria' 
        WHERE id='$id'";
    
    // Se o usuário enviou uma nova foto, atualiza o campo da imagem também
    if(isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $nome_foto = $_FILES['imagem']['name'];
        move_uploaded_file($_FILES['imagem']['tmp_name'], "IMG-Bellafagundes/" . $nome_foto);
        
        $sql_update = "UPDATE produtos SET 
            nome='$nome', 
            marca='$marca', 
            descricao='$descricao', 
            ml='$ml', 
            preco='$preco', 
            quantidade='$quantidade', 
            imagem='$nome_foto', 
            promocao='$promocao', 
            categoria='$categoria' 
            WHERE id='$id'";
    }

    if(mysqli_query($conexao, $sql_update)) {
        header("Location: listar-produtos.php");
        exit;
    } else {
        echo "Erro ao atualizar produto no banco de dados.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfume - Bella Fagundes</title>
    <!-- Puxa o seu CSS global para herdar as fontes e estilos principais -->
    <link rel="stylesheet" href="style.css">
    <style>
        /* Estilização para envelopar o formulário com a identidade visual do site */
        body {
            background-image: url('img/background.jpg'); /* Se houver o fundo de mármore do admin, ajuste o caminho aqui */
            background-size: cover;
            background-attachment: fixed;
            font-family: sans-serif;
        }
        .container-editar {
            max-width: 600px;
            margin: 40px auto;
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
        .titulo-edicao {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
            font-size: 22px;
            border-bottom: 2px solid #d1a7a7;
            padding-bottom: 10px;
        }
        .form-grupo {
            margin-bottom: 15px;
        }
        .form-grupo label {
            display: block;
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
            font-size: 14px;
        }
        .campo-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 14px;
        }
        .campo-input:focus {
            border-color: #a87d7d;
            outline: none;
        }
        .linha-dupla {
            display: flex;
            gap: 15px;
        }
        .linha-dupla .form-grupo {
            flex: 1;
        }
        .btn-salvar {
            background-color: #d1a7a7;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            font-weight: bold;
            font-size: 16px;
            margin-top: 15px;
            transition: background 0.2s;
        }
        .btn-salvar:hover {
            background-color: #a87d7d;
        }
        .btn-cancelar {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #888;
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="container-editar">
    <h2 class="titulo-edicao">Editar Perfume</h2>
    
    <form action="" method="POST" enctype="multipart/form-data">
        
        <div class="form-grupo">
            <label>Nome do Produto:</label>
            <input type="text" name="nome" value="<?php echo htmlspecialchars($produto['nome']); ?>" class="campo-input" required>
        </div>

        <div class="form-grupo">
            <label>Marca:</label>
            <input type="text" name="marca" value="<?php echo htmlspecialchars($produto['marca']); ?>" class="campo-input">
        </div>

        <div class="form-grupo">
            <label>Descrição:</label>
            <textarea name="descricao" class="campo-input" rows="3"><?php echo htmlspecialchars($produto['descricao']); ?></textarea>
        </div>

        <div class="linha-dupla">
            <div class="form-grupo">
                <label>ML:</label>
                <input type="text" name="ml" value="<?php echo htmlspecialchars($produto['ml']); ?>" class="campo-input">
            </div>
            <div class="form-grupo">
                <label>Preço (R$):</label>
                <input type="text" name="preco" value="<?php echo htmlspecialchars($produto['preco']); ?>" class="campo-input" required>
            </div>
        </div>

        <div class="linha-dupla">
            <div class="form-grupo">
                <label>Quantidade em Estoque:</label>
                <input type="number" name="quantidade" value="<?php echo htmlspecialchars($produto['quantidade']); ?>" class="campo-input">
            </div>
            <div class="form-grupo">
                <label>Categoria:</label>
                <input type="text" name="categoria" value="<?php echo htmlspecialchars($produto['categoria']); ?>" class="campo-input">
            </div>
        </div>

        <div class="form-grupo">
            <label>Promoção (0 para Não / 1 para Sim):</label>
            <input type="number" name="promocao" value="<?php echo htmlspecialchars($produto['promocao']); ?>" class="campo-input" min="0" max="1">
        </div>

        <div class="form-grupo">
            <label>Foto Atual:</label><br>
            <img src="IMG-Bellafagundes/<?php echo $produto['imagem']; ?>" width="90" style="border-radius: 6px; border: 1px solid #ddd; margin-bottom: 10px;"><br>
            <label>Substituir Foto (Deixe em branco para manter a atual):</label>
            <input type="file" name="imagem" class="campo-input">
        </div>

        <button type="submit" class="btn-salvar">Salvar Alterações</button>
        <a href="listar-produtos.php" class="btn-cancelar">Cancelar e Voltar</a>
    </form>
</div>

</body>
</html>
