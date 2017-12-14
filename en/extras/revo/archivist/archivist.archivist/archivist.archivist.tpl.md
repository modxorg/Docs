---
title: "Archivist.Archivist.tpl"
_old_id: "777"
_old_uri: "revo/archivist/archivist.archivist/archivist.archivist.tpl"
---

Archivist's tpl Chunk
---------------------

This is the Chunk displayed with the &tpl property on the [Archivist](/extras/revo/archivist/archivist.archivist "Archivist.Archivist") snippet.

Default Value
-------------

```
<pre class="brush: php">
<li class="[[+cls]]">
    <a href="[[+url]]" title="[[+date]]">[[+date]]</a> ([[+count]])
</li>

```Available Placeholders
----------------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>url</td><td>The URL that will go to the appropriate archive.</td></tr><tr><td>cls</td><td>The CSS class to use, specified as a property in the Archivist snippet call.</td></tr><tr><td>date</td><td>The formatted time span that is being archived.</td></tr><tr><td>count</td><td>The number of Resources in the 'date'.</td></tr><tr><td>month</td><td>The number month. (01,07,11,etc)</td></tr><tr><td>month\_name</td><td>The name of the month.</td></tr><tr><td>month\_name\_abbr</td><td>The abbreviated name of the month.</td></tr><tr><td>year</td><td>The 4-digit year.</td></tr><tr><td>day</td><td>The numeric of the day (01,24,31,etc)</td></tr><tr><td>day\_formatted</td><td>The day, with a postfix 'th', 'rd' or 'nd'. (1st, 2nd, 3rd)</td></tr><tr><td>weekday</td><td>The name of the weekday.</td></tr><tr><td>weekday\_idx</td><td>The index of the weekday.</td></tr></tbody></table>See Also
--------

1. [Archivist.Archivist](/extras/revo/archivist/archivist.archivist)
  1. [Archivist.Archivist.tpl](/extras/revo/archivist/archivist.archivist/archivist.archivist.tpl)
2. [Archivist.ArchivistGrouper](/extras/revo/archivist/archivist.archivistgrouper)
3. [Archivist.getArchives](/extras/revo/archivist/archivist.getarchives)
  1. [Archivist.getArchives.tpl](/extras/revo/archivist/archivist.getarchives/archivist.getarchives.tpl)