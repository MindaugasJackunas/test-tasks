<?php
#!/usr/bin/env php

declare(strict_types = 1);

namespace App;

use Test\Factories\TaskFactory;
use Test\Matchers\Divisible;
use Test\Matchers\Greater;
use Test\Matchers\Set;
use Test\Generators\NumberReplace;
use Test\Generators\TaskOutput;
use Test\Iterators\Range;
use Test\Iterators\TaskData;

require_once __DIR__ . '/../vendor/autoload.php';

$taskData = [
    [
        'v1',
        new NumberReplace(
            new Range(1, 20),
            new Divisible(3, 'pa'),
            new Divisible(5, 'pow')
        ),
        ' '
    ],
    [
        'v2',
        new NumberReplace(
            new Range(1, 15),
            new Divisible(2, 'hatee'),
            new Divisible(7, 'ho')
        ),
        '-'
    ],
    [
        'v3',
        new NumberReplace(
            new Range(1, 10),
            new Set([1, 4, 9], 'joff'),
            new Greater(5, 'tchoff')
        ),
        '-'
    ]
];

$taskOutput = new TaskOutput(new TaskData($taskData), new TaskFactory());

//echo join(PHP_EOL, iterator_to_array($taskOutput->generate()));

foreach ($taskOutput->generate() as $taskOutputString) {
    echo $taskOutputString . PHP_EOL;
}
