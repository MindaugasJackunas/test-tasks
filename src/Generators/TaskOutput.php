<?php

declare(strict_types = 1);

namespace Test\Generators;

use Generator;
use IteratorAggregate;
use Test\Factories\TaskFactoryInterface;

/**
 * Class TaskOutput
 */
class TaskOutput implements GeneratorInterface
{
    /**
     * @var IteratorAggregate
     */
    private $taskDataArray;

    /**
     * @var TaskFactoryInterface
     */
    private $taskFactory;

    /**
     * TaskOutput constructor.
     *
     * @param IteratorAggregate $taskDataArray
     * @param TaskFactoryInterface $taskFactory
     */
    public function __construct(IteratorAggregate $taskDataArray, TaskFactoryInterface $taskFactory)
    {
        $this->taskDataArray = $taskDataArray;
        $this->taskFactory = $taskFactory;
    }

    /**
     * @return Generator
     */
    public function generate() : Generator
    {
        foreach ($this->taskDataArray as $taskData) {
            yield $this->taskFactory->make($taskData)->getOutput();
        }
    }
}
