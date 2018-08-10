<?php

declare(strict_types = 1);

namespace Test\Tasks;

/**
 * Class TaskInterface
 */
interface TaskInterface
{
    /**
     * @return string
     */
    public function getOutput() : string;
}
