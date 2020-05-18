<?php

namespace Classes;

class Config
{
    public static $euCountries = [
        'AT', 'BE', 'BG', 'CY', 'CZ', 'DE', 'DK', 'EE', 'ES', 'FI', 'FR', 'GR', 'HR', 'HU',
        'IE', 'IT', 'LT', 'LU', 'LV', 'MT', 'NL', 'PO', 'PT', 'RO', 'SE', 'SI', 'SK'
    ];

    public static $euCommission = 0.01;
    public static $nonEuCommission = 0.02;

    public static $ratesUrl = 'https://api.exchangeratesapi.io/latest';
    public static $binlistUrl = 'https://lookup.binlist.net/';
}