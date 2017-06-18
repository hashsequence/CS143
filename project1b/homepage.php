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
    <!--     
	 <label class="radio-inline">
            <input type="radio" checked="checked" name="identity" value="Actor"/>Actor</label>
      <label class="radio-inline">
            <input type="radio" name="identity" value="Director"/>Director</label><br><br>
	  -->
	  <div class="form-group">
                    <label >Genre:</label><p>
                    <input type="checkbox" name="identity[]" value="Director">Director</input>
                    <input type="checkbox" name="identity[]" value="Actor">Actor</input>
                </div>
			
			
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="first name..">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="last name..">
    
     <label class="radio-inline">
         <input type="radio" name="sex" checked="checked" value="Male">Male </label>
     <label class="radio-inline">
         <input type="radio" name="sex" value="Female">Female</label>
     <label class="radio-inline">
         <input type="radio" name="sex" value="Neither">Neither</label>
     <div class="form-group">
         <label for="DOB">Date of Birth</label>
         <input type="text" class="form-control" placeholder="Text input" name="dateb"> <label> ie: 1999-12-31<br></label>
      </div>
      <div class="form-group">
          <label for="DOD">Date of Death</label>
          <input type="text" class="form-control" placeholder="Text input" name="dated"> <label>(leave blank if alive now)<br></label>
      </div> 
   <input type="submit" value="Submit">



  </form>
  </div>

</div>

<?php

$insert= $identity = $firstname = $lastname = $sex = $dateb = $dated = "";

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

   $nid = 0;
   $que = mysql_query("SELECT id FROM MaxPersonID", $db_connection);
   if (mysql_num_rows($que) > 0){
     $row = mysql_fetch_row($que);
     $nid = $row[0]+1;
     mysql_free_result($que);
     }


    
  
 /*$identity = process_input($_POST["identity"]); */
 $firstname = process_input($_POST["firstname"]); 
 $lastname = process_input($_POST["lastname"]); 
 $sex = process_input($_POST["sex"]); 
 $dateb = process_input($_POST["dateb"]);
 $dated = process_input($_POST["dated"]);  

 
  $i = 0;
  if(!empty($_POST["identity"]))
    {
       foreach($_POST["identity"] as $val)
         {
            $Identity[$i] = process_input($val);   
            $i=$i+1;
         }
      } 
  $i = 0;
    
  
  $flag1= validateName($firstname);
  $flag4= validateLname($lastname);
  $flag2= validateDate($dateb);
  $flag3 = validateDeath($dated,$dateb);;
  
if(!empty($_POST["$lastname"]))
{
  if (!($flag4))
  { 
    echo "<div class=\"failedanswer\">";
    echo "last name must be within 20 characters long";
    echo "<br/>";
    echo "</div>";
      echo "<div class=\"footer\">
          <p>By Avery Wong</p>
          </div>";  
    mysql_close($db_connection);  
    exit(1);
  }  
}

     if (!($flag1))
  { 
    echo "<div class=\"failedanswer\">";
    echo "first name must be within 20 characters long";
    echo "<br/>";
    echo "</div>";
      echo "<div class=\"footer\">
          <p>By Avery Wong</p>
          </div>";
     mysql_close($db_connection);  
    exit(1);
  }
  if (!($flag2))
  {
    echo "<div class=\"failedanswer\">";
    echo "Date of birth format must be: YYYY-MM-DD";
    echo "<br/>";
    echo "</div>";
    echo "<div class=\"footer\">
          <p>By Avery Wong</p>
          </div>";
   mysql_close($db_connection);  
    exit(1);
  } 
  if(!($flag3))
  {
    echo "<div class=\"failedanswer\">"; 
    echo "Date of death format must be: YYYY-MM-DD and greater than the date of birth";
    echo "<br/>";
    echo "</div>";
      echo "<div class=\"footer\">
          <p>By Avery Wong</p>
          </div>";
    mysql_close($db_connection);  
    exit(1);
  }
  
  if($Identity[0] == "" && $Identity[1] == "" )
  {
    echo "<div class=\"failedanswer\">"; 
    echo "must choose at least one option between Director and Actor";
    echo "<br/>";
    echo "</div>";
      echo "<div class=\"footer\">
          <p>By Avery Wong</p>
          </div>";
    mysql_close($db_connection);  
    exit(1);
  }
  
  
  if ($dated =="")
    {
      $dated="NULL";
    }
   else
    {
      $dated = "\"".$dated."\"";
    }

    if ($sex =="Neither")
    {
      $sex="NULL";
    }
   else
    {
      $sex = "\"".$sex."\"";
    }

  
 $j=0;
   
     for ($i = 0; $i < 2; $i++)
   {
     if($Identity[$i] != "")
     {
      if ($Identity[$i] == "Actor"){       
		$Identity[$i] = "INSERT INTO Actor VALUES($nid,\"$lastname\", \"$firstname\", $sex, \"$dateb\", $dated)"; 
		}
		else
		{
		$Identity[$i] = "INSERT INTO Director VALUES($nid, \"$lastname\", \"$firstname\", \"$dateb\", $dated)"; 
		}
      $j=$j+1;
     }
   }
    $number_of_queries = $j;
    $number_of_success = 0;
  for($i=0; $i < $j ;$i++)
   {
    if(!mysql_query($Identity[$i], $db_connection)){
    echo "<div class=\"failedanswer\">";
    echo "Error: " . mysql_error($db_connection);
    echo "</div>";
    echo "<div class=\"footer\">
          <p>By Avery Wong</p>
          </div>";
    mysql_close($db_connection);
    exit(1);
     }
   $number_of_success = $number_of_success + mysql_affected_rows($db_connection);
   }

  /*
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


    */
  if($number_of_queries == $number_of_success){
    if(!mysql_query("UPDATE MaxPersonID SET id = id + 1;", $db_connection)){
    echo "Error: " . mysql_error($db_connection);
    echo "</div>";
    echo "<div class=\"footer\">
          <p>By Avery Wong</p>
          </div>";
    mysql_close($db_connection);  
    exit(1);
    }

    echo "<div class=\"answer\">";
    echo "<h3>Successfully added:</h3>"; 
	echo $Identity[0]."<br>";
	echo $Identity[1];
    echo "<br/>"; 
    echo "</div>";
  }
  else {
    echo "<div class=\"failedanswer\">";
    echo "<h3>Failed to add:</h3>"; 
	echo $number_of_queries;
	echo $number_of_success;
	echo $Identity[0]."<br>";
	echo $Identity[1];
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

?>
 
</html>
