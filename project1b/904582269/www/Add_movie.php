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
    <h1>Add Movie </h1>
    <label for="title">Title:</label>
        <input type="text" class="form-control" placeholder="Text input" name="title"> 
    <label for="company">Company:</label>
        <input type="text" class="form-control" placeholder="Text input" name="company">
    <label for="year">Year:</label>
        <input type="text" class="form-control" placeholder="Text input" name="year">
            <label for="Rot">Rotten Tomatoes Rating(-1 if no rating):</label>
       <select class="form-control" name="Rotr">
	 <?php
           for ($i=-1; $i<=100; $i++)
            {
         ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
         <?php
             }
          ?>
       </select>     
      <label for="IMDB">IMDB Rating(-1 if no rating):</label>
       <select class="form-control" name="IMDBr">
	 <?php
           for ($i=-1; $i<=100; $i++)
            {
         ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
         <?php
             }
          ?>
       </select>
      <label for="rating">MPAA Rating:</label>
       <select class="form-control" name="rate">
          <option value="Not Yet Rated">Not Yet Rated</option>
          <option value="G">G</option>
          <option value="NC-17">NC-17</option>
          <option value="PG">PG</option>
          <option value="PG-13">PG-13</option>
          <option value="R">R</option>
        </select>
                <div class="form-group">
                    <label >Genre:</label><p>
                    <input type="checkbox" name="genre[]" value="Action">Action</input>
                    <input type="checkbox" name="genre[]" value="Adult">Adult</input>
                    <input type="checkbox" name="genre[]" value="Adventure">Adventure</input>
                    <input type="checkbox" name="genre[]" value="Animation">Animation</input>
                    <input type="checkbox" name="genre[]" value="Comedy">Comedy</input>
                    <input type="checkbox" name="genre[]" value="Crime">Crime</input>
                    <input type="checkbox" name="genre[]" value="Documentary">Documentary</input>
                    <input type="checkbox" name="genre[]" value="Drama">Drama</input>
                    <input type="checkbox" name="genre[]" value="Family">Family</input>
                    <br>
                    <input type="checkbox" name="genre[]" value="Fantasy">Fantasy</input>
                    <input type="checkbox" name="genre[]" value="Horror">Horror</input>
                    <input type="checkbox" name="genre[]" value="Musical">Musical</input>
                    <input type="checkbox" name="genre[]" value="Mystery">Mystery</input>
                    <input type="checkbox" name="genre[]" value="Romance">Romance</input>
                    <input type="checkbox" name="genre[]" value="Sci-Fi">Sci-Fi</input>
                    <input type="checkbox" name="genre[]" value="Short">Short</input>
                    <input type="checkbox" name="genre[]" value="Thriller">Thriller</input>
                    <input type="checkbox" name="genre[]" value="War">War</input>
                    <input type="checkbox" name="genre[]" value="Western">Western<p/></input>
                </div>
          <label for="tickets">tickets sold(leave empty if no information):</label>
	        <input type="text" class="form-control" placeholder="Text input" name="tickets">
	  <label for="income">Box Office Performance(US dollars)(leave empty if no information):</label>
	       <input type="text" class="form-control" placeholder="Text input" name="income">
         <input type="submit" value="Submit">
  

  </form>
  </div>

</div>

<?php

