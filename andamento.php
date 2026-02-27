<html>
<style>
   @import url(css2.css);
</style>
<script src="https://kit.fontawesome.com/4f09f1f973.js" crossorigin="anonymous"></script>
<body>
   <div id="dati">

      <div class="number_container">

         <span class="n_text" id="numerotu">Numero Tutor:</span>
         <?php
         include("databaseconn.php");
         $query = "SELECT COUNT(*) AS NumeroTutor
           FROM tutor";
         $recordset = mysqli_query($conn, $query);
         if ($row = mysqli_fetch_array($recordset)) {
            $_SESSION["numerot"] = $row["NumeroTutor"];
         }
         echo "<span class='n_text' id='numero1'>" . $_SESSION["numerot"] . "</span>";
         ?>
         <br>
         <span class="n_text" id="numerodo">Numero Docenti:</span>
         <?php
         $query = "SELECT COUNT(*) AS NumeroDocenti
         FROM docente";
         $recordset = mysqli_query($conn, $query);
         if ($row = mysqli_fetch_array($recordset)) {
            $_SESSION["numerod"] = $row["NumeroDocenti"];
            echo "<span class='n_text' id='numero2'>" . $_SESSION["numerod"] . "</span>";
         }
         ?>
         <br>
         <span class="n_text" class="n_text" id="numerost">Numero Studenti:</span>
         <?php
         $query = "SELECT COUNT(*) AS NumeroStudenti
             FROM studenti";
         $recordset = mysqli_query($conn, $query);
         if ($row = mysqli_fetch_array($recordset)) {
            $_SESSION["numeros"] = $row["NumeroStudenti"];
            echo "<span class='n_text' id='numero3'>" . $_SESSION["numeros"] . "</span>";
         }
         ?>

      </div>

   </div>

   <div id="titolo">
   <i class="fas fa-user-check" id="check_user_icon"></i>
      <?php
      session_start();
      $chiave = "Castelluccio";
      $n = $_SESSION["nome"];
      $id = $_SESSION["id"];
      $name = decrypt($n, $chiave);
      echo "<span class='text'>" . $name . "</span>";

      $db = "alternanza1";
      $conn = mysqli_connect($host, $user, $password, $db) or die("Connessione al servernon riuscita.");
      $chiave = "Castelluccio";
      $query = "Select Cognome
            From studenti 
            where IdStudente='$id'";
      $recordset = mysqli_query($conn, $query);
      if ($row = mysqli_fetch_array($recordset)) {
         $_SESSION["cognome"] = decrypt($row["Cognome"], $chiave);
      }
      echo "<span id='par4' class='text'>" . $_SESSION["cognome"] . "</span>";

      $r = $_SESSION["rl"];
      if ($r == "Docente") {
         echo "<span id='par1' class='text'>| Docente |</span>";
         $host = "localhost";
         $user = "root";
         $password = "";
         $db = "alternanza1";
         $conn = mysqli_connect($host, $user, $password, $db) or die("Connessione al servernon riuscita.");
         $chiave = "Castelluccio";
         $query = "Select CognomeD
            From docente 
            where IdDocente='$id'";
         $recordset = mysqli_query($conn, $query);
         if ($row = mysqli_fetch_array($recordset)) {
            $_SESSION["cognome"] = decrypt($row["CognomeD"], $chiave);
         }
      } else if ($r == "Tutor") {
         echo "<span id='par1' class='text'>| Tutor |</span>";
         $host = "localhost";
         $user = "root";
         $password = "";

         $db = "alternanza1";
         $conn = mysqli_connect($host, $user, $password, $db) or die("Connessione al servernon riuscita.");
         $chiave = "Castelluccio";
         $query = "Select CognomeT
            From tutor 
            where IdTutor='$id'";
         $recordset = mysqli_query($conn, $query);
         if ($row = mysqli_fetch_array($recordset)) {
            $_SESSION["cognome"] = decrypt($row["CognomeT"], $chiave);
         }
      } else if ($r == "Studente") {
         echo "<span id='par1' class='text'>| Alunno |</span>";
         $host = "localhost";
         $user = "root";
         $password = "";
      }


      function decrypt($string, $key)
      {
         $result = '';
         $string = base64_decode($string);
         for ($i = 0; $i < strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) - ord($keychar));
            $result .= $char;
         }
         return $result;
      }
      ?>
   </div>

   <div class="table_container">
      <h2 id="titolo2">Ecco i tuoi corsi:</h2>
      <?php


      $id = $_SESSION["id"];
      $host = "localhost";
      $user = "root";
      $password = "";
      $db = "alternanza1";
      $conn = mysqli_connect($host, $user, $password, $db) or die("Connessione al servernon riuscita.");
      if ($r == "Docente") {
         $query = "SELECT idPeriodo,Descrizione,Argomento,ModalitaSvolgimento
         FROM   periodoformativo
         WHERE  CodDocente='$id' ";
         $recordset = mysqli_query($conn, $query);
         echo "<table id='tabella' class='table_and'>
       <tr>
       <th>Descrizione</th>
       <th>Argomento</th>
       <th>Modalitasvolgimento</th>
       </tr>";
         while ($row = mysqli_fetch_array($recordset)) {

            echo "
      <tr onclick='corso(" . $row['idPeriodo'] . ")'>
       <td class='a'>" . $row['Descrizione'] . "</td>
       <td class='b'>" . $row['Argomento'] . "</td>
       <td class='c'>" . $row['ModalitaSvolgimento'] . "</td>
       </button>
       </tr>";
         }
         echo "</table>";
      } else if ($r == "Tutor") {
         $query = "SELECT IdPeriodo,Descrizione,Argomento,ModalitaSvolgimento,NomeA
         FROM   ((associazione_pt INNER JOIN tutor ON tutor.IdTutor=associazione_pt.CodTutor)INNER JOIN periodoformativo ON associazione_pt.CodPeriodo=periodoformativo.IdPeriodo)INNER JOIN azienda ON azienda.IdAzienda=tutor.CodAzienda
         WHERE  CodTutor='$id';";
         $recordset = mysqli_query($conn, $query);
         echo "<table id='tabella' class='table_and'>
       <tr>
       <th>Descrizione</th>
       <th>Argomento</th>
       <th>Modalitasvolgimento</th>
       <th>Azienda</th>
       </tr>";
         while ($row = mysqli_fetch_array($recordset)) {

            echo "
        <tr onclick='corso1(" . $row['IdPeriodo'] . ")'>    
       <td class='a2'>" . $row['Descrizione'] . "</td>
       <td class='b2'>" . $row['Argomento'] . "</td>
       <td class='c2'>" . $row['ModalitaSvolgimento'] . "</td>
       <td class='d2'>" . $row['NomeA'] . "</td>
       </tr>";
         }
         echo "</table>";
      } else if ($r == "Studente") {
         $query = "SELECT IdPeriodo,Nome,Cognome,NomeT,CognomeT,NomeD,CognomeD,Datainizio,Datafine,NomeA,Descrizione
                FROM ((((((periodoformativo INNER JOIN docente ON docente.IdDocente=periodoformativo.CodDocente)INNER JOIN associazione_pt ON associazione_pt.CodPeriodo=periodoformativo.IdPeriodo)INNER JOIN tutor ON tutor.IdTutor=associazione_pt.CodTutor)INNER JOIN formazione ON formazione.CodPeriodo=periodoformativo.IdPeriodo)INNER JOIN studenti ON studenti.Idstudente=formazione.CodStudente)INNER JOIN azienda ON azienda.Idazienda=tutor.CodAzienda)
         WHERE  Idstudente='$id';";
         $recordset = mysqli_query($conn, $query);
         echo "<table id='tabella4' class='table_and'>
       <tr>
          <th>Descrizione</th>
       <th>NomeTutor</th>
          <th>NomeDocente</th>
             <th>Datainizio</th>
             <th>Datafine</th>
             <th>NomeAzienda</th>
          
       </tr>";
         while ($row = mysqli_fetch_array($recordset)) {

            echo "
       <tr id='rett5'>
         <td class='l3'>" . $row['Descrizione'] . "</td>
       <td class='c3'>" . decrypt($row['NomeT'], $chiave) . "
       " . decrypt($row['CognomeT'], $chiave) . "</td>
       <td class='e3'>" . decrypt($row['NomeD'], $chiave) . "
       " . decrypt($row['CognomeD'], $chiave) . "</td>
       <td class='g3'>" . $row['Datainizio'] . "</td>
        <td class='h3'>" . $row['Datafine'] . "</td>
         <td class='i3'>" . $row['NomeA'] . "</td>

       </tr>";
         }
         echo "</table>";
         include("grafico.php");
      }

      ?>

   </div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
   function corso(id) {
      $.ajax({
         type: "POST",
         url: "./ses.php",
         data: "id=" + id,
         dataType: "html",
         success: function(risposta) {
            window.location.href = "./alunni.php";
         },
         error: function() {
            alert("Chiamata fallita!!!");
         }
      });
   }

   function corso1(id) {
      $.ajax({
         type: "POST",
         url: "./ses.php",
         data: "id=" + id,
         dataType: "html",
         success: function(risposta) {
            window.location.href = "./alunni.php";
         },
         error: function() {
            alert("Chiamata fallita!!!");
         }
      });
   }
</script>

</html>