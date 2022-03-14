<?php

require_once "Account.class.php";
require_once "Company.class.php";
require_once "SalaryAccount.class.php";

class Person
{
    private $nome;
    private $salario;
    private $cpf;

    public function __construct($nome, $salario, $cpf)
    {
        $this->nome = $nome;
        $this->salario = $salario;
        $this->cpf = $cpf;
    }

    public function getNome()
    {
        return $this->nome;
    }


    public function getSalario()
    {
        return $this->salario;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

}