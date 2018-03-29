---
title: "Date Formats"
_old_id: "91"
_old_uri: "2.x/making-sites-with-modx/commonly-used-template-tags/date-formats"
---

- [Common Examples.](#DateFormats-CommonExamples.)
- [All Parameters](#DateFormats-AllParameters)
- [See Also](#DateFormats-SeeAlso)



MODx is written in PHP, and as such, it relies on the underlying PHP date functions, e.g. [strftime](http://www.php.net/manual/en/function.strftime.php). The discussion here can get quite tricky because the [strftime](http://www.php.net/manual/en/function.strftime.php) and [strtotime](http://co.php.net/strtotime) functions deploy _similar_ arguments, but they are not identical. Sorry for the confusion; date manipulation and formatting is more complex than it might at first seem.

The discussion here relates primarily to the following content fields:

- createdon
- deletedon
- editedon
- publishedon
- unpub\_date

## Common Examples.

It's not possible to give every possible example because date formatting can be complex, and it varies from region to region. Here are a few common examples that demonstrate how to use the output filters below.

| Example Output | The Filter Parameters |
|----------------|-----------------------|
| Thu Apr 14, 2011 | `[[*createdon:strtotime:date=`%a %b %e, %Y`]]` |
| 18 April 2011 | `[[*createdon:strtotime:date=`%e %B %Y`]]` |
| Monday, April 18, 2011 | `[[*createdon:strtotime:date=`%A, %B %e, %Y`]]` |
| 2011-04-18 | `[[*createdon:strtotime:date=`%Y-%m-%d`]]` |
## All Parameters

| Code | Display | Example |
|------|---------|---------|
| %a | Short weekday name | Sun |
| %A | Full weekday name | Sunday |
| %b | Short month name | Jan |
| %B | Full month name | January |
| %c | Local date and time | Wed Jan 7 00:22:10 2010 |
| %C | Century (the year divided by 100, range 00 to 99) | 20 |
| %d | Day of the month (01 to 31) | 03 |
| %D | Same as %m/%d/%y | 04/29/10 |
| %e | Day of the month (1 to 31) | 3 |
| %H | Hour (24-hour clock) | 00-23 |
| %I | Hour (12-hour clock) | 01-12 |
| %l (lower-case L) | Hour in 12-hour format, with a space preceding single digits | 1-12 |
| %j | Day of the year | 001 to 366 |
| %m | Month | 01 to 12 |
| %M | Minute | 00 to 59 |
| %n | Newline character | \\n |
| %P | am or pm | am |
| %p | AM or PM | AM |
| %r | Same as %I:%M:%S %p | 08:23:11 PM |
| %R | Same as %H:%M | 23:11 |
| %S | Second | 00 to 59 |
| %t | Tab character | \\t |
| %T | Same as %H:%M:%S | 26:12:27 |
| %u | Weekday (Monday=1) | 01 to 07 |
| %w | Weekday (Sunday=0) | 00 to 06 |
| %x | Date only | 01/25/09 |
| %X | Time only | 02:58:12 |
| %y | Two-digit year | 09 |
| %Y | Four-digit year | 2010 |
| %Z or %z | Time zone offset or name | -005 or EST |
| %% | A literal % character | % |
## See Also

- The above were gleaned from one of Bob's helpful forum posts: <http://modxcms.com/forums/index.php?topic=56339.0>
- [display/revolution20/Input+and+Output+Filters+(Output+Modifiers)](display/revolution20/Input+and+Output+Filters+(Output+Modifiers))
- [display/revolution20/Commonly+Used+Template+Tags](display/revolution20/Commonly+Used+Template+Tags)

1. [Resources](making-sites-with-modx/structuring-your-site/resources)
  1. [Content Types](making-sites-with-modx/structuring-your-site/resources/content-types)
  2. [Named Anchor](making-sites-with-modx/structuring-your-site/resources/named-anchor)
  3. [Static Resource](making-sites-with-modx/structuring-your-site/resources/static-resource)
  4. [Symlink](making-sites-with-modx/structuring-your-site/resources/symlink)
      1. [Using Resource Symlinks](making-sites-with-modx/structuring-your-site/resources/symlink/using-resource-symlinks)
  5. [Weblink](making-sites-with-modx/structuring-your-site/resources/weblink)
2. [Templates](making-sites-with-modx/structuring-your-site/templates)
3. [Chunks](making-sites-with-modx/structuring-your-site/chunks)
4. [Using Snippets](making-sites-with-modx/structuring-your-site/using-snippets)

FYI for those running on Windows from the PHP site:

Additionally, not all platforms support negative timestamps, so your date range may be limited to no earlier than the Unix epoch. This means that %e, %T, %R and, %D (and possibly others) - as well as dates prior to _Jan 1, 1970_ - will not work on Windows, some Linux distributions, and a few other operating systems. For Windows systems, a complete overview of supported conversion specifiers can be found at [» MSDN](http://msdn.microsoft.com/en-us/library/fe06s4ak.aspx).

So the first 3 common examples given do not work on Windows!