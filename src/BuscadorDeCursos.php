<?php

namespace Alura\Crawler;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class BuscadorDeCursos
{
    /**
     * @var ClientInterface
     */
    private $httpClient;
    /**
     * @var Crawler
     */
    private $domCrawler;

    public function __construct(ClientInterface $httpClient, Crawler $domCrawler)
    {
        $this->httpClient = $httpClient;
        $this->domCrawler = $domCrawler;
    }

    public function buscarCursos(string $url): array
    {
        $resposta = $this->httpClient->request('GET', $url);
        $html = (string) $resposta->getBody();
        $this->domCrawler->addHtmlContent($html);

        $elementosDosCursos = $this->domCrawler->filter('.card-curso__nome');
        $cursos = [];

        foreach ($elementosDosCursos as $elemento) {
            $cursos[] = $elemento->textContent;
        }

        return $cursos;
    }
}
