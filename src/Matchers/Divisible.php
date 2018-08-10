<?php

declare(strict_types = 1);

namespace Test\Matchers;

/**
 * Class DivisibleFilter
 */
class Divisible extends AbstractMatcher implements MatcherInterface
{
    /**
     * @var int
     */
    private $divider;

    /**
     * Divisible constructor.
     *
     * @param int $divider
     * @param string $successText
     */
    public function __construct(int $divider, string $successText)
    {
        parent::__construct($successText);

        $this->divider = $divider;
    }

    /**
     * {@inheritdoc}
     */
    public function match(int $number) : bool
    {
        return ($number % $this->divider) === 0;
    }
}
