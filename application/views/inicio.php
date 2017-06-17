<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>Prueba del controlador "Inicio.php"</title>
</head>
<body>
    <b>El número entero es:</b> <?php echo $numero; ?>
    <br>
    <b>La cadena de caracteres:</b> <?php echo $cadena ?>
    <br>
    <b>El número flotante es: </b> <?php echo $flotante ?>
    <br>
    <b>El contenido del array es: </b>
    <br>
    <ul>
        <?php foreach ($arr as $key => $value) {?>
        <li><?php echo $key . ': ' . $value; ?></li>
        <?php } ?>
    </ul>
    <br>
    <b>El contenido del objeto es: </b>
    <br>
    prop1 : <?php echo $objeto->prop1; ?>
    <br>
    prop2 : <?php echo $objeto->prop2 ?>
    <br>
</body>
</html>