---
title: "YAMS XML Sitemap"
_old_id: "758"
_old_uri: "evo/yams/yams-english-documentation/yams-how-to/yams-xml-sitemap"
---

<div class="error"><span class="error">Unknown macro: {div}</span>![](/images/icons/emoticons/information.gif)**Language Variants**

<table class="tableview" width="100%"><tr><td><span class="icon icon-page">Page:</span> [YAMS XML Sitemap](/extras/evo/yams/yams-english-documentation/yams-how-to/yams-xml-sitemap)</td></tr></table></div>How to create a single multilingual sitemap with YAMS
=====================================================

This creates a single XML sitemap listing all documents in all languages. It assumes that all web documents are multilingual. If the site will contain mono- and multilingual documents, then the ditto call will need to be more sophisticated. Two ditto calls will be required. One ditto call will loop over all documents that are associated with multilingual templates and one which loops over all documents associated with monolingual templates. This can be achieved using Ditto's &filter parameter. The multilingual Ditto call will need to be placed in a chunk and repeated using the YAMS snippet call described below.

1. Create a new template called XMLSitemap
2. Include the following in your XMLSitemap template: ```
  <pre class="brush: php">
  <?xml version="1.0" encoding="[(modx_charset)]" ?>
  <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" >
  [*content*]
  </urlset>
  
  ```
3. Go to the Modules > YAMS > Multilingual Templates. Select "no" for XMLSitemap and submit.
4. Create a new template variable.   
  **Name:** UrlsetChangeFreq   
  **Caption:** Change Frequency   
  **Description:** Specify how often this page is likely to be updated. Be honest!   
  **Input type:** DropDown List Menu   
  **Input option values:** always||hourly||daily||weekly||monthly||yearly||never   
  **Default value:** yearly (or monthly, or whatever)   
  Associate the template variable with all your templates except XMLSitemap.
5. Create another new template variable   
  **Name:** UrlsetPriority   
  **Caption:** Priority   
  **Description:** If it is more/less important that google scans this page than other pages, give it a value higher/lower than 0.5. (Range 0...1)   
  **Input type:** Number   
  **Input option values:** (leave blank)   
  **Default value:** 0.5   
  Associate the template variable with all your templates except XMLSitemap.
6. Create a new chunk called SitemapRepeatTpl with your ditto call in it that generates the <url> blocks for all your documents. Ideally, all your web documents should be in a single folder, and &parents should be set to the id of that folder. The snippet call might look something like this: ```
  <pre class="brush: php">
  [!Ditto? &language=`(yams_mname)` &parents=`1` &tpl=`UrlsetURL` &depth=`5` &dateSource=`editedon` &dateFormat=`%Y-%m-%d` &display=`all` &showInMenuOnly=`0` &seeThroughUnpub=`1` &filter=`type,reference,2|searchable,1,1`!]
  
  ```where UrlsetURL is another chunk with the following contents
  
  ```
  <pre class="brush: php">
  <url>
  <loc>(yams_doc:[+id+])</loc>
  <lastmod>[+date+]</lastmod>
  <changefreq>[+UrlsetChangeFreq+]</changefreq>
  <priority>[+UrlsetPriority+]</priority>
  </url>
  
  ```This ditto call specifies that there are maximum of 5 levels of folders - which can make the ditto call significantly more efficient in my experience, and excludes weblinks and un-searchable documents from the sitemap.
7. Create a new document with the alias sitemap.xml that lives outside your web root folder. Select the XMLSitemap template. Set the content type to text/xml. For the content, use ```
  <pre class="brush: php">
  [[YAMS? &get=`repeat` &repeattpl=`SitemapRepeatTpl`]]
  
  ```

Hey presto - multilingual XML Sitemap. In addition, you can specify the change frequency and priority via the template variables attached to each document.