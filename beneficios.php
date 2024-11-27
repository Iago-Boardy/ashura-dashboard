<?php 
session_start(); 
include("protect.php");
include_once "connection.php";

$pagina = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
$qnt_result_pg = 8; // Definir 8 resultados por página

$pagina = $pagina ? $pagina : 1;

$inicio = ($pagina - 1) * $qnt_result_pg;

// Consulta SQL com JOINs para buscar as informações corretas.
$sql = "
    SELECT beneficio.idBeneficio, funcionario.nome, projeto.nomeProjeto 
    FROM beneficio
    INNER JOIN funcionario ON beneficio.idFuncionario = funcionario.idFuncionario
    INNER JOIN projeto ON beneficio.idProjeto = projeto.idProjeto
    LIMIT $inicio, $qnt_result_pg
";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Erro na consulta: " . mysqli_error($conn));
}

// Consulta para contar o total de benefícios (para paginação).
$sql_total = "SELECT COUNT(*) AS total FROM beneficio";
$result_total = mysqli_query($conn, $sql_total);
$row_total = mysqli_fetch_assoc($result_total);
$total_beneficios = $row_total['total'];

// Calcula a quantidade total de páginas.
$quantidade_pg = ceil($total_beneficios / $qnt_result_pg);

?>


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
                    <li><a href="graficos.php"><i class="fas fa-chart-pie"></i> Gráficos</a></li>
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
                        <p>Os benefícios trazem bens a todos! Gerencie seus benefícios aqui! O nome do projeto e funcionario são puxados pelo ID.</p>
                    </div>
                    <div class="table-buttons">
                        <a href="beneficios.php"><button><i class="fa fa-sync"></i> Atualizar</button></a>
                        <a href="#" id="pdfDownload"><button><i class="fas fa-file-pdf"></i> Gerar PDF</button></a>
                        <a href="beneficios-adicionar.php"><button><i class="fa fa-plus-circle"></i> Adicionar</button></a>
                    </div>
                </div>

                <div class="table-container">
                    <div class="product-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Id do Benefício</th>
                                    <th>Nome do Funcionário</th>
                                    <th>Nome do Projeto</th>
                                    <th class="right">Edição</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row['idBeneficio']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['nomeProjeto']) . "</td>";
                                    echo '<td><a href="beneficios-alterar.php?idBeneficio=' . $row['idBeneficio'] . '" class="edit-link"><span class="status active"><i class="fas fa-edit"></i></span></a></td>';
                                    echo "</tr>";
                                }
                                mysqli_close($conn);
                                ?>
                            </tbody>
                        </table>

                        <div class="footer">
                            <div class="pagination">
                                <?php
                                if ($pagina > 1) {
                                    echo '<a href="beneficios.php?pagina=' . ($pagina - 1) . '" class="pagination-link">Anterior</a>';
                                }
                                for ($i = 1; $i <= $quantidade_pg; $i++) {
                                    if ($i == $pagina) {
                                        echo '<span class="pagination-link current-page">' . $i . '</span>';
                                    } else {
                                        echo '<a href="beneficios.php?pagina=' . $i . '" class="pagination-link">' . $i . '</a>';
                                    }
                                }
                                if ($pagina < $quantidade_pg) {
                                    echo '<a href="beneficios.php?pagina=' . ($pagina + 1) . '" class="pagination-link">Próxima</a>';
                                }
                                ?>
                            </div>
                            <div class="database">
                                <p>Informações diretas do DataBase - 2024.</p>
                            </div>
                        </div>

                    </div>
                </div>

            </section>

        </main>
    </div>

</body>
<script>
document.getElementById("pdfDownload").addEventListener("click", function(event) {
    event.preventDefault(); 

    
    fetch('generate_pdf_beneficios.php', {
        method: 'POST',
    })
    .then(response => response.blob()) 
    .then(blob => {
        
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.style.display = 'none';
        a.href = url;
        a.download = 'beneficios.pdf'; 
        document.body.appendChild(a);
        a.click(); 
        window.URL.revokeObjectURL(url); 
    })
    .catch(err => console.error('Erro ao baixar o PDF:', err));
});
</script>
</html>
