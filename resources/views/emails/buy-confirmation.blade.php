<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmacion de compra</title>
</head>
<body>
    <h2>¡Gracias por tu compra {{ $user->name }}!</h2>
    <p>Adquiriste la edición <strong>{{ $edition->title }}</strong>. <strong>Precio:</strong> ${{ $edition->price }}</p>
    <p>A continuación, sigue estos pasos para poder empezar a jugar:</p>
    <ol>
        <li>Descarga el Launcher desde nuestra pagina oficial en <a href="https://www.minecraft.net/es-es/download">https://www.minecraft.net/es-es/download</a></li>
        <li>Instala el Launcher</li>
        <li>Abre el Launcher e inicia sesión (con la misma cuenta de la web)</li>
        <li>Selecciona la edicion que compraste</li>
        <li>¡Dale a play y a jugar!</li>
    </ol>
    <p><strong>N° de ticket:</strong> {{ $ticket }}</p>
    <p><strong>¡GRACIAS!</strong></p>
</body>
</html>