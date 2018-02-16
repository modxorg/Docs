---
title: "friendly_alias_urls"
_old_id: "145"
_old_uri: "2.x/administering-your-site/settings/system-settings/friendly_alias_urls"
---

friendly\_alias\_urls
---------------------

**Name**: Use Friendly URL Aliases   
**Type**: Yes/No   
**Default**: No

Turns on friendly URLs, which generate SEO-friendly URL mappings for your Resources. The URL map is determined by the Resource's place in the site tree, and its "alias" field.

For example, a Resource with alias 'blog' and a Content Type of "HTML" will be rendered as www.mysite.com/blog.html if it's not a container. If the blog Resource was under another Resource with an alias of 'test', then the blog Resource's URL would be:

> www.mysite.com/test/blog.html

This allows for completely customizable and automatically built SEO-friendly URLs.

<div class="note">To get this fully working, there are some extra steps involved. Please refer to [Using Friendly URLs](administering-your-site/using-friendly-urls "Using Friendly URLs").</div>