---
title: "getDate"
_old_id: "1696"
_old_uri: "revo/getdate"
---

<a name="getDate-WhatisgetDate"></a>What is getDate?
----------------------------------------------------

A simple timestamp retrieval Snippet for MODX Revolution.

<a name="getDate-History"></a>History
-------------------------------------

getDate was first written by David Pede (davidpede) and released on November 22, 2013.

<a name="getDate-Download"></a>Download
---------------------------------------

It can be downloaded from within the MODX Revolution manager via [Package Management](display/revolution20/Installing+a+Package), or from the MODX Extras Repository, here: <http://modx.com/extras/package/getDate>

The source code and build script is also available on GitHub: <https://github.com/tasianmedia/getDate>

<a name="getDate-Bugs&FeatureRequests"></a>Bugs & Feature Requests
------------------------------------------------------------------

Bugs, issues and feature requests can be reported in the GitHub Repository, found here: <https://github.com/tasianmedia/getDate/issues>

<a name="getDate-Usage"></a>Usage
---------------------------------

The getDate snippet can be called using the tag:

 `<pre class="brush: php">[[!getDate]]`<div class="note">getDate can be called cached or un-cached.</div><a name="getDate-AvailableProperties"></a>Available Properties
--------------------------------------------------------------

### <a name="getDate-SelectionProperties"></a>Selection Properties

 <table><tbody><tr><th>Name</th> <th>Description   
</th> <th>Default Value   
</th> <th>Added in Version   
</th> </tr><tr><td>offset</td> <td>The period of time to add or subtract from the current timestamp. Use relative date/time formats that the strtotime() parser understands.</td> <td>now</td> <td>1.0.0-pl</td> </tr></tbody></table><table><tbody><tr><th>Example Offset</th> <th>Example Snippet Call</th> </tr><tr><td>+5 Hours</td> <td>\[\[!getDate? &offset=`5 hour`\]\]</td> </tr><tr><td>+4 Days</td> <td>\[\[!getDate? &offset=`4 day`\]\]</td> </tr><tr><td>+3 Weeks</td> <td>\[\[!getDate? &offset=`3 weeks`\]\]</td> </tr><tr><td>+2 Months</td> <td>\[\[!getDate? &offset=`2 month`\]\]</td> </tr><tr><td>+1 Year</td> <td>\[\[!getDate? &offset=`1 year`\]\]</td> </tr><tr></tr><tr><td>-5 Hours</td> <td>\[\[!getDate? &offset=`-5 hour`\]\]</td> </tr><tr><td>-4 Days</td> <td>\[\[!getDate? &offset=`-4 day`\]\]</td> </tr><tr><td>-3 Weeks</td> <td>\[\[!getDate? &offset=`-3 weeks`\]\]</td> </tr><tr><td>-2 Months</td> <td>\[\[!getDate? &offset=`-2 month`\]\]</td> </tr><tr><td>-1 Year</td> <td>\[\[!getDate? &offset=`-1 year`\]\]</td></tr></tbody></table><div class="info">For all relative date/time formats supported by strtotime(), please see: <http://www.php.net/manual/en/datetime.formats.relative.php></div><a name="getDate-DateFormatOptions"></a>Date Format Options
-----------------------------------------------------------

### <a name="getDate-OutputFilters"></a>Output Filters

