<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Bootstrap JS dependencies -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COSI 127b</title>
</head>
<body>
    <div class="container">
        <h1 style="text-align:center">COSI 127b</h1><br>
        <h3 style="text-align:center">Connecting Front-End to MySQL DB</h3><br>
    </div>
    <div class="container">
        <form id="ageLimitForm" method="post" action="index.php">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Enter minimum age" name="inputAge" id="inputAge">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" name="submitted" id="button-addon2">Query</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Forms -->
    <form method="post" action="">
        <div class="row">
            <div class="col text-center">
                <!-- View All Motion Pictures Button -->
                <button class="btn btn-primary mx-2" type="submit" name="viewAllMotionPictures">View All Motion Pictures</button>

                <!-- View Users Button -->
                <button class="btn btn-secondary mx-2" type="submit" name="viewUsers">View Users</button>

                <!-- View All Actors Button -->
                <button class="btn btn-success mx-2" type="submit" name="viewAllActors">View All Actors</button>

                <!-- View All Guests Button -->
                <button class="btn btn-success mx-2" type="submit" name="viewAllGuests">View All Guests</button>

                 <!-- View All Likes  Button -->
                 <button class="btn btn-success mx-2" type="submit" name="viewAllLikes">View All Likes</button>
            </div>
        </div>
    </form>

    <?php
        session_start();

        if (isset($_SESSION['message'])) {
            echo "<script>alert('" . $_SESSION['message'] . "');</script>";
            unset($_SESSION['message']);
        }
    ?>

    <div class="container">
    <?php
    // generic table builder. It will automatically build table data rows irrespective of result
    class TableRows extends RecursiveIteratorIterator {
        function __construct($it) {
            parent::__construct($it, self::LEAVES_ONLY);
        }

        function current() {
            return "<td style='text-align:center'>" . parent::current(). "</td>";
        }

        function beginChildren() {
            echo "<tr>";
        }

        function endChildren() {
            echo "</tr>" . "\n";
        }
    }

    $viewMode = ''; // Default view is empty

    // Detect which button was clicked
    if (isset($_POST['viewAllMotionPictures'])) {
        $viewMode = 'motionPictures';
    } elseif (isset($_POST['viewUsers'])) {
        $viewMode = 'users';
    } elseif (isset($_POST['viewAllActors'])) {
        $viewMode = 'actors';
    } elseif (isset($_POST['viewAllGuests'])) {
        $viewMode = 'guests';
    } elseif(isset($_POST['viewAllLikes'])) {
        $viewMode = 'likes';
    }

    switch ($viewMode) {
        case 'motionPictures':
            // Code to display movie information
            include 'fetchData/fetchMotionPictures.php';
            include 'views/motionPicturesView.php';
            break;
        case 'users':
            include 'fetchData/fetchUser.php';
            include 'views/userView.php';
            break;
        case 'actors':
            include 'fetchData/fetchActors.php';
            include 'views/actorsView.php';
            break;
        case 'guests':
            include 'fetchData/fetchGuests.php';
            include 'views/guestsView.php';
            break;
        case 'likes':
            include 'fetchData/fetchLikes.php';
            include 'views/likesView.php';
            break;
        default:
            // Default content, perhaps a welcome message or introduction
            include 'fetchData/fetchMovies.php';
            include 'views/moviesView.php';
            break;
    }
    ?>


    </div>
</body>
</html>


