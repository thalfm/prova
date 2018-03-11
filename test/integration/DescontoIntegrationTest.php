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
class DescontoIntegrationTest extends \PHPUnit\Framework\TestCase
{
    /** @var  Filme */
    private $filme;
    /** @var  Sala */
    private $sala;
    /** @var  Sessao */
    private $sessao;
    /** @var  Ingresso */
    private $ingressoSemDesconto;
    /** @var  Ingresso */
    private $ingressoParaBancos;
    /** @var  Ingresso */
    private $ingressoParaEstudantes;

    protected function setUp()/* The :void return type declaration that should be here would cause a BC issue */
    {
        /**
         * Adcionando um intervalo de 2 horas e 30 minutos
         *
         * @var DateInterval $duracao
         */
        $duracao = new DateInterval('PT2H30M');
        $this->filme = new Filme();
        $this->filme
            ->setNome('Terminator')
            ->setDuracao($duracao)
            ->setGenero('Ação')
            ->setPreco(10.0)
            ->setId(1);

        $this->sala = new Sala();
        $this->sala
            ->setId(1)
            ->setPreco(10)
            ->setNome('3D');

        /**
         * Criando um horario com a classe DateTime
         *
         * @var DateTime $horario
         */
        $horario = new DateTime('2018-03-10 18:00');
        $this->sessao = new Sessao($horario, $this->sala, $this->filme);

        $this->ingressoSemDesconto = new Ingresso($this->sessao, new SemDesconto());
        $this->ingressoParaBancos = new Ingresso($this->sessao, new DescontoParaBancos());
        $this->ingressoParaEstudantes = new Ingresso($this->sessao, new DescontoParaEstudantes());
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
