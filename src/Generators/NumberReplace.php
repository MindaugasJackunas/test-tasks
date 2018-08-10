<?php

declare(strict_types = 1);

namespace Test\Generators;

use Generator;
use IteratorAggregate;
use Test\Matchers\MatcherInterface;

/**
 * Class NumberReplace
 */
class NumberReplace implements GeneratorInterface
{
    /**
     * @var IteratorAggregate
     */
    protected $numberIterator;

    /**
     * @var MatcherInterface
     */
    protected $firstMatcher;

    /**
     * @var MatcherInterface
     */
    protected $secondMatcher;

    /**
     * NumberReplace constructor.
     *
     * @param IteratorAggregate $numberIterator
     * @param MatcherInterface $firstMatcher
     * @param MatcherInterface $secondMatcher
     */
    public function __construct(
        IteratorAggregate $numberIterator,
        MatcherInterface $firstMatcher,
        MatcherInterface $secondMatcher
    ) {
        $this->numberIterator = $numberIterator;
        $this->firstMatcher = $firstMatcher;
        $this->secondMatcher = $secondMatcher;
    }

    /**
     * @return Generator
     */
    public function generate() : Generator
    {
        foreach ($this->getNumberIterator() as $number) {
            yield $this->replace($number);
        }
    }

    /**
     * @return IteratorAggregate
     */
    private function getNumberIterator() : IteratorAggregate
    {
        return $this->numberIterator;
    }

    /**
     * @return MatcherInterface
     */
    private function getFirstMatcher(): MatcherInterface
    {
        return $this->firstMatcher;
    }

    /**
     * @return MatcherInterface
     */
    private function getSecondMatcher(): MatcherInterface
    {
        return $this->secondMatcher;
    }

    /**
     * @param int $number
     *
     * @return string
     */
    private function replace(int $number) : string
    {
        if ($this->getFirstMatcher()->match($number) && $this->getSecondMatcher()->match($number)) {
            return $this->getFirstMatcher()->getSuccessText() . $this->getSecondMatcher()->getSuccessText();
        }

        if ($this->getFirstMatcher()->match($number)) {
            return $this->getFirstMatcher()->getSuccessText();
        }

        if ($this->getSecondMatcher()->match($number)) {
            return $this->getSecondMatcher()->getSuccessText();
        }

        return (string) $number;
    }
}
