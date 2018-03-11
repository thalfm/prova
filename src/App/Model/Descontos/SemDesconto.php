<?php
/**
 * Created by PhpStorm.
 * User: thales
 * Date: 10/03/2018
 * Time: 18:57
 */

namespace Coqueiro\Model\Descontos;


class SemDesconto implements Desconto
{

    /**
     * Não aplica um desconto
     *
     * @param float $precoOriginal
     * @return float
     */
    public function aplicarDescontoSobre(float $precoOriginal): float
    {
        return $precoOriginal;
    }
}