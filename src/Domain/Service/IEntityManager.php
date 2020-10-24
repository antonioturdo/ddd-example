<?php

namespace AntonioTurdo\DDDExample\Domain\Service;

use AntonioTurdo\DDDExample\Domain\Repository\IRepository;

/**
 *
 * @author aturdo
 */
interface IEntityManager {
    
    public function getRepository(string $model): IRepository;
}
