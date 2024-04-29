<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Prueba tecnica</title>

</head>

<!-- Se elimina la clase "invisible" del body para que sea visible. -->
<body>
    <h1>Nombre: {{ $aplicante['nombre'] }}</h1>
    <h2>Nivel: {{$aplicante['nivel']}}</h2>
    <!-- Previamente, se utilizaba la línea if ($aplicante -> aprobado),
    que era incorrecta para saber si el valor $aplicante['aprobado'] era true o false.
    Por eso, se modificó para que si tome el valor. -->
    @if ($aplicante['aprobado'])
        <h2>APROBADO</h1>
        @else
            <h2>REPROBADO</h1>
    @endif
</body>

</html>
<style>
    .invisible {
        display: none;
    }
</style>
