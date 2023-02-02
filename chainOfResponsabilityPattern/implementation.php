<?php
    require_once 'accountTransformer.php';
    $txtTransformedAccount = "";
    $txtAccount = "";
    if(isset($_POST["btnProcesar"])){
        $txtAccount =$_POST["txtAccount"];
        $cleanInstance = new CleanCRHandler();
        $reverseInstance = new ReverseCRHandler();
        $replace_0_R = new ReplaceCRHandler(0,"r");
        $replace_8_S = new ReplaceCRHandler(8,"s");
        $cleanInstance
        ->setNext($reverseInstance)
        ->setNext($replace_0_R)
        ->setNext($replace_8_S);
        $txtTransformedAccount = $cleanInstance->handle($txtAccount);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chain of Responsability</title>
</head>
<body>
    <h1>Chain of Responsability</h1>
    <form action="implementation.php" method="post">
        <label for="txtAccount">
            Cuenta
        </label>
        <input type="text" name="txtAccount" value="<?php echo $txtAccount; ?>" id="txtAccount"/>
        <br>
        <button type ="submit" name="btnProcesar">Procesar</button>
    </form>
    <section>
        <?php 
            echo $txtTransformedAccount 
        ?>
    </section>
</body>
</html>