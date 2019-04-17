---
title: "sLink"
_old_id: "716"
_old_uri: "revo/slink"
---

## What is sLink?

sLink (pronounced: es-link) is a simple snippet for MODX Revolution which can help create the xhtml markup for links or anchors from paramaters. sLink was first released on October 21st, 2010 and was created by Mark Hamstra.

## Requirements

sLink was created as a Revolution snippet, and should function on all versions since 2.0.0. If you notice inconsistencies in certain versions, please inform the developer on the forum topic.

## History

| Version       | Release date       | Author       | Changes                                                                    |
| ------------- | ------------------ | ------------ | -------------------------------------------------------------------------- |
| 1.0.0-RC      | October 21st, 2010 | Mark Hamstra | Initial release.                                                           |
| **1.0.0-RC2** | October 21st, 2010 | Mark Hamstra | Fixes resource->get() error when using regular links instead of a resource |

## Download & Installation

To get started using the sLink snippet, simply go to System -> Package Manager -> Add new extra -> provider: modxcms.com -> MODx add-ons -> Content and find sLink. Download the package, and install it in the main package manager workspace.

Alternatively, you can download the transport package from the [repository](http://modxcms.com/extras/package/741), upload it to your server in the core/packages folder and install through the workspace.

## Using sLink

sLink is an easy to use snippet which can be used in a few different ways using the parameters.

| ?Parameter | Description                                                                                       | Possible values            | Default value       |
| ---------- | ------------------------------------------------------------------------------------------------- | -------------------------- | ------------------- |
| &to        | Required. This parameter describes where the link points to, either a resource id or regular url. | (int) doc id               | (string) url/anchor |  |
| &title     | Optional.                                                                                         | See below                  | longtitle           |
| &link      | Optional. Same as &title except this parameter describes the link text.                           | See below                  | menutitle           |
| &name      | Optional. Can be used to create an in-page anchor.                                                | (string) the anchor        | (none)              |
| &class     | Optional. Can be used to add a css class to the link.                                             | (string) the css class(es) | (none)              |
| &debug     | Optional. Used to debug your snippet call if needed. Debug levels: 0, 1 or 2. See below           |
0: off (if there's an error, nothing will be shown on the page)
1: on, will only show the amount of errors encountered
2: advanced, shows the errors as well as the parameter values that were calculated. If no errors are found, this outputs nothing. | (int) 0, 1 or 2 | 1 |

### &title and &link usage

The `&title` and `&link` can be set to different values. They determine the text to use for the `title` attribute and the link text respectively.

When `&to` is a resource, you can use resource fields, like: `pagetitle`, `menutitle`, `longtitle`, `introtext`, or `description`

You can also set it to a regular string text.

## Examples

Minimum call which gets the menutitle of resource 5 for the link text, and the longtitle for the title (hover) text.

``` php
[[sLink? &to=`5`]]
```

Minimum call for external links, with link and title text set in the snippet call.

``` php
[[sLink? &to=`https://rtfm.modx.com` &title=`Please, read that manual!` &link=`RTFM`]]
```

Calling sLink to create an anchor within your page.

``` php
[[sLink? &to=`#myAnchor` &name=`myAnchor` &link=`This is an anchor` &title=`Clicking me focuses your screen`]]
```

## Development

sLink is not actively being developed at this point. Others are encouraged to "borrow" the code in their own projects or pick up development for this addon.

## External sources

Forum topic for sLink 1.0-rc1: <http://modxcms.com/forums/index.php/topic,56101.0.html>

Repository page: <http://modxcms.com/extras/package/741>
