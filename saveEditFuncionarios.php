<<<<<<< HEAD
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
=======
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
>>>>>>> 2f67f0f75546b65789bb4439b8d834cd7ebc97c6
?>