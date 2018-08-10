<?php

declare(strict_types = 1);

namespace Test\Generators;

use Generator;

/**
 * Interface GeneratorInterface
 */
interface GeneratorInterface
{
    /**
     * @return Generator
     */
    public function generate() : Generator;
}
