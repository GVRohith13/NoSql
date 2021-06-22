<html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<STYle>
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
    h1{
        text-align: center;
        background-color: orange;
    }
    body{
        background-color: lightblue;
            background-size: 100% 100%;
    }
    .c3{
            text-align: right;
    }
    a{
            text-align: center;
            color: black;
          text-decoration: none;
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

.button1:hover {opacity: 1}
</STYle>
    </head>
    <body>
    <nav class="navbar navbar-light bg-dark ">
        <span class="navbar-brand mb-0 h1 text-white ml-auto mr-auto"> <h2>SELECT A FIELD AND ENTER SEARCH WITH STRING</h2> </span>
        
  <div class="c3"><button class=" button1"><a href="find2.php">Go Back</a></button></div>
<div class="cd">
        <button class=" button1"><a href="Home.html">Home</a></button>
    </div>
    </nav><br>
        <h5>SELECT A FIELD AND ITS RESPECTIVE VALUE</h1>
        

        <form action="" method="post">


        <input list="browsersN" id="list" name="list" placeholder="select an item">

<datalist id="browsersN">
<option value="institution">
<option value="country">	               
</datalist>

<br><br>
            <input type="text" name="n" id="n" placeholder="Enter n value">
           <br><br>
           <button type="submit" class=" button3">Enter</button>
                </form>
                <br>
    </body>
</html>

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST"){
require_once __DIR__ .'/vendor/autoload.php';
$con=new MongoDB\Client("mongodb://localhost:27017");
$db= $con->NoSql;
$tbl=$db->project;
$ab=$_POST['list'];
$n=$_POST['n'];

$cursor = $tbl->find([$ab => $n]);
   // iterate cursor to display title of documents
   $record= $tbl->count([$ab => $n]);
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



?>