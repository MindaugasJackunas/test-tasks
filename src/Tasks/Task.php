<?php

declare(strict_types = 1);

namespace Test\Tasks;

/**
 * Class Task
 */
class Task extends AbstractTask implements TaskInterface
{
    /**
     * {@inheritdoc}
     */
    public function getOutput() : string
    {
        return $this->getResultOutput();
    }
}
