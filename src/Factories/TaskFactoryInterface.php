<?php

declare(strict_types = 1);

namespace Test\Factories;

use Test\Tasks\Task;

/**
 * Interface TaskFactoryInterface
 */
interface TaskFactoryInterface
{
    /**
     * @param array $taskData
     *
     * @return Task
     */
    public function make(array $taskData) : Task;
}
