---
title: "sLink"
_old_id: "716"
_old_uri: "revo/slink"
---

<div>- [What is sLink?](#sLink-WhatissLink%3F)
  - [Requirements](#sLink-Requirements)
  - [History](#sLink-History)
  - [Download & Installation](#sLink-Download%26Installation)
- [Using sLink](#sLink-UsingsLink)
  - [Examples](#sLink-Examples)
- [Development](#sLink-Development)
- [External sources](#sLink-Externalsources)

</div>What is sLink?
==============

sLink (pronounced: es-link) is a simple snippet for MODx Revolution which can help create the xhtml markup for links or anchors from paramaters. sLink was first released on October 21st, 2010 and was created by Mark Hamstra.

Requirements
------------

sLink was created as a Revolution snippet, and should function on all versions since 2.0.0. If you notice inconsistencies in certain versions, please inform the developer on the forum topic.

History
-------

<table><tbody><tr><th>Version   
</th><th>Release date   
</th><th>Author   
</th><th>Changes   
</th></tr><tr><td>1.0.0-RC   
</td><td>October 21st, 2010   
</td><td>Mark Hamstra   
</td><td>Initial release.   
</td></tr><tr><td>**1.0.0-RC2**  
</td><td>October 21st, 2010   
</td><td>Mark Hamstra   
</td><td>Fixes resource->get() error when using regular links instead of a resource   
</td></tr></tbody></table>Download & Installation
-----------------------

To get started using the sLink snippet, simply go to System -> Package Manager -> Add new extra -> provider: modxcms.com -> MODx add-ons -> Content and find sLink. Download the package, and install it in the main package manager workspace.

Alternatively, you can download the transport package from the [repository](http://modxcms.com/extras/package/741), upload it to your server in the core/packages folder and install through the workspace.

Using sLink
===========

sLink is an easy to use snippet which can be used in a few different ways using the parameters.

<table><tbody><tr><th>?Parameter   
</th><th>Description   
</th><th>Possible values   
</th><th>Default value   
</th></tr><tr><td>&to   
</td><td>Required. This parameter describes where the link points to, either a resource id or regular url.   
</td><td>(int) doc id | (string) url/anchor   
</td><td> </td></tr><tr><td>&title   
</td><td>Optional.   
1. Determines the resource field for the title attribute (title=" ") of the link when &to is a resource id.
2. String to use as title attribute when not using a resource id in the &to parameter, or the &to parameter does not validate as resource field.

</td><td>1. (string) pagetitle | menutitle | longtitle | introtext | description
2. (string) string to use as title attribute

</td><td>longtitle   
</td></tr><tr><td>&link   
</td><td>Optional. Same as &title except this parameter describes the link text.   
</td><td>1. (string) pagetitle | menutitle | longtitle | introtext | description
2. (string) string to use as title attribute

</td><td>menutitle   
</td></tr><tr><td>&name   
</td><td>Optional. Can be used to create an in-page anchor.   
</td><td>(string) the anchor   
</td><td>(none)   
</td></tr><tr><td>&class   
</td><td>Optional. Can be used to add a css class to the link.   
</td><td>(string) the css class(es)   
</td><td>(none)   
</td></tr><tr><td>&debug   
</td><td>Optional. Used to debug your snippet call if needed. Debug levels:   
0: off (if there's an error, nothing will be shown on the page)   
1: on, will only show the amount of errors encountered   
2: advanced, shows the errors as well as the parameter values that were calculated. If no errors are found, this outputs nothing.   
</td><td>(int) 0, 1 or 2   
</td><td>1   
</td></tr></tbody></table>Examples
--------

Minimum call which gets the menutitle of resource 5 for the link text, and the longtitle for the title (hover) text.

```
<pre class="brush: php">
 [[sLink? &to=`5`]]

```Minimum call for external links, with link and title text set in the snippet call.

```
<pre class="brush: php">
[[sLink? &to=`http://rtfm.modx.com` &title=`Please, read that manual!` &link=`RTFM`]]

```Calling sLink to create an anchor within your page.

```
<pre class="brush: php">
[[sLink? &to=`#myAnchor` &name=`myAnchor` &link=`This is an anchor` &title=`Clicking me focuses your screen`]]

```Development
===========

sLink is not actively being developed at this point. Others are encouraged to "borrow" the code in their own projects or pick up development for this addon.

External sources
================

Forum topic for sLink 1.0-rc1: <http://modxcms.com/forums/index.php/topic,56101.0.html>

Repository page: <http://modxcms.com/extras/package/741>