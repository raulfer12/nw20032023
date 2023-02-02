<?php 
    session_start();
    $nombre = "";
    $edad = "";
    $arrTrail = array();
    if(isset($_SESSION["arrTrail"])) {
        
    }
    if(isset($_POST["btnConcatenar"])){
        $nombre=strval($_POST["nombre"]);
        $edad=strval($_POST["edad"]);
        if(isset($_POST["btnConcatenar"])){
            $arrTrail[] = sprintf("El estudiante %s tiene %s de edad.", $nombre, $edad);
        }  
    }
    $_SESSION["arrTrail"] = $arrTrail;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concatenación Nombre y Edad</title>
</head>
<body>
    <h1>Concatenación Nombre y Edad</h1>
    <form action="concatenarNombreEdad.php" method="POST">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" 
        id="nombre" value="<?php echo $nombre;?>">
        <br><br>
        <label for="edad">Edad: </label>
        <input type="text" name="edad" 
        id="edad" value="<?php echo $edad;?>">
        <br><br>
        <button type="submit" name="btnConcatenar">Concatenar</button>
    </form>
    <hr>
    <h2>Concatenación: </h2>
    <ul>
        <?php
            foreach($arrTrail as $strHistorico){
                echo '<li>'. $strHistorico .'</li>';
            } 
        ?>
    </ul>
</body>
</html>