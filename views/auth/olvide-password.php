<h1 class="nombre-pagina" >Olvide Password</h1>
<p class="descripcion-pagina">Restablece Tu Password Escribiendo Tu Email a Continuacion</p>

<!--Iterar sobre el arreglo de alertas para mostrarlas en la vita-->
<?php 
    include_once __DIR__ . "/../templates/alertas.php";
?>

<form method="POST" action="/olvide" class="formulario">

    <div class="campo">
        <label for="email">Email</label>
        <input 
            type="email"
            id="email"
            name="email"
            placeholder="Tu Email"
        />
    </div>

    <input type="submit" class="boton" value="Enviar Instrucciones">
    
</form>

<div class="acciones">
    <a href="/">¿Ya tienes una cuenta? Inicia Sesion</a>
    <a href="/crear-cuenta">¿Aun no tienes una cuenta? Crear Una</a>
</div>