<?php

require_once "Account.class.php";
require_once "CurrentAccount.class.php";
require_once "Empresa.class.php";
require_once "Funcionario.class.php";
require_once "SalaryAccount.class.php";
require_once "SavingAccount.class.php";



function menu()
{
    $empresa = new Empresa();
    while(true)
    {
        echo "Ola, cadastre seus dados \n";

        echo "Informe o nome do seu funcionario: \n";
        $nomeFunc = readline();

        echo "Informe o salario do seu funcionario: \n";
        $salario = readline();

        echo "Informe o numero da conta de seu funcionario: \n";
        $numContaFunc = readline();

        echo "Deseja Continuar pagando funcionarios? 
            \n (S)im N(ao) \n";

        $resposta = readline();

        if (strtolower($resposta) == "n")
        {
            $contaFuncionario = new SalaryAccount((int)$numContaFunc);

            $func = new Funcionario($nomeFunc, $contaFuncionario, (int) $salario);

            $empresa->pagarFuncionario($func);

            echo("Saldo da empresa: {$empresa->getSaldoEmpresa()}\n");

            echo("Saldo da conta do funcionario: {$func->getAccount()->getBalance()} \n");

            break;
        }
        else
        {
            echo "\n\n\n";

            echo "Pagamento Realizado! ";
        }
    }
}

menu();