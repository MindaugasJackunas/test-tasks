<?php

declare(strict_types = 1);

namespace Test\Factories;

use Test\Tasks\Task;

/**
 * Class TaskFactory
 */
class TaskFactory implements TaskFactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function make(array $taskData) : Task
    {
        return new Task($taskData[0], $taskData[1], $taskData[2]);
    }
}
