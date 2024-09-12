<?php 
include_once("connection.php");

session_start(); 
include("protect.php");

if (!empty($_GET["idBeneficio"])) {
    $id = $_GET["idBeneficio"];  

    $sqlSelect = "SELECT * FROM beneficio WHERE idBeneficio = '$id'";
    
    $result = $conn->query($sqlSelect); 

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) { 
            $id = $row["idBeneficio"];
            $id_funcionario = $row["idFuncionario"];
            $id_projeto = $row["idProjeto"];
        }
    } else {
        header("Location: beneficios.php"); 
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
                    <li><a href="menu.php"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="clientes.php"><i class="fas fa-users"></i> Clientes <span class="badge">6</span></a></li>
                    <li><a href="funcionarios.php"><i class="fas fa-user-tie"></i> Funcionários</a></li>
                    <li><a href="trabalhos.php"><i class="fas fa-briefcase"></i> Trabalhos</a></li>
                    <li><a href="municipios.php"><i class="fas fa-city"></i> Municípios</a></li>
                    <li><a href="projetos.php"><i class="fas fa-project-diagram"></i> Projetos</a></li>
                    <li class="active"><a href="beneficios.php"><i class="fas fa-gift"></i> Benefícios</a></li>
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
                    <form id="client-form" action="saveEditBeneficios.php" method="POST">
                        
                        <div class="intro-content">
                            <div class="intro-text">
                                <h1>Alterar Benefícios</h1>
                                <p>Altere ou exclua os benefícios a seguir:</p>
                            </div>

                            <div class="table-buttons">
                                <a href="deleteBeneficio.php?id=<?php echo $id; ?>" id="submit-a" 
                                onclick="return confirm('Tem certeza de que deseja excluir este benefício?');">
                                <i class="fas fa-trash"></i> Excluir
                                </a>

                                <button id="submit-button" type="submit" name="update" class="styled-button">
                                    <i class="fas fa-save"></i> Salvar
                                </button>   
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group label-full-width spacing">
                                <label for="id_funcionario">Id Funcionário</label>
                                <input type="number" id="id_funcionario" name="id_funcionario" placeholder="Id do Funcionário" value="<?php echo htmlspecialchars($id_funcionario); ?>" required>
                            </div>
                            <div class="form-group label-small">
                                <label for="id_projeto">Id do Benefício</label>
                                <input type="number" id="id_projeto" name="id_projeto" placeholder="Id do Projeto" value="<?php echo htmlspecialchars($id_projeto); ?>" required>
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
