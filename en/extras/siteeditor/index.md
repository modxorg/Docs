---
title: "SiteEditor"
_old_id: "712"
_old_uri: "revo/siteeditor"
---

## What is SiteEditor?

SiteEditor is a package that allows you (or your clients) to edit your MODX© website from the front-end, bypassing the manager completely.

We are currently in alpha phase, meaning no access rights are integrated and you can only edit text / richttext fields from resources and TV's.

SiteEditor is created and maintained by [SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl).

## Requirements

SiteEditor requires MODX® Revolution 2.1.x or later.

## History

| Version      | Release date        | Author                                                                                                                                      | Changes          |
| ------------ | ------------------- | ------------------------------------------------------------------------------------------------------------------------------------------- | ---------------- |
| 0.0.1-alpha1 | February 25th, 2013 | [Patrick Nijkamp](http://www.scherpontwikkeling.nl/over-ons/patrick-nijkamp.html) ([SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl)) | Initial release. |

## Download & Installation

Install the package through the MODX® package manager.

## Setting up SiteEditor

Before you can use the SiteEditor in the front-end you need to edit any template/chunk and add the SiteEditor to the fields you want to edit.

**Currently you need to be logged into the manager before you can edit your website in the front-end. So log in to the manager, then go back to your website to see the SiteEditor fields.**

If you have a `[[*introtext]]` tag that you want edit with SiteEditor, make it look like this:

``` php
[[*introtext:siteEditorField]]
```

And you are done with that field. You can apply the same technique to TV's and other fields. Site editor will save the field content with the **CURRENT RESOURCE**. What if you want to be able to edit other resource fields from the current resource (for example: you want to be able to edit menu items, but you are in resource ID 3 while the menu items all have their own resource ID's). Just open the chunk that shows your menu item's:
Instead of `[[*pagetitle]]` we now have `[[+pagetitle]]`. When the tag shows a + you need to supply SiteEditor with the ID this placeholder belongs to. So replace `[[[+pagetitle]]`\] with:

``` php
[[+pagetitle:siteEditorField=`resource=[[+id]]`]]
```

In case of wayfinder, the placeholder actually has a different name, you can solve that by using the following code in your wayfinder row:

``` php
[[+wf.linktext:siteEditorField=`resource=[[+wf.docid]]&field=pagetitle`]]
```

This tells SiteEditor the field is the pagetitle of resource `[[+wf.docid]]`. Now you can edit your menu titles from the front-end, how cool is that? :)

You can add these anywhere on your site, as long as you supply SiteEditor with the resource ID and in case of a different placeholder name a field name. Add this to any getResources row TPL:

``` php
[[+pagetitle:siteEditorField=`resource=[[+id]]`]]
[[+introtext:siteEditorField=`resource=[[+id]]`]]
```

And you are set :) You can edit the pagetitle and introtext...**just hover over the fields in the front-end and it will show you an edit pencil, click it...edit it and then click in any whitespace to save it.**

## Examples

This is just an example template with SiteEditor fields:

``` php
<html>
        <head>
        </head>
        <body>
                <h1>[[*pagetitle:siteEditorField]]</h1>
                <p>
                        [[*introtext:siteEditorField]]
                </p>
                [[*content:siteEditorField]]
                <hr />
                [[*footerTv:siteEditorField]]
        </body>
</html>
```

This is an example of a getResources rowTpl chunk:

``` php
<li>
        <a href="[[~[[+id]]]]">[[+pagetitle:siteEditorField=`resource=[[+id]]`]]</a>
</li>
```

## External sources

Developers website: <http://www.scherpontwikkeling.nl>
