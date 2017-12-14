---
title: "xFPC"
_old_id: "737"
_old_uri: "revo/xfpc"
---

<div>- [What is xFPC?](#xFPC-WhatisxFPC%3F)
  - [Requirements](#xFPC-Requirements)
  - [History](#xFPC-History)
  - [Download & Installation](#xFPC-Download%26Installation)
- [Read this BEFORE use!](#xFPC-ReadthisBEFOREuse%5C%21)
- [Using xFPC](#xFPC-UsingxFPC)
  - [Using the full-page-cache](#xFPC-Usingthefullpagecache)
  - [Configuration parameters](#xFPC-Configurationparameters)
  - [xFPCAjax snippet: Using dynamic content on your webpage](#xFPC-xFPCAjaxsnippet%3AUsingdynamiccontentonyourwebpage)
  - [Using per-resource cache lifetime](#xFPC-Usingperresourcecachelifetime)
- [External sources](#xFPC-Externalsources)

</div>What is xFPC?
=============

xFPC means MODX Full Page Caching.

This component is a MODX full-page caching system. It even allows for dynamic content to be placed through an easy to use AJAX snippet. When the package is installed it will immediately start caching your webpages bringing your speed up to a few ms per page request.

You don't really need any technical skills to use and install this caching plugin. No modification of any server-side files is needed. Just install and go!

xFPC is created and maintained by [SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl).

Here are some of the responses that I got within a few hours after publishing the first version:

@**jkenters**: "Yeah, totally awesome! Thanks for this! 500ms -> 60ms :-)"   
@**gallenkamp**: "How can I pay you for this? Dude, this is awesome! #MODX #xFPC"   
@**FickleLife**: "I just installed #xFPC on a heavy site, it's way snappier. Impressed."   
@**SteveJKing**: "By the power of Grayskull - The speed increase with #MODX #xFPC is amazing."

Requirements
------------

xFPC requires MODX® Revolution 2.2.0 or later.

History
-------

<table><tbody><tr><th>Version</th><th>Release date</th><th>Author</th><th>Changes</th></tr><tr><td>2.0.0-PL1</td><td>November 17th, 2012</td><td>[Patrick Nijkamp](http://www.scherpontwikkeling.nl/over-ons/patrick-nijkamp.html) ([SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl))</td><td>Added Minify! Fixed paths.</td></tr><tr><td>1.1.0-PL1</td><td>November 15th, 2012</td><td>[Patrick Nijkamp](http://www.scherpontwikkeling.nl/over-ons/patrick-nijkamp.html) ([SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl))</td><td>Added new functionality</td></tr><tr><td>1.0.0-PL1</td><td>November 13th, 2012</td><td>[Patrick Nijkamp](http://www.scherpontwikkeling.nl/over-ons/patrick-nijkamp.html) ([SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl))</td><td>Initial release.</td></tr></tbody></table>Download & Installation
-----------------------

Install the package through the MODX® package manager.

Read this BEFORE use!
=====================

If you don't read this, don't come complaining that stuff doesn't work, k?

What xFPC will NOT do:

- Cache userpages (logged in pages)
- Cache manager pages

What xFPC CAN do:

- Give your website speed!
- Cache full pages and reduce the server load dramaticly
- Allow for contact form submissions and Quip updates (a POST generates a ban for the current URL forcing the cache to refresh)
- Allow for dynamic elements in the page (random pictures, quotes, text etc)

A page will be cached <ins>after the first view</ins>. **Only for logged out users, so be sure you are logged out also from the manager!**  
(or use a different browser for testing speed).

Using xFPC
==========

Using the full-page-cache
-------------------------

Using the full page cache is simple, install the snippet and of it goes. It will start generating full page cache files in the core/cache/fpc/ directory.   
When you clear your site cache, xFPC cache will also be cleared. If you save a resource (wether or not you have the 'clear cache' check set) it will also   
clear the xFPC cache.

**When testing your cache speed, be sure that you are logged out of the manager and the front-end. If you are logged in to either of those the cache will be**  
**disabled for you!**

Configuration parameters
------------------------

You can configure xFPC in the system settings:

<table><tbody><tr><th>Setting key</th><th>Description</th><th>Values</th><th>Default Value</th></tr><tr><td>xfpc.cachelife</td><td>A time in seconds for how long the cache is valid. If expired a new cachefile is generated.</td><td>Time in seconds</td><td>0 (unlimited)</td></tr><tr><td>xfpc.exclude</td><td>This setting allows you to exclude pages based on a URL string.</td><td>Enter a keyword on each newline (eg. "members" will exclude every URL with members in it)</td><td>(empty)</td></tr><tr><td>xfpc.excludecss</td><td>Exclude CSS files from combining</td><td>Comma separated file list (only filenames, no paths)</td><td>(empty)</td></tr><tr><td>xfpc.excludejs</td><td>Exclude JS file from combining</td><td>Comma separated file list (only filenames, no paths)</td><td>(empty)</td></tr><tr><td>xfpc.combinecss</td><td>Wether or not to combine CSS. **(will break relative URL paths, so use absolute paths)**</td><td>1 = yes, 0 = no</td><td>0</td></tr><tr><td>xfpc.combinejs</td><td>Wether or not to combine JS.</td><td>1 = yes, 0 = no</td><td>0</td></tr><tr><td>xfpc.minifycss</td><td>Wether or not to minify CSS using Minify.</td><td>1 = yes, 0 = no</td><td>0</td></tr><tr><td>xfpc.minifyjs</td><td>Wether or not to minify JS using Minify.</td><td>1 = yes, 0 = no</td><td>0</td></tr><tr><td>xfpc.combinejsandcss</td><td>**Experimental:** Wether or not to combine CSS into the JS.</td><td>1 = yes, 0 = no</td><td>0</td></tr><tr><td>xfpc.lifetimetv</td><td>The TV that holds the per-resource-cache time in seconds.</td><td>A TV ID number</td><td>(empty)</td></tr></tbody></table>**Note:** When you use minify CSS or JS (or both), xFPC will save the cached minified versions. This way it will serve minified files from the cache very fast.

xFPCAjax snippet: Using dynamic content on your webpage
-------------------------------------------------------

If you want dynamic content (like random text or random images) you can use the xFPCAjax snippet that comes with xFPC. It's very easy to use.

You can configure xFPCAjax snippet with the following properties:

<table><tbody><tr><th>Property</th><th>Description</th><th>Values</th><th>Default Value</th></tr><tr><td>resource</td><td>Resource ID of the content to be shown</td><td>An ID (number)</td><td>false</td></tr><tr><td>url</td><td>In case you don't want to use resource ID (only site URLs will work)</td><td>A URL string</td><td>false</td></tr><tr><td>showStaticContent</td><td>Wether or not to show the content in static text as well</td><td>1 = yes, 0 = no</td><td>1</td></tr></tbody></table>Here we have an example case:   
Imagine you have a random quote on your webpage from your clients saying how awesome you are. You used to do this with a snippet called \[<span class="error">\[!getRandomAwesomeQuote\]</span>\].   
Since you are using xFPC the quote is static, since it cached your complete page. We can fix this.

Create a new resource, give it a blank empty template and place the \[<span class="error">\[!getRandomAwesomeQuote\]</span>\] snippet inside it's content field. Let's say the new resource   
got the ID "300". You can hide this resource from the menu, but be sure to publish it.   
Now back to the place where the <span class="error">\[!getRandomAwesomeQuote\]</span> used to be and replace this call with:

```
<pre class="brush: php">
[[xFPCAjax?
   &resource=`300`
]]

```Now, when your static cache file is loaded, it will load the dynamic quote from the resource using AJAX. This means that your page loads blazing fast in the blink of an eye   
your quote will also be there. I bet ya you won't even notice that it get's loaded with AJAX.

So your old template looked like this:

```
<pre class="brush: php">
<div class="awesome-quote">[[!getRandomAwesomeQuote]]</div>

```And your new template looks like this: (You have moved your dynamic snippet to a new resource with an empty template that has the ID 300)

```
<pre class="brush: php">
<div class="awesome-quote">
[[xFPCAjax?
   &resource=`300`
]]
</div>

```**Note:** When you use AJAX the actual content will not be shown on non-javascript browsers. This has impact on Google viewing your webpage. Since Google will not parse AJAX request it does not see the content that is supposed to be in the dynamic placeholder. For this we introduced "showStaticContent". It will render the HTML in the source-code like normal, and in a JS enabled browser the content will be overwritten with the dynamic content. This way Google can still index your dynamic placeholders with the most information possible.

Using per-resource cache lifetime
---------------------------------

If you want some resources to have a shorter cache lifetime you can do this very easily:

Create a TV, name it something like "cacheLifetime" and note it's ID (let's say it's "10"). Assign the TV to the templates that need it.   
Head over to your system settings and find the setting "xfpc.lifetimetv" and change the value to the tv ID: 10 (or the ID that you just created).

Now when editing a resource you can enter a time in seconds into the TV's value field and xFPC will respect your settings.

External sources
================

Developers website: <http://www.scherpontwikkeling.nl/portfolio/modx-addons/xfpc.html>