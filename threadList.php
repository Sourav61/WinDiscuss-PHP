<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WinDiscuss - Doubt Solver</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
        <h1 class="py-2">Browse Questions</h1>
        <div class="media d-flex my-3">
            <img class="mr-3 h-50 m-2" src="images/user.png" width="54" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0">Media heading</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus
                odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate
                fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>
    </div>

    <?php include 'partials/_footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>