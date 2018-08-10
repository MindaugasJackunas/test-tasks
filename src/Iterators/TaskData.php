<?php

declare(strict_types = 1);

namespace Test\Iterators;

use ArrayIterator;
use IteratorAggregate;
use Traversable;

/**
 * Class TaskData
 */
class TaskData implements IteratorAggregate
{
    /**
     * @var array
     */
    private $taskData;

    /**
     * TaskData constructor.
     *
     * @param array $taskData
     */
    public function __construct(array $taskData)
    {
        $this->taskData = $taskData;
    }

    /**
     * @return Traversable
     */
    public function getIterator() : Traversable
    {
        return new ArrayIterator($this->taskData);
    }
}
