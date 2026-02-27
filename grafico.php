<?php
$ID=$_SESSION["id"];
//echo $idRegione. ' '.$regione.'<br>';
$sql = "SELECT distinct descrizione, ore
        FROM formazione inner join periodoformativo on formazione.codperiodo=periodoformativo.idperiodo 
        where codstudente=$id;";

$recordSet = mysqli_query($conn, $sql) or die("Errore: ".mysqli_error($conn));

        $labels = array();
        $data   = array();
        
        while ($row = mysqli_fetch_assoc($recordSet)) {
            $data[]   = $row["ore"];

             $labels[] = $row["descrizione"];
            
        }

        // Now you can aggregate all the data into one string
        $data_string = "[" . join(", ", $data) . "]";
        $labels_string = "['" . join("', '", $labels) . "']";
echo "<head>

    <!-- Don't forget to update these paths -->

    <script src='./RGraph/libraries/RGraph.common.core.js' ></script>
    <script src='./RGraph/libraries/RGraph.line.js' ></script>
    <script src='./RGraph/libraries/RGraph.bar.js'></script>

</head>
<body>
    <div class='grafico'>
    <canvas id='cvs' width='700' height='250'>[No canvas support]</canvas>
    </div>
    <script>
        totale = new RGraph.Bar({
            id: 'cvs',
            data: $data_string,
            options: {
            
                marginLeft: 100,
                marginRight: 1,
                marginInner: 10,
                tickmarksStyle: 'endcircle',
                xaxisLabelsSize:10,
                xaxisLabelsAngle:90,
                xaxisTickmarksCount:10,
                xaxisLabels: $labels_string,
                width:40

            }
        }).draw().responsive([
        {maxWidth: 900, width:400,height:200,options: {textSize:10,marginInner: 2,shadow:false,xaxis: false,yaxis: false, color: white}, css: {'float': 'none'}},
        {maxWidth: null,width:600,height:300,options: {textSize:14,marginInner: 5,shadow:true, xaxis: false,yaxis: false, color: white}, css: {'float': 'left'}}
    ], {delay: 0});
    </script>

</body> "
?>

