<?php

/**
* @author Abdeslam Gacemi <abdobling@gmail.com>
*/

namespace Abdeslam\ReadingTimeEstimator;

class ReadingTimeEstimator
{
    /**
     * estimates reading time 
     *
     * @param string $text
     * @param integer $wordsPerMinute average:200
     * @return array reading time estimation:
     *  - ['words']       contains words count
     *  - ['hours']       contains estimated reading time hours
     *  - ['minutes']     contains estimated reading time minutes
     *  - ['seconds']     contains estimated reading time seconds
     */
    public static function estimate(string $text, int $wordsPerMinute = 200): array
    {
        $wordsCount = str_word_count($text);
        $time = $wordsCount / $wordsPerMinute;
        $hours = 0;
        $minutes = floor($time);
        if ($minutes >= 60) {
            $hours = floor($minutes / 60);
            $minutes -= $hours * 60;
        }
        return [
            'words' => $wordsCount,
            'hours' => (int) $hours,
            'minutes' => (int) floor($minutes),
            'seconds' => (int) floor(($time - ($hours * 60 + $minutes)) * 60),
        ];
    }
}