<?php

class Solution {

    /**
     * @param Integer[] $digits
     * @return Integer
     */
    function totalNumbers(array $digits): int
    {
        $n = count($digits);
        $distinctNumbers = [];

        // Try all possible combinations of 3 digits
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                for ($k = 0; $k < $n; $k++) {
                    // Skip if indices are the same (can't use same position twice)
                    if ($i == $j || $j == $k || $i == $k) {
                        continue;
                    }

                    // Check for leading zero
                    if ($digits[$i] == 0) {
                        continue;
                    }

                    // Check if it's an even number (last digit must be even)
                    if ($digits[$k] % 2 != 0) {
                        continue;
                    }

                    // Form the number
                    $number = $digits[$i] * 100 + $digits[$j] * 10 + $digits[$k];

                    // Add to set of distinct numbers
                    $distinctNumbers[$number] = true;
                }
            }
        }

        return count($distinctNumbers);
    }
}