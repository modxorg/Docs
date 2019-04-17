---
title: "xFPC"
_old_id: "737"
_old_uri: "revo/xfpc"
---

## What is xFPC?

xFPC means MODX Full Page Caching.

This component is a MODX full-page caching system. It even allows for dynamic content to be placed through an easy to use AJAX snippet. When the package is installed it will immediately start caching your webpages bringing your speed up to a few ms per page request.

You don't really need any technical skills to use and install this caching plugin. No modification of any server-side files is needed. Just install and go!

xFPC is created and maintained by [SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl).

Here are some of the responses that I got within a few hours after publishing the first version:

@**jkenters**: "Yeah, totally awesome! Thanks for this! 500ms -> 60ms :-)"
@**gallenkamp**: "How can I pay you for this? Dude, this is awesome! #MODX #xFPC"
@**FickleLife**: "I just installed #xFPC on a heavy site, it's way snappier. Impressed."
@**SteveJKing**: "By the power of Grayskull - The speed increase with #MODX #xFPC is amazing."

## Requirements

xFPC requires MODX® Revolution 2.2.0 or later.

## History

| Version   | Release date        | Author                                                                                                                                      | Changes                    |
| --------- | ------------------- | ------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------- |
| 2.0.0-PL1 | November 17th, 2012 | [Patrick Nijkamp](http://www.scherpontwikkeling.nl/over-ons/patrick-nijkamp.html) ([SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl)) | Added Minify! Fixed paths. |
| 1.1.0-PL1 | November 15th, 2012 | [Patrick Nijkamp](http://www.scherpontwikkeling.nl/over-ons/patrick-nijkamp.html) ([SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl)) | Added new functionality    |
| 1.0.0-PL1 | November 13th, 2012 | [Patrick Nijkamp](http://www.scherpontwikkeling.nl/over-ons/patrick-nijkamp.html) ([SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl)) | Initial release.           |

## Download & Installation

Install the package through the MODX® package manager.

## Read this BEFORE use!

If you don't read this, don't come complaining that stuff doesn't work, k?

What xFPC will NOT do:

- Cache userpages (logged in pages)
- Cache manager pages

What xFPC CAN do:

- Give your website speed!
- Cache full pages and reduce the server load dramaticly
- Allow for contact form submissions and Quip updates (a POST generates a ban for the current URL forcing the cache to refresh)
- Allow for dynamic elements in the page (random pictures, quotes, text etc)

A page will be cached after the first view. **Only for logged out users, so be sure you are logged out also from the manager!**
(or use a different browser for testing speed).

## Using xFPC

## Using the full-page-cache

Using the full page cache is simple, install the snippet and of it goes. It will start generating full page cache files in the core/cache/fpc/ directory.
When you clear your site cache, xFPC cache will also be cleared. If you save a resource (wether or not you have the 'clear cache' check set) it will also
clear the xFPC cache.

**When testing your cache speed, be sure that you are logged out of the manager and the front-end. If you are logged in to either of those the cache will be**
**disabled for you!**

## Configuration parameters

You can configure xFPC in the system settings:

| Setting key          | Description                                                                                 | Values                                                                                    | Default Value |
| -------------------- | ------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------- | ------------- |
| xfpc.cachelife       | A time in seconds for how long the cache is valid. If expired a new cachefile is generated. | Time in seconds                                                                           | 0 (unlimited) |
| xfpc.exclude         | This setting allows you to exclude pages based on a URL string.                             | Enter a keyword on each newline (eg. "members" will exclude every URL with members in it) | (empty)       |
| xfpc.excludecss      | Exclude CSS files from combining                                                            | Comma separated file list (only filenames, no paths)                                      | (empty)       |
| xfpc.excludejs       | Exclude JS file from combining                                                              | Comma separated file list (only filenames, no paths)                                      | (empty)       |
| xfpc.combinecss      | Wether or not to combine CSS. **(will break relative URL paths, so use absolute paths)**    | 1 = yes, 0 = no                                                                           | 0             |
| xfpc.combinejs       | Wether or not to combine JS.                                                                | 1 = yes, 0 = no                                                                           | 0             |
| xfpc.minifycss       | Wether or not to minify CSS using Minify.                                                   | 1 = yes, 0 = no                                                                           | 0             |
| xfpc.minifyjs        | Wether or not to minify JS using Minify.                                                    | 1 = yes, 0 = no                                                                           | 0             |
| xfpc.combinejsandcss | **Experimental:** Wether or not to combine CSS into the JS.                                 | 1 = yes, 0 = no                                                                           | 0             |
| xfpc.lifetimetv      | The TV that holds the per-resource-cache time in seconds.                                   | A TV ID number                                                                            | (empty)       |

**Note:** When you use minify CSS or JS (or both), xFPC will save the cached minified versions. This way it will serve minified files from the cache very fast.

## xFPCAjax snippet: Using dynamic content on your webpage

If you want dynamic content (like random text or random images) you can use the xFPCAjax snippet that comes with xFPC. It's very easy to use.

You can configure xFPCAjax snippet with the following properties:

| Property          | Description                                                          | Values          | Default Value |
| ----------------- | -------------------------------------------------------------------- | --------------- | ------------- |
| resource          | Resource ID of the content to be shown                               | An ID (number)  | false         |
| url               | In case you don't want to use resource ID (only site URLs will work) | A URL string    | false         |
| showStaticContent | Wether or not to show the content in static text as well             | 1 = yes, 0 = no | 1             |

Here we have an example case:
Imagine you have a random quote on your webpage from your clients saying how awesome you are. You used to do this with a snippet called \[\[!getRandomAwesomeQuote\]\].
Since you are using xFPC the quote is static, since it cached your complete page. We can fix this.

Create a new resource, give it a blank empty template and place the \[\[!getRandomAwesomeQuote\]\] snippet inside it's content field. Let's say the new resource
got the ID "300". You can hide this resource from the menu, but be sure to publish it.
Now back to the place where the \[!getRandomAwesomeQuote\] used to be and replace this call with:

``` php
[[xFPCAjax?
   &resource=`300`
]]
```

Now, when your static cache file is loaded, it will load the dynamic quote from the resource using AJAX. This means that your page loads blazing fast in the blink of an eye
your quote will also be there. I bet ya you won't even notice that it get's loaded with AJAX.

So your old template looked like this:

``` php
<div class="awesome-quote">[[!getRandomAwesomeQuote]]</div>
```

And your new template looks like this: (You have moved your dynamic snippet to a new resource with an empty template that has the ID 300)

``` php
<div class="awesome-quote">
[[xFPCAjax?
   &resource=`300`
]]
</div>
```

**Note:** When you use AJAX the actual content will not be shown on non-javascript browsers. This has impact on Google viewing your webpage. Since Google will not parse AJAX request it does not see the content that is supposed to be in the dynamic placeholder. For this we introduced "showStaticContent". It will render the HTML in the source-code like normal, and in a JS enabled browser the content will be overwritten with the dynamic content. This way Google can still index your dynamic placeholders with the most information possible.

## Using per-resource cache lifetime

If you want some resources to have a shorter cache lifetime you can do this very easily:

Create a TV, name it something like "cacheLifetime" and note it's ID (let's say it's "10"). Assign the TV to the templates that need it.
Head over to your system settings and find the setting "xfpc.lifetimetv" and change the value to the tv ID: 10 (or the ID that you just created).

Now when editing a resource you can enter a time in seconds into the TV's value field and xFPC will respect your settings.

## External sources

Developers website: <http://www.scherpontwikkeling.nl/portfolio/modx-addons/xfpc.html>
