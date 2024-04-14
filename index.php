<?php 

const API_URL = "https://whenisthenextmcufilm.com/api";
// Inicializar una nueva sesión de cURL; ch = cURL handle
$ch = curl_init(API_URL);
//Indicar que queremos recibir el resultado de la petición y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//Ejecutar petición y guardar el resultado de curl
$result = curl_exec($ch);
$data = json_decode($result, true);
//Cerrar conexión de curl
curl_close($ch);

?>

<head>
    <meta charset="UTF-8" />
    <title>La próxima película de Marvel</title>
    <meta name="description" content="La próxima película de Marvel" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<main>
    <pre style="font-size: 8px; overflow: scroll; height: 250px;"> 
        <?php var_dump($data); ?>
    </pre>
    
    <section>
        <img src="<?= $data["poster_url"]; ?>" width="300" alt="Poster de <?= $data["title"]; ?>"
        style="border-radius: 16px" />
    </section>

    <hgroup>
        <h3><?= $data["title"]; ?> se estrena en <?= $data["days_until"] ?> días aunque a nadie le importe </h3>
        <p>Fecha de estreno: <?= $data["release_date"]; ?> </p>
    
</main>

<style>
    :root {
        color-scheme: dark blue;
    }

    body {
        display: grid;
        place-content: center;
    }
</style>
