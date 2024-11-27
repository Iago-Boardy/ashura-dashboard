<<<<<<< HEAD
<?php
include_once("connection.php");
session_start(); 

if (!empty($_GET["id"])) {
    $id = $_GET["id"];

   
    if (!empty($id)) {
       
        $sqlSelect = "SELECT * FROM municipios WHERE idCidade = ?";
        
        if ($stmt = $conn->prepare($sqlSelect)) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $sqlDelete = "DELETE FROM municipios WHERE idCidade = ?";
                
                if ($stmt = $conn->prepare($sqlDelete)) {
                    $stmt->bind_param("i", $id);
                    $stmt->execute();
                }
            }

            $stmt->close();
        }
    }

    header("Location: municipios.php");
    exit(); 
}
?>
=======
<?php
include_once("connection.php");
session_start(); 

if (!empty($_GET["id"])) {
    $id = $_GET["id"];

   
    if (!empty($id)) {
       
        $sqlSelect = "SELECT * FROM municipios WHERE idCidade = ?";
        
        if ($stmt = $conn->prepare($sqlSelect)) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $sqlDelete = "DELETE FROM municipios WHERE idCidade = ?";
                
                if ($stmt = $conn->prepare($sqlDelete)) {
                    $stmt->bind_param("i", $id);
                    $stmt->execute();
                }
            }

            $stmt->close();
        }
    }

    header("Location: municipios.php");
    exit(); 
}
?>
>>>>>>> 2f67f0f75546b65789bb4439b8d834cd7ebc97c6
