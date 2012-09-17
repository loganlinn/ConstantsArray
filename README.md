# ConstantsArray

## A simple array-like PHP class for using constants in strings

In PHP, if you want to use a constant in a string, you have to use the
concatenation operator:

```php
define('COLOR_RED', 0);

echo "The code for red is " . COLOR_RED;
```

or assign the constant to a variable:

```php
define('COLOR_RED',    0);
define('COLOR_GREEN',  1);
define('COLOR_BLUE',   2);

$COLOR_RED   = COLOR_RED;
$COLOR_GREEN = COLOR_GREEN;
$COLOR_BLUE  = COLOR_BLUE;

echo "The code for red is $COLOR_RED";

echo <<<SQL
	SELECT * FROM shirts WHERE color IN (
		$COLOR_RED,
		$COLOR_GREEN,
		$COLOR_BLUE
	)
SQL;
```

So, this can get tedious and make code hard-to-read especially when
strings are complicated, such as a SQL query.  

Introducing `ConstantsArray`. It's a simple, array-like class that
allows lightweight access to your constants inside of a heredoc string and
without having to break out of double-quote strings or having to assign
a bunch of variables.

```php
define('COLOR_RED',    0);
define('COLOR_GREEN',  1);
define('COLOR_BLUE',   2);
$constants = new ConstantsArray();

echo <<<SQL
	SELECT * FROM shirts WHERE color IN (
		{$constants['COLOR_RED']},
		{$constants['COLOR_GREEN']},
		{$constants['COLOR_BLUE']}
	)
SQL;
```

I should acknowledge that another option would be to use PHP's
`get_defined_constants()` function to get all of the constants in the
environment as an array, which you could use in a similar fashion as a
`ConstantsArray`. However, this can be a big waste of memory. 

`ConstantsArray` implements the `ArrayAccess` interface for array-like
access to the `constant()` function, so it is lightweight and simple.

That's pretty much it. Enjoy!

### TODO

*   Unit tests

## License

ConstantsArray is licensed under the MIT license. See [LICENSE]
for more details

[LICENSE]: http://raw.github.com/loganlinn/ConstantsArray/master/MIT-LICENSE.txt
