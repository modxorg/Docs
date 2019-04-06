---
title: "bdRedirect"
_old_id: "794"
_old_uri: "revo/bdlistings/bdlistings.bdredirect"
---

bdRedirect is a simple snippet that can be used to create a redirect page that tracks clicks for the listing a link was clicked on. You need to set the &redirectResource property on your bdListings snippet calls to make sure it properly generates the redirect\_url property.

Simply create a resource, and put the uncached bdRedirect snippet call in the content:

``` php
[[!bdRedirect]]
```

It will redirect the user to the "website" url, or to the error page if it can't be found.
