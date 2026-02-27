<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "alternanza1";
    $conn=mysqli_connect($host,$user,$password,$db) or die("Connessione al servernon riuscita."); 
    $query='SELECT UsernameU,PasswordU
            FROM utenti
            ';
 $recordset=mysqli_query($conn,$query);
 $i=21;
 $chiave="Castelluccio";
 while($row = mysqli_fetch_array($recordset)){

     $n= decrypt($row["UsernameU"],$chiave );
     $c=decrypt($row["PasswordU"],$chiave );
     echo "<p>".$n."<p>";
     echo "<p>".$c."<p>";
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