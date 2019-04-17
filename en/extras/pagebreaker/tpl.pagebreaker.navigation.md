---
title: "tpl.PageBreaker.navigation"
_old_id: "1027"
_old_uri: "revo/pagebreaker/tpl.pagebreaker.navigation"
---

## Description

It is the chunk for pagination.

``` php
<div style="margin-top: 10px; text-align: center;"><div style="margin-top: 10px; text-align: center;">
  [[+pb.link_prev:isnotempty=`<a href="[[+pb.link_prev]]" class="load_page">&larr;&nbsp;Previous page</a>`]]
  &nbsp;&nbsp;
  <b>[[+pb.current]]</b> from <b>[[+pb.total]]</b>
  &nbsp;&nbsp;
  [[+pb.link_next:ne=``:then=`<a href="[[+pb.link_next]]" class="load_page">Next page&nbsp;&rarr;</a>`:else=`<a href="[[~[[*id]]]]" class="load_page">To beginning</a>`]]
</div>
```

## Placeholders

There is only four simple placeholders.

| Placeholder   | Description            |
| ------------- | ---------------------- |
| pb.link\_prev | Link to previous page  |
| pb.link\_next | Link to next page      |
| pb.current    | Number of current page |
| pb.total      | Total pages            |

## See Also

1. [PageBreaker.PageBreaker](extras/pagebreaker/pagebreaker.pagebreaker)
2. [tpl.PageBreaker.ajax](extras/pagebreaker/tpl.pagebreaker.ajax)
3. [tpl.PageBreaker.navigation](extras/pagebreaker/tpl.pagebreaker.navigation)