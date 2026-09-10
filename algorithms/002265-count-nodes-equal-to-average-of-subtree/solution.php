<?php

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function averageOfSubtree(TreeNode $root): int
    {
        $result = 0;
        $this->dfs($root, $result);
        return $result;
    }

    /**
     * @param TreeNode $node
     * @param int &$result
     * @return array [sum, count]
     */
    private function dfs(TreeNode $node, int &$result): array
    {
        if ($node === null) {
            return [0, 0];
        }

        [$leftSum, $leftCount] = $this->dfs($node->left, $result);
        [$rightSum, $rightCount] = $this->dfs($node->right, $result);

        $sum = $leftSum + $rightSum + $node->val;
        $count = $leftCount + $rightCount + 1;

        // Check if average equals node value (integer division)
        if (intdiv($sum, $count) === $node->val) {
            $result++;
        }

        return [$sum, $count];
    }
}