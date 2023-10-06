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
    $id = $_GET['thread_id'];
    $sql = "Select * from `threads` where `thread_id` = $id";
    $result = mysqli_query($conn, $sql);
    $noResult = true;
    while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['thread_title'];
        $id = $row['thread_id'];
        $desc = $row['thread_desc'];
    }
    ?>

    <?php
    $showAlert = true;
    $method = $_SERVER['REQUEST_METHOD'];

    if ($method == 'POST') {
        $id = $_GET['thread_id'];
        $content = $_POST['comment'];

        $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES
             ('$content', '$id', '0', current_timestamp());";
        $result = mysqli_query($conn, $sql);

        $showAlert = true;
        if ($showAlert) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong>Thanks for your disccussion with us. Happy Coding!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    ?>

    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4">
                <?php echo $title ?>
            </h1>
            <p class="lead">
                <?php echo $desc ?>
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

            <p>Posted by: <b>Sourav</b></p>
        </div>
    </div>

    <div class="container">
        <h1 class="py-2">Post a Comment</h1>
        <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" .$id method="post">

            <div class="mb-3">
                <label for="comment" class="form-label">Type Your Comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Post Comment</button>
        </form>
    </div>

    <div class="container" id="ques">
        <h1 class="py-2">Discussions</h1>
        <?php
        $id = $_GET['thread_id'];
        $sql = "Select * from `comments` where `thread_id` = $id";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noResult = false;
            $id = $row['comment_id'];
            $content = $row['comment_content'];
            $comment_time = new DateTimeImmutable($row['comment_time']);

            echo '<div class="media d-flex my-3">
                <img class="mr-3 h-50 m-2" src="images/user.png" width="54" alt="Generic placeholder image">
                <div class="media-body">
                <p class="font-weight-bold my-0" style="font-weight: bold;">Annonymous User at ' . $comment_time->format('d-m-Y H:i:s'). '</p>
                    ' . $content . '
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