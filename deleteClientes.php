<?php
include_once("connection.php");

if (!empty($_POST["delete"])) {
    $id = $_POST["id"];

   
    if (!empty($id)) {
       
        $sqlSelect = "SELECT * FROM clientes WHERE idCliente = ?";
        
        if ($stmt = $conn->prepare($sqlSelect)) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $sqlDelete = "DELETE FROM clientes WHERE idCliente = ?";
                
                if ($stmt = $conn->prepare($sqlDelete)) {
                    $stmt->bind_param("i", $id);
                    $stmt->execute();
                }
            }

            $stmt->close();
        }
    }

    header("Location: clientes.php");
    exit(); 
}
?>
