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
       <?php
	    echo"<form method=\"post\" action=" .htmlspecialchars($_SERVER["PHP_SELF"]). ">  ";
		echo"<label for=\"actorname\">Search Directors:</label>
        <input type=\"text\" class=\"form-control\" placeholder=\"Actor Name\" name=\"actorname\"> ";
		echo"<label for=\"moviename\">Search Movie:</label>
        <input type=\"text\" class=\"form-control\" placeholder=\"Movie Name\" name=\"moviename\"> ";
		echo "<input type=\"submit\" name =\"search\" value=\"search\"></form>";
		
		 
	   
	   if((isset($_POST['search'])&&!empty($_POST["actorname"])&&!empty($_POST["moviename"])&&$_SERVER["REQUEST_METHOD"] == "POST"))
	 {
		 echo"<form method=\"post\" action=" .htmlspecialchars($_SERVER["PHP_SELF"]). ">  ";
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
		  $actorname = process_input($_POST["actorname"]);
          $moviename = process_input($_POST["moviename"]);
		   
		 $search = explode(" ",$actorname);
		 for ($i = 0; $i < count($search); $i++)
		 {
			$search[$i] = process_input($search[$i]); 
		 }
		 
		   
		 if (count($search)==1)
		 {
			
			 $query = "SELECT id,last,first,dob FROM Director WHERE first='$search[0]' OR last='$search[0]'";
			 $query = "SELECT id, last, first, dob FROM Director AS CNAME WHERE CNAME.first LIKE '%$search[0]%' OR CNAME.last LIKE '%$search[0]%'";
		 }
		 else if (count($search) == 2)
		 {
			 $query = "SELECT id,last,first, dob FROM Director WHERE first='$search[0]' AND last='$search[1]'";
			 $query = "SELECT id,last, first, dob FROM Director AS CNAME WHERE (CNAME.first LIKE '%$search[0]%' AND CNAME.last LIKE '%$search[1]%')
			    OR (CNAME.first LIKE '%$search[1]%' AND CNAME.last LIKE '%$search[0]%')";
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
			
			
			  if(mysql_num_rows($result)){
        $AMenu = "<select name=\"name\">";
        while($row=mysql_fetch_array($result))
                     {
          $AMenu .= "<option value=\""  .$row['id'].  "\">". " did: \"" .$row['id'] . "\" name: \"" .$row['last']. " " .$row['first']. " (" .$row['dob'].  ")\"</option>";
                     }
        }
       $AMenu .="</select>";
	   
			
			
			$search1 = explode(" ",$moviename);
		 for ($i = 0; $i < count($search1); $i++)
		 {
			$search1[$i] = process_input($search1[$i]); 
		 }
		 $query1 = "SELECT id, title, year FROM Movie WHERE";
		 for ($i = 0; $i < count($search1); $i++)
		 {
			 if ($i != count($search1)-1)
			 {
				 $query1 .= " title LIKE '%$search1[$i]%' AND";
			 }
			 else
			 {
				 $query1 .= " title LIKE '%$search1[$i]%'";
			 }
		 }
		 /*
		  echo "<div class=\"answer\">";
		  echo $actorname."<br>";
	      echo $query."<br>";
	      echo $query1."<br>";
	      echo $moviename;
          echo "<br/>"; 
          echo "</div>";
		  */
		 
		 if(!($result1=mysql_query($query1, $db_connection))){
			echo "<div class=\"failedanswer\">";
			echo "Error: " . mysql_error($db_connection);
			echo "</div>";
			echo "<div class=\"footer\">
				<p>By Avery Wong</p>
				</div>";
			mysql_close($db_connection);  
			exit(1);
			}
			
			if(mysql_num_rows($result1)){
        $Menu = "<select name=\"movie\">";
        while($row=mysql_fetch_array($result1))
                     {
          $Menu .= "<option value=\""  .$row['id'].  "\">". "mid: \"" .$row['id'] . "\"   title: \"" .$row['title']. " (" .$row['year'].")".  "\"</option>";
                     }
        }
       $Menu .="</select>";
	   
	   
	   if (mysql_num_rows($result) > 0 && mysql_num_rows($result1) > 0)
	   {
	   echo $AMenu;
       echo $Menu;
	   }
	   else
	   {
		   echo "<div class=\"failedanswer\">";
		echo "No matches found: Refreshing Page";
		echo "</div>";
    echo "<div class=\"footer\">
          <p>By Avery Wong</p>
          </div>"; 
		 $page = $_SERVER['PHP_SELF'];
          $sec = "2";
          header("Refresh: $sec; url=$page");
	   }
			
			 mysql_close($db_connection); 
	      echo "<input type=\"submit\" name =\"continue\" value=\"Add Relation!\"></form>";
	      echo "</form>";		
	 }
	 else if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search']))
	 {
		 echo "<div class=\"failedanswer\">";
    echo "Error: must type in an director's name and a movie's title : Refreshing Page";
    echo "</div>";
    echo "<div class=\"footer\">
          <p>By Avery Wong</p>
          </div>"; 
		 $page = $_SERVER['PHP_SELF'];
          $sec = "2";
          header("Refresh: $sec; url=$page");
	 }
		
	   ?>
        <!--
       <?php 
	   if (isset($_POST['submit'])&& $_SERVER["REQUEST_METHOD"] == "POST" ) {
	     echo"<form method=\"post\" action=" .htmlspecialchars($_SERVER["PHP_SELF"]). ">  ";
	     echo "<label for=\"movie title\">Pick a Movie the director directed:</label>";
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

       $que1=mysql_query("SELECT id,title,year FROM Movie ORDER BY title", $db_connection);
       if(mysql_num_rows($que1)){
        $Menu = "<select name=\"movie\">";
        while($row=mysql_fetch_array($que1))
                     {
          $Menu .= "<option value=\""  .$row['id'].  "\">". "mid: \"" .$row['id'] . "\"   title: \"" .$row['title']. " (" .$row['year'].")".  "\"</option>";
                     }
        }
       $Menu .="</select>";
       echo $Menu;
	   

         echo "<label for=\"actor\">Pick the Actor/Actress:</label>";
       $que2=mysql_query("SELECT id,last,first,dob FROM Actor ORDER BY last, first", $db_connection);
       if(mysql_num_rows($que2)){
        $AMenu = "<select name=\"name\">";
        while($row=mysql_fetch_array($que2))
                     {
          $AMenu .= "<option value=\""  .$row['id'].  "\">". " aid: \"" .$row['id'] . "\" name: \"" .$row['last']. " " .$row['first']. " (" .$row['dob'].  ")\"</option>";
                     }
        }
       $AMenu .="</select>";
	   
       echo $AMenu;
       
       mysql_close($db_connection);  
         echo"
			   <input type=\"submit\" name =\"add\" value=\"Add Relation!\">
		     ";
			 echo "</form>";
	   }
       ?>
        
      -->

     <?php

$insert= "";

 if (isset($_POST['continue'])&& $_SERVER["REQUEST_METHOD"] == "POST") {
 

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

  
    
  $mid = process_input($_POST["movie"]);
  $name = process_input($_POST["name"]);
  

  
  if (!validateComment($role))
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
  $name = intval($name);
  $insert = "INSERT INTO MovieDirector VALUES($mid, $name)";
  

  if(!mysql_query($insert, $db_connection)){
    echo "<div class=\"failedanswer\">";
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
   
  
  </div>

</div>


  </div>

</div>



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
  return ((strlen($name)) <= 50 && (strlen($name) >= 0));
}

?>
 
</html>
