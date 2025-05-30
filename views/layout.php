<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Salón</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700;900&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="build/css/app.css">
</head>
<body>

    <div class="contenedor-app">
        
        <!--IAMGEN-->
        <div class="imagen"></div>
        
        <!--CONTENIDO PRINCIPAL TARIDO DEL MODELO (RENDER)-->
        <div class="contenido">
            <?php echo $contenido; ?>
        </div>

    </div>

    <?php
        //Solo se requiere en algunos lugares de lo contrario se imprime un script vacio 
        echo $script ?? '';
    ?>

</body>
</html>