<?php

namespace Coqueiro\Model\Descontos;


interface Desconto
{
    /**
     * Aplica um desconto
     *
     * @param float $precoOriginal
     * @return float
     */
    public function aplicarDescontoSobre(float $precoOriginal): float;
}