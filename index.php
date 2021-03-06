<link rel="stylesheet" href="normalize.css">
<link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="font-awesome/css/font-awesome.css">

<script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="jquery.tablesorter.js"></script>


<script type="text/javascript">
  
$(document).ready(function() {
    $("table").tablesorter({ 
        // initial sort on the first column, order asc 
        sortList: [[0,0]]
});
});
  
</script>

<nav>
<h2>I Love Beer</h2>
</nav>

<div class="form">

<form action="input.php" method="post" class="beer_ajax" style="text-align: center"/>

  <label>Beer: <input type="text" name="beer"></label>
  <label>Brewery: <input type="text" name="brewery"></label>
  <label>City: <input type="text" name="city"></label>
  <label>State/Country: <input type="text" name="state_country"></label>
  <label>Type: <input type="text" name="type"></label>
  <label>Style: <input type="text" name="style"></label>
  <label>ABV%: <input type="text" name="abv"></label>
  <label>Rating (1-5): <input type="text" name="rating"></label>
  <label>Comments: <textarea type="text" name="comments"></textarea></label>
  <br>
  <input type="submit" value="Add Beer" id="submit"/>
  <p id="success"></p>
</form>
  
  </div>

<div class="wrapper">

<?php

require_once('core/config.php');
require_once('core/functions.php');

$link = f_sqlConnect (DB_USER, DB_PASSWORD, DB_NAME);

$sql = 'SELECT * FROM beer_table';

$results = mysql_query($sql);

if (!$results) {
  die ('Invalid query: ' . mysql_error());
}

echo '<div class="beer_number"></div>';

echo '<div class="container">';
echo '<table border="1" style="width:100%" id="myTable" class="tablesorter">';
echo '<thead>
      <tr>
      <th id="beer"><a href="#">Beer<i class="fa fa-sort"></i></a></th>
      <th id="brewery"><a href="#">Brewery<i class="fa fa-sort"></i></a></th> 
      <th id="city"><a href="#">City<i class="fa fa-sort"></i></a></th>
      <th id="state"><a href="#">State/Country<i class="fa fa-sort"></i></a></th>
      <th id="type"><a href="#">Type<i class="fa fa-sort"></i></a></th>
      <th id="style"><a href="#">Style<i class="fa fa-sort"></i></a></th>
      <th id="abv"><a href="#">ABV%<i class="fa fa-sort"></i></a></th>
      <th id="rating"><a href="#">Rating<i class="fa fa-sort"></i></a></th>
      <th id="comments"><a href="#">Comments<i class="fa fa-sort"></i></a></th>
      </tr>
      </thead>
      <tbody>';

while($result = mysql_fetch_array( $results )){

  echo '<tr>';
  
  echo '<td>' . $result['beer'] . '</td>';
  echo '<td>' . $result['brewery'] . '</td>';
  echo '<td>' . $result['city'] . '</td>';
  echo '<td>' . $result['state_country'] . '</td>';
  echo '<td>' . $result['type'] . '</td>';
  echo '<td>' . $result['style'] . '</td>';
  echo '<td>' . $result['abv'] . '</td>';
  echo '<td>' . $result['rating'] . '</td>';
  echo '<td>' . $result['comments'] . '</td>';
  
  echo '</tr>';

}

echo '</tbody>
      </table>
      </div>';

?>

</div>

<script type="text/javascript" src="beer_ajax.js"></script>