<?php
session_start();

echo '
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/Forum">WinDiscuss</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/Forum/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo '<form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-success" type="submit">Search</button>
                    <p class="text-light my-0 mx-2">Welcome ' . $_SESSION['useremail'] . '</p>
                    <button class="btn btn-outline-success" style="margin-left: 0.5rem;"
                data-bs-toggle="modal" data-bs-target="#loginModal">Logout</button>
                    </form>';
} else {
    echo '<form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-success" type="submit">Search</button>
                </form>
                <button class="btn btn-outline-success" style="margin-left: 0.5rem;"
                data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                <button class="btn btn-outline-success mx-2"
                data-bs-toggle="modal" data-bs-target="#singUpModal">SignUp</button>';
}
echo '</div>
        </div>
    </nav>';

include 'partials/_loginModal.php';
include 'partials/_signupModal.php';

if (isset($_GET['signup']) && $_GET['signup'] == "true") {
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Holy guacamole!</strong> You are successfully registered as a user! Please log in.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>