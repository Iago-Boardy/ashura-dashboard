<?php
session_start(); 
include("protect.php");

$good_message = "";
$error_message = "";

$cliente = null; // Inicializa a variável para armazenar os dados do cliente

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    include_once("connection.php");

    $sql = "SELECT * FROM clientes WHERE id = '$id";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $cliente = $result->fetch_assoc();
    } else {
        $error_message = "Cliente não encontrado!";
    }

    $stmt->close();
    $conn->close();
}

if (isset($_POST["submit"])) {
    include_once("connection.php");

    $id = $_POST["id"];
    $nome = $_POST["name"];
    $idade = $_POST["idade"];
    $logradouro = $_POST["logradouro"];
    $complemento = $_POST["complemento"];
    $bairro = $_POST["bairro"];
    $cep = $_POST["cep"];
    $cidade = $_POST["cidade"];
    $uf = $_POST["uf"];
    $email = $_POST["email"];

    $sql = "UPDATE clientes SET nome = ?, idade = ?, logradouro = ?, complemento = ?, bairro = ?, cep = ?, cidade = ?, uf = ?, email = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisssssssi", $nome, $idade, $logradouro, $complemento, $bairro, $cep, $cidade, $uf, $email, $id);
    $result = $stmt->execute();

    if ($result) {
        $good_message = "Cliente atualizado com sucesso!";
    } else {
        $error_message = "Ocorreu um erro ao atualizar o cliente: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Dashboard</title>
    <link rel="stylesheet" href="styles/clientes-alterar.css">
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
                        <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Sair</a>
                    </div>
                </div>
            </header>

            <section class="section-1">
                <a href="clientes.php" class="back-button"><i class="fas fa-arrow-left"></i></a>

                <div class="intro-content">
                    <div class="intro-text">
                        <h1>Alterar Clientes</h1>
                        <p>Altere ou exclua os clientes a seguir:</p>
                    </div>
                </div>
                
                <div class="form-container">
                    <form id="client-form" action="" method="POST">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($cliente['id'] ?? ''); ?>">
                        <div class="form-row">
                            <div class="form-group label-full-width spacing">
                                <label for="name">Nome</label>
                                <input type="text" id="name" name="name" placeholder="Nome" value="<?php echo htmlspecialchars($cliente['nome'] ?? ''); ?>" required>
                            </div>
                            <div class="form-group label-small">
                                <label for="idade">Idade</label>
                                <input type="number" id="idade" name="idade" placeholder="Idade" value="<?php echo htmlspecialchars($cliente['idade'] ?? ''); ?>" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group input-full-width">
                                <label for="logradouro">Logradouro</label>
                                <input type="text" id="logradouro" name="logradouro" placeholder="Logradouro" value="<?php echo htmlspecialchars($cliente['logradouro'] ?? ''); ?>" required>
                            </div>
                            <div class="form-group input-full-width">
                                <label for="complemento">Complemento</label>
                                <input type="text" id="complemento" name="complemento" placeholder="Complemento" value="<?php echo htmlspecialchars($cliente['complemento'] ?? ''); ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group input-full-width">
                                <label for="bairro">Bairro</label>
                                <input type="text" id="bairro" name="bairro" placeholder="Bairro" value="<?php echo htmlspecialchars($cliente['bairro'] ?? ''); ?>" required>
                            </div>
                            <div class="form-group input-full-width">
                                <label for="cep">CEP</label>
                                <input type="text" id="cep" name="cep" placeholder="CEP" value="<?php echo htmlspecialchars($cliente['cep'] ?? ''); ?>" required>
                            </div>
                            <div class="form-group input-full-width">
                                <label for="cidade">Cidade</label>
                                <input type="text" id="cidade" name="cidade" placeholder="Cidade" value="<?php echo htmlspecialchars($cliente['cidade'] ?? ''); ?>" required>
                            </div>
                            <div class="form-group input-full-width">
                                <label for="uf">UF</label>
                                <input type="text" id="uf" name="uf" placeholder="UF" value="<?php echo htmlspecialchars($cliente['uf'] ?? ''); ?>" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group input-full-width">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($cliente['email'] ?? ''); ?>" required>
                            </div>
                        </div>

                        <div class="table-buttons">
                            <button id="clear-button" type="button"><i class="fas fa-trash"></i> Excluir</button>
                            <button id="submit-button" type="submit" name="submit"><i class="fas fa-save"></i> Salvar</button>   
                        </div>
                    </form>
                </div>
                
            </section>
        </main>
    </div>
</body>
</html>
