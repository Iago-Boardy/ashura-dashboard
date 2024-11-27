<?php
session_start(); 
include("protect.php");
include_once "connection.php";

// Definir a quantidade de resultados por página para a tabela de gráficos
$pagina = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
$qnt_result_pg = 8; // 8 registros por página

// Verificar a página atual, se não houver, define como página 1
$pagina = $pagina ? $pagina : 1;

// Calcular o início da visualização
$inicio = ($pagina - 1) * $qnt_result_pg;

// Buscar dados dos gráficos para a página atual (exemplo de gráfico de clientes)
$sql = "SELECT * FROM clientes LIMIT $inicio, $qnt_result_pg";
$result = mysqli_query($conn, $sql);

// Total de clientes (exemplo para gráfico)
$sql_total = "SELECT COUNT(*) AS total FROM clientes";
$result_total = mysqli_query($conn, $sql_total);
$row_total = mysqli_fetch_assoc($result_total);
$total_clientes = $row_total['total'];

// Quantidade de páginas
$quantidade_pg = ceil($total_clientes / $qnt_result_pg);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Gráficos</title>
    <link rel="stylesheet" href="styles/clienteSP.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200..1000&display=swap" rel="stylesheet">
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                    <li class="active"><a href="graficos.php"><i class="fas fa-chart-pie"></i> Gráficos</a></li>
                    <li><a href="clientes.php"><i class="fas fa-users"></i> Clientes <span class="badge">6</span></a></li>
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
                        <a href="usuario.php"><i class="fas fa-cog"></i>Configurações</a>
                        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Sair</a>
                    </div>
                </div>
            </header>

            <section class="section-1">
                <div class="intro-content">
                    <div class="intro-text">
                        <h1>Gráficos</h1>
                        <p>Visualize os dados de forma gráfica e mais interativa aqui!</p>
                    </div>
                    <div class="table-buttons">
                        <a href="graficos.php"><button><i class="fa fa-sync"></i> Atualizar</button></a>
                    </div>
                </div>
                
                <div class="chart-container">
                    <div class="chart-box">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>

                <!-- Exemplo de gráficos com Chart.js -->
                <script>
                    const ctx = document.getElementById('myChart').getContext('2d');
                    const myChart = new Chart(ctx, {
                        type: 'bar', // Tipo de gráfico
                        data: {
                            labels: ['Cliente 1', 'Cliente 2', 'Cliente 3', 'Cliente 4', 'Cliente 5'], // Exemplo de rótulos
                            datasets: [{
                                label: 'Clientes',
                                data: [12, 19, 3, 5, 2], // Exemplo de dados
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>
                
            </section>
        </main>
    </div>
</body>
</html>
