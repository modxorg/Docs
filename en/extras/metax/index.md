---
title: "MetaX"
_old_id: "672"
_old_uri: "revo/metax"
---

# What is MetaX?

 MetaX is a simple meta tag generation [snippet](developing-in-modx/basic-development/snippets) to automate and simplify meta tag creation. In addition to meta tags it can also be used to generate several other commonly used head tags such as the base tag, canonical, css, rss and more.

 Requirements

- MODx Revolution 2.0.0 or later
- PHP5 or later

## History

 MetaX was created in 2010 for both MODX Evolution and later MODX Revolution using the same codebase. Since then, the codebase for MetaX has been split to take better advantage of new features in MODX Revolution. All versions of MetaX have been released by it's creator, Sal Sodano ( <http://salscode.com>), with other contributors along the way.

### Development

 MetaX is actively developed for MODX Revolution by it's creator. You can find the code on GitHub ( <https://github.com/skytoaster/MetaX>).

## Download

### MODX Revolution

 The Revolution version can be downloaded from within the MODX Revolution manager via [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), or from the MODX Extras Repository, here: <http://modx.com/extras/package/metax>

### Usage

 The release of MetaX 2.0 introduced the use of chunks for output control with chunks provided for HTML4, HTML5 and XHTML4. It can also be used with custom chunks using the `&tpl` property. The chunks support standard MODX placeholders in addition to several MetaX specific ones.

 MetaX can be called as follows with the XHTML4 template used by default:

 ``` php
[[!MetaX]]
```

#### Properties

 | Name | Description                                                                              | Default      |
 | ---- | ---------------------------------------------------------------------------------------- | ------------ |
 | tpl  | The name of the chunk to use for the output. This property overrides the &html property. | metax-xhtml4 |
 | html | Selects from the default chunks. Options:                                                |

- 0 - XHTML4
- 1 - HTML4
- 2 - HTML5 | 0 |
| favicon | Path to favicon (checks to make sure the file exists). | favicon.ico |
| mobile | Path to mobile thumbnail (checks to make sure the file exists). | mobile.png |
| copyfrom | Year the copyright started/starts (i.e. 2003) | None |
| copytill | Year the copyright ended/ends. | Current Year |
| rss | Comma separated list of Document IDs that have RSS feed(s). | None |
| css | Comma separated list of CSS file URLs and also does IE conditional statements if needed . | None |

#### Chunk Placeholders

 | Name            | Description                                                                           |
 | --------------- | ------------------------------------------------------------------------------------- |
 | metax.robots    | Outputs the appropriate robots command.                                               |
 | metax.canonical | Outputs the canonical url for the page.                                               |
 | metax.cache     | Outputs the appropriate cache command.                                                |
 | metax.createdby | Outputs the full name of the resource's creator.                                      |
 | metax.editedby  | Outputs the full name of the resource's last editor.                                  |
 | metax.copyyears | Outputs the copyright years dynamically based on the current year.                    |
 | metax.favicon   | Outputs the path to your favicon, after checking if the file exists.                  |
 | metax.mobile    | Outputs the path to your mobile icon, after checking if the file exists.              |
 | metax.css       | Outputs the HTML needed for your CSS file(s), after checking if each one exists.      |
 | metax.rss       | Outputs the HTML needed for your RSS feed(s), after checking if each resource exists. |

### The &css Property

 The `&css` property also supports the use of Internet Explorer conditional statements using the following logic.

 For example:

 ``` php
[[!MetaX? &css=`file1.css,file2.css:lte IE 7,file3.css:lt IE 7`]]
```

 In the above example:

- file1 will be first and will have no IE conditional statements.
- file2 will be next and will have lte IE 7.
- file3 will be last and will have lt IE 7.
- This will output the following (note the actual output of the snippet is longer, this is only the part that the &css property controls):

``` html
  <link rel="stylesheet" href="file1.css" type="text/css" />
  <!--[if lte IE 7]>
  <link rel="stylesheet" href="file2.css" type="text/css" />
  <![endif]-->
  <!--[if lt IE 7]>
  <link rel="stylesheet" href="file3.css" type="text/css" />
  <![endif]-->
  ```