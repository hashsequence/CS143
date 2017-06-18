<!DOCTYPE html>
<html>
<head>
<title>CS143 Project 1B</title>
</head>

<body>
<h2>CS143 PROJECT 1B</h2>
<h2>Spring 2017</h2>
<h2>Avery Wong</h2>
<h2>UID: 904582269</h2>
</body>

<head>


<style>
* {
    box-sizing: border-box;
}
.header, .footer {
    background-color: grey;
    color: white;
    padding: 15px;
}
.column {
    float: left;
    padding: 15px;
}
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}
.menu {
    width: 25%;
}
.content {
    width: 75%;
}
.menu ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}
.menu li {
    padding: 8px;
    margin-bottom: 8px;
    background-color: #33b5e5;
    color: #ffffff;
}
.menu li:hover {
    background-color: #0099cc;
}

p{
color:gold;
}

h1{
color: gold;
}

h2{
color: gold;
}
label {
  background-color: gold;
  color: black;
  padding: 4px;
 <!-- text-transform: uppercase;
  font-family: Verdana, Arial, Helvetica, sans-serif;-->
  font-size: 100%;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
tr:nth-child(odd){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}

</style>
<style>
body {
   background-image: url("wall.jpg");
   background-color:lightblue;
}
</style>
</head>
<body>

<div class="header">
  <h1>Project 1B</h1>
</div>

<div class="clearfix">
  <div class="column menu">
    <ul>
   <h1>Add Content</h1>
       <li><a href="index.php">Main Page</a></li>
       <li><a href="homepage.php">Add Actor/Director</a></li>
       <li><a href="Add_movie.php">Add Movie Information</a></li>
       <li><a href="Add_comments.php">Add Movie Comments</a></li>
       <li><a href="Add_M_A_R.php">Add Movie/Actor Relation</a></li>
       <li><a href="Add_M_D_R.php">Add Movie/Director Relation</a></li>
   <h1><h1>Browse Content</h1></h1>
       <li><a href="Show_A.php">Show Actor Information</a></li>
       <li><a href="Show_M.php">Show Movie Information</a></li>
   <h1><h1>Search Content</h1></h1>
       <li><a href="search.php">Search/Actor Movie</a></li>
    </ul>
  </div>

<style>
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: blue;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: cyan;
}


div {
    border-radius: 5px;
    background-color:<!--#f2f2f2;-->white;
    padding: 20px;
}

div.answer {
    background-color:Chartreuse;
    color: black;
    margin: 20px 0 20px 0;
    padding: 10px;
   font-size: 100%;
 } 

div.failedanswer {
    background-color:red;
    color: black;
    margin: 20px 0 20px 0;
    padding: 10px;
   font-size: 100%;
 } 


}
</style>
   <div class="column content" color=white
    
    <!--<form action="/action_page.php">-->
   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
   <label for="name">Search Actor:</label>
        <input type="text" class="form-control" placeholder="Your Name" name="name"> 
       <!-- <label for="movie title">Or Pick an Actor(leave "Search Actor blank" if you want to pick):</label>
       <?php 
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

      $que2=mysql_query("SELECT id,last,first,dob FROM Actor", $db_connection);
       if(mysql_num_rows($que2)){
        $AMenu = "<select name=\"choice\">";
        while($row=mysql_fetch_array($que2))
                     {
          $AMenu .= "<option value=\""  .$row['id'].  "\">". " aid: \"" .$row['id'] . "\" name: \"" .$row['last']. " " .$row['first']. " (" .$row['dob'].  ")\"</option>";
                     }
        }
       $AMenu .="</select>";
       echo $AMenu;

       mysql_close($db_connection);  

       ?>
-->
   <input type="submit" value="Submit">
   
   <?php

