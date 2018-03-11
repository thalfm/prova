<?php

namespace Coqueiro\model\VO;

class Filme
{
    /** @var  integer */
    private $id;
    /** @var  string */
    private $nome;
    /** @var  \DateInterval */
    private $duracao;
    /** @var  string */
    private $genero;
    /** @var  float */
    private $preco;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Filme
     */
    public function setId(int $id): Filme
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     * @return Filme
     */
    public function setNome(string $nome): Filme
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDuracao(): \DateInterval
    {
        return $this->duracao;
    }

    /**
     * @param \DateTime $duracao
     * @return Filme
     */
    public function setDuracao(\DateInterval $duracao): Filme
    {
        $this->duracao = $duracao;
        return $this;
    }

    /**
     * @return string
     */
    public function getGenero(): string
    {
        return $this->genero;
    }

    /**
     * @param string $genero
     * @return Filme
     */
    public function setGenero(string $genero): Filme
    {
        $this->genero = $genero;
        return $this;
    }

    /**
     * @return float
     */
    public function getPreco(): float
    {
        return $this->preco;
    }

    /**
     * @param float $preco
     * @return Filme
     */
    public function setPreco(float $preco): Filme
    {
        $this->preco = $preco;
        return $this;
    }
}