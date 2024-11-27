<<<<<<< HEAD
<?php 
    $localhost = "192.168.20.2";
    $user = "root";
    $password = "12345";
    $banco = "2024_iago_fistdb";
    $conn = mysqli_connect($localhost, $user, $password, $banco);

    if (!$conn) {
        header("Location: menu.php");
    }

=======
<?php 
    $localhost = "192.168.20.2";
    $user = "root";
    $password = "12345";
    $banco = "2024_iago_fistdb";
    $conn = mysqli_connect($localhost, $user, $password, $banco);

    if (!$conn) {
        header("Location: menu.php");
    }

>>>>>>> 2f67f0f75546b65789bb4439b8d834cd7ebc97c6
?>