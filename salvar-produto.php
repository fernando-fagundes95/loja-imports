<?php
// Conecta ao banco de dados
include("conexao.php");

// Verifica se o formulário foi enviado por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Pega os dados dos campos com segurança básica
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $marca = mysqli_real_escape_string($conexao, $_POST['marca']);
    $ml = mysqli_real_escape_string($conexao, $_POST['ml']);
    $preco = mysqli_real_escape_string($conexao, $_POST['preco']);
    $quantidade = mysqli_real_escape_string($conexao, $_POST['quantidade']);
    $categoria = mysqli_real_escape_string($conexao, $_POST['categoria']);
    $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);
    $promocao = mysqli_real_escape_string($conexao, $_POST['promocao']);

    // --- PROCESSAMENTO DA IMAGEM ---
    $imagem_nome = $_FILES['imagem']['name'];
    $imagem_tmp = $_FILES['imagem']['tmp_name'];

    // Pasta onde as imagens do seu site ficam guardadas (ajuste se o nome for diferente)
    $pasta_destino = "IMG-Bellafagundes/" . $imagem_nome;

    // Move o arquivo da foto para a pasta do seu site
    if (move_uploaded_file($imagem_tmp, $pasta_destino)) {

        // Se a foto foi movida com sucesso, faz o INSERT no banco de dados
         $sql = "INSERT INTO produtos (nome, marca, ml, preco, quantidade, categoria, descricao, imagem, promocao) 
                VALUES ('$nome', '$marca', '$ml', '$preco', '$quantidade', '$categoria', '$descricao', '$imagem_nome', '$promocao')";
        if (mysqli_query($conexao, $sql)) {
            // Se deu tudo certo, exibe um aviso e volta para o formulário
            echo "<script>alert('Perfume cadastrado com sucesso!'); window.location.href='admin.php';</script>";
        } else {
            echo "Erro ao cadastrar no banco de dados: " . mysqli_error($conexao);
        }
    } else {
        echo "Erro ao fazer o upload da imagem. Verifique as permissões da pasta.";
    }
} else {
    // Se alguém tentar acessar esse arquivo direto, joga de volta para o admin
    header("Location: admin.php");
    exit;
}
