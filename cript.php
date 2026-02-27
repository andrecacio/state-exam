<?php
 $host = "localhost";
    $user = "root";
    $password = "";
    $db = "alternanza1";
    $conn=mysqli_connect($host,$user,$password,$db) or die("Connessione al servernon riuscita."); 
    $query='SELECT NomeT,CognomeT,Username,Password
            FROM tutor';
 $recordset=mysqli_query($conn,$query);
 $i=21;
 $chiave="Castelluccio";
 while($row = mysqli_fetch_array($recordset)){
     $n=encrypt($row["NomeT"],$chiave);
     $c=encrypt($row["CognomeT"],$chiave);
     $us=encrypt($row["Username"],$chiave);
     $ps=encrypt($row["Password"],$chiave);
     $query1="UPDATE tutor 
     SET NomeT='$n' WHERE IdTutor=$i;";
     $query2="UPDATE tutor 
     SET CognomeT='$c' WHERE IdTutor=$i;";
     $query3="UPDATE tutor 
     SET Username='$us' WHERE IdTutor=$i;";
     $query4="UPDATE tutor 
     SET Password='$ps' WHERE IdTutor=$i;";
     $recordset1=mysqli_query($conn,$query1);
     $recordset2=mysqli_query($conn,$query2);
     $recordset3=mysqli_query($conn,$query3);
     $recordset4=mysqli_query($conn,$query4);
     $i++;
 }
function encrypt($string, $key) {
$result = '';
for($i=0; $i<strlen($string); $i++) {
$char = substr($string, $i, 1);
$keychar = substr($key, ($i % strlen($key))-1, 1);
$char = chr(ord($char)+ord($keychar));
$result.=$char;
}

return base64_encode($result);
}


?>


