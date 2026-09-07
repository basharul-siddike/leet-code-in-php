940\. Distinct Subsequences II

**Difficulty:** Hard

**Topics:** `Principal`, `String`, `Dynamic Programming`, `Weekly Contest 110`

Given a string s, return _the number of **distinct non-empty subsequences** of `s`_. Since the answer may be very large, return it **modulo** `10⁹ + 7`.
A **subsequence** of a string is a new string that is formed from the original string by deleting some (can be none) of the characters without disturbing the relative positions of the remaining characters. (i.e., ``"ace"`` is a subsequence of ``"abcde"`` while ``"aec"`` is not.

**Example 1:**

- **Input:** s = "abc"
- **Output:** 7
- **Explanation:** The 7 distinct subsequences are "a", "b", "c", "ab", "ac", "bc", and "abc".

**Example 2:**

- **Input:** s = "aba"
- **Output:** 6
- **Explanation:** The 6 distinct subsequences are "a", "b", "ab", "aa", "ba", and "aba".

**Example 3:**

- **Input:** s = "aaa"
- **Output:** 3
- **Explanation:** The 3 distinct subsequences are "a", "aa" and "aaa".

**Example 4:**

- **Input:** s = "z"
- **Output:** 1

**Example 5:**

- **Input:** s = "abab"
- **Output:** 11

**Example 6:**

- **Input:** s = "leetcode"
- **Output:** 187

**Example 7:**

- **Input:** s = "a"
- **Output:** 1

**Example 8:**

- **Input:** s = "aaa"
- **Output:** 3

**Constraints:**

- `1 <= s.length <= 2000`
- `s` consists of lowercase English letters.


**Similar Questions:**
1. [1987. Number of Unique Good Subsequences](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001987-number-of-unique-good-subsequences)
2. [2842. Count K-Subsequences of a String With Maximum Beauty](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002842-count-k-subsequences-of-a-string-with-maximum-beauty)


**Solution:**

We use a dynamic programming approach that counts distinct subsequences by tracking how many subsequences end with each lowercase letter. When processing each character, we create new subsequences by appending it to all previously existing subsequences plus the single-character subsequence itself, then update the count for that letter. This effectively avoids duplicates by overwriting the count for the current letter with the total count of new subsequences ending with it.

## Approach

- Initialize an array `endsIn` of size 26 (one for each lowercase letter) to store the number of distinct subsequences that end with that letter.
- Iterate through each character `c` in the string `s`.
- For each character, compute `total = (sum of all values in `endsIn` + 1) % MOD` — this represents:
    - All existing distinct subsequences (from all letters) plus the single-character subsequence `c`.
- Update `endsIn[index_of_c] = total` (overwrite instead of adding, to prevent counting duplicate subsequences that end with `c`).
- After processing all characters, return `sum(endsIn) % MOD` as the total number of distinct non-empty subsequences.

Let's implement this solution in PHP: **[940. Distinct Subsequences II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000940-distinct-subsequences-ii/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Integer
 */
function distinctSubseqII(string $s): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo distinctSubseqII("abc") .  "\n";       // Output: 7
echo distinctSubseqII("aba") .  "\n";       // Output: 6
echo distinctSubseqII("aaa") .  "\n";       // Output: 3
echo distinctSubseqII("z") .  "\n";         // Output: 1
echo distinctSubseqII("abab") .  "\n";      // Output: 11
echo distinctSubseqII("leetcode") .  "\n";  // Output: 187
echo distinctSubseqII("a") .  "\n";         // Output: 1
echo distinctSubseqII("abcabc") .  "\n";    // Output: 51
?>
```

### Explanation:

- The key insight is that when we append a character `c` to all existing subsequences, we generate exactly `total` new distinct subsequences that end with `c`.
- Overwriting `endsIn[c]` is crucial because any subsequences that previously ended with `c` are already included in the new `total` (since `total` includes the sum of all previous subsequences, including those ending with `c`). This prevents double‑counting.
- The `+ 1` accounts for the subsequence consisting solely of the current character.
- The modulo `1_000_000_007` ensures the result stays within integer bounds.
- This approach runs in _**O(n)**_ time with _**O(1)**_ extra space (besides the fixed 26‑element array).

## Complexity Analysis

- **Time Complexity:** _**O(n)**_ — we iterate through the string once, and each iteration performs constant‑time array operations (summing 26 elements, which is also O(26) ≈ O(1)).
- **Space Complexity:** _**O(1)**_ — we only use a fixed‑size array of 26 integers.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**