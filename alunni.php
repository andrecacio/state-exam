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

            <h2 id="titolo2">Ecco gli alunni che partecipano al corso:</h2>

            <?php


            $id = $_SESSION["corso"];
            $host = "localhost";
            $user = "root";
            $password = "";
            $db = "alternanza1";
            $conn = mysqli_connect($host, $user, $password, $db) or die("Connessione al servernon riuscita.");
            $query = "SELECT IdStudente,Nome,Cognome,CodiceFiscale,datanascita
    FROM   studenti inner join formazione on studenti.idstudente=formazione.codstudente
    WHERE  Codperiodo='$id' ";
            $recordset = mysqli_query($conn, $query);
            echo "<table id='tabella1'>
                <tr>
                <th>Nome</th>
                <th>Cognome</th>
                <th>CF</th>
                <th>Datanascita</th>
                </tr>";

            $chiave = "Castelluccio";
            while ($row = mysqli_fetch_array($recordset)) {
                $n = decrypt($row["Nome"], $chiave);
                $c = decrypt($row["Cognome"], $chiave);
                $cp = decrypt($row["CodiceFiscale"], $chiave);
                $d = decrypt($row["datanascita"], $chiave);
                echo "
                    <tr onclick='corso(" . $row['IdStudente'] . ")'>
                <td class='a1'>" . $n . "</td>
                <td class='b1'>" . $c . "</td>
                <td class='c1'>" . $cp . "</td>
                <td class='d1'>" . $d . "</td>
                </tr>";
            }
            echo "</table>";

            ?>

        </div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    function corso(idstu) {
        $.ajax({
            type: "POST",
            url: "./ses1.php",
            data: "ids=" + idstu,
            dataType: "html",
            success: function(risposta) {
                window.location.href = "./corsi.php";

            },
            error: function() {
                alert("Chiamata fallita!!!");
            }
        });
    }
</script>

</html>