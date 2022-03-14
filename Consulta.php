<?php

trait Consulta
{
    public function consultaContaPorCpf($numCpf, $contas)
    {
        return array_search($numCpf, $contas);
    }
}