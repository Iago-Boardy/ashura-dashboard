<?php
session_start(); 
include("protect.php");

if (isset($_POST["submit"])) {

    include_once("connection.php");

    $nome = $_POST["name"];
    $idade = $_POST["idade"];
    $logadouro = $_POST["logadouro"];
    $complemento = $_POST["complemento"];
    $bairro = $_POST["bairro"];
    $cep = $_POST["cep"];
    $cidade = $_POST["cidade"];
    $uf = $_POST["uf"];
    $email = $_POST["email"];

    $stmt = $conn->prepare("INSERT INTO clientes (nome, idade, logadouro, complemento, bairro, cep, cidade, uf, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sisssssss", $nome, $idade, $logadouro, $complemento, $bairro, $cep, $cidade, $uf, $email);
    $result = $stmt->execute();

    if ($result) {
        header("Location: clientes.php");
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
                    <li class="active"><a href="clientes.php"><i class="fas fa-users"></i> Clientes <span class="badge">6</span></a></li>
                    <li><a href="funcionarios.php"><i class="fas fa-user-tie"></i> Funcionários</a></li>
                    <li><a href="trabalhos.php"><i class="fas fa-briefcase"></i> Trabalhos</a></li>
                    <li><a href="municipios.php"><i class="fas fa-city"></i> Municípios</a></li>
                    <li><a href="projetos.php"><i class="fas fa-project-diagram"></i> Projetos</a></li>
                    <li><a href="beneficios.php"><i class="fas fa-gift"></i> Benefícios</a></li>
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
                        <a href="usuario.php"><i class="fas fa-cog"></i>Configurações</a>
                        <a href="index.php"><i class="fas fa-sign-out-alt"></i>Sair</a>
                    </div>
                </div>
            </header>

            <section class="section-1">
                <a href="clientes.php" class="back-button"><i class="fas fa-arrow-left"></i></a>
                <div class="form-container">
                    <form id="client-form" action="clientes-adicionar.php" method="POST">

                        <div class="intro-content">
                            <div class="intro-text">
                                <h1>Adicionar Clientes</h1>
                                <p>Insira as informações necessárias para adicionar um cliente novo:</p>
                            </div>
                            
                            <div class="table-buttons">
                                <button id="clear-button" type="button"><i class="fas fa-eraser"></i> Limpar</button>
                                <button id="submit-button" type="submit" name="submit"><i class="fa fa-plus-circle"></i> Adicionar</button>
                            </div>
                        </div>
                                  
                        <div class="form-row">
                            <div class="form-group label-full-width spacing">
                                <label for="name">Nome</label>
                                <input type="text" id="name" name="name" placeholder="Nome" required>
                            </div>
                            <div class="form-group label-small">
                                <label for="idade">Idade</label>
                                <input type="number" id="idade" name="idade" placeholder="Idade" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group input-full-width">
                                <label for="logadouro">Logadouro</label>
                                <input type="text" id="logadouro" name="logadouro" placeholder="Logadouro" required>
                            </div>
                            <div class="form-group input-full-width">
                                <label for="complemento">Complemento</label>
                                <input type="text" id="complemento" name="complemento" placeholder="Complemento">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group input-full-width">
                                <label for="bairro">Bairro</label>
                                <input type="text" id="bairro" name="bairro" placeholder="Bairro" required>
                            </div>
                            <div class="form-group input-full-width">
                                <label for="cep">CEP</label>
                                <input type="text" id="cep" name="cep" placeholder="CEP" required>
                            </div>
                            <div class="form-group input-full-width">
                                <label for="cidade">Cidade</label>
                                <input type="text" id="cidade" name="cidade" placeholder="Cidade" required>
                            </div>
                            <div class="form-group input-full-width">
                                <label for="uf">UF</label>
                                <input type="text" id="uf" name="uf" placeholder="UF" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group input-full-width">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" placeholder="Email" required>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </section>
        </main>
    </div>

    <div id="error-message" class="error-message <?php if($error_message) echo 'show'; ?>">
        <?php echo htmlspecialchars($error_message); ?>
    </div>

    <div id="good-message" class="good-message <?php if($good_message) echo 'show'; ?>">
        <?php echo htmlspecialchars($good_message); ?>
    </div>

    <script>
        document.getElementById('clear-button').addEventListener('click', function() {
            document.getElementById('client-form').reset();
        });
    </script>
</body>
</html>