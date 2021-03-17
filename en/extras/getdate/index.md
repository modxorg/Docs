---
title: "getDate"
_old_id: "1696"
_old_uri: "revo/getdate"
---

## What is getDate?

A simple timestamp retrieval Snippet for MODX Revolution.

## History

getDate was first written by David Pede (davidpede) and released on November 22, 2013.

## Download

It can be downloaded from within the MODX Revolution manager via [Package Management](en/building-sites/extras), or from the MODX Extras Repository, here: <https://modx.com/extras/package/getDate>

The source code and build script is also available on GitHub: <https://github.com/tasianmedia/getDate>

## Bugs & Feature Requests

Bugs, issues and feature requests can be reported in the GitHub Repository, found here: <https://github.com/tasianmedia/getDate/issues>

## Usage

The getDate snippet can be called using the tag:

``` php
[[!getDate]]
```

getDate can be called cached or un-cached.

## Available Properties

### Selection Properties

| Name   | Description                                                                                                                               | Default Value | Added in Version |
| ------ | ----------------------------------------------------------------------------------------------------------------------------------------- | ------------- | ---------------- |
| offset | The period of time to add or subtract from the current timestamp. Use relative date/time formats that the strtotime() parser understands. | now           | 1.0.0-pl         |

| Example Offset | Example Snippet Call               |
| -------------- | ---------------------------------- |
| +5 Hours       | `[[!getDate? &offset=`5 hour`]]`   |
| +4 Days        | `[[!getDate? &offset=`4 day`]]`    |
| +3 Weeks       | `[[!getDate? &offset=`3 weeks`]]`  |
| +2 Months      | `[[!getDate? &offset=`2 month`]]`  |
| +1 Year        | `[[!getDate? &offset=`1 year`]]`   |
|                |
| -5 Hours       | `[[!getDate? &offset=`-5 hour`]]`  |
| -4 Days        | `[[!getDate? &offset=`-4 day`]]`   |
| -3 Weeks       | `[[!getDate? &offset=`-3 weeks`]]` |
| -2 Months      | `[[!getDate? &offset=`-2 month`]]` |
| -1 Year        | `[[!getDate? &offset=`-1 year`]]`  |

For all relative date/time formats supported by strtotime(), please see: <http://www.php.net/manual/en/datetime.formats.relative.php>

## Date Format Options

### Output Filters

getDate outputs a unix timestamp. To format this timestamp into a human friendly format, please use the built in [MODX Output Filter 'date'](making-sites-with-modx/customizing-content/input-and-output-filters-(output-modifiers)#InputandOutputFilters(OutputModifiers)-Stringoutputmodifiers).

| Example Output            | The Filter Parameters               |
| ------------------------- | ----------------------------------- |
| 22 November 2013          | `[[!getDate:date=`%e %B %Y`]]`      |
| Fri Nov 22, 2013          | `[[!getDate:date=`%a %b %e, %Y`]]`  |
| Friday, November 22, 2013 | `[[!getDate:date=`%A, %B %e, %Y`]]` |
| 2013-11-22                | `[[!getDate:date=`%Y-%m-%d`]]`      |

For all date formatting parameters, please see: [revolution/2.x/making-sites-with-modx/commonly-used-template-tags/date-formats#DateFormats-AllParameters](making-sites-with-modx/commonly-used-template-tags/date-formats#DateFormats-AllParameters)

## Examples

Output the current unix timestamp:

``` php
[[!getDate]]
```

Output the current date (YYYY-MM-DD) using output filters:

``` php
[[!getDate:date=`%Y-%m-%d`]]
```

Output the date two months ago (YYYY-MM-DD) using output filters:

``` php
[[getDate:date=`%Y-%m-%d`? &offset=`-2 month`]]
```

## Using getDate with getResources

When combined with [getResources](extras/getresources "getResources"), getDate allows you to apply powerful date/time based filtering to your output. This includes filtering by date using resource fields and TV's.

### Settings Resource Fields

The following examples use the '&where' parameter and setting resource fields.

Output only resources published within the last three months:

``` php
[[!getResources?
    &parents=`[[*id]]`
    &tpl=`myRowTpl`
    &where=`[{"publishedon:>=":"[[!getDate? &offset=`-3 month`]]"}]`
]]
```

Output only resources published from the start of last month:

``` php
[[!getResources?
    &parents=`[[*id]]`
    &tpl=`myRowTpl`
    &where=`[{"publishedon:>=":"[[!getDate? &offset=`first day of last month`]]"}]`
]]
```

Output only resources published in the last week and edited today:

``` php
[[!getResources?
    &parents=`[[*id]]`
    &tpl=`myRowTpl`
    &where=`[{"publishedon:>=":"[[!getDate? &offset=`-1 week`]]","editedon:>=":"[[!getDate? &offset=`today`]]"}]`
]]
```

### Date Template Variable (TV)

The following examples use the '&tvFilters' parameter and Date TV's.

Unlike Settings Resource Fields, Date TV's un-processed values are not stored in the database as a timestamp. Instead they are stored in this format: 'YYYY-MM-DD HH:SS:MM'. Because the '&tvFilters' parameter only uses un-processed values, you must format your 'getDate' output to match using a output filter.

Output only resources with a custom date younger than three months ago:

``` php
[[!getResources?
    &parents=`[[*id]]`
    &tpl=`myRowTpl`
    &includeTVs=`1`
    &includeTVList=`myCustomDate`
    &tvFilters=`myCustomDate>=[[!getDate:date=`%Y-%m-%d`? &offset=`-3 month`]]`
]]
```

Output only resources with a custom date younger than the start of last month:

``` php
[[!getResources?
    &parents=`[[*id]]`
    &tpl=`myRowTpl`
    &includeTVs=`1`
    &includeTVList=`myCustomDate`
    &tvFilters=`myCustomDate>=[[!getDate:date=`%Y-%m-%d`? &offset=`first day of last month`]]`
]]
```

Output only resources where just the month of a custom date equals the current month:

``` php
[[!getResources?
    &parents=`[[*id]]`
    &tpl=`myRowTpl`
    &includeTVs=`1`
    &includeTVList=`myCustomDate`
    &tvFilters=`myCustomDate==[[!getDate:date=`%Y-%m-%`]]`
]]
```

Output only resources with one custom date younger than last week and a second custom date younger than midnight today:

``` php
[[!getResources?
    &parents=`[[*id]]`
    &tpl=`myRowTpl`
    &includeTVs=`1`
    &includeTVList=`myCustomDate01,myCustomDate02`
    &tvFilters=`myCustomDate01>=[[getDate:date=`%Y-%m-%d`? &offset=`-1 week`]],myCustomDate02>=[[getDate:date=`%Y-%m-%d %T`? &offset=`today`]]`
]]
```

All 'getResources' related examples above are un-cached for dynamic filtering. To ensure this works, make sure the 'getResource' call AND the 'getDate' call are both un-cached. To cache the output, again make sure both the snippet calls are cached.
