---
title: "MinifyX"
_old_id: "676"
_old_uri: "revo/minifyx"
---

- [What is MinifyX?](#MinifyX-WhatisMinifyX%3F)
  - [Requirements](#MinifyX-Requirements)
  - [History](#MinifyX-History)
  - [Download & Installation](#MinifyX-Download%26Installation)
- [What you need to know](#MinifyX-Whatyouneedtoknow)
- [Using MinifyX in the front-end](#MinifyX-UsingMinifyXinthefrontend)
  - [Placing the snippet](#MinifyX-Placingthesnippet)
  - [Configuration parameters](#MinifyX-Configurationparameters)
  - [Examples](#MinifyX-Examples)
- [External sources](#MinifyX-Externalsources)



# What is MinifyX?

MinifyX is a snippet that allows you to combine JS and CSS files to reduce server load and optimize loading speed.

MinifyX is created and maintained by [SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl).

## Requirements

MinifyX requires MODX® Revolution 2.2.0 or later.

## History

| Version   | Release date       | Author                                                                                                                                      | Changes                              |
| --------- | ------------------ | ------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------ |
| 1.0.0-PL1 | March 26th, 2012   | [Patrick Nijkamp](http://www.scherpontwikkeling.nl/over-ons/patrick-nijkamp.html) ([SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl)) | Initial release.                     |
| 1.1.0-PL  | September 09, 2012 | [Vasiliy Naumkin](http://bezumkin.ru)                                                                                                       | Improved minifiers and code refactor |

## Download & Installation

Install the package through the MODX® package manager.

# What you need to know

MinifyX combines your files to 1 cache file and loads it from there. If you combine CSS files you should use absolute paths when using images or other URL related calls, the same goes for javascript. Some frameworks use bootloaders (like EXT) that need to be in their respective directories before they work. Be sure not to fall for this trap, could save you some time ;)

# Using MinifyX in the front-end

## Placing the snippet

Place the main \[\[[MinifyX](/extras/minifyx "MinifyX")\]\] snippet call on your webpage. If you have placed the snippet it assigns the following placeholders to your page:

| Placeholder name            | Content                                                                                                                             |
| --------------------------- | ----------------------------------------------------------------------------------------------------------------------------------- |
| \[\[+MinifyX.css\]\]        | The tag containing the source to the CSS cache file (should be placed in the head, most of the time before the javascript includes) |
| \[\[+MinifyX.javascript\]\] | The tag containing the source to the javascript cache file (should be placed in the head)                                           |

## Configuration parameters

You can configure the snippet "MinifyX" with the following parameters:

| Parameter                                       | Description                                                   | Values                 | Default Value                    | Required |
| ----------------------------------------------- | ------------------------------------------------------------- | ---------------------- | -------------------------------- | -------- |
| jsSources                                       | Comma separated list to your JS files from the site base URL  | Comma separated string | (empty)                          | no       |
| cssSources                                      | Comma separated list to your CSS files from the site base URL | Comma separated string | (empty)                          | no       |
| minifyCss                                       | Whether to minify the CSS or not                              | 0 = no, 1 = yes        | 0                                | no       |
| minifyJs                                        | Whether to minify the JS or not                               |
| (only block comments allowed! **experimental**) | 0 = no, 1 = yes                                               | 0                      | no                               |
| cacheFolder                                     | The folder to the cache files from the site base URL          | A string               | assets/components/minifyx/cache/ | no       |
| jsFilename                                      | Base name of destination js file, without extension           | A string               | scripts                          |          |
| cssFilename                                     | Base name of destination css file, without extension          | A string               | styles                           |          |

## Examples

Below you see the main snippet call and the placement of the placeholders. Every parameter is optional, we have just used some possibilities of customization.

``` php 
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
```

# External sources

Developers website: <http://www.scherpontwikkeling.nl/portfolio/modx-addons/minifyx.html>

GitHub repository: <http://www.github.com/b03tz/MinifyX/> and <https://github.com/bezumkin/MinifyX>

Report bugs and request features: <http://www.github.com/b03tz/MinifyX/issues>