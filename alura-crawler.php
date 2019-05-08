<?php

require __DIR__ . '/vendor/autoload.php';

$httpClient = new \GuzzleHttp\Client(['base_uri' => 'https://www.alura.com.br/']);

$domCrawler = new \Symfony\Component\DomCrawler\Crawler();

$buscador = new Alura\Crawler\BuscadorDeCursos($httpClient, $domCrawler);
$cursos = $buscador->buscarCursos('cursos-online-programacao/php');

foreach ($cursos as $curso) {
    echo $curso . PHP_EOL;
}
