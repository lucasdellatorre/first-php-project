<?php
require_once "Account.class.php";

final class SalaryAccount extends Account
{

    final public function withdrawMoney($value)
    {
        parent::withdrawMoney($value);
    }

    public function getBalance()
    {
        return parent::getBalance(); // TODO: Change the autogenerated stub
    }
}

