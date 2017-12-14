---
title: "MinifyX"
_old_id: "676"
_old_uri: "revo/minifyx"
---

<div>- [What is MinifyX?](#MinifyX-WhatisMinifyX%3F)
  - [Requirements](#MinifyX-Requirements)
  - [History](#MinifyX-History)
  - [Download & Installation](#MinifyX-Download%26Installation)
- [What you need to know](#MinifyX-Whatyouneedtoknow)
- [Using MinifyX in the front-end](#MinifyX-UsingMinifyXinthefrontend)
  - [Placing the snippet](#MinifyX-Placingthesnippet)
  - [Configuration parameters](#MinifyX-Configurationparameters)
  - [Examples](#MinifyX-Examples)
- [External sources](#MinifyX-Externalsources)

</div>What is MinifyX?
================

MinifyX is a snippet that allows you to combine JS and CSS files to reduce server load and optimize loading speed.

MinifyX is created and maintained by [SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl).

Requirements
------------

MinifyX requires MODX® Revolution 2.2.0 or later.

History
-------

<table><tbody><tr><th>Version</th><th>Release date</th><th>Author</th><th>Changes</th></tr><tr><td>1.0.0-PL1</td><td>March 26th, 2012</td><td>[Patrick Nijkamp](http://www.scherpontwikkeling.nl/over-ons/patrick-nijkamp.html) ([SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl))</td><td>Initial release.</td></tr><tr><td>1.1.0-PL</td><td>September 09, 2012</td><td>[Vasiliy Naumkin](http://bezumkin.ru)</td><td>Improved minifiers and code refactor</td></tr></tbody></table>Download & Installation
-----------------------

Install the package through the MODX® package manager.

What you need to know
=====================

MinifyX combines your files to 1 cache file and loads it from there. If you combine CSS files you should use absolute paths when using images or other URL related calls, the same goes for javascript. Some frameworks use bootloaders (like EXT) that need to be in their respective directories before they work. Be sure not to fall for this trap, could save you some time ;)

Using MinifyX in the front-end
==============================

Placing the snippet
-------------------

Place the main \[\[[MinifyX](/extras/revo/minifyx "MinifyX")\]\] snippet call on your webpage. If you have placed the snippet it assigns the following placeholders to your page:

<table><tbody><tr><th>Placeholder name</th><th>Content</th></tr><tr><td>\[\[+MinifyX.css\]\]</td><td>The tag containing the source to the CSS cache file (should be placed in the head, most of the time before the javascript includes)</td></tr><tr><td>\[\[+MinifyX.javascript\]\]</td><td>The tag containing the source to the javascript cache file (should be placed in the head)</td></tr></tbody></table>Configuration parameters
------------------------

You can configure the snippet "MinifyX" with the following parameters:

<table><tbody><tr><th>Parameter</th><th>Description</th><th>Values</th><th>Default Value</th><th>Required</th></tr><tr><td>jsSources</td><td>Comma separated list to your JS files from the site base URL   
</td><td>Comma separated string</td><td>(empty)</td><td>no</td></tr><tr><td>cssSources</td><td>Comma separated list to your CSS files from the site base URL   
</td><td>Comma separated string</td><td>(empty)   
</td><td>no   
</td></tr><tr><td>minifyCss</td><td>Whether to minify the CSS or not   
</td><td>0 = no, 1 = yes   
</td><td>0</td><td>no   
</td></tr><tr><td>minifyJs</td><td>Whether to minify the JS or not   
(only block comments allowed! **experimental**)</td><td>0 = no, 1 = yes   
</td><td>0</td><td>no   
</td></tr><tr><td>cacheFolder   
</td><td>The folder to the cache files from the site base URL   
</td><td>A string</td><td>assets/components/minifyx/cache/</td><td>no   
</td></tr><tr><td>jsFilename   
</td><td>Base name of destination js file, without extension   
</td><td>A string</td><td>scripts</td><td> </td></tr><tr><td>cssFilename</td><td>Base name of destination css file, without extension   
</td><td>A string</td><td>styles</td><td> </td></tr></tbody></table>Examples
--------

Below you see the main snippet call and the placement of the placeholders. Every parameter is optional, we have just used some possibilities of customization.

```
<pre class="brush: php">
<html>
<head>
[[MinifyX?
  &jsSources=`
     /assets/myframework.js,
     /assets/lightbox.js,
     /assets/script.js
`
  &cssSources=`
     /assets/style1.css,
     /assets/style2.css
`
]]

[[+MinifyX.javascript]]
[[+MinifyX.css]]
</head>
<body></body>
</html>

```External sources
================

Developers website: <http://www.scherpontwikkeling.nl/portfolio/modx-addons/minifyx.html>

GitHub repository: <http://www.github.com/b03tz/MinifyX/> and <https://github.com/bezumkin/MinifyX>

Report bugs and request features: <http://www.github.com/b03tz/MinifyX/issues>

</body></html>