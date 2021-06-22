<html><head> <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <style>
        
        a{
            text-align: center;
            color: black;
          text-decoration: none;
        }
        .c3{
            text-align: right;
        }
        
        body{
            background-color: lightblue;
            margin-left:10px;
        }
       
        .button3 {
  background-color:#14a76c ;
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  opacity: 0.6;
  transition: 0.3s;
  display: inline-block;
  text-decoration: none;
  cursor: pointer;
}
.button3:hover {opacity: 1}
.button1 {
  background-color: #00fffb;
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  opacity: 0.6;
  transition: 0.3s;
  display: inline-block;
  text-decoration: none;
  cursor: pointer;
}
table, th, td {
        border: 5px solid black;
        border-collapse: collapse;
        padding: 5px;
      }
      th{
          background-color: red;
      }
      td{
          background-color: lightgreen;
      }
.button1:hover {opacity: 1}
.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
    </style>
</head>
    
    <body>
    <nav class="navbar navbar-light bg-dark ">
        <span class="navbar-brand mb-0 h1 text-white ml-auto mr-auto"> <h2>VIEW ALL DOCUMENTS</h2> </span>
        
  <div class="c3"><button class=" button1"><a href="home3.php">Go Back</a></button></div>
<div class="cd">
        <button class=" button1"><a href="Logout.php">Logout</a></button>
    </div>
    </nav><br>
    <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="insert.php">Insert</a>
  <a href="update.php">Update</a>
  <a href="delete.php">Delete</a>
  <a href="analysis.php">Analysis</a>
  <a href="analysiss2.php">Analysis-2nd Stage</a>
</div>

<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
<div class="abb">
<form action="" method="post">

<button type="submit" class="button button3">Enter</button>
</form>
<button class="button3"><a href="find4.php" >Find based on Specific Selection</a></button>
</div>

    </body>

</html>
<?php
session_start();

if( isset($_SESSION['username'])  ){
if ($_SERVER["REQUEST_METHOD"] == "POST"){
require_once __DIR__ .'/vendor/autoload.php';
$con=new MongoDB\Client("mongodb://localhost:27017");
$db= $con->NoSql;
$tbl=$db->project;
$cursor = $tbl->find();
   // iterate cursor to display title of documents
   $record= $tbl->count($cursor);
   echo "<hr>";
       echo "<h3>$record records found!!</h3>";	
       echo "<table>
       <tr>
       <th>Insitution Name</th>
       <th>World Rank</th>
       <th>Country</th>
       <th>National Rank</th>
       <th>QOE</th>
       <th>Alumni Employment</th>
       <th>Quality of Faculty</th>
       <th>Publications</th>
       <th>Influence</th>
       <th>Citations</th>
       <th>Board Impact</th>
       <th>Patents</th>
       <th>Score</th>
       <th>Year</th>
     
     </tr>";
      foreach ($cursor as $document) {
       echo "<tr><td>".$document["institution"] .  "</td><td>". $document["world_rank"] .  "</td><td> ". $document["country"]  ."</td><td>".$document["national_rank"].  "</td><td> ".$document["quality_of_education"].  "</td><td>".$document["alumni_employment"].  "</td><td>".$document["quality_of_faculty"] .  "</td><td>".$document["publications"].  "</td><td>".$document["influence"].  "</td><td>".$document["citations"].  "</td><td>".$document["broad_impact"].  "</td><td>".$document["patents"].  "</td><td>".$document["score"].  "</td><td>".$document["year"]."</td></tr>";
   
      }
}

}
else{
  session_unset();     // unset $_SESSION variable for the run-time
session_destroy();   // destroy session data in storage
header('Location:Home.html');
}
?>
