<?php

declare(strict_types = 1);

namespace Test\Matchers;

/**
 * Interface MatcherInterface
 */
interface MatcherInterface
{
    /**
     * @param int $number
     *
     * @return bool
     */
    public function match(int $number) : bool;

    /**
     * @return string
     */
    public function getSuccessText() : string;
}
