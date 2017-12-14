---
title: "Symlink"
_old_id: "296"
_old_uri: "2.x/making-sites-with-modx/structuring-your-site/resources/symlink"
---

What is a Symlink? 
-------------------

Symlinks map a URL to an existing resource. They are similar to [Weblinks](/revolution/2.x/making-sites-with-modx/structuring-your-site/resources/weblink "Weblink") in that they redirect to another [Resources](/revolution/2.x/making-sites-with-modx/structuring-your-site/resources "Resources") or URL; however, symlinks will persist the current URL. The name is taken from Linux, and the purpose is similar.

Use Cases 
----------

Many sites may never use Symlinks, but they can solve certain problems.

- You can use a Symlink as a kind of 301 redirect.
- You can avoid duplicating content: create the content once, then point to it via a symlink.
- You can apply different permissions to the same content: put the Symlinks into different resource groups.

Clarifications 
---------------

The target page must be published in order for the Symlink to resolve. If the target page is not published, a 503 Error will be generated.

Likewise, the target page must exist, otherwise an error page will be generated. Currently, you are not prevented from entering invalid page IDs when creating a Symlink.

See Also 
---------

1. [Content Types](/revolution/2.x/making-sites-with-modx/structuring-your-site/resources/content-types)
2. [Named Anchor](/revolution/2.x/making-sites-with-modx/structuring-your-site/resources/named-anchor)
3. [Static Resource](/revolution/2.x/making-sites-with-modx/structuring-your-site/resources/static-resource)
4. [Symlink](/revolution/2.x/making-sites-with-modx/structuring-your-site/resources/symlink)
  1. [Using Resource Symlinks](/revolution/2.x/making-sites-with-modx/structuring-your-site/resources/symlink/using-resource-symlinks)
5. [Weblink](/revolution/2.x/making-sites-with-modx/structuring-your-site/resources/weblink)