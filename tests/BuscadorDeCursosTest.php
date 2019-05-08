<?php

namespace Alura\Crawler\Tests;

use Alura\Crawler\BuscadorDeCursos;
use GuzzleHttp\ClientInterface;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Symfony\Component\DomCrawler\Crawler;

class BuscadorDeCursosTest extends TestCase
{
    private $buscador;
    private $url = 'url-parametro';

    public function testBuscadorRetornaCursosCorretamente()
    {
        $cursos = $this->buscador->buscarCursos($this->url);

        $this->assertCount(3, $cursos);
        $this->assertEquals('Curso Teste 1', $cursos[0]);
        $this->assertEquals('Curso Teste 2', $cursos[1]);
        $this->assertEquals('Curso Teste 3', $cursos[2]);
    }

    protected function setUp(): void
    {
        $html = <<<FIM
<html>
    <body>
        <span class="card-curso__nome">Curso Teste 1</span>
        <span class="card-curso__nome">Curso Teste 2</span>
        <span class="card-curso__nome">Curso Teste 3</span>
    </body>
</html>
FIM;


        $streamMock = $this->createMock(StreamInterface::class);
        $streamMock
            ->expects($this->once())
            ->method('__toString')
            ->willReturn($html);

        $responseMock = $this->createMock(ResponseInterface::class);
        $responseMock
            ->expects($this->once())
            ->method('getBody')
            ->willReturn($streamMock);


        $httpClientMock = $this->createMock(ClientInterface::class);
        $httpClientMock
            ->expects($this->once())
            ->method('request')
            ->with('GET', $this->url)
            ->willReturn($responseMock);

        $this->buscador = new BuscadorDeCursos($httpClientMock, new Crawler());
    }
}
