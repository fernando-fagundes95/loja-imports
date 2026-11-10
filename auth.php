<?php
session_start();

// Defina aqui a sua senha de acesso ao painel
$senha_correta = 'Bella2026!';

// Faz logout se você clicar em "Sair"
if (isset($_GET['sair'])) {
    session_destroy();
    header('Location: admin.php');
    exit;
}

// Verifica a senha digitada no formulário
$erro = '';
if (isset($_POST['senha_admin'])) {
    if ($_POST['senha_admin'] === $senha_correta) {
        $_SESSION['admin_logado'] = true;
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    } else {
        $erro = 'Senha incorreta. Tente novamente.';
    }
}

// Se não estiver logado, bloqueia a página e mostra a tela de login
if (empty($_SESSION['admin_logado'])) {
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso Restrito | Bella Fagundes Imports</title>
    <style>
        body {
            margin: 0;
            font-family: 'Montserrat', Arial, sans-serif;
            background-color: #f8ecee;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            background: #ffffff;
            padding: 35px 30px;
            border-radius: 14px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 340px;
            text-align: center;
        }
        .login-box h2 {
            color: #5c3a42;
            margin-top: 0;
            font-size: 20px;
        }
        .login-box input {
            width: 100%;
            padding: 12px;
            margin: 15px 0;
            border: 1px solid #d9b8bf;
            border-radius: 8px;
            font-size: 15px;
            box-sizing: border-box;
        }
        .login-box button {
            width: 100%;
            padding: 12px;
            background-color: #b57e8a;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }
        .login-box button:hover {
            background-color: #9c6672;
        }
        .erro {
            color: #c0392b;
            font-size: 13px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Área Administrativa</h2>
        <p style="color:#777; font-size:13px;">Digite sua senha para gerenciar os produtos</p>
        <?php if ($erro) echo "<div class='erro'>$erro</div>"; ?>
        <form method="POST">
            <input type="password" name="senha_admin" placeholder="Sua senha" required autofocus>
            <button type="submit">Entrar no Painel</button>
        </form>
    </div>
</body>
</html>
<?php
    exit; // Impede o restante do admin.php de carregar sem senha
}
?>
