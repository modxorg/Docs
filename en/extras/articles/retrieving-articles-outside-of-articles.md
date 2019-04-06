---
title: "Retrieving Articles Outside of Articles"
_old_id: "783"
_old_uri: "revo/articles/articles.retrieving-articles-outside-of-articles"
---

Articles are stored as Resources in MODX, allowing you to easily utilize them in other MODX Extras. The only thing to note is that Articles have "hidemenu" set to 1 (they are hidden from menus) by default - the reason being to prevent them from showing in menus across your site (Imagine a site with 10,000 Articles - that'd be a big menu!).

For example, this [getResources](extras/getresources "getResources") call grabs the latest 8 Articles for you in your Container with ID 10:

``` php 
[[getResources?
  &parents=`10`
  &tpl=`myTpl`
  &showHidden=`1`
  &limit=`8`
]]
```

That's all there is to it!

## The Articles Snippet

Articles 1.4+ comes with a snippet called "Articles" that you can use to get Articles-specific placeholders for a Container on **any** Resource in your site. For example, putting this call on your Home page, targeting the Container with ID 10:

``` php 
[[Articles? &container=`10`]]
[[+latest_posts]]
```

...will show the latest Articles posts for that Container. The snippet makes available all the placeholders in the default Template, which are:

- \[\[+latest\_posts\]\] - This shows the "Latest Posts" widget on the right-hand side of the sample template.
- \[\[+latest\_comments\]\] - This shows the "Latest Comments" widget on the right-hand side of the sample template.
- \[\[+comments\_enabled\]\] - This will be 1 or 0, depending on if you enabled comments for this container.
- \[\[+tags\]\] - This shows a list of the most commonly used tags across your blog.
- \[\[+archives\]\] - This shows a list of the latest months (or years) in archive format that you've made posts to.

Also, you can use the &placeholderPrefix property on the Articles snippet to add a prefix to the above placeholders, allowing you to have multiple Articles snippet calls on one page.