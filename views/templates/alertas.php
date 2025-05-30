<?php  
    //el primer foreach va itear sobre el arreglo principal y acceder al key "error" y el segundo accede a los mensajes 
    foreach($alertas as $key => $mensajes):

        foreach($mensajes as $mensaje):
?>

            <div class="alerta <?php echo $key; ?>" >
                <?php echo $mensaje; ?>
            </div>

<?php
        endforeach;

    endforeach;

?>