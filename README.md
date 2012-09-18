# ConstantsArray

## A simple array-like PHP class for using constants in strings

In PHP, if you want to use a constant in a string, you have a few
options.

You could use the concatenation operator:

```php
define('COLOR_RED',    0);
define('COLOR_GREEN',  1);
define('COLOR_BLUE',   2);

echo "SELECT * FROM shirts WHERE color IN (".COLOR_RED.",".COLOR_GREEN.",".COLOR_BLUE.")";

```

or use good ol' `sprintf()`

```php
define('COLOR_RED',    0);
define('COLOR_GREEN',  1);
define('COLOR_BLUE',   2);

echo sprintf(
	"SELECT * FROM shirts WHERE color IN (%d, %d, %d)",
	COLOR_RED,
	COLOR_GREEN,
	COLOR_BLUE
)
SQL;
```

or you even assign the constants to a variable:

```php
define('COLOR_RED',    0);
define('COLOR_GREEN',  1);
define('COLOR_BLUE',   2);

$COLOR_RED   = COLOR_RED;
$COLOR_GREEN = COLOR_GREEN;
$COLOR_BLUE  = COLOR_BLUE;

echo <<<SQL
	SELECT * FROM shirts WHERE color IN (
		$COLOR_RED,
		$COLOR_GREEN,
		$COLOR_BLUE
	)
SQL;
```

Note: These examples are meant to be simple, but consider more complex cases (queries).

These are all approaches that I've seen, and don't get me wrong, get the
job done, but some can be difficult or slow to read and some are just
plain annoying to type or edit. What other options are there?

Introducing `ConstantsArray`. It's a simple, array-like class that
allows lightweight access to your constants inside of a string without
having to break out of double-quote strings or having to assign
a bunch of variables for a heredoc.

```php
define('COLOR_RED',    0);
define('COLOR_GREEN',  1);
define('COLOR_BLUE',   2);
$const = new ConstantsArray();

echo <<<SQL
	SELECT * FROM shirts WHERE color IN (
		{$const['COLOR_RED']},
		{$const['COLOR_GREEN']},
		{$const['COLOR_BLUE']}
	)
SQL;
```

Short, concise, and readable.

`ConstantsArray` implements the `ArrayAccess` interface for array-like
access to the `constant()` function, so it is simple and reasonably lightweight.
I encourage you to read [the source of this class][ConstantsArray].

I should acknowledge that another option would be to use PHP's
`get_defined_constants()` function to get all of the constants in the
environment as an array, which you could use in a similar fashion as a
`ConstantsArray`. However, this can be a big waste of memory. 

That's pretty much it. Enjoy!

## License

ConstantsArray is licensed under the MIT license. See [LICENSE]
for more details

[ConstantsArray]: https://github.com/loganlinn/ConstantsArray/blob/master/ConstantsArray.php
[LICENSE]: http://raw.github.com/loganlinn/ConstantsArray/master/MIT-LICENSE.txt
