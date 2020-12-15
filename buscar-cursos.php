<?php

require_once './vendor/autoload.php';

use Alura\Cursos\BuscadorCursos;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$http = new Client(['base_uri' => 'https://www.alura.com.br/']);
$crawler = new Crawler();

$buscadorCursos = new BuscadorCursos($http, $crawler);
$cursos =  $buscadorCursos->buscarCursos('cursos-online-programacao/php');

foreach ($cursos as $curso) {
    echo $curso . PHP_EOL;
}




