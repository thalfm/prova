<?php
use Coqueiro\model\VO\Filme;
use Coqueiro\model\VO\Sala;
use Coqueiro\model\VO\Sessao;

/**
 * Created by PhpStorm.
 * User: thales
 * Date: 10/03/2018
 * Time: 22:55
 */
class SessaoIntegrationTest extends \PHPUnit\Framework\TestCase
{

    /** @var  Sessao */
    private $sessao;

    protected function setUp()
    {
        $duracao = new DateInterval('PT2H30M');
        $filme = (new Filme())
            ->setNome('Terminator')
            ->setDuracao($duracao)
            ->setGenero('Ação')
            ->setPreco(10.0)
            ->setId(1);

        $sala = (new Sala())
            ->setId(1)
            ->setPreco(10)
            ->setNome('3D');

        $horario = new DateTime('2018-03-10 18:00');
        $this->sessao = new Sessao($horario, $sala, $filme);
    }

    public function testValorDaSessao()
    {
        $actual = $this->sessao->getPreco();
        $expected = 20.0;
        $this->assertEquals($expected, $actual);
    }
}