<?php
echo "<h1>Movies</h1>";
echo "<table class='table table-md table-bordered'>";
echo "<thead class='thead-dark' style='text-align: center'>";

// initialize table headers
// YOU WILL NEED TO CHANGE THIS DEPENDING ON TABLE YOU QUERY OR THE COLUMNS YOU RETURN
echo "<tr>
<th class='col-md-1'>id</th>
<th class='col-md-1'>name</th>
<th class='col-md-1'>production</th>
<th class='col-md-1'>budget</th>
<th class='col-md-1'>rating</th>
<th class='col-md-1'>like the movie</th>
</tr></thead>";

$movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($movies as $movie) {
    echo "<tr>";
    foreach ($movie as $key => $value) {
        echo "<td>" . htmlspecialchars($value) . "</td>";
        if ($key == 'rating') {
            //add a form to like the movie
            echo "<td><form action='like_movie.php' method='post'>";
            echo "<input type='text' name='user_email' placeholder='Enter your email'>";
            echo "<input type='hidden' name='movie_id' value='" . htmlspecialchars($movie['id']) . "'>";
            echo "<button type='submit' name='like' value='like'>Like</button>";
            echo "</form></td>";
        }
    }
    echo "</tr>";
}



echo "</table>";

?>