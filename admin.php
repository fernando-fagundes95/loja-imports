<?php
// Inclui a sua conexão com o banco de dados
include("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Admin - Cadastro de Perfumes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 500px;
            margin: 30px auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #bfa37c;
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #333;
            display: block;
            margin-top: 10px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            height: 80px;
            resize: none;
        }

        .btn-cadastrar {
            background-color: #bfa37c;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            font-size: 16px;
            font-weight: bold;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
            transition: background 0.3s;
        }

        .btn-cadastrar:hover {
            background-color: #9e835c;
        }

        .link-voltar {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #666;
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Cadastrar Novo Perfume</h2>

        <!-- O enctype="multipart/form-data" é OBRIGATÓRIO para o formulário aceitar envio de fotos -->
        <form action="salvar-produto.php" method="POST" enctype="multipart/form-data">

            <label>Nome do Perfume:</label>
            <input type="text" name="nome" placeholder="Ex: Only The Brave" required>

            <label>Marca:</label>
            <input type="text" name="marca" placeholder="Ex: Diesel" required>

            <label>Tamanho (ml):</label>
            <input type="number" name="ml" placeholder="Ex: 125" required>

            <label>Preço (R$):</label>
            <input type="number" step="0.01" name="preco" placeholder="Ex: 450.00" required>

            <label>Quantidade em Estoque:</label>
            <input type="number" name="quantidade" placeholder="Ex: 10" required>

            <label>Categoria:</label>
            <select name="categoria" required>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
            </select>


            <label>Produto em Promoção?</label>
            <select name="promocao">
                <option value="0">Não (Produto Normal)</option>
                <option value="1">Sim (Ir para o final da página)</option>
            </select>

            <label>Descrição do Perfume:</label>
            <textarea name="descricao" placeholder="Escreva os detalhes e notas do perfume..." required></textarea>

            <label>Foto do Perfume:</label>
            <input type="file" name="imagem" accept="image/*" required>

            <button type="submit" class="btn-cadastrar">Cadastrar na Loja</button>
        </form>

        <a href="index.php" class="link-voltar">← Voltar para a Loja</a>
    </div>

</body>

</html>