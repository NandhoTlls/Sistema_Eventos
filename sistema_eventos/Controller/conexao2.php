<?php
// Definição das variáveis de conexão com o banco de dados
$servername = "localhost";  // Nome do servidor MySQL
$username = "root";         // Nome de usuário do MySQL
$password = "";             // Senha do MySQL
$dbname = "sistema_eventos"; // Nome do banco de dados

// Criação da conexão utilizando o MySQLi
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se houve algum erro na conexão
if ($conn->connect_error) {
    // Caso haja erro, exibe mensagem de erro e interrompe a execução
    die("Conexão falhou: " . $conn->connect_error);
}
?>
