<?php

namespace AntonioTurdo\DDDExample\Tests\Infrastructure\Service;

use AntonioTurdo\DDDExample\Infrastructure\Service\CSVParser;

use PHPUnit\Framework\TestCase;

/**
 * CSVParserTest
 *
 * @author aturdo
 */
class CSVParserTest extends TestCase {
    
    private function getCSVParser(): CSVParser {
        return new CSVParser();       
    }
    
    public function testLineCount(): void {
        $data = $this->getCSVParser()->parse(__DIR__."/../../files/data.csv");
        
        $this->assertCount(8, $data);
    } 
 
}
