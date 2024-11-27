<<<<<<< HEAD
<?php 
include("protect.php");
include_once "connection.php";

// conexão e data
$hoje = date("d/m/Y");
$ano = date("Y");

$pagina = "<style type='text/css'>
            @page {
                margin: 100px 50px 80px 50px;
                font-family: 'Helvetica', 'Arial', sans-serif;
            }
            body {
                font-size: 12px;
                line-height: 1.5;
                color: #333;
            }
            #head {
                position: fixed;
                top: -80px;
                left: 0;
                right: 0;
                height: 80px;
                text-align: center;
                font-size: 16px;
                font-weight: bold;
            }
            #footer {
                position: fixed;
                bottom: -60px;
                left: 0;
                right: 0;
                height: 60px;
                text-align: center;
                font-size: 10px;
                color: #777;
            }
            .page-number:after {
                content: counter(page);
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }
            th, td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: #f2f2f2;
                font-weight: bold;
            }
            tr:nth-child(even) {
                background-color: #f9f9f9;
            }
            .report-title {
                font-size: 24px;
                font-weight: bold;
                margin-bottom: 20px;
                color: #2c3e50;
            }
            .company-info {
                margin-top: 20px;
                font-style: italic;
            }
            #watermark {
                position: fixed;
                top: 45%;
                width: 100%;
                text-align: center;
                opacity: 0.1;
                transform: rotate(-45deg);
                font-size: 150px;
                z-index: -1000;
            }
        </style>";

        $head = "
        <title>Relatório de Benefícios</title>
        <div id='head'>
            <table>
                <tr>
                    <td style='text-align: left; border: none;'>
                        <h1>Ashura Company - Relatório</h1>
                    </td>
                    <td style='text-align: right; border: none;'>
                        Data: {$hoje}<br>
                        Página: <span class='page-number'></span>
                    </td>
                </tr>
            </table>
        </div>

    <div id='watermark'>ASHURA COMP</div>

    <div id='footer'>
        <hr style='width: 100%; border-top: 1px solid #ddd;'>
        <div class='company-info'>
            <strong>Ashura Company</strong> | Ivoti / RS<br>
            E-mail: ashuracompany@gmail.com | www.empresa.com.br<br>
            Direitos Reservados &copy; {$ano}
        </div>
    </div>

    <div id='corpo'>
        <h1 class='report-title'>RELATÓRIO DE BENEFÍCIOS</h1>";

// Criação da tabela de clientes
$tabela = "<table>
                <thead>
                    <tr>
                        <th>ID Benefício</th>
                        <th>ID Funcionário</th>
                        <th>ID Projeto</th>
                    </tr>
                </thead>
                <tbody>";

// monta query para buscar clientes
$sql = "SELECT idBeneficio, idFuncionario, idProjeto FROM beneficio";
$result = $conn->query($sql);

// Verifica e preenche a tabela com os dados dos clientes
if ($result->num_rows > 0) {
    while($row = $result->fetch_object()) {
        $tabela .= "<tr>
                        <td>{$row->idBeneficio}</td>
                        <td>{$row->idFuncionario}</td>
                        <td>{$row->idProjeto}</td>

                    </tr>";
    }
} else {
    $tabela .= "<tr><td colspan='7' style='text-align: center;'>Nenhum dado encontrado</td></tr>";
}

// fecha conexão
$conn->close();

$tabela .= "</tbody>
            </table>
        </div>";

$html = $pagina.$head.$tabela;

// include autoloader do DomPDF
require_once('dompdf/autoload.inc.php');

// Referencia o DomPDF com namespace
use Dompdf\Dompdf;
use Dompdf\Options;

// Cria a instância do DomPDF com opções
$options = new Options();
$options->set('isRemoteEnabled', true);
$options->set('isHtml5ParserEnabled', true);
$dompdf = new Dompdf($options);

// Carrega o HTML
$dompdf->loadHtml($html);

// Define o tamanho do papel e orientação
$dompdf->setPaper('A4', 'portrait');

// Renderiza o HTML como PDF
$dompdf->render();

// Gera o PDF
$dompdf->stream("relatorio_beneficios.pdf", array("Attachment" => false));
=======
<?php 
include("protect.php");
include_once "connection.php";

