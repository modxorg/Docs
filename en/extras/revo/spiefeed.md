---
title: "spieFeed"
_old_id: "719"
_old_uri: "revo/spiefeed"
---

<div>- [Description](#spieFeed-Description)
- [Download](#spieFeed-Download)
- [Development and Bug Reporting](#spieFeed-DevelopmentandBugReporting)
- [Usage](#spieFeed-Usage)
  - [Available Properties](#spieFeed-AvailableProperties)
  - [Available Placeholders](#spieFeed-AvailablePlaceholders)

</div>Description
-----------

The RSS/Atom feeder based on [SimplePie](http://simplepie.org/) 1.2 which is already included in the package: <http://github.com/rmccue/simplepie/downloads>

Requirements   

----------------

- MODx Revolution 2.0.0-RC-2 or later
- PHP5 or later

History   

-----------

spieFeed integration was written by [goldsky](/display/~goldsky) as the RSS/Atom feeder, and first released on Oct 18, 2010.

Download
--------

It can be downloaded from within the MODx Revolution manager via <span class="error">\[Package Management\]</span>, or from the MODx Extras Repository, here: <http://modxcms.com/extras/package/738> or here: <http://modx.com/extras/package/spiefeed>

Development and Bug Reporting
-----------------------------

spieFeed is stored and developed in GitHub, and can be found here:<https://github.com/goldsky/spiefeed>

Bugs can be filed here: <https://github.com/goldsky/spiefeed/issues>

Usage
-----

spieFeed is used by placing the Snippet call into your content and passing a 'url' parameter:

```
<pre class="brush: php">
[[!spieFeed? &setFeedUrl=`http://path.com/to/my/rss.feed.rss`]]

```For multiple sources can call this

```
<pre class="brush: php">
http://feeds.feedburner.com/modx-announce | http://www.voanews.com/templates/Articles.rss?sectionPath=/russian/news

```separated by pipe ( | ) symbol(s).

### Available Properties

<table><tbody><tr><th>Name</th><th>Description</th><th>Options</th><th>Default</th></tr><tr><td>setFeedUrl</td><td>URL of the feed to retrieve.</td><td>Any URL</td><td><http://feeds.feedburner.com/modx-announce> | <http://www.voanews.com/templates/Articles.rss?sectionPath=/russian/news></td></tr><tr><td>enableCache</td><td>This option allows you to disable caching all-together in SimplePie.   
However, disabling the cache can lead to longer load times. [info](http://simplepie.org/wiki/reference/simplepie/enable_cache)</td><td>0 | 1</td><td>1</td></tr><tr><td>enableOrderByDate</td><td>Sometimes feeds don't have their items in chronological order.   
By default, SimplePie will re-order them to be in such an order.   
With this option, you can enable/disable the reordering of items into reverse chronological order if you don't want it. [info](http://simplepie.org/wiki/reference/simplepie/enable_order_by_date)  
</td><td>0 | 1   
</td><td>1   
</td></tr><tr><td>setCacheDuration</td><td>Set the minimum time (in seconds) for which a feed will be cached. [info](http://simplepie.org/wiki/reference/simplepie/set_cache_duration)  
</td><td>integers in seconds</td><td>3600</td></tr><tr><td>setCacheLocation</td><td>Set the file system location (not WWW location) where the cache files should be written. The cache folder should be make or error will be returned. [info](http://simplepie.org/wiki/reference/simplepie/set_cache_location)  
</td><td> </td><td>core/components/spiefeed/cache</td></tr><tr><td>setFaviconHandler</td><td>Set the handler to enable the display of cached favicons. [info](http://simplepie.org/wiki/reference/simplepie/set_favicon_handler)  
</td><td>\[str image handler file\], \[query\]</td><td>false, "i"   
</td></tr><tr><td>setItemLimit</td><td>Set the maximum number of items to return per feed with Multifeeds.   
This is NOT for limiting the number of items to loop through in a single feed.   
For that, you want to pass $start and $length parameters to get\_items(). [info](http://simplepie.org/wiki/reference/simplepie/set_item_limit)  
</td><td>integer</td><td>null</td></tr><tr><td>setJavascript</td><td>Set the query string that triggers SimplePie to generate the JavaScript code for embedding media files. [info](http://simplepie.org/wiki/reference/simplepie/set_javascript)</td><td>javascript query string parameter</td><td>js   
</td></tr><tr><td>stripAttributes</td><td>Set which attributes get stripped from an entry's content.   
The default set of attributes is stored in the property SimplePie?strip\_attributes, not to be confused with the method SimplePie?strip\_attributes().   
This way, you can modify the existing list without having to create a whole new one. [info](http://simplepie.org/wiki/reference/simplepie/strip_attributes)  
</td><td>attributes get stripped from an entry"s content</td><td>array("bgsound", "class", "expr", "id", "style", "onclick", "onerror", "onfinish", "onmouseover", "onmouseout", "onfocus", "onblur", "lowsrc", "dynsrc")</td></tr><tr><td>stripComments</td><td>Set whether to strip out HTML comments from an entry's content. [info](http://simplepie.org/wiki/reference/simplepie/strip_comments)  
</td><td>0 | 1   
</td><td>0   
</td></tr><tr><td>stripHtmlTags</td><td>Set which HTML tags get stripped from an entry's content.   
The default set of tags is stored in the property SimplePie?strip\_htmltags, not to be confused with the method SimplePie?strip\_htmltags().   
This way, you can modify the existing list without having to create a whole new one. [info](http://simplepie.org/wiki/reference/simplepie/strip_htmltags)  
</td><td>HTML tags get stripped from an entry"s content</td><td>array("base", "blink", "body", "doctype", "embed", "font", "form", "frame", "frameset", "html", "iframe", "input", "marquee", "meta", "noscript", "object", "param", "script", "style")</td></tr><tr><td>dateFormat</td><td>Date format supports anything that works with PHP's date() function. Only supports the English language. [info](http://simplepie.org/wiki/reference/simplepie_item/get_date)  
</td><td>PHP"s date()</td><td>"j F Y, g:i a"</td></tr><tr><td>localDateFormat</td><td>Returns the date/timestamp of the posting in the localized language. Date format supports anything that works with PHP's strftime() function. To display in other languages, you need to change the locale with PHP's setlocale() function. The available localizations depend on which ones are installed on your web server. [info](http://simplepie.org/wiki/reference/simplepie_item/get_local_date)  
</td><td>PHP"s strftime() of the posting in the localized language. setlocale() matters.</td><td>"%c"</td></tr><tr><td>getItemStart</td><td>Returns an array of SimplePie\_Item references for each item in the feed, which can be looped through. [info](http://simplepie.org/wiki/reference/simplepie/get_items)  
</td><td>integers</td><td>0   
</td></tr><tr><td>getItemLength</td><td>Returns an array of SimplePie\_Item references for each item in the feed, which can be looped through. [info](http://simplepie.org/wiki/reference/simplepie/get_items)</td><td>integers</td><td>0   
</td></tr><tr><td>forceFSockopen</td><td>If cURL is available, SimplePie will use it instead of the built-in fsockopen functions for fetching remote feeds. This config option will force SimplePie to use fsockopen even if cURL is installed. [info](http://simplepie.org/wiki/reference/simplepie/force_fsockopen)  
</td><td>0 | 1   
</td><td>1   
</td></tr><tr><td>setInputEncoding</td><td>Allows you to override the character encoding of the feed.   
This is only useful for times when the feed is reporting an incorrect character encoding (as per RFC 3023 and Determining the character encoding of a feed).   
This setting is similar to set\_output\_encoding().   
The number of supported character encodings depends on whether your web host supports mbstring, iconv, or both. See Supported Character Encodings for more information. [info](http://simplepie.org/wiki/reference/simplepie/set_input_encoding)  
</td><td>[http://simplepie.org/wiki/faq/supported\_character\_encodings](http://simplepie.org/wiki/faq/supported_character_encodings)</td><td>false   
</td></tr><tr><td>setOutputEncoding</td><td>Allows you to override SimplePie's output to match that of your webpage.   
This is useful for times when your webpages are not being served as UTF-8.   
This setting will be obeyed by handle\_content\_type(), and is similar to set\_input\_encoding().   
It should be noted, however, that not all character encodings can support all characters.   
If your page is being served as ISO-8859-1 and you try to display a Japanese feed, you'll likely see garbled characters. Because of this, it is highly recommended to ensure that your webpages are served as UTF-8.   
The number of supported character encodings depends on whether your web host supports mbstring, iconv, or both. See Supported Character Encodings for more information. [info](http://simplepie.org/wiki/reference/simplepie/set_output_encoding)  
</td><td>[http://simplepie.org/wiki/faq/supported\_character\_encodings](http://simplepie.org/wiki/faq/supported_character_encodings)</td><td>"UTF-8"</td></tr><tr><td>sortBy</td><td>Allow you to sort the result by one of the available placeholders   
</td><td>placeholders</td><td>date</td></tr><tr><td>sortOrder</td><td>The sorting order   
</td><td>ASC | DESC   
</td><td>DESC</td></tr><tr><td>tpl</td><td>Template   
</td><td>chunk name</td><td>defaultSpieFeedTpl</td></tr><tr><td>rowCls</td><td>Class name for each row   
</td><td>class name</td><td>spie-row</td></tr><tr><td>firstRowCls</td><td>Class name for the first row   
</td><td>class name</td><td>spie-first-row</td></tr><tr><td>lastRowCls</td><td>Class name for the last row   
</td><td>class name</td><td>spie-last-row</td></tr><tr><td>oddRowCls</td><td>Class name for the odd row   
</td><td>class name</td><td>spie-odd-row</td></tr><tr><td>&debug (1.5-pl)   
</td><td>Debug mode, to return Simple Pie's error   
</td><td>0 | 1   
</td><td>0   
</td></tr><tr><td>&toArray (1.5-pl)   
</td><td>Return the result as an array   
</td><td>0 | 1   
</td><td>0   
</td></tr><tr><td>&emptyMessage (1.5-pl)   
</td><td>Custom message on the empty return   
</td><td>anything   
</td><td> </td></tr></tbody></table>### Available Placeholders

- favicon
- link
- title
- description
- content
- permalink
- imageLink
- imageTitle
- imageUrl
- imageWidth
- imageHeight
- date
- localDate
- copyright
- latitude
- longitude
- language
- encoding
- authorName
- authorLink
- authorEmail
- category
- contributor
- getType
- itemImageThumbnailUrl
- itemImageWidth
- itemImageHeight