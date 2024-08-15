<?php 
include ("connection.php");

session_start();

$error_message = '';

if(isset($_POST["email"]) && isset($_POST["password"])) {
    if (strlen($_POST["email"]) == 0)  {
        $error_message = "Preencha seu email corretamente";
    } else if (strlen($_POST["password"]) == 0) {
        $error_message = "Preencha sua senha corretamente";
    } else { 
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $senha = mysqli_real_escape_string($conn, $_POST["password"]);

        $sql_code = "SELECT * 
                     FROM usuarios
                     WHERE email = '$email' AND senha = '$senha'";
        
        $sql_query = $conn->query($sql_code) or die("Falha na execução SQL: " . $conn->error);

        $quantidade = $sql_query->num_rows;
        if ($quantidade == 1) {

            $usuario = $sql_query->fetch_assoc();

            $_SESSION["idUsuario"] = $usuario["idUsuario"];
            $_SESSION["nome"] = $usuario["nome"];

            header("Location: menu.php");
            exit(); 

        } else {
            $error_message = "Falha ao logar, email ou senha incorretos";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles/login.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>
            <p>Enter your email below to login to your account</p>

            <form action="" method="POST">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="m@example.com" required>
                <div class="inline">
                    <label for="password">Password</label>
                </div>
                <input type="password" id="password" name="password" placeholder="153.exemp-" required>
                <button type="submit">Login</button>
            </form>

            <p>Don't have an account? <a href="cadastrar.html">Sign up</a></p>

        </div>
    </div>

    <!-- Container for error messages -->
    <div id="error-message" class="error-message <?php if($error_message) echo 'show'; ?>">
        <?php echo htmlspecialchars($error_message); ?>
    </div>
</body>
</html>
