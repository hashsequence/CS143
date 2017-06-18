<!DOCTYPE HTML>  
<html>

<head>
<title>Page Title</title>
</head>

<body>
<h1>CS143 Project1a</h1>
<h2>Spring 2017</h2>
<h2>Avery Wong</h2>
<h2>UID: 904582269</h2>
</body>

<table  style="width:100%">
  <h3> Tables </h3>
  <tr>
    <td>Movie(id, title, year, rating, company)</td>
  </tr>
  <tr>
    <td>Actor(id last, first, sex, dob, dod)</td>
  </tr>
  <tr>
    <td>Sales(mid, ticketsSold, totalIncome)</td>
  </tr>
  <tr>
   <td>Director(id, last, first, dob, dod)</td>
  </tr>
  <tr>
   <td>MovieGenre(mid, genre)</td>
  </tr>
  <tr>
   <td>MovieDirector(mid, did)</td>
  </tr>
  <tr>
   <td>MovieActor(mid, aid, role)</td>
  </tr>
  <tr>
   <td>MovieRating(mid, imdb, rot)</td>
  </tr>
  <tr>
   <td>Review(name, time, mid, rating, comment)</td>
  </tr>
  <tr>
   <td>MaxPersonID(id)</td>
  </tr>
  <tr>
   <td>MaxMovieID(id)</td>
  </tr>
</table>

<body>  

<h2>Type an SQL query in the following box:</h2>
<p> Example Query:</p>
<p> SELECT a.did FROM (SELECT DISTINCT did, totalIncome FROM MovieDirector, Sales WHERE MovieDirector.mid = Sales.mid GROUP BY did HAVING totalIncome > 17900000 ORDER BY totalIncome) AS a</p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <textarea name="query" rows="5" cols="40"></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>


<?php
// define variables and set to empty values
$query = $output = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
 $query = process_input($_POST["query"]);
 
 
}

$db_connection = mysql_connect("localhost", "cs143", "");
if (!$db_connection) {
    $errormsg = mysql_error($db_connection);
    echo "Error connecting to MySQL: " . $errormsg . "<br/>";
    exit(1);
}

if (!mysql_select_db("CS143", $db_connection)){
   $errormsg = mysql_error();
   echo "Failed to select database " . "CS143" . ": " . $errormsg . "<br/>";
    exit(1);

}

 $output = mysql_query($query, $db_connection);
 mysql_close($db_connection);

?>

<?php
echo "<h2>Your Query:</h2>";
echo $query;
echo "<br/>";
displayResult($output);
?>

<?php
function process_input($data) {
 // $data = trim($data);
  $data = stripslashes($data);
 // $data = htmlspecialchars($data);
  mysql_real_escape_string($data, $db_connection);
  return $data;
}

function displayResult($data1) {
    $fields = mysql_num_fields($data1);
    $rows = mysql_num_rows($data1);
    echo "<h2>Output:</h2>";

    if ($rows > 0) {
     echo "<table border=1  <tr>";
      for ($i=0; $i < $fields; $i++){
          echo "<th>" . mysql_fetch_field($data1)->name . "</th>";
         }
      echo "</tr>";
        while ($row = mysql_fetch_row($data1)) {
            echo "<tr>";
            for ($j=0; $j < $fields; $j++) {
                if ($row[$j]==NULL)
                    echo "<td>\N</td>";
                else
                    echo "<td>" . $row[$j] . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    else {
     echo "no results found" . "<br>";
    }
    mysql_free_result($data1);
}



?>
</body>
</html>
