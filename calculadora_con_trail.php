<?php 
    require_once "calculador_lib.php";
    /*
    include
    require
    include_once //solo una ves
    require_once //
     */
    session_start();
    $intOperador1 = 0;
    $intOperador2 = 0;
    $numResultado = 0;
    $arrTrail = array();
    if(isset($_SESSION["arrTrail"])) {
        
    }
    //btnAdd btnSub btnMul btnDiv
    if(
        isset($_POST["btnAdd"]) || 
        isset($_POST["btnSub"]) ||
        isset($_POST["btnMul"]) ||
        isset($_POST["btnDiv"]) 
    ){
        $intOperador1=floatval($_POST["intOperador1"]);
        $intOperador2=floatval($_POST["intOperador2"]);

        if(isset($_POST["btnAdd"])){
            $numResultado = sumar($intOperador1, $intOperador2);
            $arrTrail[] = sprintf(
            "%f + %f =%f",
            $intOperador1, 
            $intOperador2, 
            $numResultado);
        }
        if(isset($_POST["btnSub"])){
            $numResultado = restar($intOperador1, $intOperador2);
            $arrTrail[] = sprintf(
            "%f - %f =%f",
            $intOperador1, 
            $intOperador2, 
            $numResultado);
        }
        if(isset($_POST["btnMul"])){
            $numResultado = multiplicar($intOperador1, $intOperador2);
            $arrTrail[] = sprintf(
                "%f * %f =%f",
                $intOperador1, 
                $intOperador2, 
                $numResultado);
        }
        if(isset($_POST["btnDiv"])){
            $numResultado = dividir($intOperador1, $intOperador2);
            $arrTrail[] = sprintf(
                "%f / %f =%f",
                $intOperador1, 
                $intOperador2, 
                $numResultado);
        }
    }


    $_SESSION["arrTrail"] = $arrTrail;
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
    <h1>Calculadora</h1>
    <form action="calculadora_con_trail.php" method="POST">
        <label for="intOperador1">Numero 1</label>
        <input type="number" name="intOperador1" 
        id="intOperador1" value="<?php echo $intOperador1;?>">
        <br>
        <label for="intOperador2">Numero 2</label>
        <input type="number" name="intOperador2" 
        id="intOperador2" value="<?php echo $intOperador2;?>">
        <br>
        <button type="submit" name="btnAdd">Sumar</button>&nbsp;
        <button type="submit" name="btnSub">Restar</button>&nbsp;
        <button type="submit" name="btnMul">Multiplicar</button>&nbsp;
        <button type="submit" name="btnDiv">Dividir</button>&nbsp;
    </form>
    <h2>Resultado: <?php echo $numResultado; ?></h2>
    <hr>
    <h2>Trail</h2>
    <ul>
        <?php
            foreach($arrTrail as $strHistorico){
                echo '<li>'. $strHistorico .'</li>';
            }
            
        ?>
    </ul>
</body>
</html>