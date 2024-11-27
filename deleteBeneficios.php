<?php
include_once("connection.php");
session_start(); 

if (!empty($_GET["id"])) {
    $id = $_GET["id"];

   
    if (!empty($id)) {
       
        $sqlSelect = "SELECT * FROM beneficio WHERE idBeneficio = ?";
        
        if ($stmt = $conn->prepare($sqlSelect)) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $sqlDelete = "DELETE FROM beneficio WHERE idBeneficio = ?";
                
                if ($stmt = $conn->prepare($sqlDelete)) {
                    $stmt->bind_param("i", $id);
                    $stmt->execute();
                }
            }

            $stmt->close();
        }
    }

    header("Location: beneficios.php");
    exit(); 
}
?>
