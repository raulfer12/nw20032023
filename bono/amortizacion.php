<?php
    require_once "amortizacion_lib.php";
    session_start();
    $saldo= 0;
    $floatCapital = 0.00;
    $floatTasaInteres = 0;
    $floatInteres = 0;
    $interesMensual = 0;
    $intPeriodo = 0;
    $coutaNivelada = 0.00;

     if(
        isset($_POST["btnCalcular"])
    ){
        $floatCapital=floatval($_POST["floatCapital"]);
        $floatTasaInteres=floatval($_POST["floatTasaInteres"]);
        $intPeriodo=intval($_POST["intPeriodo"]);

        if(isset($_POST["btnCalcular"])){
            $floatInteres = porcentaje($floatTasaInteres);
            $interesMensual = interesMensual($floatInteres);
            $coutaNivelada = cuotaNivelada($floatCapital, $interesMensual, $intPeriodo);
            $saldo = saldo($floatCapital,$coutaNivelada);
        }
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Amortizacion</title>
</head>
<body>
    <h1>Tabla de Amortización</h1>
        <form action="amortizacion.php" method="POST">
        <label for="floatCapital">Capital: </label>
        <input type="number" name="floatCapital" 
            id="floatCapital" value="<?php echo $floatCapital;?>">
        <br><br>
        <label for="floatTasaInteres">Tasa de Interés: </label>
        <input type="number" name="floatTasaInteres" 
            id="floatTasaInteres" value="<?php echo $floatTasaInteres;?>">%
        <br><br>
        <label for="intPeriodo">Periodo de Préstamo: </label>
        <input type="number" name="intPeriodo" 
            id="intPeriodo" value="<?php echo $intPeriodo;?>">
            <br><br>
        <button type="submit" name="btnCalcular">Calcular</button>
    </form>
    <h3>Monto Cuota: <?php echo $coutaNivelada; ?></h3>
    <h3>Interés: <?php echo $interesMensual; ?>%</h3>
    <h3>Capital: <?php echo $floatCapital; ?></h3>
    <h3>Saldo Pendiente: <?php echo $saldo; ?></h3>
</body>
</html>