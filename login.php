<?php
    if (isset($_POST) && $_POST){
        include_once("./cxdb.php");
        
        $sql = "SELECT `id`, `email`, `name` FROM `user` WHERE `email` = '" . $_POST['email']. "' and `password` = '" . $_POST['password'] . "';";
        $result = $cx->query($sql);
        if (mysqli_num_rows($result) == 0){
            echo "User not found: Check your details!";
        }else{
            $user = mysqli_fetch_assoc($result);

            session_start();
            // Set session variables
            $_SESSION["id"] = $user['id'];
            $_SESSION["email"] = $user['email'];
            $_SESSION["name"] = $user['name'];
            
            header('Location: /cinostalgie/index.php');
            die;
        }
        $cx->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="wrapper">
        <form action="">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" name="" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="" placeholder="Password" required>
                <i class='bx bx-lock-alt'></i>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox">Remember me</label>
                <a href="#">Forgot password?</a>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="register-link">
                <p>New here?<a href="#">Register</a></p>
            </div>
        </form>
    </div>
</body>
</html>