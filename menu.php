<<<<<<< HEAD
<?php
session_start(); 
include("protect.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Dashboard</title>
    <link rel="stylesheet" href="styles/menu.css">
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
                    <li class="active"><a href="menu.php"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="graficos.php"><i class="fas fa-chart-pie"></i> Gráficos</a></li>
                    <li><a href="clientes.php"><i class="fas fa-users"></i> Clientes <span class="badge">6</span></a></li>
                    <li><a href="funcionarios.php"><i class="fas fa-user-tie"></i> Funcionários</a></li>
                    <li><a href="trabalhos.php"><i class="fas fa-briefcase"></i> Trabalhos</a></li>
                    <li><a href="municipios.php"><i class="fas fa-city"></i> Municípios</a></li>
                    <li><a href="projetos.php"><i class="fas fa-project-diagram"></i> Projetos</a></li>
                    <li><a href="beneficios.php"><i class="fas fa-gift"></i> Benefícios</a></li>
                </ul>
            </nav>
           
            <div class="spacer"></div> <!-- Espaçador -->
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
            <section class="inventory">
                <h1>Bem-vindo de volta, <?php echo htmlspecialchars($_SESSION["nome"]); ?></h1>
                <p>Ashura é a sua solução definitiva para gerenciamento de inventário. Com uma interface intuitiva e fácil de usar, você pode gerenciar clientes, funcionários, projetos e muito mais de forma eficiente.</p>
                <p>Comece adicionando seus clientes e aproveite todas as funcionalidades que Ashura oferece para otimizar suas operações.</p>
                <div class="features">
                    <div class="feature">
                        <i class="fas fa-box"></i>
                        <p>Gerenciamento de Inventário</p>
                    </div>
                    <div class="feature">
                        <i class="fas fa-users"></i>
                        <p>Gerenciamento de Clientes</p>
                    </div>
                    <div class="feature">
                        <i class="fas fa-user-tie"></i>
                        <p>Gerenciamento de Funcionários</p>
                    </div>
                    <div class="feature">
                        <i class="fas fa-project-diagram"></i>
                        <p>Gerenciamento de Projetos</p>
                    </div>
                </div>
            </section>
            <section class="end-home">
                <h1>Primeiros Passos</h1>
                <div class="empty-state">
                    <p>Adicione novos clientes aqui.</p>
                    <p>Depois de adicionar um cliente novo, você sempre pode alterá-lo e adicionar outros!</p>
                    <a href="clientes.php"><button>Adicionar Cliente</button></a>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
=======
<?php
session_start(); 
include("protect.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Dashboard</title>
    <link rel="stylesheet" href="styles/menu.css">
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
                    <li class="active"><a href="menu.php"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="clientes.php"><i class="fas fa-users"></i> Clientes <span class="badge">6</span></a></li>
                    <li><a href="funcionarios.php"><i class="fas fa-user-tie"></i> Funcionários</a></li>
                    <li><a href="trabalhos.php"><i class="fas fa-briefcase"></i> Trabalhos</a></li>
                    <li><a href="municipios.php"><i class="fas fa-city"></i> Municípios</a></li>
                    <li><a href="projetos.php"><i class="fas fa-project-diagram"></i> Projetos</a></li>
                    <li><a href="beneficios.php"><i class="fas fa-gift"></i> Benefícios</a></li>
                </ul>
            </nav>
           
            <div class="spacer"></div> <!-- Espaçador -->
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
            <section class="inventory">
                <h1>Bem-vindo de volta, <?php echo htmlspecialchars($_SESSION["nome"]); ?></h1>
                <p>Ashura é a sua solução definitiva para gerenciamento de inventário. Com uma interface intuitiva e fácil de usar, você pode gerenciar clientes, funcionários, projetos e muito mais de forma eficiente.</p>
                <p>Comece adicionando seus clientes e aproveite todas as funcionalidades que Ashura oferece para otimizar suas operações.</p>
                <div class="features">
                    <div class="feature">
                        <i class="fas fa-box"></i>
                        <p>Gerenciamento de Inventário</p>
                    </div>
                    <div class="feature">
                        <i class="fas fa-users"></i>
                        <p>Gerenciamento de Clientes</p>
                    </div>
                    <div class="feature">
                        <i class="fas fa-user-tie"></i>
                        <p>Gerenciamento de Funcionários</p>
                    </div>
                    <div class="feature">
                        <i class="fas fa-project-diagram"></i>
                        <p>Gerenciamento de Projetos</p>
                    </div>
                </div>
            </section>
            <section class="end-home">
                <h1>Primeiros Passos</h1>
                <div class="empty-state">
                    <p>Adicione novos clientes aqui.</p>
                    <p>Depois de adicionar um cliente novo, você sempre pode alterá-lo e adicionar outros!</p>
                    <a href="clientes.php"><button>Adicionar Cliente</button></a>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
>>>>>>> 2f67f0f75546b65789bb4439b8d834cd7ebc97c6
