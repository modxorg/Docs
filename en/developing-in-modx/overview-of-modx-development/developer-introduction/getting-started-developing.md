---
title: "Getting Started Developing"
_old_id: "153"
_old_uri: "2.x/developing-in-modx/overview-of-modx-development/developer-introduction/getting-started-developing"
---

- [Programming in MODX Revolution](#programming-in-modx-revolution)
- [3rd-Party Components (3PCs)](#3rd-party-components-3pcs)
- [core/components and assets/components](#corecomponents-and-assetscomponents)
- [Snippets](#snippets)
- [Plugins](#plugins)
- [Properties and Property Sets](#properties-and-property-sets)
- [Custom Manager Pages (CMPs)](#custom-manager-pages-cmps)
- [Using MODX Externally](#using-modx-externally)



## Programming in MODX Revolution

 MODX Revolution is an OOP Framework, built around the database ORM [xPDO](/display/xPDO20/Home "Home").

## 3rd-Party Components (3PCs)

 3rd-Party Components (3PCs) are collections of any sort of MODX Objects. They can be a collection of Snippets, Plugins and Chunks, or a single Snippet, or just a collection of files. They are usually transported and installed via [Transport Packages](developing-in-modx/advanced-development/package-management/transport-packages "Transport Packages").

## core/components and assets/components

 MODX doesn't necessarily limit where you can put your custom 3rd party component files, but we do have some recommendations. For files that don't need to be in the webroot (config files, .php, etc), we recommend putting them in:

> core/components/myname

 So, if you had a component named 'test', you would put its non-webroot files in "core/components/test/". For files that need to be web-accessible, such as css, js and other files, we recommend:

> assets/components/myname

 Ergo, for 'test', "assets/components/test". This standardization of paths makes it easier for other developers using your components to find your files easily.

## [Snippets](developing-in-modx/basic-development/snippets "Snippets")

 Snippets are simply php scripts that can be executed on any page or other Element. They are the cornerstone of MODX Development and dynamic customization. You can read more about Snippets [here](developing-in-modx/basic-development/snippets "Snippets").

## [Plugins](developing-in-modx/basic-development/plugins "Plugins")

 [Plugins](developing-in-modx/basic-development/plugins "Plugins") are similar to snippets in that they are snippets of code that have access to the MODX API - however the big difference is that plugins are associated to specific system events. For example, in an average MODx page request, several events happen at certain points within the page parsing process and plugins can be attached to any of these events to fulfill a desired function. [Plugins](developing-in-modx/basic-development/plugins "Plugins") aren't just limited to front-end processing though, there are many events that are available in the MODX Manager.

## [Properties and Property Sets](making-sites-with-modx/customizing-content/properties-and-property-sets "Properties and Property Sets")

 Properties are simply placeholders on Elements (Snippets/Plugins/Chunks/TVs/Templates), which can be parsed by each individual Element. They allow customization and argument passing for each Element.

 Property Sets are user-defined groupings of Properties that can be used to quickly centralize custom tag syntax calls.

 More on Property Sets can be found [here](making-sites-with-modx/customizing-content/properties-and-property-sets "Properties and Property Sets").

## [Custom Manager Pages](developing-in-modx/advanced-development/custom-manager-pages "Custom Manager Pages") (CMPs)

 [Custom Manager Pages](developing-in-modx/advanced-development/custom-manager-pages "Custom Manager Pages"), or CMPs, are custom pages in the manager built by 3rd Party developers to allow backend management of Components. They use the modAction and modMenu objects to dynamically create manager pages that can be easily found and added with no hacking of the core.

## Using MODX Externally

 Using the MODx object (and all of its respective classes) is quite simple. All you need is this code:

 ``` php 
require_once '/absolute/path/to/modx/config.core.php';
require_once MODX_CORE_PATH.'model/modx/modx.class.php';
$modx = new modX();
$modx->initialize('web');
$modx->getService('error', 'error.modError');
```

 This will initialize the MODX object into the 'web' [Context](administering-your-site/contexts "Contexts"). Now, if you want to access it under a different [Context](administering-your-site/contexts "Contexts") (and thereby changing its access permissions, policies, etc), you'll just need to change 'web' to whatever [Context](administering-your-site/contexts "Contexts") you want to load.