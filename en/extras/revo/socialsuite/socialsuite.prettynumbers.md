---
title: "SocialSuite.prettyNumbers"
_old_id: "1010"
_old_uri: "revo/socialsuite/socialsuite.prettynumbers"
---

[SocialSuite](/extras/revo/socialsuite "SocialSuite")is a collection of useful tools for integrating various social media into your MODX website.

prettyNumbers is an [output filter](/display/revolution20/Input+and+Output+Filters "Input and Output Filters"), part of SocialSuite, which formats numbers nicely depending on the size of the number. It can also be used as a standalone snippet by passing a number into the **input** property.

Basic Usage
-----------

Assuming \[\[+count\]\] returns a number, you just add the prettyNumbers output filter to it:

```
<pre class="brush: php">
[[+count:prettyNumbers]]

```and it will be prettyfied.

When you want to parse the result of a snippet, you can also just use the output filter syntax, for example with getFacebookShares.

```
<pre class="brush: php">
[[!getFacebookShares:prettyNumbers? &url=`http://google.com/`]]

```As a standalone snippet, the syntax is slightly different in both scenarios:

```
<pre class="brush: php">
[[prettyNumbers? &input=`[[+count]]`]]
[[prettyNumbers? &input=`[[!getFacebookShares? &url=`http://google.com/`]]`]]

```Advanced Usage
--------------

You can also specify options to the output filter or snippet to change how it formats the number. These are as follows:

<table><tbody><tr><th>Option Key</th><th>Default</th><th>Description</th></tr><tr><td>case</td><td>lower</td><td>When set to "u", "ucase", "upper" or "strtoupper", this will change the suffix (k, m, b) to uppercase.</td></tr><tr><td>decimal</td><td>. (dot)</td><td>A string to use as decimal separator.</td></tr><tr><td>thousands</td><td>, (comma)</td><td>A string to use as thousands' separator.</td></tr></tbody></table>You specify these like this:

```
<pre class="brush: php">
[[+count:prettyNumbers=`case=upper&decimal=,&thousands=.`]][[prettyNumbers? &input=`[[!getFacebookShares? &url=`http://google.com/`]]` &options=`case=upper&decimal=,&thousands=.`]]

```How numbers are formatted by default
------------------------------------

```
<pre class="brush: php">
5 => 5 
515 => 515 
5141 => 5.1k 
5151 => 5.2k 
51415 => 51k 
51515 => 52k 
515151 => 515k 
5151515 => 5.2m 
51515151 => 52m 
515151515 => 515m 
5151515151 => 5.2b 
51515151515 => 52b 
515151515151 => 515b 
5151515151515 => 5,152b 
51515151515151 => 51,515b 
515151515151515 => 515,152b 

```