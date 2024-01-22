<?php
session_start(); 
include_once("lib\cxdb.php");

if (isset($_POST['submit'])) {
  include "lib\cxdb.php";
  $name = mysqli_real_escape_string($cx, $_POST['user']);
  $email = mysqli_real_escape_string($cx, $_POST['email']);
  $password = mysqli_real_escape_string($cx, $_POST['pass']);
  $cpassword = mysqli_real_escape_string($cx, $_POST['cpass']);

  $sql = "SELECT * FROM user WHERE name= '$name'";
  $result = mysqli_query($cx, $sql);
  $count_user = mysqli_num_rows($result);

  $sql = "SELECT * FROM user WHERE email= '$email'";
  $result = mysqli_query($cx, $sql);
  $count_email = mysqli_num_rows($result);

  if ($count_user == 0 || $count_email == 0) {
    if ($password == $cpassword) {
      $sql = "INSERT INTO user (name, email, password) VALUES ('$name', '$email','$password')";
      $result = mysqli_query($cx, $sql);

      if ($result) {
        // Set session variables
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;

        header("Location: login.php");
        exit();
      } else {
        echo "Error: " . mysqli_error($cx);
      }
    } else {
      echo '<script>
                alert("Password do not match");
                window.location.href = "signup.php";
                </script>';
    }
  } else {
    echo '<script>
            alert("User already exists");
            window.location.href = "login.php";
            </script>';
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
</head>
<body>
    
</body>
</html>