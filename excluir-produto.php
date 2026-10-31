<?php
// Inclui a conexão com o banco de dados
include("conexao.php");

// Pega o ID enviado pela URL
if(isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Deleta o produto do banco de dados
    $sql = "DELETE FROM produtos WHERE id = '$id'";
    $query = mysqli_query($conexao, $sql);

    if($query) {
        // Redireciona de volta para a lista se der certo
        header("Location: listar-produtos.php");
        exit;
    } else {
        echo "Erro ao excluir o produto.";
    }
} else {
    echo "ID do produto não foi informado.";
}
?>
