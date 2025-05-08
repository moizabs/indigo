<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'login/config.php';
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM `register` WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $numExistRows = mysqli_num_rows($result);

    if ($numExistRows == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['loggedin'] = true; // Set loggedin to true
            $_SESSION['username'] = $row['name'];
            $_SESSION['user_id'] = $row['id']; // You can store any user information you need in the session

            header('Location: index.php?success=true');
            exit();
        } else {
            header("Location: index.php?success=false");
            exit();
        }
    } else {
        header("Location: index.php?success=false");
        exit();
    }
}
?>
