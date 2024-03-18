<?php

echo "<h1>Awards</h1>";
echo "<table class='table table-md table-bordered'>";
echo "<thead class='thead-dark' style='text-align: center'>";

// initialize table headers
echo "<tr>
<th class='col-md-2'>mpid</th>
<th class='col-md-2'>pid</th>
<th class='col-md-2'>award_name</th>
<th class='col-md-2'>award_year</th>
</tr></thead>";

foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
  echo $v;
}

echo "</table>";

?>