<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function countCommas(int $n): int
    {
        $totalCommas = 0;

        $digits = 1;
        while (true) {
            $start = pow(10, $digits - 1);
            $end = min($n, pow(10, $digits) - 1);

            if ($start > $n) break;

            $count = $end - $start + 1;
            $commas = intdiv($digits - 1, 3);
            $totalCommas += $count * $commas;

            $digits++;
        }

        return $totalCommas;
    }
}