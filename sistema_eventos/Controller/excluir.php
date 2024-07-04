<?php
// Inclui o arquivo de conexão com o banco de dados
include('conexao2.php');

// Obtém e filtra o código enviado via GET
$codigo = filter_input(INPUT_GET, "codigo", FILTER_SANITIZE_SPECIAL_CHARS);

// Verifica se o código existe
if ($codigo) {
    // Prepara a consulta SQL para deletar um evento pelo código
    $sql = "DELETE FROM eventos WHERE evento = ?";
    $stmt = $conn->prepare($sql);
    
    // Verifica se a preparação da consulta foi bem-sucedida
    if ($stmt) {
        // Liga o parâmetro da consulta ao valor filtrado do código
        $stmt->bind_param("s", $codigo);
        
        // Executa a consulta SQL
        if ($stmt->execute()) {
            // Se a exclusão for bem-sucedida, exibe um alerta e redireciona para a página inicial
            echo "
            <script>
                alert('Excluído com Sucesso!');
                window.location.href='../index.php';
            </script>
            ";
        } else {
            // Se houver erro ao executar a consulta, exibe um alerta de erro e redireciona para a página inicial
            echo "
            <script>
                alert('Erro ao Excluir!');
                window.location.href='../index.php';
            </script>
            ";
        }

        // Fecha o statement
        $stmt->close();
    } else {
        // Se houver erro ao preparar a consulta, exibe um alerta de erro e redireciona para a página inicial
        echo "
        <script>
            alert('Erro ao preparar a consulta!');
            window.location.href='../index.php';
        </script>
        ";
    }
} else {
    // Se o código não for válido, exibe um alerta e redireciona para a página inicial
    echo "
    <script>
        alert('Código inválido!');
        window.location.href='../index.php';
    </script>
    ";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
