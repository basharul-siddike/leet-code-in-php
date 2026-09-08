<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function countCommas(int $n): int
    {
        if ($n < 1000) {
            return 0;
        }
        return $n - 999;
    }
}