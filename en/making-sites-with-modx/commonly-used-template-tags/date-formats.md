---
title: "Date Formats"
_old_id: "91"
_old_uri: "2.x/making-sites-with-modx/commonly-used-template-tags/date-formats"
---

<div>- [Common Examples.](#DateFormats-CommonExamples.)
- [All Parameters](#DateFormats-AllParameters)
- [See Also](#DateFormats-SeeAlso)

</div>MODx is written in PHP, and as such, it relies on the underlying PHP date functions, e.g. [strftime](http://www.php.net/manual/en/function.strftime.php). The discussion here can get quite tricky because the [strftime](http://www.php.net/manual/en/function.strftime.php) and [strtotime](http://co.php.net/strtotime) functions deploy _similar_ arguments, but they are not identical. Sorry for the confusion; date manipulation and formatting is more complex than it might at first seem.

The discussion here relates primarily to the following content fields:

- createdon
- deletedon
- editedon
- publishedon
- unpub\_date

Common Examples.
----------------

It's not possible to give every possible example because date formatting can be complex, and it varies from region to region. Here are a few common examples that demonstrate how to use the output filters below.

<table><tbody><tr><th>Example Output</th> <th>The Filter Parameters</th> </tr><tr><td>Thu Apr 14, 2011</td> <td>`[[*createdon:strtotime:date=`%a %b %e, %Y`]]` </td> </tr><tr><td>18 April 2011</td> <td>`[[*createdon:strtotime:date=`%e %B %Y`]]` </td> </tr><tr><td>Monday, April 18, 2011</td> <td>`[[*createdon:strtotime:date=`%A, %B %e, %Y`]]` </td> </tr><tr><td>2011-04-18</td> <td>`[[*createdon:strtotime:date=`%Y-%m-%d`]]` </td></tr></tbody></table>All Parameters
--------------

<table><tbody><tr><th>Code</th> <th>Display</th> <th>Example</th> </tr><tr><td>%a</td> <td>Short weekday name</td> <td>Sun</td> </tr><tr><td>%A</td> <td>Full weekday name</td> <td>Sunday</td> </tr><tr><td>%b</td> <td>Short month name</td> <td>Jan</td> </tr><tr><td>%B</td> <td>Full month name</td> <td>January</td> </tr><tr><td>%c</td> <td>Local date and time</td> <td>Wed Jan 7 00:22:10 2010</td> </tr><tr><td>%C</td> <td>Century (the year divided by 100, range 00 to 99)</td> <td>20</td> </tr><tr><td>%d</td> <td>Day of the month (01 to 31)</td> <td>03</td> </tr><tr><td>%D</td> <td>Same as %m/%d/%y</td> <td>04/29/10</td> </tr><tr><td>%e</td> <td>Day of the month (1 to 31)</td> <td>3</td> </tr><tr><td>%H</td> <td>Hour (24-hour clock)</td> <td>00-23</td> </tr><tr><td>%I</td> <td>Hour (12-hour clock)</td> <td>01-12</td> </tr><tr><td>%l (lower-case L)   
</td> <td>Hour in 12-hour format, with a space preceding single digits</td> <td>1-12   
</td> </tr><tr><td>%j</td> <td>Day of the year</td> <td>001 to 366</td> </tr><tr><td>%m</td> <td>Month</td> <td>01 to 12</td> </tr><tr><td>%M</td> <td>Minute</td> <td>00 to 59</td> </tr><tr><td>%n</td> <td>Newline character</td> <td>\\n</td> </tr><tr><td>%P</td> <td>am or pm</td> <td>am</td> </tr><tr><td>%p</td> <td>AM or PM</td> <td>AM</td> </tr><tr><td>%r</td> <td>Same as %I:%M:%S %p</td> <td>08:23:11 PM</td> </tr><tr><td>%R</td> <td>Same as %H:%M</td> <td>23:11</td> </tr><tr><td>%S</td> <td>Second</td> <td>00 to 59</td> </tr><tr><td>%t</td> <td>Tab character</td> <td>\\t</td> </tr><tr><td>%T</td> <td>Same as %H:%M:%S</td> <td>26:12:27</td> </tr><tr><td>%u</td> <td>Weekday (Monday=1)</td> <td>01 to 07</td> </tr><tr><td>%w</td> <td>Weekday (Sunday=0)</td> <td>00 to 06</td> </tr><tr><td>%x</td> <td>Date only</td> <td>01/25/09</td> </tr><tr><td>%X</td> <td>Time only</td> <td>02:58:12</td> </tr><tr><td>%y</td> <td>Two-digit year</td> <td>09</td> </tr><tr><td>%Y</td> <td>Four-digit year</td> <td>2010</td> </tr><tr><td>%Z or %z</td> <td>Time zone offset or name</td> <td>-005 or EST</td> </tr><tr><td>%%</td> <td>A literal % character</td> <td>%</td></tr></tbody></table>See Also
--------

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