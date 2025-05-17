
<?php
include 'db.php';

if (isset($_POST['create'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];

    $sql = "INSERT INTO clients (username, email) VALUES ('$username', '$email')";
    $conn->query($sql);
    header("Location: index.php");
    exit;
}
?>