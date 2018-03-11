<?php
/**
 * Created by PhpStorm.
 * User: thales
 * Date: 10/03/2018
 * Time: 19:22
 */

namespace Coqueiro\model\VO;


use Coqueiro\Model\Descontos\Desconto;

class Ingresso
{
    /** @var float */
    private $preco;
    /** @var Sessao */
    private $sessao;

    public function __construct(Sessao $sessao, Desconto $desconto)
    {
        $this->preco = $desconto->aplicarDescontoSobre($sessao->getPreco());
        $this->sessao = $sessao;
    }

    /**
     * @return float
     */
    public function getPreco(): float
    {
        return $this->preco;
    }

    /**
     * @return Sessao
     */
    public function getSessao(): Sessao
    {
        return $this->sessao;
    }

}