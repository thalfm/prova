<?php
/**
 * Created by PhpStorm.
 * User: thales
 * Date: 10/03/2018
 * Time: 18:57
 */

namespace Coqueiro\Model\Descontos;


class DescontoParaEstudantes implements Desconto
{

    /**
     * Aplica um desconto de 50% sobre o valor original
     *
     * @param float $precoOriginal
     * @return float
     */
    public function aplicarDescontoSobre(float $precoOriginal): float
    {
        return $precoOriginal - ($precoOriginal * 0.5);
    }
}