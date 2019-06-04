---
title: "AddHeaderfiles"
_old_id: "1691"
_old_uri: "revo/addheaderfiles"
---

## What is AddHeaderfiles?

 With this tool the MODX regClient functions are used to insert Javascript and CSS styles at the appropriate positions of the current page. Since those functions don't insert the same filename twice, the snippet could be called everywhere in the template, document or in chunks to collect all needed Javascripts and CSS styles together.

 Works well with [minifyRegistered](http://modx.com/extras/package/minifyregistered).

### Requirements

- MODX Revolution 2.2.x or later
- PHP5.2 or later

### Download

 It can be downloaded from within the MODX Revolution manager via [Package Management](extending-modx/transport-packages "Package Management"), or from the MODX Extras Repository, here: <http://modx.com/extras/package/addheaderfiles>

### Support and Bug Reporting

**Forum Thread:** <http://forums.modx.com/thread/xxx/support-comments-for-addheaderfiles>
**Bugtracker**: <https://github.com/Jako/AddHeaderfiles-revo>

## Usage

 The snippet could be called in the page template, in the document content or in a template chunk.

### Snippet parameter

| Property     | Description                                                                                                                                            | Default                |
| ------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------ | ---------------------- |
| addcode      | External filenames(s) or chunkname(s) separated by &sep. The external files can have a position setting or media type separated by &sepmed. See note 1 |                        |
| sep          | Separator for files/chunknames                                                                                                                         | ;                      |
| sepmed       | Seperator for media type or script position                                                                                                            |                        |  |
| mediadefault | Media default for css files                                                                                                                            | screen, tv, projection |

## Examples

### Direct call

 ``` php
[[AddHeaderfiles?
&addcode=`/assets/js/jquery.js;
/assets/js/colorbox.js|end;/assets/css/colorbox.css;
/assets/css/test.css|print`
]]
```

 shows:

 ``` html
...
    <script type="text/javascript" src="/assets/js/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="/assets/css/colorbox.css" media="screen, tv, projection" />
    <link rel="stylesheet" type="text/css" href="/assets/css/test.css" media="print" />
</head>
    <script type="text/javascript" src="/assets/js/colorbox.js"></script>
</body>
```

 Fill a chunk (i.e. 'headerColorbox') by:

 ``` php
/assets/js/jquery.js;
/assets/js/colorbox.js|end;/assets/css/colorbox.css
```

 and call it like this:

 ``` php
[[!AddHeaderfiles?
&addcode=`headerColorbox`
]]
```

 Parts of the addcode parameterchain could point to chunks too (recursive). The parts of the chunks that are not pointing to other chunks or to files/uri should contain the complete ... or ... code.

 ``` php
[[!AddHeaderfiles?
&addcode=`headerColorbox;
/assets/css/test.css|print`
]]
```

### Notes

1. If you want to insert external files with url parameters directly in the snippet call, some chars have to be masked. `?` has to be masked as `!q!`. `=` has to be masked as `!eq!`. `&` has to be masked as `!and!`. These characters don't have to be masked in chunks.
