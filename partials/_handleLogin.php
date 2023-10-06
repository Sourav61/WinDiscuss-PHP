<?php
$showError = 'false';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '_dbConnect.php';

    $email = $_POST['loginEmail'];
    $pass = $_POST['loginPass'];

    $existSql = "Select * from `users` where user_email='$email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);

    if ($numRows == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($pass, $row['user_pass'])) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['useremail'] = $email;
            exit();
        }
        // else {
        //     echo "Unable to login. Please try again";
        // }
        header("location: /Forum/index.php");
    }
    // header("Location: /forum/index.php?signup=false&error=$showError");
}

?>