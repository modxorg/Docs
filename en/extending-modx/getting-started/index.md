---
title: "Getting Started Developing"
_old_id: "153"
_old_uri: "2.x/developing-in-modx/overview-of-modx-development/developer-introduction/getting-started-developing"
description: "Core concepts of developing for MODX: elements, contexts, properties, external bootstrap"
---

## Programming in MODX Revolution

MODX Revolution is an object-oriented framework built around the database ORM [xPDO](extending-modx/xpdo "Home").

## 3rd-Party Components (3PCs)

A 3rd-Party Component (3PC) is any collection of MODX objects you ship as a unit: Snippets, Plugins and Chunks, a single Snippet, or just files. Components are usually delivered as [Transport Packages](extending-modx/transport-packages "Transport Packages").

## core/components and assets/components

Keep files that must not be web-accessible (PHP, config) under:

> core/components/myname

Keep files that must be web-accessible (CSS, JS, images) under:

> assets/components/myname

Both paths use the component name in place of `myname`. Standard locations let other developers find your files.

## [Snippets](extending-modx/snippets "Snippets")

Snippets are PHP scripts executed on a page or another Element.

## [Plugins](extending-modx/plugins "Plugins")

Plugins are PHP code attached to system events: during a page request, and in the Manager. Where a Snippet runs where you place it, a Plugin runs where its event fires.

## [Properties and Property Sets](building-sites/properties-and-property-sets "Properties and Property Sets")

Properties are named arguments on an Element (Snippet, Plugin, Chunk, TV, Template). A Property Set is a named group of Properties you assign to several Elements at once.

## [Custom Manager Pages](extending-modx/custom-manager-pages "Custom Manager Pages") (CMPs)

A Custom Manager Page is a page in the Manager that you build for your Extra, without modifying the core.

## Using MODX Externally

To load MODX from your own script:

``` php
require_once '/absolute/path/to/modx/config.core.php';
require_once MODX_CORE_PATH.'model/modx/modx.class.php';
$modx = new modX();
$modx->initialize('web');
$modx->getService('error', 'error.modError');
```

The script loads MODX in the `web` [Context](building-sites/contexts "Contexts"); its access policies apply to everything you do next. To work in another Context, pass its name to `initialize()` instead.

In 3.x the canonical class names are namespaced (`MODX\Revolution\modX`, `MODX\Revolution\modChunk`, …). The old global names (`modX`, `error.modError`, …) still work through deprecated class aliases, on by default — new code should use the namespaced names.
