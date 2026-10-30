<?php
// atualizar-produto.php
include("conexao.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $nome = $conexao->real_escape_string($_POST['nome']);
    $marca = $conexao->real_escape_string($_POST['marca']);
    $preco = floatval($_POST['preco']);
    $ml = $conexao->real_escape_string($_POST['ml']);
    $quantidade = intval($_POST['quantidade']);
    $descricao = $conexao->real_escape_string($_POST['descricao']);

    // Comando SQL calibrado perfeitamente com a sua tabela real do phpMyAdmin
    $sql = "UPDATE produtos SET 
            nome = '$nome', 
            marca = '$marca', 
            preco = '$preco', 
            ml = '$ml',
            quantidade = '$quantidade',
            descricao = '$descricao' 
            WHERE id = $id";

    if ($conexao->query($sql) === TRUE) {
        echo "<script>
                alert('Perfume atualizado com sucesso!');
                window.location.href = 'listar-produtos.php';
              </script>";
    } else {
        echo "Erro ao atualizar os dados: " . $conexao->error;
    }
} else {
    header("Location: listar-produtos.php");
}

$conexao->close();
?>
