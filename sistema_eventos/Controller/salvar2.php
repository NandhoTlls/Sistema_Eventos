<?php
// Inclui o arquivo de conexão com o banco de dados
include('../Controller/conexao2.php');

// Verifica se o método da requisição é GET
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Obtém os dados enviados via GET
    $evento = $_GET['Eventos'];
    $organizador = $_GET['Organizador'];
    $local = $_GET['Local'];
    $data_evento = $_GET['Data'];
    $descricao = $_GET['Descricao'];

    // Prepara o statement para inserir dados na tabela 'eventos'
    $stmt = $conn->prepare("INSERT INTO eventos (evento, organizador, local, data_evento, descricao) VALUES (?, ?, ?, ?, ?)");

    // Liga os parâmetros da consulta aos valores obtidos
    $stmt->bind_param("sssss", $evento, $organizador, $local, $data_evento, $descricao);

    // Executa a consulta SQL
    if ($stmt->execute()) {
        // Se a inserção for bem-sucedida, exibe um alerta e redireciona para a página inicial
        echo "
            <script>
                alert('Salvo com Sucesso');
                window.location.href='../index.php';
            </script>
        ";
    } else {
        // Se houver erro ao executar a consulta, exibe um alerta de erro e redireciona para a página inicial
        echo "
            <script>
                alert('Erro ao Salvar');
                window.location.href='../index.php';
            </script>
        "; 
    }

    // Fecha o statement
    $stmt->close();
    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>
