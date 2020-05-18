<?php

namespace Classes;

use Classes\Models\Transaction;
use Classes\Tools\ApiReader;

class TransactionCommission extends Transaction
{
    public function commission($rates, $cache = null)
    {
        $amount = 0;
        if ($cache && $cache->getValue($this->bin)) {
            $binAlpha2 = $cache->getValue($this->bin);
        } else {
            $binAlpha2 = $this->binInfo()["country"]["alpha2"];
            $cache->setValue($this->bin, $binAlpha2);
        }

        $commission = $this->isEu($binAlpha2) ? 0.01 : 0.02;
        $rate = $this->getRate($rates);

        if ($this->currency == 'EUR' || $rate == 0) {
            $amount = $this->amount;
        } else if ($this->currency != 'EUR' or $rate > 0) {
                $amount = $this->amount / $rate;
        }

        return round($amount * $commission, 2);
    }

    public function binInfo()
    {
        $api = new ApiReader();
        $api->get(Config::$binlistUrl . $this->bin);

        return $api->getJsonDecoded(true);
    }

    public function getRate($rates)
    {
        $rates = $rates["rates"];
        return (isset($rates[$this->currency])) ? (float)$rates[$this->currency] : null;
    }

    public static function getRates()
    {
        $api = new ApiReader();
        $api->get(Config::$ratesUrl);
        return $api->getJsonDecoded(true);
    }
}