<?php


  if(!empty($_POST["info"])) {
    $id = $_POST["idCliente"];

    include_once("connection.php");

      $id = $_GET["id"];

      $sqlSelect = "SELECT * FROM clientes 
                    WHERE idCliente = '$id'";
      
      $result = $conn-> query($sqlSelect); //Aqui tem que ver certinho, mas basicamente verificamos algo na connection conn
      
      if ($result->num_rows > 0) {

        $sqlDelete = "DELETE FROM clientes
                      WHERE idCliente = '$id'";

        $resultDelete = $conn-> query($sqlDelete);
      }
      
      header("Location: clientes.php");

  }


?>