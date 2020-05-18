<?php

namespace Classes\Models;

use Classes\Config;

class Transaction
{
    /** @property string $bin */
    public $bin;

    /** @property string $amount */
    public $amount;

    /** @property string $currency */
    public $currency;

    public function __construct($object)
    {
        $this->bin = ($object->bin) ? $object->bin : null;
        $this->amount = ($object->amount) ? $object->amount : null;
        $this->currency = ($object->currency) ? $object->currency : null;
    }

    public function isEu($code)
    {
        return $code ? in_array($code, Config::$euCountries) : false;
    }
}