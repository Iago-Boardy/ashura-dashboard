<<<<<<< HEAD
<?php
include_once("connection.php");

if (isset($_POST["update"])) {
    $nome = $_POST["name"];
    
    $id = $_POST["id"];

    $sqlUpdate = "UPDATE projeto
                  SET nomeProjeto = ?
                  WHERE idProjeto = ?";

    
    if ($stmt = $conn->prepare($sqlUpdate)) {
        $stmt->bind_param("si", $nome, $id);
        $stmt->execute();
        $stmt->close();
    }
}


header("Location: projetos.php");
exit(); 
=======
<?php
include_once("connection.php");

if (isset($_POST["update"])) {
    $nome = $_POST["name"];
    
    $id = $_POST["id"];

    $sqlUpdate = "UPDATE projeto
                  SET nomeProjeto = ?
                  WHERE idProjeto = ?";

    
    if ($stmt = $conn->prepare($sqlUpdate)) {
        $stmt->bind_param("si", $nome, $id);
        $stmt->execute();
        $stmt->close();
    }
}


header("Location: projetos.php");
exit(); 
>>>>>>> 2f67f0f75546b65789bb4439b8d834cd7ebc97c6
?>