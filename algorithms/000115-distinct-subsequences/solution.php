<?php

class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Integer
     */
    function numDistinct(string $s, string $t): int
    {
        $m = strlen($s);
        $n = strlen($t);

        // dp[j] will store number of ways for current i
        $dp = array_fill(0, $n + 1, 0);
        $dp[0] = 1; // empty t

        for ($i = 1; $i <= $m; $i++) {
            // Traverse backwards to avoid overwriting dp[j-1] needed for current i
            for ($j = $n; $j >= 1; $j--) {
                if ($s[$i - 1] == $t[$j - 1]) {
                    $dp[$j] += $dp[$j - 1];
                }
            }
        }

        return $dp[$n];
    }
}