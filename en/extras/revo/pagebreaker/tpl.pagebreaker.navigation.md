---
title: "tpl.PageBreaker.navigation"
_old_id: "1027"
_old_uri: "revo/pagebreaker/tpl.pagebreaker.navigation"
---

<div>- [Description](#tpl.PageBreaker.navigation-Description)
- [Placeholders](#tpl.PageBreaker.navigation-Placeholders)
- [See Also](#tpl.PageBreaker.navigation-SeeAlso)

</div>Description
-----------

It is the chunk for pagination.

```
<pre class="brush: php">
<div style="margin-top: 10px; text-align: center;"><div style="margin-top: 10px; text-align: center;">
  [[+pb.link_prev:isnotempty=`<a href="[[+pb.link_prev]]" class="load_page">&larr;&nbsp;Previous page</a>`]]
  &nbsp;&nbsp;
  <b>[[+pb.current]]</b> from <b>[[+pb.total]]</b>
  &nbsp;&nbsp;
  [[+pb.link_next:ne=``:then=`<a href="[[+pb.link_next]]" class="load_page">Next page&nbsp;&rarr;</a>`:else=`<a href="[[~[[*id]]]]" class="load_page">To beginning</a>`]]
</div>

```Placeholders
------------

There is only four simple placeholders.

<table><tbody><tr><th>Placeholder</th><th>Description</th></tr><tr><td>pb.link\_prev</td><td>Link to previous page</td></tr><tr><td>pb.link\_next</td><td>Link to next page</td></tr><tr><td>pb.current</td><td>Number of current page</td></tr><tr><td>pb.total</td><td>Total pages</td></tr></tbody></table>See Also
--------

1. [PageBreaker.PageBreaker](/extras/revo/pagebreaker/pagebreaker.pagebreaker)
2. [tpl.PageBreaker.ajax](/extras/revo/pagebreaker/tpl.pagebreaker.ajax)
3. [tpl.PageBreaker.navigation](/extras/revo/pagebreaker/tpl.pagebreaker.navigation)