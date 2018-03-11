<?php
use Coqueiro\model\VO\Filme;
use Coqueiro\model\VO\Sala;
use Coqueiro\model\VO\Sessao;

/**
 * Created by PhpStorm.
 * User: thales
 * Date: 10/03/2018
 * Time: 22:27
 */
class SessaoTest extends \PHPUnit\Framework\TestCase
{
    /** @var  Sessao */
    private $sessao;

    protected function setUp()
    {
        $stubSala = $this->getMockBuilder(Sala::class)
            ->disableOriginalConstructor()
            ->getMock();

        $stubSala->method('getPreco')
            ->willReturn(10.0);

        $stubFilme = $this->getMockBuilder(Filme::class)
            ->disableOriginalConstructor()
            ->getMock();

        $stubFilme->method('getPreco')
            ->willReturn(10.0);

        $horario = new DateTime('2018-03-10 18:00');
        /** @var Sala $stubSala */
        /** @var Filme $stubFilme */
        $this->sessao = new Sessao($horario, $stubSala, $stubFilme);
    }

    public function testValorDaSessao()
    {
        $actual = $this->sessao->getPreco();
        $expected = 20.0;
        $this->assertEquals($expected, $actual);
    }
}
