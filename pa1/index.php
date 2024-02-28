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
                <!-- View All Movies Button -->
                <button class="btn btn-primary mx-2" type="submit" name="viewAllMovies">View All Movies</button>

                <!-- View Users Button -->
                <button class="btn btn-secondary mx-2" type="submit" name="viewUsers">View Users</button>

                <!-- View All Actors Button -->
                <button class="btn btn-success mx-2" type="submit" name="viewAllActors">View All Actors</button>

                <!-- View All Guests Button -->
                <button class="btn btn-success mx-2" type="submit" name="viewAllGuests">View All Guests</button>
            </div>
        </div>
    </form>

    <div class="container">
        <h1>NAV VIA BUTTONS</h1>
        

    <?php
    $viewMode = ''; // Default view is empty

    // Detect which button was clicked
    if (isset($_POST['viewAllMovies'])) {
        $viewMode = 'movies';
    } elseif (isset($_POST['viewUsers'])) {
        $viewMode = 'users';
    } elseif (isset($_POST['viewAllActors'])) {
        $viewMode = 'actors';
    } elseif (isset($_POST['viewAllGuests'])) {
        $viewMode = 'guests';
    }

    switch ($viewMode) {
        case 'movies':
            // Code to display movie information
            break;
        case 'users':
            // Code to display user information
            break;
        case 'actors':
            // Code to display actor information
            break;
        case 'guests':
            // we want to check if the submit button has been clicked (in our case, it is named Query)
            if(isset($_POST['submitted']))
            {
                // set age limit to whatever input we get
                // ideally, we should do more validation to check for numbers, etc. 
            $ageLimit = $_POST["inputAge"]; 
            }
            else
            {
                // if the button was not clicked, we can simply set age limit to 0 
                // in this case, we will return everything
                $ageLimit = 0;
            }

            // we will now create a table from PHP side 
            echo "<table class='table table-md table-bordered'>";
            echo "<thead class='thead-dark' style='text-align: center'>";

            // initialize table headers
            // YOU WILL NEED TO CHANGE THIS DEPENDING ON TABLE YOU QUERY OR THE COLUMNS YOU RETURN
            echo "<tr><th class='col-md-2'>Firstname</th><th class='col-md-2'>Lastname</th></tr></thead>";

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

            // SQL CONNECTIONS
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "COSI127b";

            try {
                // We will use PDO to connect to MySQL DB. This part need not be 
                // replicated if we are having multiple queries. 
                // initialize connection and set attributes for errors/exceptions
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // prepare statement for executions. This part needs to change for every query
                $stmt = $conn->prepare("SELECT first_name, last_name FROM guests where age>=$ageLimit");

                // execute statement
                $stmt->execute();

                // set the resulting array to associative. 
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

                // for each row that we fetched, use the iterator to build a table row on front-end
                foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                    echo $v;
                }
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            echo "</table>";
            // destroy our connection
            // $conn = null;
            break;
        default:
            // Default content, perhaps a welcome message or introduction
            break;
    }
    ?>

    <!-- Forms -->
    <form method="post" action="">
        <!-- View All Movies Button -->
        <button class="btn btn-primary" type="submit" name="viewAllMovies">View All Movies</button>

        <!-- View Users Button -->
        <button class="btn btn-secondary" type="submit" name="viewUsers">View Users</button>

        <!-- View All Actors Button -->
        <button class="btn btn-success" type="submit" name="viewAllActors">View All Actors</button>

        
    <!-- Other view buttons -->
        <button class="btn btn-secondary" type="submit" name="viewAllGuests">View All Guests</button>
    </form>


    </div>
</body>
</html>


