<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Dashboard</title>
    <link rel="stylesheet" href="styles/clientes.css">
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
                    <li class="active"><a href="beneficios.html"><i class="fas fa-gift"></i> Benefícios</a></li>
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
                    <button class="dropbtn"><i class="fas fa-user"></i></button>
                    <div class="dropdown-content">
                        <a href="usuario.php"><i class="fas fa-cog"></i>Configurações</a>
                        <a href="index.php"><i class="fas fa-sign-out-alt"></i> Sair</a>
                    </div>
                </div>
            </header>

            <section class="section-1">
                <div class="intro-content">
                    <div class="intro-text">
                        <h1>Benefícios</h1>
                        <p>Os beneficios trazem bens a todos! Gerencie seus beneficios aqui!</p>
                    </div>
                    <div class="table-buttons">
                        <a href="beneficios.php"><button><i class="fa fa-sync"></i> Atualizar</button></a>
                        <a href="beneficios-adicionar.php"><button><i class="fa fa-plus-circle"></i> Adicionar</button></a>
                    </div>
                </div>
                
                <div class="table-container">
                    <div class="product-table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="table-correction">Id Funcionário</th>
                                    <th>Id Projeto</th>
                                    <th class="right">Edição</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-href="beneficios-alterar.php">
                                    <td>1</td>
                                    <td>24</td>
                                    <td><a href="beneficios-alterar.php"><span class="status active"><i class="fas fa-edit"></i></span></a></td>

                                </tr>
                                <tr data-href="beneficios-alterar.php">
                                    <td>2</td>
                                    <td>24</td>
                                    <td><a href="beneficios-alterar.php"><span class="status active"><i class="fas fa-edit"></i></span></a></td>
                                </tr>
                                <!-- Adicione mais linhas conforme necessário -->
                            </tbody>
                        </table>
                        <p>Informações diretas do DataBase - 2024.</p>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script>
        document.querySelectorAll('tbody tr').forEach(row => {
            row.addEventListener('dblclick', function() {
                window.location.href = 'beneficios-alterar.php';
            });
        });

        document.querySelectorAll('.status.active').forEach(icon => {
            icon.addEventListener('dblclick', function(event) {
                event.stopPropagation(); // Evita que o clique duplo no ícone também ative o clique duplo na linha
                window.location.href = 'beneficios-alterar.php';
            });
        });
    </script>
</body>
</html>
