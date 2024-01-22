<?php
if (isset($_POST) && $_POST) {
    include_once("lib\cxdb.php");

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $sql = "INSERT INTO `contact` (`name`, `email`, `subject`, `message`) 
        VALUES ('$name', '$email', '$subject', '$message');";

    if ($cx->query($sql) === TRUE) {
        // Redirect to success page
        header("Location:home.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $cx->error;
    }

    $cx->close();
}

?>