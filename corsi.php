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

        <div id="titolo">
        <i class="fas fa-user-check" id="check_user_icon"></i>
            <?php
            session_start();
            $chiave = "Castelluccio";
            $n = $_SESSION["nome"];
            $name = decrypt($n, $chiave);
            echo "<span class='text'>" . $name . "</span>";
            echo "<span class='text' id='par4'>" . $_SESSION["cognome"] . "</span>";
            if ($_SESSION["rl"] == "Docente") {
                echo "<span class='text' id='par1'>| Docente |</span>";
            } else if ($_SESSION["rl"] == "Tutor") {
                echo "<span class='text' id='par1'>| Tutor |</span>";
            } else if ($_SESSION["rl"] == "Studente") {
                echo "<span class='text' id='par1'>| Alunno |</span>";
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

            <h2 id="titolo2">Ecco il periodo formativo:</h2>

            <?php


            $idstud = $_SESSION["idalu"];

            $id = $_SESSION["corso"];

            $host = "localhost";
            $user = "root";
            $password = "";
            $db = "alternanza1";
            $conn = mysqli_connect($host, $user, $password, $db) or die("Connessione al servernon riuscita.");
            $query = "SELECT Nome,Cognome,Valutazione,Ore
            FROM   formazione INNER JOIN studenti ON studenti.IdStudente=formazione.CodStudente
            WHERE  CodPeriodo='$id' AND CodStudente='$idstud' ";
            $recordset = mysqli_query($conn, $query);
            echo "<table id='tabella3'>
          <tr>
          <th>Nome</th>
          <th>Cognome</th>
          <th>Valutazione</th>
          <th>Ore</th>
          </tr>
       </tabella>";
            while ($row = mysqli_fetch_array($recordset)) {
                $n = decrypt($row["Nome"], $chiave);
                $c = decrypt($row["Cognome"], $chiave);

                echo "

          <tr id='rett3'>
          <td class='a2'>" . $n . "</td>
          <td class='b2'>" . $c . "</td>
          <td class='c2'>" . $row['Valutazione'] . "</td>
           <td class='c2'>" . $row['Ore'] . "</td>
          </tr><br>";
            }
            ?>

        </div>

</body>


</html>