<?php

echo "<h1>Movies</h1>";
echo "<table class='table table-md table-bordered'>";
echo "<thead class='thead-dark' style='text-align: center'>";

// initialize table headers
// YOU WILL NEED TO CHANGE THIS DEPENDING ON TABLE YOU QUERY OR THE COLUMNS YOU RETURN
echo "<tr><th class='col-md-1'>id</th><th class='col-md-1'>name</th><th class='col-md-1'>production</th><th class='col-md-1'>budget</th><th class='col-md-1'>rating</th></tr></thead>";

foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
  echo $v;
}

echo "</table>";

?>