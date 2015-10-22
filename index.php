<script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="beer_ajax.js"></script>

<link rel="stylesheet" href="normalize.css">
<link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="main.css">

<form action="input.php" method="post" class="beer_ajax" style="text-align: center"/>

  <p>Beer: <input type="text" name="beer" /></p>
  <p>Brewery: <input type="text" name="brewery" /></p>
  <p>City: <input type="text" name="city" /></p>
  <p>State/Country: <input type="text" name="state_country" /></p>
  <p>Type: <input type="text" name="type" /></p>
  <p>Style: <input type="text" name="style" /></p>
  <p>ABV%: <input type="text" name="abv" /></p>
  <p>Rating (1-5): <input type="text" name="rating" /></p>
  <p>Comments: <textarea type="text" name="comments"></textarea></p>
  <input type="submit" value="Submit" id="submit"/>
</form>

<div id="confirm"></div>

<?php

require_once('core/config.php');
require_once('core/functions.php');

$link = f_sqlConnect (DB_USER, DB_PASSWORD, DB_NAME);

$sql = 'SELECT * FROM beer_table';

$results = mysql_query($sql);

if (!$results) {
  die ('Invalid query: ' . mysql_error());
}

echo '<h2 style="text-align: center">I Love Beer</h2>';
echo '<div class="container">';
echo '<table border="1" style="width:100%">';
echo '<tr>
      <th>Beer</th>
      <th>Brewery</th> 
      <th>City</th>
      <th>State/Country</th>
      <th>Type</th>
      <th>Style</th>
      <th>ABV%</th>
      <th>Rating</th>
      <th>Comments</th>
      </tr>';

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

echo '</table>';
echo '</div>';

?>

