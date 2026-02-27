
<?php
    $ps=$_POST["pass"];
    $us=$_POST["user"];
     session_start();
       $host = "localhost";
    $user = "root";
    $password = "";

    $db = "alternanza1";
    $conn=mysqli_connect($host,$user,$password,$db) or die("Connessione al servernon riuscita."); 
    $chiave="Castelluccio";
    $use=encrypt($us,$chiave);
 
    $pas=encrypt($ps,$chiave);

    $query="Select *
            From utenti 
            where UsernameU='$use' and PasswordU='$pas'";
     
  

    $recordset=mysqli_query($conn,$query);
     if($row = mysqli_fetch_array($recordset)){
         $_SESSION["nome"]=$row["UsernameU"];
          $_SESSION["rl"]=$row["Ruolo"];
         if($row["Ruolo"]=="Docente"){
         $_SESSION["id"]=$row["CodDocente"];
         }else if($row["Ruolo"]=="Studente"){
         $_SESSION["id"]=$row["CodStudente"];
         }else if($row["Ruolo"]=="Tutor"){
         $_SESSION["id"]=$row["CodTutor"];    
         }
         echo 1;
     }
     else echo 0;



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