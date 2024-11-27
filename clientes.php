<?php
session_start(); 
include("protect.php");
include_once "connection.php";

// Definir a quantidade de resultados por página
$pagina = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
$qnt_result_pg = 8; // 8 registros por página

// Verificar a página atual, se não houver, define como página 1
$pagina = $pagina ? $pagina : 1;

// Calcular o início da visualização
$inicio = ($pagina - 1) * $qnt_result_pg;

// Buscar os clientes para a página atual
$sql = "SELECT * FROM clientes LIMIT $inicio, $qnt_result_pg";
$result = mysqli_query($conn, $sql);

// Total de clientes
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
    <title>Inventory Dashboard</title>
    <link rel="stylesheet" href="styles/clienteSP.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200..1000&display=swap" rel="stylesheet">
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
                        <a href="usuario.php"><i class="fas fa-cog"></i>Configurações</a>
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
                        <a href="#" id="pdfDownload"><button><i class="fas fa-file-pdf"></i> Gerar PDF</button></a>
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
                                while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                                    echo "<tr>"; 
                                    for ($i = 0; $i < count($row); $i++) {
                                        echo "<td>" . htmlspecialchars($row[$i]) . "</td>";
                                    }
                                    // Link para edição
                                    echo '<td><a href="clientes-alterar.php?idCliente=' . $row[0] . '" class="edit-link"><span class="status active"><i class="fas fa-edit"></i></span></a></td>';
                                    echo "</tr>";
                                }
                                mysqli_close($conn);
                            ?>
                            </tbody>
                        </table>
                        
                        <div class="footer">
                            <div class="pagination">
                                <?php
                                // Botão para página anterior
                                if ($pagina > 1) {
                                    echo '<a href="clientes.php?pagina=' . ($pagina - 1) . '" class="pagination-link">Anterior</a>';
                                }

                                // Botões numerados
                                for ($i = 1; $i <= $quantidade_pg; $i++) {
                                    if ($i == $pagina) {
                                        echo '<span class="pagination-link current-page">' . $i . '</span>';
                                    } else {
                                        echo '<a href="clientes.php?pagina=' . $i . '" class="pagination-link">' . $i . '</a>';
                                    }
                                }

                                // Botão para próxima página
                                if ($pagina < $quantidade_pg) {
                                    echo '<a href="clientes.php?pagina=' . ($pagina + 1) . '" class="pagination-link">Próxima</a>';
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

    
    fetch('generate_pdf_clientes.php', {
        method: 'POST',
    })
    .then(response => response.blob()) 
    .then(blob => {
        
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.style.display = 'none';
        a.href = url;
        a.download = 'clientes.pdf'; 
        document.body.appendChild(a);
        a.click(); //
        window.URL.revokeObjectURL(url); 
    })
    .catch(err => console.error('Erro ao baixar o PDF:', err));
});
</script>

</html>
