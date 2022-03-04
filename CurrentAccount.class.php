<?php
require_once "Account.class.php";

final class CurrentAccount extends Account
{

    final public function withdrawMoney($value)
    {
        if ($this->getBalance() > 0
            and ($this->getBalance() - $this->withdrawalFee($value)) >= $value) {
            $this->setBalance($this->getBalance() - $value - $this->withdrawalFee($value));
        } else {
            echo "Saldo insuficiente, {$this->getBalanceToString()} <br>";
        }

    }

    private function withdrawalFee($value)
    {
        return $value * 0.10;
    }

}



?>
