<?php
    require_once 'textAnalizer/TextAnalizerClass.php';
    session_start();
    $txtLongText = "";
    $htmlFinal = "";

    if(isset($_POST["btnAnalizar"])) {
        $txtLongText = $_POST["txtLongText"];
        $miTextAnalizer = new TextAnalizer($txtLongText);
        $frecuencias = $miTextAnalizer->getAnalizedText();
        $totalPalabras = count($frecuencias);
        $maxFreq = 0;
        /*foreach($frecuencias as $freq) {
            $maxFreq = $freq;
            break;
        }*/

        $maxFreq = reset($frecuencias);
        //$maxFreq =$frecuencias; //max(0, $frecuencias);
        foreach($frecuencias as $palabra => $frecuencia) {
            $htmlFinal .= "<div style=\"font-size:".(($frecuencia + $maxFreq)/$maxFreq)."rem;\">".$palabra."( ".$frecuencia.")</div>";
        }

    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Analizador de Texto</h1>
    <form action="text_analizer.php" method="post">
        <label for="txtLongText">Texto a Analizar</label>
        <textarea name="txtLongText"
            id="txtLongText" cols="30" rows="10"
            ><?php echo $txtLongText; ?></textarea>
            <br>
            <br>
            <button type="submit" name="btnAnalizar">Analizar</button>
    </form>
    <hr>
    <div>
        <?php echo $htmlFinal ?>
    </div>
</body>
</html>