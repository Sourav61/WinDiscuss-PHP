<?php
$showError = 'false';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '_dbConnect.php';

    $user_email = $_POST['signupMail'];
    $pass = $_POST['signupPassword'];
    $cpass = $_POST['signupcPassword'];

    $existSql = "Select * from `users` where user_email='$user_email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);

    if ($numRows > 0) {
        $showError = 'Email already in use!!';
    } else {
        if ($pass == $cpass) {
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`user_email`, `user_pass`, `timestamp`) VALUES
             ('$user_email', '$hash', current_timestamp());";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $showAlert = true;
                header("Location: /forum/index.php?signup=true");
                exit();
            }
        } else {
            $showError = 'Passwords do not match!';
        }
    }
    header("Location: /forum/index.php?signup=false&error=$showError");
}

?>