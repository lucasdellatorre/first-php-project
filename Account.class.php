<?php

class Account
{
    private $bank;
    private $balance;
    private static $numberOfAccounts = 0;
    private $accountNumber;
    private $accountOwner;

    public function __construct(Bank $bank, Person $personAssociate)
    {
        $this->bank = $bank;
        $this->balance = 0;
        $this->accountNumber = ++self::$numberOfAccounts;
        $this->accountOwner = $personAssociate;
    }


    public function depositRequest($numberAccount, $transferValue)
    {
        if ($numberAccount > 0 and $transferValue > 0 and $transferValue <= $this->balance )
        {
            if ($this->bank->deposit($numberAccount, $transferValue))
            {
               $this->decreaseBalance($transferValue);
               return true;
            }
        }
        return false;
    }

    public function pixRequest($numberAccount, $transferValue)
    {
        if ($numberAccount > 0 and $transferValue > 0 and $transferValue <= $this->balance )
        {
            if ($this->bank->pix($numberAccount, $transferValue))
            {
                $this->decreaseBalance($transferValue);
                return true;
            }
        }
        return false;
    }

    public function withdraw($withdrawValue)
    {
        if ($withdrawValue > 0 and $withdrawValue <= $this->balance )
        {
            $this->decreaseBalance($withdrawValue);
            return true;
        }
        return false;
    }

    public function increaseBalance($value)
    {
        $this->balance += $value;
    }

    public function decreaseBalance($value)
    {
        $this->balance -= $value;
    }

    /**
     * @return Bank
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * @return int
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @return mixed
     */
    public function getNumberAccount()
    {
        return $this->accountNumber;
    }

    /**
     * @return Person
     */
    public function getAccountOwner()
    {
        return $this->accountOwner;
    }


}



