<?php

declare(strict_types = 1);

namespace Test\Tasks;

use Generator;
use Test\Generators\GeneratorInterface;

/**
 * Class AbstractTask
 */
abstract class AbstractTask implements TaskInterface
{
    /**
     * @var string
     */
    protected $version;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var GeneratorInterface
     */
    protected $numberReplace;

    /**
     * @var string
     */
    protected $joinString;

    /**
     * AbstractTask constructor.
     *
     * @param string $version
     * @param GeneratorInterface $numberReplace
     * @param string $joinString
     */
    public function __construct(string $version, GeneratorInterface $numberReplace, string $joinString)
    {
        $this->version = $version;
        $this->name = $this->makeName($version);
        $this->numberReplace = $numberReplace;
        $this->joinString = $joinString;
    }

    /**
     * {@inheritdoc}
     */
    abstract public function getOutput() : string;

    /**
     * {@inheritdoc}
     */
    public function getResultOutput() : string
    {
        return $this->getName() . PHP_EOL . $this->getResultString();
    }

    /**
     * @return string
     */
    private function getVersion() : string
    {
        return $this->version;
    }

    /**
     * @param string $version
     *
     * @return string
     */
    private function makeName(string $version) : string
    {
        return "Task {$version}:";
    }

    /**
     * @return string
     */
    private function getName() : string
    {
        return $this->name;
    }

    /**
     * @return GeneratorInterface
     */
    private function getNumberReplace() : GeneratorInterface
    {
        return $this->numberReplace;
    }

    /**
     * @return string
     */
    private function getJoinString() : string
    {
        return $this->joinString;
    }

    /**
     * @return Generator
     */
    private function getResults() : Generator
    {
        yield from $this->getNumberReplace()->generate();
    }

    /**
     * @return string
     */
    private function getResultString() : string
    {
        // This has to be changed if task requirement for number set sizes increased dramatically.
        return join($this->getJoinString(), iterator_to_array($this->getResults()));
    }
}
