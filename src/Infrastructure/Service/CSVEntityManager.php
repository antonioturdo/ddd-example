<?php

namespace AntonioTurdo\DDDExample\Infrastructure\Service;

use AntonioTurdo\DDDExample\Domain\Service\IEntityManager;
use AntonioTurdo\DDDExample\Domain\Repository\IRepository;

/**
 * Description of CSVEntityManager
 *
 * @author aturdo
 */
class CSVEntityManager implements IEntityManager {
    
    public function getRepository(string $model): IRepository {
        $reflectionClass = new \ReflectionClass($model);
        $shortName = $reflectionClass->getShortName();
        $repositoryName = "AntonioTurdo\\DDDExample\\Infrastructure\\Repository\\CSV".$shortName."Repository";
        
        return new $repositoryName(new CSVParser());
    }

}
