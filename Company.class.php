<?php
require_once "Account.class.php";
require_once "Person.php";
require_once "SalaryAccount.class.php";


class Empresa
{
    private $nomeEmpresa;
    private $saldoEmpresa;

    public function __construct()
    {
        $this->nomeEmpresa = "Appmax";
        $this->saldoEmpresa = 1000000;
    }

    public function pagarFuncionario(Funcionario $funcionario)
    {
        $salarioFuncionario = $funcionario->getSalario();
        $contaFuncionario = $funcionario->getAccount();
        if ($this->saldoEmpresa > $salarioFuncionario)
        {
            $contaFuncionario->deposit($salarioFuncionario);
            $this->saldoEmpresa -= $salarioFuncionario;
        }
    }

    /**
     * @return string
     */
    public function getNomeEmpresa()
    {
        return $this->nomeEmpresa;
    }

    /**
     * @return int
     */
    public function getSaldoEmpresa()
    {
        return $this->saldoEmpresa;
    }
}

