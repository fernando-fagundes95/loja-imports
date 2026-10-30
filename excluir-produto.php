<?php
// excluir-produto.php
include("conexao.php");

// Verifica se recebeu o ID do produto pela URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // 1. Buscar o caminho da foto antes de deletar o registro
    $sql_foto = "SELECT foto FROM produtos WHERE id = $id";
    $res_foto = $conexao->query($sql_foto);
    
    if ($res_foto->num_rows > 0) {
        $produto = $res_foto->fetch_assoc();
        $caminho_foto = $produto['foto'];
        
        // Se o arquivo da foto existir na pasta, apaga ele do servidor
        if (file_exists($caminho_foto)) {
            unlink($caminho_foto);
        }
    }

    // 2. Deleta o produto do banco de dados
    $sql_deletar = "DELETE FROM produtos WHERE id = $id";
    
    if ($conexao->query($sql_deletar) === TRUE) {
        echo "<script>
                alert('Perfume excluído com sucesso!');
                window.location.href = 'listar-produtos.php';
              </script>";
    } else {
        echo "Erro ao excluir o produto: " . $conexao->error;
    }
} else {
    // Se tentarem acessar a página sem passar um ID, joga de volta para a lista
    header("Location: listar-produtos.php");
}

$conexao->close();
?>
