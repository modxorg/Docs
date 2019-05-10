---
title: "Date Formats"
_old_id: "91"
_old_uri: "2.x/making-sites-with-modx/commonly-used-template-tags/date-formats"
---

MODX is written in PHP, and as such, it relies on the underlying PHP date functions, e.g. [strftime](http://www.php.net/manual/en/function.strftime.php). The discussion here can get quite tricky because the [strftime](http://www.php.net/manual/en/function.strftime.php) and [strtotime](http://co.php.net/strtotime) functions deploy _similar_ arguments, but they are not identical. 

The discussion here relates primarily to the following content fields:

- `createdon`
- `deletedon`
- `editedon`
- `publishedon`
- `pub_date`
- `unpub_date`

## Unix timestamps and formatted dates

Depending on the source and method of retrieving a value, you may either receive a **UNIX timestamp** or a **formatted date**. A unix timestamp is recognised as a large integer number (representing the number of seconds sinds January 1st 1970).

In MODX, the `date` [output modifier](building-sites/tag-syntax/output-filters), which is used to format dates using PHP's `strftime()` function, **expects a unix timestamp**. In order to turn a formatted date into a unix timestamp, you will use the `strtotime` output modifier.

So if a value, say `[[*createdon]]`, returns a formatted date, you need to first transform it to a unix timestamp with `[[*createdon:strtotime]]` before you can format it with `date`. But, if a value immediately returns a unix timestamp, you can skip that. 

## Common Examples

It's not possible to give every possible example, but here are some common ways of formatting dates using the MODX output filters.

| Example Output           | The Filter Parameters                           |
| ------------------------ | ----------------------------------------------- |
| Thu Apr 14, 2011         | `[[*createdon:strtotime:date=`%a %b %d, %Y`]]`  |
| 18 April 2011            | `[[*createdon:strtotime:date=`%d %B %Y`]]`      |
| Monday, April 18, 2011   | `[[*createdon:strtotime:date=`%A, %B %d, %Y`]]` |
| 2011-04-18               | `[[*createdon:strtotime:date=`%Y-%m-%d`]]`      |
| Depends on configuration | `[[*createdon:strtotime:date=`[[++manager_date_format]]`]]` |

## All Parameters

The date output modifier internally runs the [PHP strftime function](https://php.net/strftime), so all documentation about strftime applies to the date output modifier as well. 

To change the language used by the `date` output modifier (e.g. for the name of days and months), configure the `locale` [system setting](building-sites/settings) in MODX appropriately. 

| Code              | Display                                                      | Example                 |
| ----------------- | ------------------------------------------------------------ | ----------------------- |
| %a                | Short weekday name                                           | Sun                     |
| %A                | Full weekday name                                            | Sunday                  |
| %b                | Short month name                                             | Jan                     |
| %B                | Full month name                                              | January                 |
| %c                | Local date and time                                          | Wed Jan 7 00:22:10 2010 |
| %C                | Century (the year divided by 100, range 00 to 99)            | 20                      |
| %d                | Day of the month (01 to 31)                                  | 03                      |
| %D                | Same as %m/%d/%y                                             | 04/29/10                |
| %e                | Day of the month (1 to 31)                                   | 3                       |
| %H                | Hour (24-hour clock)                                         | 00-23                   |
| %I                | Hour (12-hour clock)                                         | 01-12                   |
| %l (lower-case L) | Hour in 12-hour format, with a space preceding single digits | 1-12                    |
| %j                | Day of the year                                              | 001 to 366              |
| %m                | Month                                                        | 01 to 12                |
| %M                | Minute                                                       | 00 to 59                |
| %n                | Newline character                                            | \\n                     |
| %P                | am or pm                                                     | am                      |
| %p                | AM or PM                                                     | AM                      |
| %r                | Same as %I:%M:%S %p                                          | 08:23:11 PM             |
| %R                | Same as %H:%M                                                | 23:11                   |
| %S                | Second                                                       | 00 to 59                |
| %t                | Tab character                                                | \\t                     |
| %T                | Same as %H:%M:%S                                             | 26:12:27                |
| %u                | Weekday (Monday=1)                                           | 01 to 07                |
| %w                | Weekday (Sunday=0)                                           | 00 to 06                |
| %x                | Date only                                                    | 01/25/09                |
| %X                | Time only                                                    | 02:58:12                |
| %y                | Two-digit year                                               | 09                      |
| %Y                | Four-digit year                                              | 2010                    |
| %Z or %z          | Time zone offset or name                                     | -005 or EST             |
| %%                | A literal % character                                        | %                       |

### Server compatibility note

Not all servers support all the formatting parameters, in particular on Windows `%e` is not supported and `%z` and `%Z` return the timezone name instead of the offset. On Mac, `%P` is not supported.  

## See Also

- [strftime() documentation on PHP.net](https://php.net/strftime)
- [Output modifiers](building-sites/tag-syntax/output-filters)
- [Common template tags](building-sites/tag-syntax/common)
- [Resources](building-sites/resources)
- [Templates](building-sites/elements/templates)
- [Chunks](building-sites/elements/chunks)
