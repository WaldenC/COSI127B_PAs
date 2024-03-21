<?php

echo "<h1>The top 5 movies with the highest number of people playing a role in that movie</h1>";
echo "<table class='table table-md table-bordered'>";
echo "<thead class='thead-dark' style='text-align: center'>";

// initialize table headers
echo "<tr>
<th class='col-md-2'>movie name</th>
<th class='col-md-2'>people count</th>
<th class='col-md-2'>role count</th>
</tr></thead>";

foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
  echo $v;
}

echo "</table>";

?>