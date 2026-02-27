<?php 
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "alternanza1";
    $conn=mysqli_connect($host,$user,$password,$db) or die("Connessione al servernon riuscita.");
    $query="SELECT COUNT(*) AS NumeroDocenti
           FROM docente";
     $recordset=mysqli_query($conn,$query);
     if($row = mysqli_fetch_array($recordset)){
         $_SESSION["numerod"]=$row["NumeroDocenti"];
     }
    $query="SELECT COUNT(*) AS NumeroStudenti
           FROM studenti";
     $recordset=mysqli_query($conn,$query);
     if($row = mysqli_fetch_array($recordset)){
         $_SESSION["numeros"]=$row["NumeroStudenti"];
     }
$query="SELECT COUNT(*) AS NumeroTutor
           FROM tutor";
     $recordset=mysqli_query($conn,$query);
     if($row = mysqli_fetch_array($recordset)){
         $_SESSION["numerot"]=$row["NumeroTutor"];
     }
   echo "<p id='numero1'>".$_SESSION["numerot"]."</p>";
   echo "<p id='numero2'>".$_SESSION["numerod"]."</p>";
   echo "<p id='numero3'>".$_SESSION["numeros"]."</p>";
?>