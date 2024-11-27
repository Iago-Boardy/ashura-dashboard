<?php
include_once("connection.php");

if (isset($_POST["update"])) {
    $nome = $_POST["name"];
    $trabalho = $_POST["trabalho"];
    
    $id = $_POST["id"];

    $sqlUpdate = "UPDATE funcionario
                  SET nome = ?, idTrabalho = ?
                  WHERE idFuncionario = ?";

    
    if ($stmt = $conn->prepare($sqlUpdate)) {
        $stmt->bind_param("sii", $nome, $trabalho, $id);
        $stmt->execute();
        $stmt->close();
    }
}


header("Location: funcionarios.php");
exit(); 
?>