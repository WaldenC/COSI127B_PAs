<?php

echo "<h1>People Get More than K Awards in 1 Motion Picture in the Same Year</h1>";
echo "<table class='table table-md table-bordered'>";
echo "<thead class='thead-dark' style='text-align: center'>";

// initialize table headers
echo "<tr>
<th class='col-md-2'>Person Name</th>
<th class='col-md-2'>Motion Picture Name</th>
<th class='col-md-2'>Award Year</th>
<th class='col-md-2'>Award Count</th>
</tr></thead>";

foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
  echo $v;
}

echo "</table>";

?>