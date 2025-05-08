<?php
$showAlert = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'login/config.php';
    $username = $_POST["name"];
    $number = $_POST["number"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check whether this username exists
    $existSql = "SELECT * FROM `register` WHERE name = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if ($numExistRows > 0) {
        $showError = "Username Already Exists";
    } else {
        if ($password) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `register` (`name`, `number`, `email`, `password`) VALUES ('$username','$number','$email', '$hash')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                // Registration successful, redirect to the previous page
                if (isset($_SERVER["HTTP_REFERER"])) {
                    header("Location: " . $_SERVER["HTTP_REFERER"].'?register=success');
                } else {
                    header('location: index.php?register=success'); // Redirect to a default page if HTTP_REFERER is not set
                }
                exit();
            } else {
                header('location: index.php?register=false'); // Redirect to a default page if HTTP_REFERER is not set
            }
        } else {
            header('location: index.php?register=false'); // Redirect to a default page if HTTP_REFERER is not set
        }
    }
}
?>
