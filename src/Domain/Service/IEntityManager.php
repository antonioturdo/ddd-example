<?php

namespace AntonioTurdo\DDDExample\Domain\Service;

use AntonioTurdo\DDDExample\Domain\Repository\IRepository;

/**
 * Interface for an entity manager.
 * 
 * @author aturdo
 */
interface IEntityManager {
    
    public function getRepository(string $model): IRepository;
}
