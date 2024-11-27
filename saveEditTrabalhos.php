<?php
include_once("connection.php");

if (isset($_POST["update"])) {
    $nome = $_POST["name"];
    
    $id = $_POST["id"];

    $sqlUpdate = "UPDATE trabalho
                  SET nomeTrabalho = ?
                  WHERE idTrabalho = ?";

    
    if ($stmt = $conn->prepare($sqlUpdate)) {
        $stmt->bind_param("si", $nome, $id);
        $stmt->execute();
        $stmt->close();
    }
}


header("Location: trabalhos.php");
exit(); 
?>