$insert= "";

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    
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
    $name = process_input($_POST["name"]);
	$choice = process_input($_POST["choice"]);
	
	
	 if(!empty($_POST["name"]))
	 {
		 $search = explode(" ",$name);
		 for ($i = 0; $i < count($search); $i++)
		 {
			$search[$i] = process_input($search[$i]); 
		 }
		 $query = "";
		 if (count($search)==1)
		 {
			
			 $query = "SELECT id,last,first FROM Actor WHERE first='$search[0]' OR last='$search[0]'";
			 $query = "SELECT id, last, first FROM Actor AS CNAME WHERE CNAME.first LIKE '%$search[0]%' OR CNAME.last LIKE '%$search[0]%'";
		 }
		 else if (count($search) == 2)
		 {
			 $query = "SELECT id,last,first FROM Actor WHERE first='$search[0]' AND last='$search[1]'";
			 $query = "SELECT id,last, first FROM Actor AS CNAME WHERE CNAME.first LIKE '%$search[0]%' AND CNAME.last LIKE '%$search[1]%'";
		 }
         		 
		 
		 if(!($result=mysql_query($query, $db_connection))){
			echo "<div class=\"failedanswer\">";
			echo "Error: " . mysql_error($db_connection);
			echo "</div>";
			echo "<div class=\"footer\">
				<p>By Avery Wong</p>
				</div>";
			mysql_close($db_connection);  
			exit(1);
			}
			echo "<h2>Output:</h2>";
			echo "<table border=1  <tr>";
			echo "<th>List of Actors/Actresses</th></tr>";
			while($row=mysql_fetch_array($result)){
          $FirstName=$row['first'];
          $LastName=$row['last'];
          $ID=$row['id'];
           //-display the result of the array
           echo "<ul>\n";
           echo "<tr><td>" . "<a  href=\"Show_A.php?cid=$ID\">"   .$FirstName . " " . $LastName .  "</a></td></tr>";
			}
			echo "</ul></tr></table>";
			 mysql_close($db_connection); 
			 		
	 }
	 /*else 
	 {
		 $id = $choice;
		
   
	   $query = "SELECT * FROM Actor WHERE id=$id";
		  
   if(!($result=mysql_query($query, $db_connection)))
   {
	   echo "<div class=\"failedanswer\">";
    echo "Error: " . mysql_error($db_connection);
    echo "</div>";
    echo "<div class=\"footer\">
          <p>By Avery Wong</p>
          </div>";
       mysql_close($db_connection);  
    exit(1);
   } 
   else{
	 echo "<h2>Actor's/Actress's Info:</h2>";
    displayResult($result);
   }
   
	   $query = "SELECT mid, role, title AS movie, year FROM MovieActor AS b JOIN 
		  (SELECT * FROM Movie a WHERE id IN (SELECT mid FROM MovieActor WHERE aid = $id)) 
		  AS c WHERE b.mid = c.id AND aid = $id";
		  
   if(!($result=mysql_query($query, $db_connection)))
   {
	   echo "<div class=\"failedanswer\">";
    echo "Error: " . mysql_error($db_connection);
    echo "</div>";
    echo "<div class=\"footer\">
          <p>By Avery Wong</p>
          </div>";
       mysql_close($db_connection);  
    exit(1);
   } 
   else{
	    echo "<h2>Movies Actor/Actress Starred in:</h2>";
    displayResult1($result);
   }
   mysql_close($db_connection); 
	 
	 }*/
	 
	 
 }

