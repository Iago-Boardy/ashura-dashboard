<?php
session_start(); 
include("protect.php");

if (isset($_POST["submit"])) {

    include_once("connection.php");

    $id_funcionario = $_POST["name"];
    $id_projeto = $_POST["trabalho"];
   

    $stmt = $conn->prepare("INSERT INTO beneficio (idFuncionario, idProjeto) VALUES (?, ?)");
    $stmt->bind_param("si", $id_funcionario, $id_projeto);
    $result = $stmt->execute();

    if ($result) {
        header("Location: beneficios.php");
    } else {
        $error_message = "Ocorreu um erro ao criar a conta: " . $conn->error;
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Dashboard</title>
    <link rel="stylesheet" href="styles/clientes-adicionar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <div class="brand">
                <h2>Ashura <i class="fas fa-building"></i></h2>
            </div>
            <nav>
                <ul>
                    <li><a href="menu.php"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="clientes.php"><i class="fas fa-users"></i> Clientes <span class="badge">6</span></a></li>
                    <li><a href="funcionarios.php"><i class="fas fa-user-tie"></i> Funcionários</a></li>
                    <li><a href="trabalhos.php"><i class="fas fa-briefcase"></i> Trabalhos</a></li>
                    <li><a href="municipios.php"><i class="fas fa-city"></i> Municípios</a></li>
                    <li><a href="projetos.php"><i class="fas fa-project-diagram"></i> Projetos</a></li>
                    <li  class="active"><a href="beneficios.php"><i class="fas fa-gift"></i> Benefícios</a></li>
                </ul>
            </nav>
            <div class="spacer"></div>
            <div class="upgrade">
                <a target="_blank" href="https://github.com/Iago-Boardy"><button>My Github</button></a>
            </div>
        </aside>
        <main class="main-content">
            <header class="header">
                <input type="text" placeholder="Search...">
                <div class="dropdown">
                    <button class="dropbtn"><i class="fas fa-user"></i> </button>
                    <div class="dropdown-content">
                        <a href="usuario.html"><i class="fas fa-cog"></i>Configurações</a>
                        <a href="index.html"><i class="fas fa-sign-out-alt"></i>Sair</a>
                    </div>
                </div>
            </header>

            <section class="section-1">
                <a href="beneficios.php" class="back-button"><i class="fas fa-arrow-left"></i></a>
                <div class="form-container">
                    <form id="client-form" action="beneficios-adicionar.php" method="POST">

                        <div class="intro-content">
                            <div class="intro-text">
                                <h1>Adicionar Benefícios</h1>
                                <p>O nome do projeto e funcionario são puxados pelo ID. Insira as informações necessárias para adicionar um benefício novo:</p>
                            </div>
                            
                            <div class="table-buttons">
                                <button id="clear-button" type="button"><i class="fas fa-eraser"></i> Limpar</button>
                                <button id="submit-button" type="submit" name="submit"><i class="fa fa-plus-circle"></i> Adicionar</button>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group label-full-width spacing">
                                <label for="name">Id funcionário</label>
                                <input type="number" id="name" name="name" placeholder="Id" required>
                            </div>
                            <div class="form-group label-small">
                                <label for="trabalho">Id do projeto</label>
                                <input type="number" id="trabalho" name="trabalho" placeholder="Id" required>
                            </div>
                        </div>

                    </form>
                </div>
            </section>

        </main>
    </div>

    <script>
        document.getElementById('submit-button').addEventListener('click', function() {
            document.getElementById('client-form').submit();
        });

        document.getElementById('clear-button').addEventListener('click', function() {
            document.getElementById('client-form').reset();
        });
    </script>
</body>
</html>
