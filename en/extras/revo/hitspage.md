---
title: "HitsPage"
_old_id: "658"
_old_uri: "revo/hitspage"
---

What is HitsPage?
-----------------

HitsPage is a Plugin that counts the number of http requests, or "hits" on a given web page.

Requirements
------------

MODX Revolution 2.1.x or later

History
-------

HitsPage was written by Valentine Rasulov and released October 27th, 2011

### Download

It can be downloaded from within the MODx Revolution manager via [Package Management](/revolution/2.x/developing-in-modx/advanced-development/package-management "Package Management"), or from the MODx Extras Repository, here:

<http://modx.com/extras/package/hitspage>

Usage
-----

Upon installation, HitsPage creates two new [Template Variables](/revolution/2.x/making-sites-with-modx/customizing-content/template-variables "Template Variables"), "HitsPage" and "hits". At the time of this writing, the "hits" TV is redundant.

On the [Resource](/display/revolution20/Resource "Resource") that you'd like to track hits, use the placeholder:

```
<pre class="brush: php">
[[!+hitss]]

```You can put this in the Resource Content Field, or in its [Template](/revolution/2.x/making-sites-with-modx/structuring-your-site/templates "Templates"), but it MUST be present on the page you wish to track. You can hide its display using CSS, if you wish.

<div class="note">**Idiosyncratic Behaviour**  
Do NOT use the TV tag to render output on the page. It seems to break the plugin. Only use it in &tpl chunks (see below).</div>Once the placeholder is...in place, the "HitsPage" TV will be dynamically updated with the hit count, making it available to [Snippets](/revolution/2.x/developing-in-modx/basic-development/snippets "Snippets") via their Tpl [Chunks](/revolution/2.x/making-sites-with-modx/structuring-your-site/chunks "Chunks").

Examples
--------

A [getResources](/extras/revo/getresources "getResources") call using the following &tpl will return a list of pages displaying their Titles and the number of hits they've received:

```
<pre class="brush: php">
<li>[[+pagetitle]] has been viewed [[+tv.HitsPage]] times.</li>

```<div class="info">**Usage Example**  
You can easily create a "Most Popular Posts" widget by following the tutorial here: <http://www.sepiariver.ca/blog/modx-web/modx-popular-posts-plugin-hit-counter-getresources></div>