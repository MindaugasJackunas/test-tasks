<?php

declare(strict_types = 1);

namespace Test\Matchers;

/**
 * Class Set
 */
class Set extends AbstractMatcher implements MatcherInterface
{
    /**
     * @var array
     */
    private $set;

    /**
     * InSet constructor.
     *
     * @param array $set
     * @param string $successText
     */
    public function __construct(array $set, string $successText)
    {
        parent::__construct($successText);

        $this->set = $set;
    }

    /**
     * {@inheritdoc}
     */
    public function match(int $number) : bool
    {
        return in_array($number, $this->set);
    }
}
