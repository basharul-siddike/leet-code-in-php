115\. Distinct Subsequences

**Difficulty:** Hard

**Topics:** `String`, `Dynamic Programming`

Given two strings `s` and `t`, return _the number of distinct **subsequences** of `s` which equals `t`_.

The test cases are generated so that the answer fits on a 32-bit signed integer.

**Example 1:**

- **Input:** s = "rabbbit", t = "rabbit"
- **Output:** 3
- **Explanation:**
  - As shown below, there are 3 ways you can generate "rabbit" from s.
  - <code><ins>rabb</ins>b<ins>it</ins></code>
  - <code><ins>ra</ins>b<ins>bbit</ins></code>
  - <code><ins>rab</ins>b<ins>bit</ins></code>

**Example 2:**

- **Input:** s = "babgbag", t = "bag"
- **Output:** 5
- **Explanation:**
  - As shown below, there are 5 ways you can generate "bag" from s.
  - <code><ins>ba</ins>b<ins>g</ins>bag</code>
  - <code><ins>ba</ins>bgba<ins>g</ins></code>
  - <code><ins>b</ins>abgb<ins>ag</ins></code>
  - <code>ba<ins>b</ins>gb<ins>ag</ins></code>
  - <code>babg<ins>bag</ins></code>

**Example 3:**

- **Input:** s = "a", t = "a"
- **Output:** 1

**Example 4:**

- **Input:** s = "a", t = "b"
- **Output:** 0

**Example 5:**

- **Input:** s = "aaa", t = "aa"
- **Output:** 3

**Example 6:**

- **Input:** s = "abc", t = ""
- **Output:** 1

**Example 7:**

- **Input:** s = "abcd", t = "abcd"
- **Output:** 1

**Example 8:**

- **Input:** s = "abcd", t = "ac"
- **Output:** 1

**Example 9:**

- **Input:** s = "abab", t = "ab"
- **Output:** 3

**Example 10:**

- **Input:** s = "xxx", t = "xx"
- **Output:** 3


**Constraints:**

- `1 <= s.length, t.length <= 1000`
- `s` and `t` consist of English letters.


**Similar Questions:**
1. [1987. Number of Unique Good Subsequences](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001087-number-of-unique-good-subsequences)


**Solution:**

We solve the "Distinct Subsequences" problem using a space-optimized dynamic programming approach. We iterate through each character of `s` and update a 1D DP array that tracks the number of ways to form prefixes of `t`. By processing `t` backwards, we ensure that each character of `s` is used at most once per subsequence, resulting in an efficient _**O(m*n)**_ time and _**O(n)**_ space solution.

## Approach

- Use a DP array `dp` where `dp[j]` represents the number of distinct subsequences of the processed prefix of `s` that equal the first `j` characters of `t`.
- Initialize `dp[0] = 1` because there is exactly one way to form an empty subsequence (choose no characters).
- Iterate through each character `c` in `s` (from left to right).
- For each character, iterate `j` from `n` down to `1` (backwards) to prevent reuse of the current `s` character multiple times in the same update.
- If `c` matches `t[j-1]`, then `dp[j] += dp[j-1]` because we can either skip `c` (keep old value) or use it to extend subsequences that already match `t[0..j-2]`.
- After processing all characters of `s`, `dp[n]` holds the total number of distinct subsequences equal to `t`.

Let's implement this solution in PHP: **[115. Distinct Subsequences](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000115-distinct-subsequences/solution.php)**

```php
<?php
/**
 * @param String $s
 * @param String $t
 * @return Integer
 */
function numDistinct(string $s, string $t): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo numDistinct("rabbbit", "rabbit") .  "\n";      // Output: 3
echo numDistinct("babgbag", "bag") .  "\n";         // Output: 5
echo numDistinct("a", "a") .  "\n";                 // Output: 1
echo numDistinct("a", "b") .  "\n";                 // Output: 0
echo numDistinct("aaa", "aa") .  "\n";              // Output: 3
echo numDistinct("abc", "") .  "\n";                // Output: 1
echo numDistinct("abcd", "abcd") .  "\n";           // Output: 1
echo numDistinct("abcd", "ac") .  "\n";             // Output: 1
echo numDistinct("abab", "ab") .  "\n";             // Output: 3
echo numDistinct("xxx", "xx") .  "\n";              // Output: 3
?>
```

### Explanation:

- **Base case**: `dp[0] = 1` ensures that matching the first character of `t` starts from a valid count.
- **Backward traversal**: Prevents using the same `s[i]` multiple times for different positions in `t` within the same iteration.
- **Transition**: When `s[i-1] == t[j-1]`, we add the number of ways to form `t[0..j-2]` using previous characters of `s` (`dp[j-1]`) to the current count for `t[0..j-1]`.
- **Skip case**: The old `dp[j]` already accounts for not using `s[i-1]`, so we don’t need to explicitly copy it.
- **Result**: After all characters, `dp[n]` gives the answer, which fits in a 32-bit integer per constraints.

## Complexity Analysis

- **Time Complexity**: _**O(m * n)**_, where `m` = length of `s` and `n` = length of `t`. We process each character of `s` and update all `n` positions of `t`.
- **Space Complexity**: _**O(n)**_, using a single 1D array of size `n+1` instead of a full 2D matrix.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**