getDate outputs a unix timestamp. To format this timestamp into a human friendly format, please use the built in [MODX Output Filter 'date'](revolution/2.x/making-sites-with-modx/customizing-content/input-and-output-filters-(output-modifiers)#InputandOutputFilters(OutputModifiers)-Stringoutputmodifiers).

 <table><tbody><tr><th>Example Output</th> <th>The Filter Parameters</th> </tr><tr><td>22 November 2013</td> <td>\[\[!getDate:date=`%e %B %Y`\]\]</td> </tr><tr><td>Fri Nov 22, 2013</td> <td>\[\[!getDate:date=`%a %b %e, %Y`\]\]</td> </tr><tr><td>Friday, November 22, 2013</td> <td>\[\[!getDate:date=`%A, %B %e, %Y`\]\]</td> </tr><tr><td>2013-11-22</td> <td>\[\[!getDate:date=`%Y-%m-%d`\]\]</td></tr></tbody></table><div class="info">For all date formatting parameters, please see: [revolution/2.x/making-sites-with-modx/commonly-used-template-tags/date-formats#DateFormats-AllParameters](revolution/2.x/making-sites-with-modx/commonly-used-template-tags/date-formats#DateFormats-AllParameters)</div><a name="getDate-Examples"></a>Examples
---------------------------------------

Output the current unix timestamp:

 `<pre class="brush: php">[[!getDate]]`Output the current date (YYYY-MM-DD) using output filters:

 `<pre class="brush: php">[[!getDate:date=`%Y-%m-%d`]]`Output the date two months ago (YYYY-MM-DD) using output filters:

 `<pre class="brush: php">[[getDate:date=`%Y-%m-%d`? &offset=`-2 month`]]`<a name="getDate-getResourcesExamples"></a>Using getDate with getResources
--------------------------------------------------------------------------

When combined with [getResources](extras/revo/getresources "getResources"), getDate allows you to apply powerful date/time based filtering to your output. This includes filtering by date using resource fields and TV's.

### <a name="getDate-getResourcesExamplesResourceFields"></a>Settings Resource Fields

The following examples use the '&where' parameter and setting resource fields.

Output only resources published within the last three months:

 ```
<pre class="brush: php">[[!getResources?
  &parents=`[[*id]]`
  &tpl=`myRowTpl`
  &where=`[{"publishedon:>=":"[[!getDate? &offset=`-3 month`]]"}]`
]]

```Output only resources published from the start of last month:

 ```
<pre class="brush: php">[[!getResources?
  &parents=`[[*id]]`
  &tpl=`myRowTpl`
  &where=`[{"publishedon:>=":"[[!getDate? &offset=`first day of last month`]]"}]`
]]

```Output only resources published in the last week and edited today:

 ```
<pre class="brush: php">[[!getResources?
  &parents=`[[*id]]`
  &tpl=`myRowTpl`
  &where=`[{"publishedon:>=":"[[!getDate? &offset=`-1 week`]]","editedon:>=":"[[!getDate? &offset=`today`]]"}]`
]]

```### <a name="getDate-getResourcesExamplesTV"></a>Date Template Variable (TV)

The following examples use the '&tvFilters' parameter and Date TV's.

<div class="note">Unlike Settings Resource Fields, Date TV's un-processed values are not stored in the database as a timestamp. Instead they are stored in this format: 'YYYY-MM-DD HH:SS:MM'. Because the '&tvFilters' parameter only uses un-processed values, you must format your 'getDate' output to match using a output filter.</div>Output only resources with a custom date younger than three months ago:

 ```
<pre class="brush: php">[[!getResources?
  &parents=`[[*id]]`
  &tpl=`myRowTpl`
  &includeTVs=`1`
  &includeTVList=`myCustomDate`
  &tvFilters=`myCustomDate>=[[!getDate:date=`%Y-%m-%d`? &offset=`-3 month`]]`
]]

```Output only resources with a custom date younger than the start of last month:

 ```
<pre class="brush: php">[[!getResources?
  &parents=`[[*id]]`
  &tpl=`myRowTpl`
  &includeTVs=`1`
  &includeTVList=`myCustomDate`
  &tvFilters=`myCustomDate>=[[!getDate:date=`%Y-%m-%d`? &offset=`first day of last month`]]`
]]

```Output only resources where just the month of a custom date equals the current month:

 ```
<pre class="brush: php">[[!getResources?
  &parents=`[[*id]]`
  &tpl=`myRowTpl`
  &includeTVs=`1`
  &includeTVList=`myCustomDate`
  &tvFilters=`myCustomDate==[[!getDate:date=`%Y-%m-%`]]`
]]

```Output only resources with one custom date younger than last week and a second custom date younger than midnight today:

 ```
<pre class="brush: php">[[!getResources?
  &parents=`[[*id]]`
  &tpl=`myRowTpl`
  &includeTVs=`1`
  &includeTVList=`myCustomDate01,myCustomDate02`
  &tvFilters=`myCustomDate01>=[[getDate:date=`%Y-%m-%d`? &offset=`-1 week`]],myCustomDate02>=[[getDate:date=`%Y-%m-%d %T`? &offset=`today`]]`
]]

```<div class="note">All 'getResources' related examples above are un-cached for dynamic filtering. To ensure this works, make sure the 'getResource' call AND the 'getDate' call are both un-cached. To cache the output, again make sure both the snippet calls are cached.</div>