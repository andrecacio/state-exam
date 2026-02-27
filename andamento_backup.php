<html>
<style>
   @import url(css.css);
</style>

<body>
   <div id="dati">
      <?php
      include("import.php")
      ?>
      <p id="numerotu">Numero Tutor:</p>
      <p id="numerodo">Numero Docenti:</p>
      <p id="numerost">Numero Studenti:</p>
   </div>

   <img id="logo3" src="utente.png">

   <h1 id="titolo">
      <?php
      session_start();
      $chiave = "Castelluccio";
      $n = $_SESSION["nome"];
      $id = $_SESSION["id"];
      $name = decrypt($n, $chiave);
      echo $name;

      $r = $_SESSION["rl"];
      if ($r == "Docente") {
         echo "<p id='par1'>Sei un Docente</p>";
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
         echo "<p id='par1'>Sei un Tutor</p>";
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
         echo "<p id='par1'>Sei un alunno</p>";
         $host = "localhost";
         $user = "root";
         $password = "";

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
      }
      echo "<p id='par4'>" . $_SESSION["cognome"] . "</p>";


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
   </h1>
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
      echo "<table id='tabella'>
          <tr>
          <th>Descrizione</th>
          <th>Argomento</th>
          <th>Modalitasvolgimento</th>
          </tr>
       </tabella>";
      while ($row = mysqli_fetch_array($recordset)) {

         echo "

          <button onclick='corso(" . $row['idPeriodo'] . ")' id='rett'>
          <p class='a'>" . $row['Descrizione'] . "</p>
          <p class='b'>" . $row['Argomento'] . "</p>
          <p class='c'>" . $row['ModalitaSvolgimento'] . "</p>
          </button><br>";
      }
   } else if ($r == "Tutor") {
      $query = "SELECT IdPeriodo,Descrizione,Argomento,ModalitaSvolgimento,NomeA
            FROM   ((associazione_pt INNER JOIN tutor ON tutor.IdTutor=associazione_pt.CodTutor)INNER JOIN periodoformativo ON associazione_pt.CodPeriodo=periodoformativo.IdPeriodo)INNER JOIN azienda ON azienda.IdAzienda=tutor.CodAzienda
            WHERE  CodTutor='$id';";
      $recordset = mysqli_query($conn, $query);
      echo "<table id='tabella'>
          <tr>
          <th>Descrizione</th>
          <th>Argomento</th>
          <th>Modalitasvolgimento</th>
          <th>Azienda</th>
          </tr>
       </tabella>";
      while ($row = mysqli_fetch_array($recordset)) {

         echo "

          <button onclick='corso1(" . $row['IdPeriodo'] . ")' id='rett4'>
          <p class='a2'>" . $row['Descrizione'] . "</p>
          <p class='b2'>" . $row['Argomento'] . "</p>
          <p class='c2'>" . $row['ModalitaSvolgimento'] . "</p>
          <p class='d2'>" . $row['NomeA'] . "</p>
          </button>";
      }
   } else if ($r == "Studente") {
      echo "<div id='grafic'>";
      include("grafico.php");
      echo "</div>";
      $query = "SELECT IdPeriodo,Nome,Cognome,NomeT,CognomeT,NomeD,CognomeD,Datainizio,Datafine,NomeA,Descrizione
                   FROM ((((((periodoformativo INNER JOIN docente ON docente.IdDocente=periodoformativo.CodDocente)INNER JOIN associazione_pt ON associazione_pt.CodPeriodo=periodoformativo.IdPeriodo)INNER JOIN tutor ON tutor.IdTutor=associazione_pt.CodTutor)INNER JOIN formazione ON formazione.CodPeriodo=periodoformativo.IdPeriodo)INNER JOIN studenti ON studenti.Idstudente=formazione.CodStudente)INNER JOIN azienda ON azienda.Idazienda=tutor.CodAzienda)
            WHERE  Idstudente='$id';";
      $recordset = mysqli_query($conn, $query);
      echo "<table id='tabella4'>
          <tr>
             <th>Descrizione</th>
          <th>NomeTutor</th>
             <th>NomeDocente</th>
                <th>Datainizio</th>
                <th>Datafine</th>
                <th>NomeAzienda</th>
             
          </tr>
       </tabella>";
      while ($row = mysqli_fetch_array($recordset)) {

         echo "

          <button id='rett5'>
            <p class='l3'>" . $row['Descrizione'] . "</p>
          <p class='c3'>" . decrypt($row['NomeT'], $chiave) . "
          " . decrypt($row['CognomeT'], $chiave) . "</p>
          <p class='e3'>" . decrypt($row['NomeD'], $chiave) . "
          " . decrypt($row['CognomeD'], $chiave) . "</p>
          <p class='g3'>" . $row['Datainizio'] . "</p>
           <p class='h3'>" . $row['Datafine'] . "</p>
            <p class='i3'>" . $row['NomeA'] . "</p>

          </button><br>";
      }
   }

   ?>
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