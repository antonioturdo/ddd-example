<?php

namespace AntonioTurdo\DDDExample\Infrastructure\Service;

/**
 * Utility to parse data from a CSV file
 *
 * @author aturdo
 */
class CSVParser {
    
    public function parse(string $filePath) {
        $handle = fopen($filePath, "r");
        
        // skip the header
        fgetcsv($handle, 0, ";");
        
        while (($data = fgetcsv($handle, 0, ";")) !== FALSE) {
            yield $data;
        }

        fclose($handle);        
    }
}
