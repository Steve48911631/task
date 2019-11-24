<?php
spl_autoload_register();

/*
 * From command line if it's not specified arguments an help is showed
 */

$val = getopt(null,["id:"]);
if (empty($val) || !isset($val['id'])) {
    
    echo "\nNessun parametro trovato".PHP_EOL;
    echo "Command:".PHP_EOL.PHP_EOL;
    echo "\033[31m --id=1 \033[39m".PHP_EOL;
    
}
else {
    
    $costumer = new \models\Customer();  //load file when creating model 
    $costumer->getTransactions((int)$val['id']); //print results on command line
      
}
