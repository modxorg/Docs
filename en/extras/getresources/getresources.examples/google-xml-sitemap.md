---
title: "getResources.Google XML Sitemap"
_old_id: "890"
_old_uri: "revo/getresources/getresources.examples/getresources.google-xml-sitemap"
---

Who needs [a special snippet](extras/googlesitemap "GoogleSiteMap"), you can also let getResources do the dirty work of creating an XML sitemap for Google.

**We'll be making a couple of items:**

- a mess of TVs to hold Sitemap data like change frequency, priority, and others.
- a resource for our sitemap.xml
- a tpl chunk for getResources

## The TV's

First create a category for your TV's, let's call it "Search Tools", it will help organize them on the [Template Variables](making-sites-with-modx/customizing-content/template-variables "Template Variables") tab. Also when creating each TV make sure to allow it access to each Template.

**Change Frequency** - This is used to tell Google how often you expect a page to be updated.

1. Name it change-frequency, select the new Search Tools for it's category.
2. Next choose input type: DropDown List
3. Input Option Values of: always||hourly||daily||weekly||monthly||yearly||never
4. I recommend default value of: monthly

**Google Sitemap Priority** - This is used to tell Google how important each page is. And no, giving them all a value of 1 wont make them index better :)

1. Name it google-site-map-priority, select the new Search Tools for it's category.
2. Next choose input type: DropDown List
3. Input Option Values of: .1||.2|| .3|| .5|| .6|| .7|| .8|| .9|| 1
4. I recommend default value of: .5

## The Chunk

Create a new chunk and call it: google-sitemap-tpl

 ``` php
<url>
  <loc>[[~[[+id]]? &scheme=`full`]]</loc>
  <lastmod>[[+editedon]]</lastmod>
  <priority>[[+tv.google-site-map-priority]]</priority>
  <changefreq>[[+tv.change-frequency]]</changefreq>
</url>?
```

## The Page

Create a page in the root of your site and name it "sitemap.xml". Check the Hide From Menus box. Set the template to `<empty>`. In Page Settings change the content type to xml. Paste in the below code and you should be good to go. When you have saved it, confirm the resource alias field is 'sitemap.xml' and the resource is published.

 ``` php
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.google.com/schemas/sitemap/0.84">
[[getResources?
  &parents=`0`
  &tpl=`google-sitemap-tpl`
  &limit=`500`
  &sortdir=`DESC`
  &includeTVs=`1`
  &processTVs=`1`
  &depth=`10`
  &sortby=`publishedon`
  ]]
</urlset>
```

If you have more than 500 resources or more than 10 levels deep, you may want to change the limit and depth properties in the snippet call.
