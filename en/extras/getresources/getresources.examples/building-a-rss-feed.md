---
title: "getResources.Building a RSS feed"
_old_id: "887"
_old_uri: "revo/getresources/getresources.examples/getresources.building-a-rss-feed"
---

Sites which publish new articles, blogs or news items will probably want to give their visitors a way to keep updated. RSS Feeds are an easy way of doing that. This short tutorial will go into detail on how to make your own RSS Feed using MODX Revolution and the getResources addon. If you have not yet installed getResources, please do so first.

## Creating the RSS Resource

In your MODX Manager, create a new resource.

1. First, give it a title (for example: "My latest Blogs on sitename.com") and an alias (for example: feed).
2. Next, change the template to use "(empty)", or in other words no template at all. You will get a popup asking if you are sure you want to change the template, click yes.
3. Move into the Page Settings tab and find the "Content Type". Open it, and set it to RSS.
4. Now you are ready to include the channel information (in other words: the global information about your feed) in the page content. If you are using TinyMCE or a similar rich text editor, disable it on the Page Settings tab to prevent odd things happening to the code.
5. Paste the following code into the Content field:

``` php
<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:dc="http://purl.org/dc/elements/1.1/">
<channel>
    <title>[[*pagetitle]]</title>
    <link>[[~[[*id]]? &scheme=`full`]]</link>
    <description>[[*introtext:cdata]]</description>
    <language>[[++cultureKey]]</language>
    <ttl>120</ttl>
    <atom:link href="[[~[[*id]]? &scheme=`full`]]" rel="self" type="application/rss+xml" />
[[getResources?
  &tpl=`rssItem`
  &parents=`29,41`
  &depth=`5`
  &limit=`10`
  &includeContent=`1`
  &includeTVs=`1`
  &showHidden=`0`
  &hideContainers=`1`
]]
</channel>
</rss>
```

**Warning for Articles**
If you are using getResources to summarize blog posts from the [Articles](http://rtfm.modx.com/display/ADDON/Articles) Extra, you must set **&showHidden=`1`** – Articles are considered hidden.

What this does is quite straightforward. First you declare the xml and rss version (as well as "extensions" to the rss, in this case atom and dublin core), similar to how you would declare a HTML Doctype. Next, the channel block starts which is where you give information about your feed and the website it represents.

- Title: the title of the feed, which will be displayed in the browser title bar or the RSS reader. It uses the pagetitle in this case.
- Link: the full / absolute link to the RSS feed.
- Description: short introduction about your website which will be displayed in the feed information. The cdata output filter puts cdata tags around the introtext field to ensure it doesn't break the feed.
- Language: two character cultureKey which can be set per context and is used to identify the language the feed is in.
- Ttl: time to live, in other words the time in minutes that a feed can be cached by the feed reader before fetching it again.
- Atom link to self.

That's all for the channel information. Next, you will see the getResources call which fetches items 5 levels deep from parents 29 and 41 with a maximum of 10 resources. Furthermore it includes the content and any TVs that may be associated to a resource.

Save your resource.

If you would visit your feed now, it wont work properly yet as we did not yet create the template to use for the feed items.

## Set up the getResources tpl for the items

In the getResources snippets we referenced a chunk called "rssItem", so let's create it now.

``` php
<item>
  <title>[[+pagetitle:htmlent]]</title>
  <link>[[~[[+id]]? &scheme=`full`]]</link>
  <description>
    [[+introtext:default=`[[+content:ellipsis=`600`]]`:cdata]]
  </description>
  <pubDate>[[+publishedon:strtotime:date=`%a, %d %b %Y %H:%M:%S %z`]]</pubDate>
  <guid isPermaLink="false">[[~[[+id]]? &scheme=`full`]]</guid>
  <dc:creator>
      [[+createdby:userinfo=`fullname`]]
  </dc:creator>
</item>
```

You can modify this chunk to suit your needs and include that information you want to include (or not). This item template includes:

- The resource's pagetitle (with htmlentities applied, just in case);
- A link to the resource;
- A description which takes the introtext if it has any data, or the first 600 characters of the content if it doesn't. ([Read more about output filters here](making-sites-with-modx/customizing-content/input-and-output-filters-(output-modifiers) "Input and Output Filters (Output Modifiers)")). It also applies the cdata filter again to prevent breaking the feed with html tags;
- The date the resource was published;
- The GUID / link to the resource;
- The name of the author (as fetched from the createdby field).

When you save the chunk, and go back to your feed, you should see it has loaded in the content and you're good to go. Make sure to put a link to your RSS feed on your site somewhere, and also stick it in the header with a link tag:

``` php
<link rel="alternate" type="application/rss+xml" title="Follow this website with RSS" href="[[~52]]" />
```

Be sure to replace 52 with the ID of your RSS resource. This will make the browser recognize the feed, and put the shiny icon in the navigation bar.

## Now what

Of course you can further customize this. Some ideas to get you started:

- If your author doesn't have or use its own account in your MODX Manager, make a text TV with his name and reference that instead of the createdby field's name.
- Right now, the feed fetches every resource within the parents.. which can also include categories, placeholder pages or other pages you would rather not include. You can filter these out by using a Template Variable and the &tvFilter parameter on the getResources call.
- Have a look at [this RSS specification](http://cyber.law.harvard.edu/rss/rss.html) and see if there is more information you want to include in your feed.

## Troubleshooting

Is your feed not showing anything? Try viewing the page source. If there is content in there, but it is not being parsed properly there is probably an error in the syntax somewhere. Use the [W3C Feed Validator](https://validator.w3.org/feed/) to validate your feed and eliminate any errors.

This page has been partly based on [this forum post by Ryan Thrash](https://forums.modx.com/index.php/topic,59632.msg339285.html#msg339285).
