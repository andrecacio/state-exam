<?php
   $host = "localhost";
    $user = "root";
    $password = "";
    $db = "alternanza1";
    $conn=mysqli_connect($host,$user,$password,$db) or die("Connessione al servernon riuscita."); 
    $query='SELECT Nome, Cognome, Codicefiscale,Username,Password,Datanascita
            FROM studenti
            ';
$recordset=mysqli_query($conn,$query);
 $i=33;
$chiave="Castelluccio";
 while($row = mysqli_fetch_array($recordset)){
   
     $n= decrypt($row["Nome"],$chiave);
     $c= decrypt($row["Cognome"],$chiave);
     $cd=decrypt($row["Codicefiscale"],$chiave);
     $us=decrypt($row["Username"],$chiave);
     $ps=decrypt($row["Password"],$chiave);
     $d=decrypt($row["Datanascita"],$chiave);
     echo "<p>".$n."<p>";
     echo "<p>".$c."<p>";
     echo "<p>".$cd."<p>";
     echo "<p>".$us."<p>";
     echo "<p>".$ps."<p>";
     echo "<p>".$d."<p>";
     echo "<br>";
     
     $i++;

 }
    function decrypt($string, $key) {
$result = '';
$string = base64_decode($string);
for($i=0; $i<strlen($string); $i++) {
$char = substr($string, $i, 1);
$keychar = substr($key, ($i % strlen($key))-1, 1);
$char = chr(ord($char)-ord($keychar));
$result.=$char;
}
return $result;
}
?>