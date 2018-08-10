<?php

declare(strict_types = 1);

namespace Test\Matchers;

/**
 * Class AbstractMatcher
 */
abstract class AbstractMatcher implements MatcherInterface
{
    /**
     * @var string
     */
    private $successText;

    /**
     * AbstractMatcher constructor.
     *
     * @param string $successText
     */
    public function __construct(string $successText)
    {
        $this->successText = $successText;
    }

    /**
     * @param int $number
     *
     * @return bool
     */
    abstract public function match(int $number) : bool;

    /**
     * @return string
     */
    public function getSuccessText() : string
    {
        return $this->successText;
    }
}
