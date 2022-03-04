<?php

require_once "Account.class.php";
require_once "Empresa.class.php";
require_once "SalaryAccount.class.php";

class Funcionario
{
    private $nome;
    private $account;
    private $salario;

    public function __construct($nome, Account $account, $salario)
    {
        $this->nome = $nome;
        $this->account = $account;
        $this->salario = $salario;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getAccount()
    {
        return $this->account;
    }

    public function getSalario()
    {
        return $this->salario;
    }


}