<?php

namespace Alura\DesignPattern\Impostos;

use Alura\DesignPattern\Orcamento;

abstract class Imposto
{
    private ?Imposto $outroImposto;

    public function __construct(Imposto $outroImposto = null)
    {
        $this->outroImposto = $outroImposto;
    }

    abstract protected function relalizaCalculoEspecifico(Orcamento $orcamento): float;
    
    public function calculaImposto(Orcamento $orcamento): float
    {
        return $this->relalizaCalculoEspecifico($orcamento) + $this->realizaCalculoDeOutroImposto($orcamento);
    }

    private function realizaCalculoDeOutroImposto(Orcamento $orcamento)
    {
        return $this->outroImposto == null ? 0 : $this->outroImposto->calculaImposto($orcamento);
    }
}