// conexão e data
$hoje = date("d/m/Y");
$ano = date("Y");

$pagina = "<style type='text/css'>
            @page {
                margin: 100px 50px 80px 50px;
                font-family: 'Helvetica', 'Arial', sans-serif;
            }
            body {
                font-size: 12px;
                line-height: 1.5;
                color: #333;
            }
            #head {
                position: fixed;
                top: -80px;
                left: 0;
                right: 0;
                height: 80px;
                text-align: center;
                font-size: 16px;
                font-weight: bold;
            }
            #footer {
                position: fixed;
                bottom: -60px;
                left: 0;
                right: 0;
                height: 60px;
                text-align: center;
                font-size: 10px;
                color: #777;
            }
            .page-number:after {
                content: counter(page);
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }
            th, td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: #f2f2f2;
                font-weight: bold;
            }
            tr:nth-child(even) {
                background-color: #f9f9f9;
            }
            .report-title {
                font-size: 24px;
                font-weight: bold;
                margin-bottom: 20px;
                color: #2c3e50;
            }
            .company-info {
                margin-top: 20px;
                font-style: italic;
            }
            #watermark {
                position: fixed;
                top: 45%;
                width: 100%;
                text-align: center;
                opacity: 0.1;
                transform: rotate(-45deg);
                font-size: 150px;
                z-index: -1000;
            }
        </style>";

        $head = "
        <title>Relatório de Benefícios</title>
        <div id='head'>
            <table>
                <tr>
                    <td style='text-align: left; border: none;'>
                        <h1>Ashura Company - Relatório</h1>
                    </td>
                    <td style='text-align: right; border: none;'>
                        Data: {$hoje}<br>
                        Página: <span class='page-number'></span>
                    </td>
                </tr>
            </table>
        </div>

    <div id='watermark'>ASHURA COMP</div>

    <div id='footer'>
        <hr style='width: 100%; border-top: 1px solid #ddd;'>
        <div class='company-info'>
            <strong>Ashura Company</strong> | Ivoti / RS<br>
            E-mail: ashuracompany@gmail.com | www.empresa.com.br<br>
            Direitos Reservados &copy; {$ano}
        </div>
    </div>

    <div id='corpo'>
        <h1 class='report-title'>RELATÓRIO DE BENEFÍCIOS</h1>";

// Criação da tabela de clientes
$tabela = "<table>
                <thead>
                    <tr>
                        <th>ID Benefício</th>
                        <th>ID Funcionário</th>
                        <th>ID Projeto</th>
                    </tr>
                </thead>
                <tbody>";

// monta query para buscar clientes
$sql = "SELECT idBeneficio, idFuncionario, idProjeto FROM beneficio";
$result = $conn->query($sql);

// Verifica e preenche a tabela com os dados dos clientes
if ($result->num_rows > 0) {
    while($row = $result->fetch_object()) {
        $tabela .= "<tr>
                        <td>{$row->idBeneficio}</td>
                        <td>{$row->idFuncionario}</td>
                        <td>{$row->idProjeto}</td>

                    </tr>";
    }
} else {
    $tabela .= "<tr><td colspan='7' style='text-align: center;'>Nenhum dado encontrado</td></tr>";
}

// fecha conexão
$conn->close();

$tabela .= "</tbody>
            </table>
        </div>";

$html = $pagina.$head.$tabela;

// include autoloader do DomPDF
require_once('dompdf/autoload.inc.php');

// Referencia o DomPDF com namespace
use Dompdf\Dompdf;
use Dompdf\Options;

// Cria a instância do DomPDF com opções
$options = new Options();
$options->set('isRemoteEnabled', true);
$options->set('isHtml5ParserEnabled', true);
$dompdf = new Dompdf($options);

// Carrega o HTML
$dompdf->loadHtml($html);

// Define o tamanho do papel e orientação
$dompdf->setPaper('A4', 'portrait');

// Renderiza o HTML como PDF
$dompdf->render();

// Gera o PDF
$dompdf->stream("relatorio_beneficios.pdf", array("Attachment" => false));
>>>>>>> 2f67f0f75546b65789bb4439b8d834cd7ebc97c6
?>