if(isset($_GET['cid'])){ 
	 $id=$_GET['cid'];
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
   
    $query = "SELECT * FROM Actor WHERE id=$id";
		  
   if(!($result=mysql_query($query, $db_connection)))
   {
	   echo "<div class=\"failedanswer\">";
    echo "Error: " . mysql_error($db_connection);
    echo "</div>";
    echo "<div class=\"footer\">
          <p>By Avery Wong</p>
          </div>";
       mysql_close($db_connection);  
    exit(1);
   } 
   else{
	 echo "<h2>Actor's/Actress's Info:</h2>";
    displayResult($result);
   }
   
	   $query = "SELECT mid, role, title AS movie, year FROM MovieActor AS b JOIN 
		  (SELECT * FROM Movie a WHERE id IN (SELECT mid FROM MovieActor WHERE aid = $id)) 
		  AS c WHERE b.mid = c.id AND aid = $id";
		  
   if(!($result=mysql_query($query, $db_connection)))
   {
	   echo "<div class=\"failedanswer\">";
    echo "Error: " . mysql_error($db_connection);
    echo "</div>";
    echo "<div class=\"footer\">
          <p>By Avery Wong</p>
          </div>";
       mysql_close($db_connection);  
    exit(1);
   } 
   else{
	    echo "<h2>Movies Actor/Actress Starred in:</h2>";
    displayResult1($result);
   }
   
   
   mysql_close($db_connection); 
	 
	 }
	 
	
   
?>

<div class="footer">
  <p>By Avery Wong</p>
</div>

</body>



<?php

function process_input($data) {
 // $data = trim($data);
  $data = stripslashes($data);
 // $data = htmlspecialchars($data);
   mysql_real_escape_string($data, $db_connection);
  return $data;
                               }
function validateDate($date)
{
    $d = DateTime::createFromFormat('Y-m-d', $date);
    return $d && $d->format('Y-m-d') === $date;
}

function validateName($name)
{
  return ((strlen($name)) <= 20 && (strlen($name) >= 0));
}

function validateLname($name)
{
  return ((strlen($name)) <= 20 && (strlen($name) >= 0));
}

function validateDeath($date, $dateb)
{
    $d = DateTime::createFromFormat('Y-m-d', $date);
    return ($d && $d->format('Y-m-d') === $date && ($date > $dateb)) || ($date == '');
}

function validateComment($name)
{
  return ((strlen($name)) <= 500 && (strlen($name) >= 0));
}

function displayResult($data1) {
    $fields = mysql_num_fields($data1);
    $rows = mysql_num_rows($data1);


    if ($rows > 0) {
     echo "<table border=1  <tr>";
	  mysql_fetch_field($data1);
      for ($i=1; $i < $fields; $i++)
	  {
		 echo "<th>" . mysql_fetch_field($data1)->name . "</th>";
	  }
      echo "</tr>";
        while ($row = mysql_fetch_row($data1)) {
            echo "<tr>";
            for ($j=1; $j < $fields; $j++) {
                if ($row[$j]==NULL)
				{
                    echo "<td>\N</td>";
				}
                else
				{
                    echo "<td>" . $row[$j] . "</td>";
				}
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    else {
	 echo "<div class=\"failedanswer\">";
     echo "no results found" . "<br>";
	 echo "</div>";
    }
    mysql_free_result($data1);
}

function displayResult1($data1) {
    $fields = mysql_num_fields($data1);
    $rows = mysql_num_rows($data1);


    if ($rows > 0) {
     echo "<table border=1  <tr>";
	  mysql_fetch_field($data1);
      for ($i=0; $i < $fields-1; $i++)
	  {
		 echo "<th>" . mysql_fetch_field($data1)->name . "</th>";
	  }
      echo "</tr>";
        while ($row = mysql_fetch_row($data1)) {
            echo "<tr>";
            for ($j=1; $j < $fields; $j++) {
                if ($row[$j]==NULL)
				{
                    echo "<td>\N</td>";
				}
				else if ($j == 2)
				{
					echo "<ul><td>" . "<a href=\"Show_M.php?did=$row[0]\">"   . $row[$j] .  "</a></td></ul>";
				}
                else
				{
                    echo "<td>" . $row[$j] . "</td>";
				}
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    else {
	 echo "<div class=\"failedanswer\">";
     echo "no results found" . "<br>";
	 echo "</div>";
    }
    mysql_free_result($data1);
}





?>
   
  </form>
  </div>

</div>



  </form>
  </div>

</div>


 
</html>
