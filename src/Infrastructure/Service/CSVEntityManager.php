<?php

namespace AntonioTurdo\DDDExample\Infrastructure\Service;

use AntonioTurdo\DDDExample\Domain\Repository\IRepository;
use AntonioTurdo\DDDExample\Domain\Service\IEntityManager;

/**
 * Entity manager implementation to fetch data from CSV files.
 *
 * @author Antonio Turdo <antonio.turdo@gmail.com>
 */
class CSVEntityManager implements IEntityManager
{
    public function getRepository(string $model): IRepository
    {
        $reflectionClass = new \ReflectionClass($model);
        $shortName = $reflectionClass->getShortName();
        $repositoryName = 'AntonioTurdo\\DDDExample\\Infrastructure\\Repository\\CSV'.$shortName.'Repository';

        return new $repositoryName(new CSVParser());
    }
}
