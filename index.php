<?php
require_once 'classes/classes.php';
require_once 'classes/api.php';

$apiPelicula = new ApiPelicula('https://whenisthenextmcufilm.com/api');
$data = $apiPelicula->obtenerDatos();

$peliculaActual = $apiPelicula->Pelicula($data);
$peliculaSiguiente = $apiPelicula->PeliculaSiguiente($data);
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Próximas 2 películas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="./style.css" rel="stylesheet">
    <link rel="icon" href="./logo-marvel.jpg">
</head>
<body>
    <a id="boton" href="../index.php"><button class="btn btn-primary">Volver</button></a>
    <br><br>
    <div class="container movie-container">
        <?= $peliculaActual->mostrarDetalles(); ?>
    </div>
    <div class="container movie-container">
        <h2 class="mt-4">La siguiente película es:</h2>
        <?= $peliculaSiguiente->mostrarDetalles(); ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>