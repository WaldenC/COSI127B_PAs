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
    <!-- find guests older than input age -->
    <div class="container">
        <form id="ageLimitForm" method="post" action="index.php">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Enter minimum age" name="inputAge" id="inputAge">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" name="viewGuests_byAge" id="button-addon2">Query</button>
                </div>
            </div>
        </form>
    </div>

    <!-- search movies by name -->
    <div class="container">
        <form id="motionPictures_byNameForm" method="post" action="">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Enter Movie Name" name="motionPictureName">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" name="viewMotionPictures_byName" id="button-addon2">Search Movies by Name (Query 2)</button>
                </div>
            </div>
        </form>
    </div>

    <!-- search liked movies by email -->
    <div class="container">
        <form id="motionPictures_byEmail" method="post" action="">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Enter User Email" name="user_email">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" name="viewMotionPictures_byEmail" id="button-addon2">Search Motion Pictures by Email (Query 3)</button>
                </div>
            </div>
        </form>
    </div>

    <!-- search motion pictures by shooting location country -->
    <div class="container">
        <form id="motionPictures_byCountry" method="post" action="">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Enter Shooting Location Country" name="country">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" name="viewMotionPictures_byCountry" id="button-addon2">Search Motion Pictures by Shooting Location Country (Query 4)</button>
                </div>
            </div>
        </form>
    </div>

    <!-- search motion pictures by shooting location country -->
    <div class="container">
        <form id="directorAndSeries_byZipcode" method="post" action="">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Enter Zipcode" name="zipcode">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" name="viewDirectorAndSeries_byZipcode" id="button-addon2">Search Director And TV Series by Zipcode (Query 5)</button>
                </div>
            </div>
        </form>
    </div>

    <!-- search people by award count in single motion picture in one year -->
    <div class="container">
        <form id="people_moreThan_k_awards" method="post" action="">
            <div class="input-group mb-3">
                <input type="number" class="form-control" placeholder="Enter Count(K)" name="awardCount">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" name="viewPeople_moreThan_k_awards" id="button-addon2">Search People by the number of Awards Received in Signle Motion Picture in Same Year (Query 6) </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Search American producers by box office collection and budget -->
    <div class="container">
        <form id="producer_search" method="post" action="">
            <div class="input-group">
                <!-- Box Office Collection Input -->
                <input type="number" class="form-control" placeholder="Enter minimum Box Office Collection (X)" name="minCollection">

                <!-- Budget Input -->
                <input type="number" class="form-control" placeholder="Enter maximum Budget (Y)" name="maxBudget">
                
                <!-- Submit Button -->
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" name="viewProducers_byCollectionAndBudget" id="button-addon2">Search Producers (Query 8)</button>
                </div>
            </div>
        </form>
    </div>

    <!-- List the people who have played multiple roles in a motion picture where the rating is more than “X”  -->
    <div class="container">
        <form id="query9Form" method="post" action="">
            <div class="input-group mb-3">
                <input type="number" step="0.1" class="form-control" placeholder="Enter Rating(X)" name="rating">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" name="viewQuery9" id="button-addon2">List the people who have played multiple roles in a motion picture where the rating is more than “X” (Query 9) </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Search movies by likes and age -->
    <div class="container">
        <form id="query10Form" method="post" action="">
            <div class="input-group">
                <!-- Likes Input -->
                <input type="number" class="form-control" placeholder="Enter minimum number of Likes (X)" name="minLikes">

                <!-- Age Input -->
                <input type="number" class="form-control" placeholder="Enter maximum User Age (Y)" name="maxAge">
                
                <!-- Submit Button -->
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" name="viewMovies_byLikesAndAge" id="button-addon2">Search Movies (Query 11)</button>
                    </div>
            </div>
        </form>
    </div>




    <!-- View tables buttons, show all the data in the database without any extra conditions -->
    <form method="post" action="">
        <div class="row">
            <div class="col text-center">
                <!-- View All Motion Pictures Button -->
                <button class="btn btn-primary mx-2" type="submit" name="viewAllTables">View All Tables (Query 1)</button>

                <!-- View youngest and oldest actors to win at least one award Button -->
                <button class="btn btn-primary mx-2" type="submit" name="viewQuery7">View youngest and oldest actors to win at least one award (Query 7)</button>

                <!-- View the top 2 rates thriller movies (genre is thriller) that were shot exclusively in Boston Button -->
                <button class="btn btn-primary mx-2" type="submit" name="viewQuery10">the top 2 rates thriller movies (genre is thriller) that were shot exclusively in Boston (Query 10)</button>

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

                <!-- View All Awards  Button -->
                <button class="btn btn-success mx-2" type="submit" name="viewAllAwards">View All Awards</button>
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
    } elseif (isset($_POST['viewMotionPictures_byName'])) {
        $viewMode = 'motionPictures_byName';
    } elseif (isset($_POST['viewMotionPictures_byEmail'])) {
        $viewMode = 'motionPictures_byEmail';
    } elseif (isset($_POST['viewMotionPictures_byCountry'])) {
        $viewMode = 'motionPictures_byCountry';
    } elseif (isset($_POST['viewUsers'])) {
        $viewMode = 'users';
    } elseif (isset($_POST['viewAllActors'])) {
        $viewMode = 'actors';
    } elseif (isset($_POST['viewAllGuests']) || isset($_POST['viewGuests_byAge'])) {
        $viewMode = 'guests';
    } elseif(isset($_POST['viewAllLikes'])) {
        $viewMode = 'likes';
    } elseif(isset($_POST['viewAllAwards'])) {
        $viewMode = 'awards';
    } elseif(isset($_POST['viewAllTables'])) {
        $viewMode = 'tables';
    } elseif(isset($_POST['viewDirectorAndSeries_byZipcode'])) {
        $viewMode = 'directorAndSeries_byZipcode';
    } elseif(isset($_POST['viewPeople_moreThan_k_awards'])) {
        $viewMode = 'people_moreThan_k_awards';
    } elseif(isset($_POST['viewQuery7'])) {
        $viewMode = 'query7';
    } elseif(isset($_POST['viewProducers_byCollectionAndBudget'])) {
        $viewMode = 'producers_byCollectionAndBudget';
    } elseif(isset($_POST['viewQuery9'])) {
        $viewMode = 'query9';
    } elseif(isset($_POST['viewQuery10'])) {
        $viewMode = 'query10';
    } else if (isset($_POST['viewMovies_byLikesAndAge'])) {
        $viewMode = 'movies_byLikesAndAge';
    }

    switch ($viewMode) {
        case 'motionPictures':
            // Code to display movie information
            include 'fetchData/fetchMotionPictures.php';
            include 'views/motionPicturesView.php';
            break;
        case 'motionPictures_byName':
            // Code to display movie information searched by name
            include 'fetchData/fetchMotionPictures.php';
            include 'views/motionPicturesView_byName.php';
            break;
        case 'motionPictures_byEmail':
            // Code to display movie information searched by email
            include 'fetchData/fetchMotionPictures.php';
            include 'views/motionPicturesView_byName.php';
            break;
        case 'motionPictures_byCountry':
            // Code to display movie information searched by email
            include 'fetchData/fetchMotionPictures.php';
            include 'views/motionPicturesView_byCountry.php';
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
        case 'awards':
            include 'fetchData/fetchAwards.php';
            include 'views/awardsView.php';
            break;
        case 'tables':
            include 'fetchData/fetchTables.php';
            include 'views/tableView.php';
            break;
        case 'directorAndSeries_byZipcode':
            include 'fetchData/fetchDirectorAndSeries.php';
            include 'views/directorAndSeriesView.php';
            break;
        case 'people_moreThan_k_awards':
            include 'fetchData/fetchPeopleWithMoreThan_k_awards.php';
            include 'views/peopleView_moreThan_k_awards.php';
            break;
        case 'query7':
            include 'fetchData/fetchData_query7.php';
            include 'views/query7View.php';
            break;
        case 'producers_byCollectionAndBudget':
            include 'fetchData/fetchData_query8.php';
            include 'views/query8View.php';
            break;
        case 'query9':
            include 'fetchData/fetchData_query9.php';
            include 'views/query9View.php';
            break;
        case 'query10':
            include 'fetchData/fetchData_query10.php';
            include 'views/query10View.php';
            break;
        case 'movies_byLikesAndAge':
            include 'fetchData/fetchData_query11.php';
            include 'views/query11View.php';
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


