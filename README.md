# ConstantsArray

## A simple array-like PHP class for using constants in strings

### Usage

In PHP, if you want to use a constant in a string, you have to use the
concatenation operator:

```php
<?php
define('COLOR_RED', 0);

echo "The code for red is " . COLOR_RED;
```

or assign the constant to a variable:

```php
<?php
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

Another option would be to use PHP's `get_defined_constants()` function
to get all of the constants in the environment. But, unless you're going
to use every constant in your string (hey, leave my examples alone)
that's just a waste of memory and CPU cycles.

So, this can get tedious, hard-to-read, and flat-out stupid, especially
when strings are complicated, such as a SQL query.  

Introducing `ConstantsArray`. It's a simple, array-like class that
allows lazy access to your constants inside of a heredoc string and
without having to break out of double-quote strings or having to assign
a bunch of variables.

```php
<?php
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

That pretty much it. Enjoy!

### License

ConstantsArray is licensed under the MIT license. See [LICENSE]
for more details

[LICENSE]: http://raw.github.com/loganlinn/ConstantsArray/master/MIT-LICENSE.txt
