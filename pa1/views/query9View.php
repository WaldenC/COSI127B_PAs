<?php

echo "<h1>List the people who have played multiple roles in a motion picture where the rating is more than “X”</h1>";
echo "<table class='table table-md table-bordered'>";
echo "<thead class='thead-dark' style='text-align: center'>";

// initialize table headers
echo "<tr>
<th class='col-md-2'>person name</th>
<th class='col-md-2'>motion picture name</th>
<th class='col-md-2'>role count</th>
</tr></thead>";

foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
  echo $v;
}

echo "</table>";

?>