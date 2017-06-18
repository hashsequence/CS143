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
        
			
		 <?php 
		 if (!isset($_GET['eid']))
		 {
        echo "<label for=\"movie title\">Pick a Movie to Review:</label>";
      
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

       $que1=mysql_query("SELECT id,title FROM Movie", $db_connection);
       if(mysql_num_rows($que1)){
        $Menu = "<select name=\"movie\">";
        while($row=mysql_fetch_array($que1))
                     {
          $Menu .= "<option value=\""  .$row['id'].  "\">". "mid: \"" .$row['id'] . "\"   title: \"" .$row['title'].  "\"</option>";
                     }
        }
       $Menu .="</select>";
       echo $Menu;
	   echo "
	    <label for=\"name\">Name:</label>
        <input type=\"text\" class=\"form-control\" placeholder=\"Your Name\" name=\"name\"> 
      <div class=\"form-group\">
        <label for=\"comment\"> Review/Comment:<br></label>  
        <textarea id=\"comment\" rows=\"20\" cols=\"50\" name=\"review\" placeholder=\"Please leave a review/comment!\"></textarea>        
       </div>
      <label for=\"Rating\">Rating:</label>
       <select class=\"form-control\" name=\"rate\">
                     <option value=\"0\">0: Trash</option>
                     <option value=\"1\">1: Terrible</option>
                     <option value=\"2\">2: Bad</option>
                     <option value=\"3\">3: Average</option>
                     <option value=\"4\">4: Good</option>
                     <option value=\"5\">5: Spectacular</option>
       </select>
   <input type=\"submit\" name = \"submit\" value=\"Submit\">
	   ";

       mysql_close($db_connection);  
         }
		 else
		 {
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
		  
		 
			 $NEWID = $_GET['eid'];
			 $query = "SELECT title FROM Movie WHERE id = $NEWID";
			 
		echo"<input type=\"hidden\" name=\"eid2\" value=". $NEWID ." />";
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
	    
     $row = mysql_fetch_row($result);
	 echo "<h2>Add Review For: ".$row[0].":</h2>";
	 
   }
			mysql_close($db_connection);
			echo "
	    <label for=\"name\">Name:</label>
        <input type=\"text\" class=\"form-control\" placeholder=\"Your Name\" name=\"name\"> 
      <div class=\"form-group\">
        <label for=\"comment\"> Review/Comment:<br></label>  
        <textarea id=\"comment\" rows=\"20\" cols=\"50\" name=\"review\" placeholder=\"Please leave a review/comment!\"></textarea>        
       </div>
      <label for=\"Rating\">Rating:</label>
       <select class=\"form-control\" name=\"rate\">
                     <option value=\"0\">0: Trash</option>
                     <option value=\"1\">1: Terrible</option>
                     <option value=\"2\">2: Bad</option>
                     <option value=\"3\">3: Average</option>
                     <option value=\"4\">4: Good</option>
                     <option value=\"5\">5: Spectacular</option>
       </select>
   <input type=\"submit\" name = \"submit\" value=\"Submit\">
	   ";
		 }
       ?>
	   <!--
        <label for="name">Name:</label>
        <input type="text" class="form-control" placeholder="Your Name" name="name"> 

      <div class="form-group">
        <label for="comment"> Review/Comment:<br></label>  
        <textarea id="comment" rows="20" cols="50" name="review" placeholder="Please leave a review/comment!"></textarea>        
       </div> 

      <label for="Rating">Rating:</label>
       <select class="form-control" name="rate">
                     <option value="0">0: Trash</option>
                     <option value="1">1: Terrible</option>
                     <option value="2">2: Bad</option>
                     <option value="3">3: Average</option>
                     <option value="4">4: Good</option>
                     <option value="5">5: Spectacular</option>
       </select>
   <input type="submit" name = "submit" value="Submit">
   -->
  </form>
  </div>

</div>



  </form>
  </div>

</div>

<?php

$insert= "";



 if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
 

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


  $review = process_input($_POST["review"]);
  $rate = process_input($_POST["rate"]);  
  $name = process_input($_POST["name"]);   
	 if (!isset($_GET['eid']))
	 {
           $mid = process_input($_POST["movie"]);
	 }
	 if(isset($_POST["eid2"]))
	 {
		 $mid = $_POST["eid2"];
	
	 }
	
		 
	 
	
	
   
   if(!empty($_POST["name"]))
    {

      if (!validateName($name))
      {
         echo "<div class=\"failedanswer\">";
         echo "Error: name must be within 20 characters.";
         echo "</div>";
         echo "<div class=\"footer\">
              <p>By Avery Wong</p>
              </div>";
          mysql_close($db_connection);  
        exit(1);
      }

    }
    else
    {
      $name = "anon";
       /*
      if(!($num=mysql_query("SELECT COUNT(*) FROM Review", $db_connection))){
       echo "<div class=\"failedanswer\">";
       echo "Error: " . mysql_error($db_connection);
       echo "</div>";
       echo "<div class=\"footer\">
          <p>By Avery Wong</p>
          </div>";
       mysql_close($db_connection);  
       exit(1);
       }
        $row = mysql_fetch_assoc($num);
        $name .= "-" . $row['COUNT(*)'];
        */
    }
   

  if (!validateComment($review))
  {
    echo "<div class=\"failedanswer\">";
    echo "Error: name must be within 500 characters.";
    echo "</div>";
    echo "<div class=\"footer\">
          <p>By Avery Wong</p>
          </div>";
       mysql_close($db_connection);  
    exit(1);
   }   

  $mid = intval($mid);
  $rate = intval($rate);
  $insert = "INSERT INTO Review VALUES(\"$name\", LOCALTIME(), $mid, $rate, \"$review\")";
  
  if(!mysql_query($insert, $db_connection)){
    echo "<div class=\"failedanswer\">";
	echo $insert;
    echo "Error: " . mysql_error($db_connection);
    echo "</div>";
    echo "<div class=\"footer\">
          <p>By Avery Wong</p>
          </div>";
       mysql_close($db_connection);  
    exit(1);
    }

  
    
  if(mysql_affected_rows($db_connection)){
    echo "<div class=\"answer\">";
    echo "<h3>Successfully added:</h3>"; 
    echo $insert;
    echo "<br/>"; 
    echo "</div>";
  }
  else {
    echo "<div class=\"failedanswer\">";
    echo "<h3>Failed to add:</h3>"; 
    echo $insert;
    echo "<br/>"; 
    echo "</div>";
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

function midFromMovie($mname)
{
	
}

?>
 
</html>
