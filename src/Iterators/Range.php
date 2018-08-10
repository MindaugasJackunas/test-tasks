<?php

declare(strict_types = 1);

namespace Test\Iterators;

use ArrayIterator;
use Iterator;
use IteratorAggregate;
use Traversable;

/**
 * Class Range
 */
class Range implements IteratorAggregate
{
    /**
     * @var int
     */
    private $from;

    /**
     * @var int
     */
    private $to;

    /**
     * Range constructor.
     *
     * @param int $from
     * @param int $to
     */
    public function __construct(int $from, int $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    /**
     * @return Iterator
     */
    public function getIterator() : Traversable
    {
        return new ArrayIterator(range($this->from, $this->to));
    }
}
