<?php
  include_once("connection.php");

  if(isset($_POST["update"])) {
    $nome = $_POST["name"];
    $idade = $_POST["idade"];
    $logadouro = $_POST["logradouro"];
    $complemento = $_POST["complemento"];
    $bairro = $_POST["bairro"];
    $cep = $_POST["cep"];
    $cidade = $_POST["cidade"];
    $uf = $_POST["uf"];
    $email = $_POST["email"];
    $id = $_POST["id"];

    $sqlUpdate = "UPDATE usuarios
                  SET nome = '$nome', idade = '$idade', logadouro = '$logadouro', complemento = '$complemento', 
                  bairro = '$bairro', cep = '$cep', cidade = '$cidade', uf = '$uf', email = '$email'
                  WHERE id =  '$id'";

    $result = $conn ->query($sqlUpdate);
  }

  header("Location: clientes.php");

?>