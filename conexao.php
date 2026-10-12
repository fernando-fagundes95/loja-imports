<?php
$servidor = "localhost";
$usuario = "root";
$senha = ""; // Apague o texto e deixe as aspas vazias
$banco = "bellafagundes-imports";
$porta = 3307; // Porta que o seu MySQL está usando

// Criando a conexão com o banco de dados
$conexao = new mysqli($servidor, $usuario, $senha, $banco, $porta);

// Verificando se deu algum erro
if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}

// Configurando para aceitar acentos do português e caracteres árabes
$conexao->set_charset("utf8mb4");
