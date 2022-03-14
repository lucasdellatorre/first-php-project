<?php

require_once "Account.class.php";
class Bank
{
    private $bankName;
    private $accountList;

    public function __construct($bankName)
    {
        $this->bankName = $bankName;
        $this->accountList = [];
    }

    public function createAccount(Account $novaConta)
    {
        $this->accountList[] = $novaConta;
    }

    public function deposit($acNumber, $transferValue)
    {
        //$searchedAccount =  array_search( $acNumber, $this->accountList);
        $searchedAccount = $this->searchAccount($acNumber);
        if ($searchedAccount)
        {
            $searchedAccount->increaseBalance((int) $transferValue);
            return true;
        }
        return false;
    }

    public function pix($acNumber, $transferValue)
    {
        //$searchedAccount =  array_search( $acNumber, $this->accountList);
        $searchedAccount = $this->searchAccountWithCpf($acNumber);
        if ($searchedAccount)
        {
            $searchedAccount->increaseBalance((int) $transferValue);
            return true;
        }
        return false;
    }

    public function searchAccount($atribute)
    {
        foreach($this->accountList as $account)
                if ($account->getNumberAccount() == (int) $atribute)
                    return $account;
        return false;
    }

    public function searchAccountWithCpf($cpf)
    {
        foreach($this->accountList as $account)
            if ($account->getAccountOwner()->getCpf() == (int) $cpf)
                return $account;
        return false;
    }

    public function showAccount()
    {
        foreach($this->accountList as $a)
        {
            //print_r($a);
            echo "Number account: {$a->getNumberAccount()} \n";
            echo "Balance: {$a->getBalance()} \n";
            echo PHP_EOL;
        }
    }


    /**
     * @return mixed
     */
    public function getBankName()
    {
        return $this->bankName;
    }

    /**
     * @return mixed
     */
    public function getContas()
    {
        return $this->accountList;
    }


}