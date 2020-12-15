<?php

namespace Alura\Cursos;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\ICrawler;

class BuscadorCursos
{

    private ClientInterface $client;
    private ICrawler $crawler;

    public function __construct(ClientInterface $client, ICrawler $crawler)
    {
        $this->client = $client;
        $this->crawler = $crawler;
    }

    public function buscarCursos(string $url): array
    {

        $response = $this->client->request('GET', $url);

        $html = $response->getBody();

        $this->crawler->addHtmlContent($html);
        $elementosCursos = $this->crawler->filter('.card-curso__nome');

        $cursos = [];

        foreach ($elementosCursos as $elemento) {
            $cursos[] = $elemento->textContent;
        }

        return $cursos;
    }
}
