<?php
include_once("connection.php");

if (isset($_POST["update"])) {
    $nome = $_POST["name"];
    $idade = $_POST["idade"];
    $logadouro = $_POST["logadouro"]; 
    $complemento = $_POST["complemento"];
    $bairro = $_POST["bairro"];
    $cep = $_POST["cep"];
    $cidade = $_POST["cidade"];
    $uf = $_POST["uf"];
    $email = $_POST["email"];
    
    $id = $_POST["id"];

    // Prepara a consulta de atualização
    $sqlUpdate = "UPDATE clientes
                  SET nome = ?, idade = ?, logadouro = ?, complemento = ?, 
                      bairro = ?, cep = ?, cidade = ?, uf = ?, email = ?
                  WHERE idCliente = ?";

    // Usa prepared statement para evitar injeção SQL
    if ($stmt = $conn->prepare($sqlUpdate)) {
        $stmt->bind_param("sisssssssi", $nome, $idade, $logadouro, $complemento, $bairro, $cep, $cidade, $uf, $email, $id);
        $stmt->execute();
        $stmt->close();
    }
}


header("Location: clientes.php");
exit(); 
?>