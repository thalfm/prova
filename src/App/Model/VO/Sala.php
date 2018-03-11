<?php

namespace Coqueiro\model\VO;


class Sala
{
    /** @var  integer */
    private $id;
    /** @var  string */
    private $nome;
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
     * @return Sala
     */
    public function setId(int $id): Sala
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
     * @return Sala
     */
    public function setNome(string $nome): Sala
    {
        $this->nome = $nome;
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
     * @return Sala
     */
    public function setPreco(float $preco): Sala
    {
        $this->preco = $preco;
        return $this;
    }
}