$insert = $title = $company  =  "";
$Genre = array("","","","","","","","","","","","","","","","","","","");


 
    
 if ($_SERVER["REQUEST_METHOD"] == "POST") 
 {
     
   $db_connection = mysql_connect("localhost", "cs143", "");
   if (!$db_connection) {
      $errormsg = mysql_error($db_connection);
      echo "Error connecting to MySQL: " . $errormsg . "<br/>";
      echo "<div class=\"footer\">
          <p>By Avery Wong</p>
          </div>"; 
      mysql_close($db_connection);  
       exit(1);
      }

   if (!mysql_select_db("CS143", $db_connection)){
       $errormsg = mysql_error();
       echo "Failed to select database " . "CS143" . ": " . $errormsg . "<br/>";
        echo "<div class=\"footer\">
          <p>By Avery Wong</p>
          </div>";
       exit(1);

       }

    $title = process_input($_POST["title"]);
    $company = process_input($_POST["company"]);
    $year = process_input($_POST["year"]);
    $rate =  process_input($_POST["rate"]);
    $Rotr =  process_input($_POST["Rotr"]);
    $IMDBr =  process_input($_POST["IMDBr"]);
    $tickets = process_input($_POST["tickets"]);
    $income = process_input($_POST["income"]);
  $i = 0;
  if(!empty($_POST["genre"]))
    {
       foreach($_POST["genre"] as $val)
         {
            $Genre[$i] = process_input($val);   
            $i=$i+1;
         }
      } 
  $i = 0;
   
  $Rotr = intval($Rotr);
  $IMDBr = intval($IMDBr);


   if(!empty($_POST["title"]))
   {
      
      if (!validateTitle($title))
       {
         echo "<div class=\"failedanswer\">";
         echo "Error: Title name must be within 100 characters";
         echo "</div>";
         echo "<div class=\"footer\">
               <p>By Avery Wong</p>
               </div>";
         mysql_close($db_connection);
         exit(1);
       }
       else
       {
         $title = "\"" . ($title) . "\"";
       }
   }  
   else
   {
      $title = "NULL";
   }

     
   if(!empty($_POST["company"]))
   {
      
      if (!validateCompany($company))
       {
         echo "<div class=\"failedanswer\">";
         echo "Error: Company name must be within 100 characters";
         echo "</div>";
         echo "<div class=\"footer\">
               <p>By Avery Wong</p>
               </div>";
         mysql_close($db_connection);
         exit(1);
       }
       else
       {
         $company = "\"" . ($company) . "\"";
       }
   }  
   else
   {
      $company = "NULL";
   }

   if(!empty($_POST["year"]))
   {
      if(!ctype_digit($year))
       {
         echo "<div class=\"failedanswer\">";
         echo "Error: year must be all numeric digits";
         echo "</div>";
         echo "<div class=\"footer\">
               <p>By Avery Wong</p>
               </div>";
         mysql_close($db_connection);
         exit(1);
       }
       else
       {
        $year = intval($year);
       }
   }
   else
   {
     $year = "NULL";
   }
  
  if(!empty($_POST["tickets"]))
   {
      if(!ctype_digit($tickets))
       {
         echo "<div class=\"failedanswer\">";
           echo "Error: tickets must be a postive integer";
           echo "</div>";
         echo "<div class=\"footer\">
                 <p>By Avery Wong</p>
		                </div>";
         mysql_close($db_connection);
         exit(1);
       }
       else
       {
        $tickets = intval($tickets);
       }
   }
   else
   {
      $tickets = "NULL";
   } 
  
  if(!empty($_POST["income"]))
   {
      if(!ctype_digit($income))
       {
         echo "<div class=\"failedanswer\">";
           echo "Error: Box Office  must be to the nearest US dollar";
           echo "</div>";
         echo "<div class=\"footer\">
                 <p>By Avery Wong</p>
		                </div>";
         mysql_close($db_connection);
         exit(1);
       }
       else
       {
        $income = intval($income);
       }
   }
   else
   {
      $income = "NULL";
   }
      
  if ($rate == "Not Yet Rated")
  {
    $rate = "NULL";
  } 
  else
  {
     $rate = "\"" . $rate . "\"";
  }

  if ($Rotr < 0)
  {
    $Rotr = "NULL";
   }
 
  if ($IMDBr < 0)
  {
    $IMDBr = "NULL";
  }
   
   if(($que = mysql_query("SELECT id FROM MaxMovieID", $db_connection)))
     {
        $nid = 0;
	if (mysql_num_rows($que) > 0)
        {
	    $row = mysql_fetch_row($que);
	    $nid = $row[0]+1;
	    mysql_free_result($que);
	}
     }
     else
     {
       $errormsg = mysql_error();
       echo "Failed to connect to  database " . "CS143" . ": " . $errormsg . "<br/>";
        echo "<div class=\"footer\">
              <p>By Avery Wong</p>
             </div>";
       mysql_close($db_connection);  
       exit(1);
     }

   $number_of_success = 0;   
   $insert_Movie = "INSERT INTO Movie VALUES($nid, $title, $year, $rate, $company)";
   $number_of_queries = 1;
   if($IMDBr == "NULL" && $Rotr == "NULL")
   { 
     $insert_Movie_Rating = "NULL";
   }
   else
   {
     $insert_Movie_Rating = "INSERT INTO MovieRating VALUES($nid, $IMDBr, $Rotr)";
     $number_of_queries = 2;
   }

   if ($income == "NULL" && $tickets == "NULL")
     {
         $insert_sales = "NULL";
     }
     else
     {
         $insert_sales = "INSERT INTO Sales VALUES($nid,$tickets,$income)";
         $number_of_queries = 3;
     }

   $insert_Movie_Genre[] = array(); 
  
    $j=0;
   
     for ($i = 0; $i < 19; $i++)
   {
     if($Genre[$i] != "")
     {
      $insert_Movie_Genre[$j] = "INSERT INTO MovieGenre VALUES($nid, \"$Genre[$j]\")";
      $j=$j+1;
     }
   }
   $number_of_queries =  $number_of_queries + $j;
 
    		   
if ($insert_Movie != "NULL")
{
if(!mysql_query($insert_Movie, $db_connection)){
    echo "<div class=\"failedanswer\">";
    echo "Error: " . mysql_error($db_connection);
    echo "</div>";
    echo "<div class=\"footer\">
          <p>By Avery Wong</p>
          </div>";
    mysql_close($db_connection);
    exit(1);
     }
    else
    {
    $number_of_success = $number_of_success + mysql_affected_rows($db_connection);
   if(!mysql_query("UPDATE MaxMovieID SET id = id + 1;", $db_connection))
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
    }
}
 
if ($insert_sales != "NULL")
{
if(!mysql_query($insert_sales, $db_connection)){
    echo "<div class=\"failedanswer\">";
    echo "Error: " . mysql_error($db_connection);
    echo "</div>";
    echo "<div class=\"footer\">
          <p>By Avery Wong</p>
          </div>";
    mysql_close($db_connection);
    exit(1);
     }
    else
    {
    $number_of_success = $number_of_success + mysql_affected_rows($db_connection);
    }
}

if ($insert_Movie_Rating != "NULL")
{
 if(!mysql_query($insert_Movie_Rating, $db_connection)){
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
    for($i=0; $i < $j ;$i++)
   {
    if(!mysql_query($insert_Movie_Genre[$i], $db_connection)){
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

  
 if($number_of_queries == $number_of_success){
    echo "<div class=\"answer\">";
    echo "<h3>Successfully added:</h3>";
    echo "<div class=\"answer\">";
    echo $insert_Movie;
    echo "<br/>";
    echo "</div>";
  
  if($insert_Movie_Rating != "NULL")
  {
    echo "<div class=\"answer\">";
    echo  $insert_Movie_Rating;
    echo "<br/>";
    echo "</div>";
  }

 if($insert_sales != "NULL")
  {
    echo "<div class=\"answer\">";
    echo  $insert_sales;
    echo "<br/>";
    echo "</div>";
  }
    
 for($i = 0; $i < $j; $i++)
   {
    echo "<div class=\"answer\">";
    echo $insert_Movie_Genre[$i];
    echo "<br/>";
    echo "</div>";
   }
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

function validateYear($name)
{
   return (intVal($name) > 0);
}

function validateTitle($name)
{
  
  return ((strlen($name)) <= 100 && (strlen($name) > 0));
}

function validateCompany($name)
{
  return ((strlen($name)) <= 100 && (strlen($name) > 0));
}


function validateDeath($date, $dateb)
{
    $d = DateTime::createFromFormat('Y-m-d', $date);
    return ($d && $d->format('Y-m-d') === $date && ($date > $dateb)) || ($date == '');
}

?>
 
</html>
