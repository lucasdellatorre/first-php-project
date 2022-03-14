<?php

require_once "Account.class.php";
require_once "CurrentAccount.class.php";
require_once "Company.class.php";
require_once "Person.php";
require_once "SalaryAccount.class.php";
require_once "SavingAccount.class.php";
require_once "Bank.php";

function initialData(Bank $bank)
{
    $p = new Person("Lucas", 1000, 123);
    $p1 = new Person("Pedro", 1500, 321);
    $p2 = new Person("Raphael", 2000, 231);

    $a = new Account($bank, $p);
    $a1 = new Account($bank, $p1);
    $a2 = new Account($bank, $p2);

    $bank->createAccount($a);
    $bank->createAccount($a1);
    $bank->createAccount($a2);
}


function menu()
{
    echo " ============================================" . "\n";
    echo "  [1] - Criar Conta" . "\n";
    echo "  [2] - Transferencia por numero da conta" . "\n";
    echo "  [3] - Adicionar Saldo" . "\n";
    echo "  [4] - Show Accounts". "\n";
    echo "  [5] - Transferencia pix". "\n";
    echo "  [6] - Saque". "\n";
    echo "  [0] - Sair do Programa" . "\n";
    echo " ============================================" . "\n";
}
function app()
{
    $company = new Company();
    $bank = new Bank("Itau");
    initialData($bank);
    do
    {
        menu();
        $op = (int) readline();
        switch($op)
        {
            case 1:
                echo "Informe seu nome: " . PHP_EOL;
                $name = readline();

                echo "Informe seu salario: " . PHP_EOL;
                $sal = readline();

                echo "Informe seu cpf: " . PHP_EOL;
                $cpf = readline();

                $p = new Person($name, $sal, $cpf);

                $a = new Account($bank, $p);

                $bank->createAccount($a);

                echo "O numero de sua conta eh {$a->getNumberAccount()}, Lembre-se dele!" . PHP_EOL;
                break;

            case 2:
                echo "Informe o numero da sua conta: " . PHP_EOL;
                $numberMainAccount = readline();

                $mainAccount = $bank->searchAccount($numberMainAccount);

                if ($mainAccount)
                {
                    echo "Informe o numero da conta para transferencia: " . PHP_EOL;
                    $numTransfer = readline();

                    echo "Informe o valor para transferencia: " . PHP_EOL;
                    $valTransfer = readline();

                    if ($mainAccount->depositRequest($numTransfer, $valTransfer))
                    {
                        echo "Transferencia realizada com sucesso" . PHP_EOL;
                    }
                    else
                    {
                        echo "Erro ao realizar transferencia" . PHP_EOL;
                    }
                }
                else
                {
                    echo "Erro ao encontrar conta" . PHP_EOL;
                }

                break;
            case 3:
                echo "Informe o numero da sua conta: " . PHP_EOL;
                $numberMainAccount = readline();

                $mainAccount = $bank-> searchAccount($numberMainAccount);

                if ($mainAccount)
                {
                    echo "Informe a quantia que deseja adicionar: " . PHP_EOL;
                    $val = readline();

                    $mainAccount->increaseBalance((int) $val);
                    echo "Saldo adicionado!" . PHP_EOL;
                }
                else
                {
                    echo "Conta nao encontrada" . PHP_EOL;
                }
                break;
            case 4:
                $bank->showAccount();
                break;
            case 5:
                echo "Informe o numero da sua conta: " . PHP_EOL;
                $numberMainAccount = readline();

                $mainAccount = $bank->searchAccount($numberMainAccount);

                if ($mainAccount)
                {
                    echo "Informe a chave pix (cpf) da conta para transferencia: " . PHP_EOL;
                    $numTransfer = readline();

                    echo "Informe o valor para transferencia: " . PHP_EOL;
                    $valTransfer = readline();

                    if ($mainAccount->pixRequest($numTransfer, $valTransfer))
                    {
                        echo "Transferencia realizada com sucesso" . PHP_EOL;
                    }
                    else
                    {
                        echo "Erro ao realizar transferencia" . PHP_EOL;
                    }
                }
                else
                {
                    echo "Erro ao encontrar conta" . PHP_EOL;
                }

                break;
            case 6:
                echo "Informe o numero da sua conta: " . PHP_EOL;
                $numberMainAccount = readline();

                echo "Informe o valor para saque: " . PHP_EOL;
                $valTransfer = readline();

                $mainAccount = $bank->searchAccount($numberMainAccount);

                if ($mainAccount->withdraw($valTransfer))
                {
                    echo "Transferencia realizada com sucesso" . PHP_EOL;
                }
                else
                {
                    echo "Erro ao realizar transferencia" . PHP_EOL;
                }
                break;
        }
    }while($op != 0);
}
app();
