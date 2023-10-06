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

    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/slider-4.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/slider-2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/slider-3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container my-3" id="ques">
        <h2 class="text-center my-3">Welcome to WinDiscuss - Browse Categories</h2>
        <div class="row my-3">

            <?php
            $sql = 'Select * from `categories`';
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['category_id'];
                $cat = $row['category_name'];
                $desc = $row['category_description'];
                echo '
                <div class="col-md-4 my-2">
                    <div class="card" style="width: 18rem;">
                        <img src="images/card-' . $id . '.jpg" class="card-img-top" alt="Image for ' . $cat . '">
                        <div class="card-body">
                            <h5 class="card-title"><a href="threadList.php?cat_id=' . $id . '" style="text-decoration: none;">' . $cat . '</a></h5>
                            <p class="card-text">' . substr($desc, 0, 90) . '....</p>
                            <a href="threadList.php?cat_id=' . $id . '" class="btn btn-primary">View Threads</a>
                        </div>
                    </div>
                </div>';
            }
            ?>

        </div>
    </div>

    <?php include 'partials/_footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
</body>

</html>