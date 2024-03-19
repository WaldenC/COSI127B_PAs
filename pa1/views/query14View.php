<?php

echo "<h1>The actors who have played a role in both “Marvel” and “Warner Bros” productions</h1>";
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