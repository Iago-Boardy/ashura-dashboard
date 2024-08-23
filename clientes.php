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
    <link rel="stylesheet" href="styles/clienteSP.css">
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
                    <button class="dropbtn"><i class="fas fa-user"></i></button>
                    <div class="dropdown-content">
                        <a href="usuario.php"><i class="fas fa-cog"></i> Configurações</a>
                        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Sair</a>
                    </div>
                </div>
            </header>

            <section class="section-1">
                <div class="intro-content">
                    <div class="intro-text">
                        <h1>Clientes</h1>
                        <p>Os clientes estão sempre certos, não estão? Gerencie seus clientes aqui!</p>
                    </div>
                    <div class="table-buttons">
                        <a href="clientes.php"><button><i class="fa fa-sync"></i> Atualizar</button></a>
                        <a href="clientes-adicionar.php"><button><i class="fa fa-plus-circle"></i> Adicionar</button></a>
                    </div>
                </div>
                
                <div class="table-container">
                    <div class="product-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Logradouro</th>
                                    <th>Complemento</th>
                                    <th>Bairro</th>
                                    <th>CEP</th>
                                    <th>Cidade</th>
                                    <th>UF</th>
                                    <th>Email</th>
                                    <th>Idade</th>
                                    <th>Edição</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                include_once "connection.php";

                                $sql = "SELECT * FROM clientes";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                                    echo "<tr data-id='" . $row[0] . "'>"; 
                                    for ($i = 0; $i < count($row); $i++) {
                                        echo "<td>" . $row[$i] . "</td>";
                                    }
                                    // Adiciona o ID ao link de edição diretamente no HTML
                                    echo '<td><a href="clientes-alterar.php?id=' . $row[0] . '" class="edit-link"><span class="status active"><i class="fas fa-edit"></i></span></a></td>';
                                    echo "</tr>";
                                }
                                mysqli_close($conn);
                            ?>

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
                const id = this.getAttribute('data-id');
                window.location.href = 'clientes-alterar.php?id=' + id;
            });
        });

        document.querySelectorAll('.edit-link').forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault(); 
                const row = this.closest('tr'); 
                const id = row.getAttribute('data-id'); 
                window.location.href = 'clientes-alterar.php?id=' + id; 
            });
        });
    </script>
</body>
</html>
