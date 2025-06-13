<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Respuesta a la solicitud de contacto</title>
</head>
<body>
    <h2>¡Gracias por contactarte!</h2>
    <p>Pronto una persona de nuestro equipo se pondra en contacto contigo para resolver tu problema de forma personalizada.</p>
    <p><strong>Usuario:</strong> {{ $user->name }} ({{ $user->email }})</p>
    <p><strong>Problema:</strong> {{ $problem }}</p>
    <p><strong>Descripcion:</strong> {{ $description }}</p>
    <p><strong>¡Saludos!</strong></p>
</body>
</html>