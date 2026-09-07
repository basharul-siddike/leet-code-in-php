<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function distinctSubseqII(string $s): int
    {
        $mod = 1000000007;
        $endsIn = array_fill(0, 26, 0); // number of subsequences ending with each letter

        for ($i = 0; $i < strlen($s); $i++) {
            $index = ord($s[$i]) - ord('a');
            // sum of all existing subsequences + 1 (for subsequence consisting of just this char)
            $total = (array_sum($endsIn) + 1) % $mod;
            $endsIn[$index] = $total;
        }

        return array_sum($endsIn) % $mod;
    }
}