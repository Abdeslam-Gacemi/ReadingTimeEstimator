<?php

/**
* @author Abdeslam Gacemi <abdobling@gmail.com>
*/

namespace Tests;

use PHPUnit\Framework\TestCase;
use Abdeslam\ReadingTimeEstimator\ReadingTimeEstimator;

class ReadTimeEstimatorTest extends TestCase
{
    public function testEstimate()
    {
        $text = require(__DIR__ . './text.php');
        $wordsCount = str_word_count($text);
        $estimation = [
            'words'     => $wordsCount,
            'hours'     => 2,
            'minutes'   => 24,
            'seconds'   => 3,
        ];
        $this->assertSame($estimation, ReadingTimeEstimator::estimate($text));
        $this->assertSame($wordsCount, ReadingTimeEstimator::estimate($text)['words']);
    }
}
