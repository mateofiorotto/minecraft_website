<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmacion de reembolso</title>
</head>
<body>
    <h2>¡Sentimos que no te haya gustado {{ $user->name }}!</h2>
    <p>Reembolsaste la edición <strong>{{ $edition->title }}</strong>. <strong>Precio:</strong> ${{ $edition->price }}</p>
    <p>Si tuviste algun inconveniente con el reembolso, por favor envianos un correo a esta misma direccion con el ticket de tu compra y tu problema.</p>
    <p><strong>N° de ticket:</strong> {{ $ticket }}</p>
    <p><strong>¡SALUDOS!</strong></p>
</body>
</html>