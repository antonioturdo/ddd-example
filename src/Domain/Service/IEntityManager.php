<?php

namespace AntonioTurdo\DDDExample\Domain\Service;

use AntonioTurdo\DDDExample\Domain\Repository\IRepository;

/**
 * Interface for an entity manager.
 *
 * @author Antonio Turdo <antonio.turdo@gmail.com>
 */
interface IEntityManager
{
    /**
     * Return a repository implementation for a given model.
     *
     * @param string $model
     *
     * @return IRepository
     */
    public function getRepository(string $model): IRepository;
}
