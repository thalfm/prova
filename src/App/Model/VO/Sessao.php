<?php
/**
 * Created by PhpStorm.
 * User: thales
 * Date: 10/03/2018
 * Time: 18:45
 */

namespace Coqueiro\model\VO;


class Sessao
{
    /** @var  integer */
    private $id;
    /** @var  \DateTime */
    private $horario;
    /** @var  float */
    private $preco;
    /** @var  Sala */
    private $sala;
    /** @var  Filme */
    private $filme;

    /**
     * Sessao constructor.
     * @param \DateTime $horario
     * @param Sala $sala
     * @param Filme $filme
     */
    public function __construct(\DateTime $horario, Sala $sala, Filme $filme)
    {
        $this->sala = $sala;
        $this->filme = $filme;
        $this->preco = $sala->getPreco() + $filme->getPreco();
        $this->horario = $horario;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Sessao
     */
    public function setId(int $id): Sessao
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getHorario(): \DateTime
    {
        return $this->horario;
    }

    /**
     * @return float
     */
    public function getPreco(): float
    {
        return $this->preco;
    }

    /**
     * @return Sala
     */
    public function getSala(): Sala
    {
        return $this->sala;
    }

    /**
     * @return Filme
     */
    public function getFilme(): Filme
    {
        return $this->filme;
    }

    /**
     * @return string
     */
    public function getHorarioTerminoFilme()
    {
        return $this->horario->add($this->filme->getDuracao())->format('d/m/Y H:i:s');
    }

}