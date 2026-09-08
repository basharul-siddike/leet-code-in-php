3870\. Count Commas in Range

**Difficulty:** Easy

**Topics:** `Mid Level`, `Math`, `Weekly Contest 493`

You are given an integer `n`.

Return the **total** number of commas used when writing all integers from `[1, n]` (inclusive) in **standard** number formatting.

In **standard** formatting:

- A comma is inserted after **every three** digits from the right.
- Numbers with **fewer** than 4 digits contain no commas.


**Example 1:**

- **Input:** n = 1002
- **Output:** 3
- **Explanation:** The numbers ``"1,000"``, ``"1,001"``, and ``"1,002"`` each contain one comma, giving a total of 3.

**Example 2:**

- **Input:** n = 998
- **Output:** 0
- **Explanation:** All numbers from 1 to 998 have fewer than four digits. Therefore, no commas are used.

**Example 3:**

- **Input:** n = 1
- **Output:** 0

**Example 4:**

- **Input:** n = 999
- **Output:** 0

**Example 5:**

- **Input:** n = 1000
- **Output:** 1

**Example 6:**

- **Input:** n = 1002
- **Output:** 3

**Example 7:**

- **Input:** n = 5000
- **Output:** 4001

**Example 8:**

- **Input:** n = 100000
- **Output:** 99001

**Example 9:**

- **Input:** n = 99999
- **Output:** 99000

**Example 10:**

- **Input:** n = 100000
- **Output:** 99001

**Constraints:**

- `1 <= n <= 10⁵`


**Hint:**
1. Numbers in the range `[1000, 100000]` have one comma.


**Solution:**

We observed that the problem constraints are small (`n ≤ 10⁵`), but an even simpler mathematical approach exists. Since commas only appear for numbers with **4 or more digits**, and within this range every number from `1,000` to `n` has exactly **one comma**, the total number of commas is simply `n - 999`. This works because `1,000` through `n` inclusive gives `n - 999` numbers, each contributing one comma. No number up to `10⁵` has more than one comma, so we don't need to handle thousands separators beyond the first.

## Approach

- **Direct formula**: For `n < 1000`, return `0`.
- For `n ≥ 1000`, every integer from `1000` to `n` has exactly one comma.
- Count of such numbers = `n - 999`.
- Return that count directly.

Let's implement this solution in PHP: **[3870. Count Commas in Range](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003870-count-commas-in-range/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @return Integer
 */
function countCommas(int $n): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo countCommas(1002) . "\n";      // Output: 3
echo countCommas(998) . "\n";       // Output: 0
echo countCommas(1) . "\n";         // Output: 0
echo countCommas(999) . "\n";       // Output: 0
echo countCommas(1000) . "\n";      // Output: 1
echo countCommas(1002) . "\n";      // Output: 3
echo countCommas(5000) . "\n";      // Output: 4001
echo countCommas(100000) . "\n";    // Output: 99001
echo countCommas(99999) . "\n";     // Output: 99000
echo countCommas(100000) . "\n";    // Output: 99001
?>
```

### Explanation:

- **Only numbers with ≥ 4 digits have commas** – numbers 1–999 have no comma.
- **All numbers in `[1000, 100000]` have exactly one comma** because they are less than `1,000,000`, so no second comma is needed.
- The number of integers from `1000` to `n` inclusive is `(n - 1000 + 1) = n - 999`.
- Each contributes exactly 1 comma, so total commas = `n - 999`.
- No loop, no string conversion, no conditional per number – just _**O(1)**_ arithmetic.

## Complexity Analysis

- **Time complexity**: _**O(1)**_ – constant time arithmetic.
- **Space complexity**: _**O(1)**_ – no extra space used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**