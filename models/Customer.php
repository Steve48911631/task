<?php

/*
 * 
 */

namespace models;

use models\CurrencyWebservice;
use models\LoadData;

class Customer
{
    private $result = [];
    private $records = [];
    
    /*
     * Load data on create of a new instance
     */
    
    function __construct() {
        
        $this->records = LoadData::load('data.csv');
        
    }
    
    /*
     * simulate an sql query to find the id costumer 
     */
    
    private function find($id)
    {
        
        $result = [];
        foreach($this->records as $row){
            
            if($row['customer'] == $id){
            
                $array = ['date'=>$row['date'],'value'=>mb_substr($row['value'],1),'currency'=>mb_substr($row['value'], 0, 1)]; 
                $result[] = (object)$array;
            }
        }
       
        $this->result = $result;        
        
    }
    
    /*
     * Report the result as command line
     */
    
    private function output()
    {
        echo "Risultato:\n";
        
        foreach($this->result as $record){
            
            $conversion = number_format(CurrencyWebservice::getExchangeRate($record->value,$record->currency),2,",",".");
            
            echo "\tTransazione in data $record->date di EUR $conversion ($record->currency)\n";
        }
        
    }
    
    public function getTransactions($id)
    {
        
        $this->find($id);
        
        return $this->output();
    }
}
