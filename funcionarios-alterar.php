<<<<<<< HEAD
<?php 
include_once("connection.php");

session_start(); 
include("protect.php");

if (!empty($_GET["idFuncionario"])) {
    $id = $_GET["idFuncionario"];  

    $sqlSelect = "SELECT * FROM funcionario WHERE idFuncionario = '$id'";
    
    $result = $conn->query($sqlSelect); 

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) { 
            $id = $row["idFuncionario"];
            $nome = $row["nome"];
            $trabalho = $row["idTrabalho"];
        }
    } else {
        header("Location: funcionarios.php"); 
        exit();
    }
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
                    <li><a href="menu.html"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="clientes.html"><i class="fas fa-users"></i> Clientes <span class="badge">6</span></a></li>
                    <li class="active"><a href="funcionarios.html"><i class="fas fa-user-tie"></i> Funcionários</a></li>
                    <li><a href="trabalhos.html"><i class="fas fa-briefcase"></i> Trabalhos</a></li>
                    <li><a href="municipios.html"><i class="fas fa-city"></i> Municípios</a></li>
                    <li><a href="projetos.html"><i class="fas fa-project-diagram"></i> Projetos</a></li>
                    <li><a href="beneficios.html"><i class="fas fa-gift"></i> Benefícios</a></li>
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
                <a href="funcionarios.php" class="back-button"><i class="fas fa-arrow-left"></i></a>
                <div class="form-container">
                    <form id="client-form" action="saveEditFuncionarios.php" method="POST">
                        
                        <div class="intro-content">
                            <div class="intro-text">
                                <h1>Alterar Funcionários</h1>
                                <p>Altere ou exclua os funcionários a seguir:</p>
                            </div>

                            <div class="table-buttons">
                                <a href="deleteFuncionarios.php?id=<?php echo $id; ?>" id="submit-a" 
                                onclick="return confirm('Tem certeza de que deseja excluir este funcionário?');">
                                <i class="fas fa-trash"></i> Excluir
                                </a>

                                <button id="submit-button"type="submit" name="update" class="styled-button">
                                    <i class="fas fa-save"></i> Salvar
                                </button>   
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group label-full-width spacing">
                                <label for="name">Nome do funcionário</label>
                                <input type="text" id="name" name="name" placeholder="Nome" value="<?php echo htmlspecialchars($nome); ?>" required>
                            </div>
                            <div class="form-group label-small">
                                <label for="trabalho">Id do trabalho</label>
                                <input type="number" id="trabalho" name="trabalho" placeholder="Id" value="<?php echo htmlspecialchars($trabalho); ?>" required>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                    </form>
                </div>
            </section>

        </main>
    </div>

</body>
</html>
=======
<?php 
include_once("connection.php");

session_start(); 
include("protect.php");

if (!empty($_GET["idFuncionario"])) {
    $id = $_GET["idFuncionario"];  

    $sqlSelect = "SELECT * FROM funcionario WHERE idFuncionario = '$id'";
    
    $result = $conn->query($sqlSelect); 

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) { 
            $id = $row["idFuncionario"];
            $nome = $row["nome"];
            $trabalho = $row["idTrabalho"];
        }
    } else {
        header("Location: funcionarios.php"); 
        exit();
    }
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
                    <li><a href="menu.html"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="clientes.html"><i class="fas fa-users"></i> Clientes <span class="badge">6</span></a></li>
                    <li class="active"><a href="funcionarios.html"><i class="fas fa-user-tie"></i> Funcionários</a></li>
                    <li><a href="trabalhos.html"><i class="fas fa-briefcase"></i> Trabalhos</a></li>
                    <li><a href="municipios.html"><i class="fas fa-city"></i> Municípios</a></li>
                    <li><a href="projetos.html"><i class="fas fa-project-diagram"></i> Projetos</a></li>
                    <li><a href="beneficios.html"><i class="fas fa-gift"></i> Benefícios</a></li>
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
                <a href="funcionarios.php" class="back-button"><i class="fas fa-arrow-left"></i></a>
                <div class="form-container">
                    <form id="client-form" action="saveEditFuncionarios.php" method="POST">
                        
                        <div class="intro-content">
                            <div class="intro-text">
                                <h1>Alterar Funcionários</h1>
                                <p>Altere ou exclua os funcionários a seguir:</p>
                            </div>

                            <div class="table-buttons">
                                <a href="deleteFuncionarios.php?id=<?php echo $id; ?>" id="submit-a" 
                                onclick="return confirm('Tem certeza de que deseja excluir este funcionário?');">
                                <i class="fas fa-trash"></i> Excluir
                                </a>

                                <button id="submit-button"type="submit" name="update" class="styled-button">
                                    <i class="fas fa-save"></i> Salvar
                                </button>   
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group label-full-width spacing">
                                <label for="name">Nome do funcionário</label>
                                <input type="text" id="name" name="name" placeholder="Nome" value="<?php echo htmlspecialchars($nome); ?>" required>
                            </div>
                            <div class="form-group label-small">
                                <label for="trabalho">Id do trabalho</label>
                                <input type="number" id="trabalho" name="trabalho" placeholder="Id" value="<?php echo htmlspecialchars($trabalho); ?>" required>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                    </form>
                </div>
            </section>

        </main>
    </div>

</body>
</html>
>>>>>>> 2f67f0f75546b65789bb4439b8d834cd7ebc97c6
