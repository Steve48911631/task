<?php
namespace models;

/**
 * Dummy web service returning random exchange rates
 *
 */
class CurrencyWebservice
{

    /**
     * @todo return random value here for basic currencies like GBP USD EUR (simulates real API)
     *
     */
    public static function getExchangeRate($value,$currency)
    {
                
        if(htmlentities($currency) == '&euro;')
            return (float)$value;
        else
            return round((float)$value * ( mt_rand(1,30) / 10 ),2);
        
    }
}