<?php

echo "<h1>Likes</h1>";
echo "<table class='table table-md table-bordered'>";
echo "<thead class='thead-dark' style='text-align: center'>";

// initialize table headers
echo "<tr><th class='col-md-2'>uemail</th><th class='col-md-2'>mpid</th></tr></thead>";

foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
  echo $v;
}

echo "</table>";

?>