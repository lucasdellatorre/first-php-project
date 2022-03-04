<?php
require_once "Account.class.php";

final class SavingAccount extends Account
{
    final public function withdrawMoney($value)
    {
        parent::withdrawMoney($value);

    }
}

?>