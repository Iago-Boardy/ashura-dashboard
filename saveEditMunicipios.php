<?php
include_once("connection.php");

if (isset($_POST["update"])) {
    $nome = $_POST["name"];
    $estado = $_POST["estado"];
    
    $id = $_POST["id"];

    $sqlUpdate = "UPDATE municipios
                  SET cidade = ?, uf = ?
                  WHERE idCidade = ?";

    
    if ($stmt = $conn->prepare($sqlUpdate)) {
        $stmt->bind_param("ssi", $nome, $estado, $id);
        $stmt->execute();
        $stmt->close();
    }
}


header("Location: municipios.php");
exit(); 
?>