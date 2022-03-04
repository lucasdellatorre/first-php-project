<?php

class Account
{
    private $number;
    private $balance;

    public function __construct($number)
    {
        $this->number = $number;
        $this->balance = 0;
    }

    public function deposit($value)
    {
        $this->balance += $value;
    }

    public function withdrawMoney($value)
    {
        if ($this->balance > 0 and $this->balance >= $value) {
            $this->balance -= $value;
        } else {
            echo "Saldo insuficiente, {$this->getBalanceToString()} <br>";
        }
    }

    public function getBalanceToString()
    {
        return "Saldo da conta {$this->number} é de R$ " . number_format($this->balance, 2, ",", ".") . "<br>";
    }

    /**
     * @return mixed
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param mixed $balance
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;
    }


}



