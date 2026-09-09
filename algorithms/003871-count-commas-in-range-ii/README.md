3871\. Count Commas in Range II

**Difficulty:** Medium

**Topics:** `Senior`, `Math`, `Weekly Contest 493`

You are given an integer `n`.

Return the total number of commas used when writing all integers from `[1, n]` (inclusive) in **standard** number formatting.

In **standard** formatting:

- A comma is inserted after **every three** digits from the right.
- Numbers with **fewer** than 4 digits contain no commas.


**Example 1:**

- **Input:** n = 1002
- **Output:** 3
- **Explanation:** The numbers `"1,000"`, `"1,001"`, and `"1,002"` each contain one comma, giving a total of 3.

**Example 2:**

- **Input:** n = 998
- **Output:** 0
- **Explanation:** All numbers from 1 to 998 have fewer than four digits. Therefore, no commas are used.

**Example 3:**

- **Input:** n = 1000000
- **Output:** 999002

**Example 4:**

- **Input:** n = 999
- **Output:** 0

**Example 5:**

- **Input:** n = 1000000000
- **Output:** 1998999003

**Example 6:**

- **Input:** n = 1000000000000000
- **Output:** 3998998998999005


**Constraints:**

- `1 <= n <= 10¹⁵`


**Hint:**
1. Count the numbers in each comma group (1-3 digits, 4-6 digits, 7-9 digits, ...) and multiply by how many commas each number in that group has.


**Solution:**

We implement an efficient digit-group counting approach that avoids iterating through all numbers up to `n` (which can be as large as `10¹⁵`). Instead, we group numbers by their digit length, calculate how many numbers fall into each group, and multiply by the number of commas each number in that group has. This gives us the total count in _**O(log₁₀ n)**_ time.

## Approach

- **Group by digit length:** Numbers with the same number of digits have the same number of commas (e.g., all 4-6 digit numbers have 1 comma, 7-9 digit numbers have 2 commas, etc.)
- **Calculate range for each digit length:** For d digits, the range is from `10⁽ᵈ⁻¹⁾` to `10ᵈ - 1` (capped at `n`)
- **Count numbers in each range:** `count = end - start + 1`
- **Compute commas per number:** `commas = (d - 1) // 3` (since commas appear after every 3 digits from right)
- **Accumulate total:** Multiply count by commas per number and sum across all digit lengths
- **Early termination:** Stop when the start of a digit group exceeds `n`

Let's implement this solution in PHP: **[3871. Count Commas in Range II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003871-count-commas-in-range-ii/solution.php)**

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
echo countCommas(1002) . "\n";                  // Output: 3
echo countCommas(998) . "\n";                   // Output: 0
echo countCommas(1000000) . "\n";               // Output: 999002
echo countCommas(1000000000) . "\n";            // Output: 1998999003
echo countCommas(1000000000000000) . "\n";      // Output: 3998998998999005
echo countCommas(999) . "\n";                   // Output: 0
?>
```

### Explanation:

- **Why grouping by digit length works:** All numbers with the same digit count have the exact same number of commas. For example, every 4-digit number (1000-9999) has exactly 1 comma, every 7-digit number has 2 commas, etc.
- **Mathematical basis:** A number with d digits has `floor((d-1)/3)` commas because the first comma appears after the 3rd digit from the right, then after the 6th, 9th, etc.
- **Range calculation:** For d digits, the smallest number is `10⁽ᵈ⁻¹⁾` and the largest is `10ᵈ - 1`. We cap the upper bound at n using `min()`.
- **Counting logic:** If the range is valid (start `≤ n`), we count all numbers in that range and multiply by their comma count.
- **No iteration over numbers:** This algorithm processes at most 16 groups (since `n ≤ 10¹⁵` has at most 16 digits), making it extremely fast.
- **Edge case handling:** Numbers with fewer than 4 digits (1-3 digits) have `(d-1)//3 = 0` commas, contributing nothing to the total.

## Complexity Analysis

- **Time Complexity:** _**O(log₁₀ n) ≈ O(16)**_ since `n ≤ 10¹⁵`, meaning we iterate through at most 16 digit groups.
- **Space Complexity:** _**O(1)**_ – we only use a few integer variables for counting and accumulation.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**