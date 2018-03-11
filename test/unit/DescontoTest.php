<?php
use Coqueiro\Model\Descontos\{
    DescontoParaBancos, DescontoParaEstudantes, SemDesconto
};
use Coqueiro\model\VO\{
    Filme, Ingresso, Sala, Sessao
};

/**
 * Created by PhpStorm.
 * User: thales
 * Date: 10/03/2018
 * Time: 21:03
 */
class DescontoTest extends \PHPUnit\Framework\TestCase
{
    /** @var  Ingresso */
    private $ingressoSemDesconto;
    /** @var  Ingresso */
    private $ingressoParaBancos;
    /** @var  Ingresso */
    private $ingressoParaEstudantes;

    protected function setUp()
    {
        $stub = $this->getMockBuilder(Sessao::class)
            ->disableOriginalConstructor()
            ->getMock();

        $stub->method('getPreco')
            ->willReturn(20.0);

        /** @var Sessao $stub */
        $this->ingressoSemDesconto = new Ingresso($stub, new SemDesconto());
        $this->ingressoParaBancos = new Ingresso($stub, new DescontoParaBancos());
        $this->ingressoParaEstudantes = new Ingresso($stub, new DescontoParaEstudantes());
    }

    public function testNaoDeveConcederDescontoParaIngressoNormal()
    {
        $actual = $this->ingressoSemDesconto->getPreco();
        $expected = 20.0;
        $this->assertEquals($expected, $actual);
    }

    public function testDeveConcederDescontoDe30PorcentoParaIngressosDeClientesDeBanco()
    {
        $actual = $this->ingressoParaBancos->getPreco();
        $expected = 14.0;
        $this->assertEquals($expected, $actual);
    }

    public function testDeveConcederDescontoDe50PorcentoParaIngressosDeClientesDeEstudante()
    {
        $actual = $this->ingressoParaEstudantes->getPreco();
        $expected = 10.0;
        $this->assertEquals($expected, $actual);
    }
}
