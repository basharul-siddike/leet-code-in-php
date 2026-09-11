3483\. Unique 3-Digit Even Numbers

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Hash Table`, `Recursion`, `Enumeration`, `Biweekly Contest 152`

You are given an array of digits called `digits`. Your task is to determine the number of **distinct** three-digit even numbers that can be formed using these digits.

**Note:** Each copy of a digit can only be used **once per number**, and there may not be leading zeros.

**Example 1:**

- **Input:** digits = [1,2,3,4]
- **Output:** 12
- **Explanation:** The 12 distinct 3-digit even numbers that can be formed are 124, 132, 134, 142, 214, 234, 312, 314, 324, 342, 412, and 432. Note that 222 cannot be formed because there is only 1 copy of the digit 2.

**Example 2:**

- **Input:** digits = [0,2,2]
- **Output:** 2
- **Explanation:** The only 3-digit even numbers that can be formed are 202 and 220. Note that the digit 2 can be used twice because it appears twice in the array.

**Example 3:**

- **Input:** digits = [6,6,6]
- **Output:** 1
- **Explanation:** Only 666 can be formed.

**Example 4:**

- **Input:** digits = [1,3,5]
- **Output:** 0
- **Explanation:** No even 3-digit numbers can be formed.

**Example 5:**

- **Input:** digits = [0,0,0]
- **Output:** 0

**Example 6:**

- **Input:** digits = [2,2,2,2]
- **Output:** 1

**Example 7:**

- **Input:** digits = [1,2,3]
- **Output:** 2

**Example 8:**

- **Input:** digits = [0,1,2]
- **Output:** 2

**Example 9:**

- **Input:** digits = [2,4,6,8]
- **Output:** 24

**Example 10:**

- **Input:** digits = [1,0,2,4]
- **Output:** 10

**Example 11:**

- **Input:** digits = [5,5,5,5]
- **Output:** 0

**Example 12:**

- **Input:** digits = [0,2,4]
- **Output:** 4

**Example 13:**

- **Input:** digits = [1,0,0]
- **Output:** 0

**Example 14:**

- **Input:** digits = [8,0,0]
- **Output:** 2

**Example 15:**

- **Input:** digits = [2,0,2]
- **Output:** 2

**Constraints:**

- `3 <= digits.length <= 10`
- `0 <= digits[i] <= 9`


**Hint:**
1. Use brute force to try all possibilities


**Similar Questions:**
1. [2094. Finding 3-Digit Even Numbers](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002094-finding-3-digit-even-numbers)


**Solution:**

We need to find the count of distinct three-digit even numbers that can be formed from the given array of digits. Each digit can be used only as many times as it appears in the array, and no leading zeros are allowed. We use a brute-force approach to check all possible 3-digit combinations while ensuring uniqueness through a hash set.

## Approach

- **Triple Nested Loops**: Iterate through all possible combinations of three positions (`i`, `j`, `k`) in the digits array.
- **Index Uniqueness**: Ensure that `i`, `j`, and `k` are all different indices to respect the "use each copy once" rule.
- **Leading Zero Check**: Skip combinations where the first digit (`digits[i]`) is 0.
- **Even Number Check**: Skip combinations where the last digit (`digits[k]`) is odd.
- **Form Number**: Compute the number as `digits[i]*100 + digits[j]*10 + digits[k]`.
- **Deduplication**: Store each valid number as a key in an associative array to automatically handle duplicates.
- **Count Results**: Return the count of distinct keys in the set.

Let's implement this solution in PHP: **[3483. Unique 3-Digit Even Numbers](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003483-unique-3-digit-even-numbers/solution.php)**

```php
<?php
/**
 * @param Integer[] $digits
 * @return Integer
 */
function totalNumbers(array $digits): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo totalNumbers([1,2,3,4]) .  "\n";       // Output: 12
echo totalNumbers([0,2,2]) .  "\n";         // Output: 2
echo totalNumbers([6,6,6]) .  "\n";         // Output: 1
echo totalNumbers([1,3,5]) .  "\n";         // Output: 0
echo totalNumbers([0,0,0]) .  "\n";         // Output: 0
echo totalNumbers([2,2,2,2]) .  "\n";       // Output: 1
echo totalNumbers([1,2,3]) .  "\n";         // Output: 2
echo totalNumbers([0,1,2]) .  "\n";         // Output: 2
echo totalNumbers([2,4,6,8]) .  "\n";       // Output: 24
echo totalNumbers([1,0,2,4]) .  "\n";       // Output: 10
echo totalNumbers([5,5,5,5]) .  "\n";       // Output: 0
echo totalNumbers([0,2,4]) .  "\n";         // Output: 4
echo totalNumbers([1,0,0]) .  "\n";         // Output: 0
echo totalNumbers([8,0,0]) .  "\n";         // Output: 2
echo totalNumbers([2,0,2]) .  "\n";         // Output: 2
?>
```

### Explanation:

- We brute-force all permutations of 3 indices from the digits array because the array length is at most 10, making _**O(n³)**_ feasible (max 1000 iterations).
- Using indices (not values) ensures we respect the frequency constraint — if a digit appears only once, we can't reuse it.
- The leading zero condition ensures we only count valid 3-digit numbers (100–999).
- The even condition ensures the last digit is 0, 2, 4, 6, or 8.
- Using an associative array (`$distinctNumbers[$number] = true`) automatically deduplicates numbers formed from different index combinations that yield the same value (e.g., two different 2's in the array producing the same number).
- Finally, `count()` gives the number of unique valid numbers.

## Complexity Analysis

- **Time Complexity**: _**O(n³)**_ where n = length of digits `(n ≤ 10)`. The triple nested loops run at most `10³ = 1000` times. Each iteration does _**O(1)**_ work.
- **Space Complexity**: _**O(k)**_ where `k` is the number of distinct valid numbers found. In the worst case,` k ≤ 9 × 9 × 5 = 405` (first digit 1-9, second 0-9, third even 0,2,4,6,8), so space is _**O(1)**_ effectively (bounded constant).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**