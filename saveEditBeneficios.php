<?php
include_once("connection.php");

if (isset($_POST["update"])) {
    $id_funcionario = $_POST["id_funcionario"];
    $id_projeto = $_POST["id_projeto"];
    
    $id = $_POST["id"];

    $sqlUpdate = "UPDATE beneficio
                  SET idFuncionario = ?, idProjeto = ?
                  WHERE idBeneficio = ?";

    
    if ($stmt = $conn->prepare($sqlUpdate)) {
        $stmt->bind_param("iii", $id_funcionario, $id_projeto, $id);
        $stmt->execute();
        $stmt->close();
    }
}


header("Location: beneficios.php");
exit(); 
?>