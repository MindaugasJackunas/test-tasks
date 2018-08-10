<?php

declare(strict_types = 1);

namespace Test\Matchers;

/**
 * Class Greater
 */
class Greater extends AbstractMatcher implements MatcherInterface
{
    /**
     * @var int
     */
    private $compare;

    /**
     * Greater constructor.
     *
     * @param int $compare
     * @param string $successText
     */
    public function __construct(int $compare, string $successText)
    {
        parent::__construct($successText);

        $this->compare = $compare;
    }

    /**
     * {@inheritdoc}
     */
    public function match(int $number) : bool
    {
        return $number > $this->compare;
    }
}
