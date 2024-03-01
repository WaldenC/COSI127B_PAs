<?php

echo "<h1>Guests</h1>";
echo "<table class='table table-md table-bordered'>";
echo "<thead class='thead-dark' style='text-align: center'>";

// initialize table headers
echo "<tr><th class='col-md-2'>id</th><th class='col-md-2'>name</th><th class='col-md-2'>nationality</th><th class='col-md-2'>dob</th><th class='col-md-2'>gender</th></tr></thead>";

foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
  echo $v;
}

echo "</table>";

?>