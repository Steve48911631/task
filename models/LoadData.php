<?php
namespace models;

/**
 * Load data from csv file simulating data from DB 
 * If file not exists in the root folder, function returns an empty array
 * CSV file MUST have columns name as first row
 */

class LoadData
{
     
    public static function load($filename,$max_rows = 1000,$delimiter = ";")
    {
        $data = [];
        
        if (file_exists($filename) && ($handle = fopen($filename, "r")) !== FALSE) {
            
			$columns = [];

			while (($row = fgetcsv($handle, $max_rows, $delimiter)) !== FALSE) {
                
				$max_col = count($row);
                
                $i++;
				if($i==1) //map first row columns name
					for ($col=0; $col < $max_col; $col++) {
                        $columns[] = $row[$col];
                    }
				else
                    for ($col=0; $col < $max_col; $col++) {
                        $data[$i-1][$columns[$col]] = $row[$col];
                    }
				
            }
		             
            fclose($handle);
        }
        
        return $data;
        
    }
}
