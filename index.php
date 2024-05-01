<?php


const API_URL = "https://www.whenisthenextmcufilm.com/api";

#inicializar una nueva sesion de cURL; ch = cURL handle 

$ch = curl_init(API_URL);

#indicar que queremos recibir el resultado de la peticion y no mostrarla en pantalla

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

/*Ejecutar la peticiony guardamos el resultado*/

$result = curl_exec($ch);

#una vez tengamos el resultado lo transforme 

$data = json_decode($result, true);
curl_close($ch);
?>

<head>
    <meta name="description" content="La proxima pelicula">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>La proxima pelicula culera de Marvel</title>
    <!-- Centered viewport --> 
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
/>
</head>

<main>
    <section>
    <img src="<?= $data["poster_url"]; ?>" width="500" alt="poster de <?=$data["title"]; ?>" style="border-radius: 16px">
    </section>
    <hgroup>
        <h3><?= $data["title"]; ?> se estrena en <?=$data["days_until"]; ?> dias</h3>
        <p>Fecha de estreno <?= $data["release_date"]; ?></p>
        <p> la siguiente pelicula es <?= $data ["following_production"]["title"]; ?> </p>
    </hgroup>
</main>

<style>
    :root{
        color-scheme: dark;
    }

    body{
        display: grid;
        place-content: center;
    
    } 

    section{
        display: flex;
        justify-content: center;
    }
    
    hgroup{
        display: flex;
        flex-direction: column;
        text-align: center;
    }
    
</style>