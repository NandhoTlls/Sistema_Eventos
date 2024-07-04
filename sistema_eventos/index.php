<?php
    // Inclui o arquivo de conexão com o banco de dados
    include_once "Controller/conexao2.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project</title>
    <!-- Inclui o CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/estilo.css"> <!-- Inclui o CSS personalizado -->
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Sistema de Registros de Eventos</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <img src="Imagens/eventos.jpg" alt="eventos" class="img-eventos"> <!-- Exibe a imagem de eventos -->
            </div>
            <div class="col-8">
                <form method="GET" action="Controller/salvar2.php">
                    <!-- Campos do formulário para inserção de dados -->
                    <div class="mt-3 form-floating">
                        <input type="text" class="form-control" id="Eventos" name="Eventos" value="<?php echo filter_input(INPUT_GET, "evento", FILTER_SANITIZE_SPECIAL_CHARS);?>">
                        <label for="Eventos" class="form-label">Eventos</label>
                    </div>
                    <div class="mt-3 form-floating">
                        <input type="text" class="form-control" id="Organizador" name="Organizador" value="<?php echo filter_input(INPUT_GET, "organizador", FILTER_SANITIZE_SPECIAL_CHARS);?>">
                        <label for="Organizador" class="form-label">Organizador</label>
                    </div>
                    <div class="mt-3 form-floating">
                        <input type="text" class="form-control" id="Local" name="Local" value="<?php echo filter_input(INPUT_GET, "local", FILTER_SANITIZE_SPECIAL_CHARS);?>">
                        <label for="Local" class="form-label">Local</label>
                    </div>
                    <div class="mt-3 form-floating">
                        <input type="text" class="form-control" id="Data" name="Data" value="<?php echo filter_input(INPUT_GET, "data", FILTER_SANITIZE_SPECIAL_CHARS);?>"> 
                        <label for="Data" class="form-label">Data</label>
                    </div>
                    <div class="mt-3 form-floating">
                        <input type="text" class="form-control" id="Descricao" name="Descricao" value="<?php echo filter_input(INPUT_GET, "descricao", FILTER_SANITIZE_SPECIAL_CHARS);?>">
                        <label for="Descricao" class="form-label">Descrição</label>
                    </div>
                    <div class="mt-3 form-floating">
                        <!-- Botões de ação dentro do formulário -->
                        <div class="row">
                            <div class="col">
                                <!-- Botão para limpar o formulário -->
                                <a href="index.php">
                                    <button type="button" class="btn btn-primary form-control botaoNovo">Novo</button>
                                </a>
                            </div>
                            <div class="col">
                                <!-- Botão para enviar os dados do formulário -->
                                <button type="submit" class="btn btn-primary form-control botaoSalvar">Salvar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Eventos Cadastrados</h2> <!-- Título para a tabela de eventos cadastrados -->
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-light table-hover">
                    <thead>
                        <!-- Cabeçalho da tabela -->
                        <tr>
                            <th>Eventos</th>
                            <th>Organizador</th>
                            <th>Local</th>
                            <th>Data</th>
                            <th>Descrição</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php 
                            // Consulta SQL para selecionar todos os eventos
                            $sql = "Select * from eventos";
                            // Executa a consulta
                            $pesquisar = mysqli_query($conn, $sql);
                            // Loop para exibir os dados na tabela
                            while ($linha = $pesquisar->fetch_assoc()) {
                                echo " <tr>                                       
                                            <td>".$linha['evento']."</td>
                                            <td>".$linha['organizador']."</td>
                                            <td>".$linha['local']."</td>
                                            <td>".$linha['data_evento']."</td>
                                            <td>".$linha['descricao']."</td>
                                            <td>
                                                <!-- Link para editar um evento específico -->
                                                <a href='?
                                                    evento=".$linha['evento']."&
                                                    organizador=".$linha['organizador']."&
                                                    local=".$linha['local']."&
                                                    data=".$linha['data_evento']."&
                                                    descricao=".$linha['descricao']."'>                     
                                                    <img src='Imagens/editar2.png' class='imgTabela'>
                                                </a>
                                            </td>
                                            <td>
                                                <!-- Link para excluir um evento específico -->
                                                <a href='Controller/excluir.php?codigo=".$linha['evento']."'>
                                                    <img src='Imagens/excluir2.png' class='imgTabela'>
                                                </a>
                                            </td>
                                        </tr>";
                            }                                                                          
                       ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Inclui o JavaScript do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
