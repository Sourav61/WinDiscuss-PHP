<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WinDiscuss - Doubt Solver</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
    #ques {
        min-height: 433px;
    }
    </style>
</head>

<body>
    <?php include 'partials/_header.php' ?>
    <?php include 'partials/_dbConnect.php' ?>
    <?php
    $id = $_GET['cat_id'];
    $sql = "Select * from `categories` where `category_id` = $id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $cat_name = $row['category_name'];
        $cat_desc = $row['category_description'];
    }
    ?>

    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];
        $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES 
        ('$th_title', '$th_desc', '$id', '0', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if ($showAlert) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your concern has been registered, we will get back to you soon.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    ?>


    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to
                <?php echo $cat_name ?> Forum
            </h1>
            <p class="lead">
                <?php echo $cat_desc ?>
            </p>
            <hr class="my-4">
            <h2>Rules</h2>
            <ul>
                <li>Use respectful language when posting. Using profanity, offensive language, sexual remarks, personal
                    attacks, or negatively calling members out by username is not allowed.</li>
                <li>Posting content from private messages and displaying that subject matter on the public forum is
                    prohibited. Be forewarned that sending an unsolicited private message to other members may result in
                    your message being marked as spam.</li>
                <li>Edit and delete posts as necessary using the tools provided by the forum. Please know that post
                    revisions are retained in edit logs at an administrative level.
                </li>
                <li>You may post links relevant to the discussions if they are not links to your website or blog
                </li>
            </ul>

            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>
    </div>


    <div class="container">
        <h1 class="py-2">Start a Discussion</h1>
        <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" .$id method="post">
            <div class="mb-3 form-group">
                <label for="title" class="form-label">Problem Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Keep your title as short and crisp as possible.</div>
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Elaborate your concern</label>
                <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div class="container" id="ques">
        <h1 class="py-2">Browse Questions</h1>
        <?php
        $id = $_GET['cat_id'];
        $sql = "Select * from `threads` where `thread_cat_id` = $id";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noResult = false;
            $title = $row['thread_title'];
            $id = $row['thread_id'];
            $desc = $row['thread_desc'];
            $thread_time = new DateTimeImmutable($row['timestamp']);

            echo '<div class="media d-flex my-3">
                <img class="mr-3 h-50 m-2" src="images/user.png" width="54" alt="Generic placeholder image">
                <div class="media-body">
                <p class="font-weight-bold my-0" style="font-weight: bold;">Annonymous User at ' . $thread_time->format('d-m-Y H:i:s') . '</p>
                    <h5 class="mt-0"> <a style="text-decoration: none;" class="text-dark" href="thread.php?thread_id=' . $id . '">' . $title . '</a></h5>
                    ' . $desc . '
                </div>
            </div>';
        }

        if ($noResult) {
            echo '<div class="jumbotron jumbotron-fluid">
                <div class="container">
                <h1 class="display-4">No Threads Found!</h1>
                <p class="lead">Be the first one to ask a Question</p>
                </div>
            </div>';
        }
        ?>

    </div>

    <?php include 'partials/_footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>