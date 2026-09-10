2265\. Count Nodes Equal to Average of Subtree

**Difficulty:** Medium

**Topics:** `Senior`, `Tree`, `Depth-First Search`, `Binary Tree`, `Weekly Contest 292`

Given the `root` of a binary tree, return _the number of nodes where the value of the node is equal to the **average** of the values in its **subtree**_.

**Note:**

- The **average** of `n` elements is the sum of the `n` elements divided by `n` and **rounded down** to the nearest integer.
- A **subtree** of `root` is a tree consisting of `root` and all of its descendants.


**Example 1:**

![image-20220315203925-1](https://assets.leetcode.com/uploads/2022/03/15/image-20220315203925-1.png)

- **Input:** root = [4,8,5,0,1,null,6]
- **Output:** 5
- **Explanation:**
  - For the node with value 4: The average of its subtree is (4 + 8 + 5 + 0 + 1 + 6) / 6 = 24 / 6 = 4.
  - For the node with value 5: The average of its subtree is (5 + 6) / 2 = 11 / 2 = 5.
  - For the node with value 0: The average of its subtree is 0 / 1 = 0.
  - For the node with value 1: The average of its subtree is 1 / 1 = 1.
  - For the node with value 6: The average of its subtree is 6 / 1 = 6.

**Example 2:**

![image-20220326133920-1](https://assets.leetcode.com/uploads/2022/03/26/image-20220326133920-1.png)

- **Input:** root = [1]
- **Output:** 1
- **Explanation:** For the node with value 1: The average of its subtree is 1 / 1 = 1.

**Example 3:**

- **Input:** root = [1,2,3]
- **Output:** 3

**Example 4:**

- **Input:** root = [0,0,0]
- **Output:** 3

**Example 5:**

- **Input:** root = [1,1,1,1,1]
- **Output:** 5

**Example 6:**

- **Input:** root = [10,1,1]
- **Output:** 2

**Example 7:**

- **Input:** root = [2,1,3]
- **Output:** 3

**Example 8:**

- **Input:** root = [5,5,5,5,5,5,5]
- **Output:** 7

**Example 9:**

- **Input:** root = [1,2,null,3,null,4]
- **Output:** 4

**Example 10:**

- **Input:** root = [1000, 0, 0]
- **Output:** 2

**Constraints:**

- The number of nodes in the tree is in the range ``[1, 1000]``.
- `0 <= Node.val <= 1000`


**Hint:**
1. What information do we need to calculate the average? We need the sum of the values and the number of values.
2. Create a recursive function that returns the size of a node’s subtree, and the sum of the values of its subtree.


**Similar Questions:**
1. [1120. Maximum Average Subtree](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001120-maximum-average-subtree)
2. [1080. Insufficient Nodes in Root to Leaf Paths](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001080-insufficient-nodes-in-root-to-leaf-paths)
3. [1973. Count Nodes Equal to Sum of Descendants](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001973-count-nodes-equal-to-sum-of-descendants)



**Solution:**

We solve this problem by performing a **post-order depth-first traversal** of the binary tree. At each node, we compute two values: the **sum** of all values in its subtree, and the **count** of nodes in its subtree. Using these two values, we can compute the average (integer division) and compare it to the node's value. If they match, we increment a counter. Since we need subtree information before processing a node, a bottom-up (post-order) traversal is the natural choice.

## Approach

- Use a **recursive DFS (post-order)** helper that returns a tuple `[sum, count]` for each subtree.
- Recurse into the left child, then the right child, before processing the current node.
- Combine results: `sum = leftSum + rightSum + node.val`, `count = leftCount + rightCount + 1`.
- Compute `intdiv(sum, count)` (floor division, which matches the "rounded down" requirement).
- If the computed average equals `node.val`, increment a shared counter (passed by reference).
- Return `[sum, count]` up the call stack so parent nodes can use it.

Let's implement this solution in PHP: **[2265. Count Nodes Equal to Average of Subtree](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002265-count-nodes-equal-to-average-of-subtree/solution.php)**

```php
<?php
/**
 * @param TreeNode $root
 * @return Integer
 */
function averageOfSubtree(TreeNode $root): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param TreeNode $node
 * @param int &$result
 * @return array [sum, count]
 */
function dfs(TreeNode $node, int &$result): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo averageOfSubtree([4,8,5,0,1,null,6]) . "\n";       // Output: 5
echo averageOfSubtree([1]) . "\n";                      // Output: 1
echo averageOfSubtree([1,2,3]) . "\n";                  // Output: 3
echo averageOfSubtree([0,0,0]) . "\n";                  // Output: 3
echo averageOfSubtree([1,1,1,1,1]) . "\n";              // Output: 5
echo averageOfSubtree([10,1,1]) . "\n";                 // Output: 2
echo averageOfSubtree([2,1,3]) . "\n";                  // Output: 3
echo averageOfSubtree([5,5,5,5,5,5,5]) . "\n";          // Output: 7
echo averageOfSubtree([1,2,null,3,null,4]) . "\n";      // Output: 4
echo averageOfSubtree([1000, 0, 0]) . "\n";             // Output: 2
?>
```

### Explanation:

- **Post-order traversal is essential** — we cannot compute a node's subtree sum/count without first knowing the sums/counts of its children.
- **Why return both sum and count?** The average is `sum / count`. Returning only sum would lose the count needed to compute the average, so both are bundled together.
- **Passing `$result` by reference** lets all recursive calls accumulate the count into a single shared variable without needing to return it through the recursion chain.
- **`intdiv($sum, $count)`** performs integer (floor) division, matching the problem's "rounded down" rule. E.g., `11 / 2 = 5` in integer division.
- **Base case:** A `null` node returns `[0, 0]`, contributing nothing to sum or count.
- For a leaf node, `sum = val`, `count = 1`, so the average is `val` itself, and the leaf always counts toward the answer (as in Example 2).

## Complexity Analysis

- **Time Complexity:** `O(n)` — each node is visited exactly once, and each visit does constant work.
- **Space Complexity:** `O(h)` where `h` is the height of the tree, due to the recursion stack.
    - Best case (balanced tree): `O(log n)`
    - Worst case (skewed tree): `O(n)`

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**