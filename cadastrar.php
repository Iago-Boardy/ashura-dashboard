<?php 
    if (isset($_POST["submit"])) {

        include_once("connection.php");

        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirm-password"];

        if ($confirmPassword != $password) {

            $error_message = "ERRO - As senhas estão diferentes!";

        } else {

            $result = mysqli_query($conn, "INSERT INTO usuarios
                                    (nome, email, senha) VALUES
                                    ('$name', '$email', '$password')");


            $good_message = "Sua conta foi criada com sucesso!";
        //header("Location: index.php");
        //exit();
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="styles/cadastrar.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
</head>
<body>
    <div class="signup-container">
        <div class="signup-box">
            <h2>Sign Up</h2>
            <p>Enter your details below.</p>
            <form action="cadastrar.php" method="POST">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Your Name" required>
                
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="m@example.com" required>
                
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
                
                <button type="submit" name="submit" id="submit">Sign Up</button>
            </form>
            <p>Already have an account? <a href="index.php">Login</a></p>
        </div>
    </div>

    
    <div id="error-message" class="error-message <?php if($error_message) echo 'show'; ?>">
        <?php echo htmlspecialchars($error_message); ?>
    </div>

    <div id="good-message" class="good-message <?php if($good_message) echo 'show'; ?>">
        <?php echo htmlspecialchars($good_message); ?>
    </div>

</body>
</html>
