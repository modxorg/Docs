---
title: "Articles.Theming Articles"
_old_id: "786"
_old_uri: "revo/articles/articles.theming-articles"
---

<div>- [Duplicate the Sample Templates](#Articles.ThemingArticles-DuplicatetheSampleTemplates)
- [Editing the Templates](#Articles.ThemingArticles-EditingtheTemplates)
  - [The Container Template](#Articles.ThemingArticles-TheContainerTemplate)
  - [The Article Template](#Articles.ThemingArticles-TheArticleTemplate)
- [Editing Chunks](#Articles.ThemingArticles-EditingChunks)
- [Conclusion](#Articles.ThemingArticles-Conclusion)

</div>Articles is built in the MODX philosophy of always separating code from content. Therefore, every bit of Articles's markup can be edited, tweaked and changed. It's fairly simple: just duplicate the Templates and change them, and then

Duplicate the Sample Templates
------------------------------

Go ahead and duplicate the two templates, "sample.ArticlesContainerTemplate" and "sample.ArticlesTemplate". From there, rename them to whatever you want. We'll call ours "BlogTemplate" and "BlogPostTemplate", respectively.

<div class="warning">If you edit the sample Templates directly, rather than editing duplicates of them, your changes will be overwritten when you upgrade Articles!</div>Then, go into System Settings and find the following settings and change them:

- "articles.default\_container\_template" - Change this to our BlogTemplate
- "articles.default\_article\_template" - Change this to our BlogPostTemplate

This sets the default Template for Containers and Articles as you create them.

Editing the Templates
---------------------

### The Container Template

Our container template, or "BlogTemplate", has some placeholders that are provided to it by Articles. They are:

- \[\[+latest\_posts\]\] - This shows the "Latest Posts" widget on the right-hand side of the sample template.
- \[\[+latest\_comments\]\] - This shows the "Latest Comments" widget on the right-hand side of the sample template.
- \[\[+comments\_enabled\]\] - This will be 1 or 0, depending on if you enabled comments for this container.
- \[\[+tags\]\] - This shows a list of the most commonly used tags across your blog.
- \[\[+archives\]\] - This shows a list of the latest months (or years) in archive format that you've made posts to.

You can move these placeholders around to adjust your new template to however you like it!

### The Article Template

Our article template, or "BlogPostTemplate", has some placeholders as well:

- \[\[+latest\_posts\]\] - This shows the "Latest Posts" widget on the right-hand side of the sample template.
- \[\[+comments\]\] - The comments, provided by [Quip](/extras/revo/quip "Quip"), for this article, if comments are enabled.
- \[\[+comments\_count\]\] - a count of the number of comments made on the current article (i.e. on the current post). Relies on [QuipCount](/extras/revo/quip/quip.quipcount "Quip.QuipCount").
- \[\[+comments\_form\]\] - The reply form, provided by [Quip](/extras/revo/quip "Quip"), if comments are enabled.
- \[\[\*articlestags\]\] - Used with the "notempty" output filter, this can trigger whether or not you show the \[\[+article\_tags\]\] placeholder (note the \* instead of the +)
- \[\[+article\_tags\]\] - contains a list of all tags that the current article has been tagged with.
- \[\[\*articles\_container\]\] - The ID of the Container that our Article is in. Note the \* instead of the +

If you are _outside_ the Article Template and you need to display the number of comments that were made on a given post (e.g. if you want to display the number of comments on each post in your list of "Latest Posts"), then you cannot use the \[\[+comments\_count\]\] placeholder. You must instead use [QuipCount](/extras/revo/quip/quip.quipcount "Quip.QuipCount"). Go to the **Components -> Quip** page and take a look at the thread names that Articles gives each post automatically. It follows this format: article-b{page-id-of-blog}-{page-id-of-post}, e.g. **article-b12-37**

![](/download/attachments/36635030/Quip-Thread-Names.jpg?version=1&modificationDate=1341982338000)

Knowing that, we can then use [QuipCount](/extras/revo/quip/quip.quipcount "Quip.QuipCount") inside of a getResources call to retrieve the number of comments on each post, e.g.

```
<pre class="brush: php">[[!QuipCount? &thread=`article-b9-[[+id]]`]]

```In the above example, the blog is page id 9.

Editing Chunks
--------------

Articles also provides some basic Chunks for various display settings for your Container (in your "Advanced Settings" tab when editing the container). You can copy these chunks and use them when creating your site.

Conclusion
----------

Articles allows simple, MODX-style Templating and easy editing, without breaking upgradability. Theming your blog has never been easier.

1. [Articles.Creating a Blog](/extras/revo/articles/articles.creating-a-blog)
2. [Articles.Retrieving Articles Outside of Articles](/extras/revo/articles/articles.retrieving-articles-outside-of-articles)
3. [Articles.Roadmap](/extras/revo/articles/articles.roadmap)
4. [Articles.Theming Articles](/extras/revo/articles/articles.theming-articles)