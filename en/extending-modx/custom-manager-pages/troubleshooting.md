---
title: "CMP Development FAQs & Troubleshooting"
_old_id: "1690"
_old_uri: "2.x/faqs-and-troubleshooting/cmp-development-faqs-and-troubleshooting"
---

This page deals with Custom Manager Pages FAQs & Troubleshooting tips.

The question numbering represents nothing but that - a number to indicate what question you're looking at to help scanning through.

This is a documentation stub, and could use your help to complete! If you don't have access to edit this page, [please post anything you would want to see added or updated in this topic on the forums](http://forums.modx.com/thread/72123/faqs-troubleshooting-on-the-rtfm).

This document will always be a work in progress as new features are added / changed, and it could use your help in keeping it structured and up to date! If you do not have access to editing this document, [please post anything you would want to see added or updated in this topic on the forums](http://forums.modx.com/thread/72123/faqs-troubleshooting-on-the-rtfm).

_To Editors:_

- _Please use the right headings (heading 2 for categories, heading 3 for questions) to make sure the table of contents et al are properly generated and make sense._
- _Big subjects can be created as a subpage to this page its parent, and if other pages already exist on these docs please link to it in the first section._
- _Please make sure the numbering is correct when you add a question to allow easier scanning of the page._
- _Make sure you link generously to further reading on the subject._

_Thanks!!_


## Table of Contents

- [Table of Contents](#table-of-contents)
- [1. General](#1-general)
  - [1.1. What are connectors and processors? And what is a controller?](#11-what-are-connectors-and-processors-and-what-is-a-controller)
  - [1.2. Why do I need all those different parts in my manager page? Can't I just echo some values in my controller and build stuff from there?](#12-why-do-i-need-all-those-different-parts-in-my-manager-page-cant-i-just-echo-some-values-in-my-controller-and-build-stuff-from-there)
  - [1.3. What version of ExtJS does MODX Revolution use? When will MODX Revolution update to ExtJS 4.0?](#13-what-version-of-extjs-does-modx-revolution-use-when-will-modx-revolution-update-to-extjs-40)
  - [1.4. Can I use ExtJS widgets that MODX uses in the Manager in my own CMP as well?](#14-can-i-use-extjs-widgets-that-modx-uses-in-the-manager-in-my-own-cmp-as-well)
- [2. ExtJS / modExt Troubleshooting](#2-extjs--modext-troubleshooting)
  - [2.1. Error: Syntax Error: Unexpected Token '<' on ext-all.js Line 7](#21-error-syntax-error-unexpected-token--on-ext-alljs-line-7)
  - [2.2. Why does my grid send out two requests when I refresh it / changePage / filter?](#22-why-does-my-grid-send-out-two-requests-when-i-refresh-it--changepage--filter)



Other Resources:

- [ExtJS 3.4.0 Documentation](http://docs.sencha.com/ext-js/3-4/)
- [Custom Manager Pages](extending-modx/custom-manager-pages "Custom Manager Pages")
- [Custom Manager Pages Tutorial](_legacy/developing-in-modx/custom-manager-pages-tutorial "Custom Manager Pages Tutorial")
- [Developing an Extra in MODX Revolution](extending-modx/tutorials/developing-an-extra "Developing an Extra in MODX Revolution") (Specifically [part 2](extending-modx/tutorials/developing-an-extra/part-2 "Developing an Extra in MODX Revolution, Part II"))

## 1. General

### 1.1. What are connectors and processors? And what is a controller?

A connector is a web-accessible php file which acts as the target point for back-end AJAX requests. It takes in a POST request, and routes that to the right processor (as indicated by the "action" post or url parameter), which is a file that does the actual work of processing the post (which has been added to the $scriptProperties variable by the connector) and returning a JSON array with the results of the request.

A controller is the file which returns the actual markup (html) and inserts javascript and css onto a back-end page.

Typical locations within a component are:

- Connector: assets/components/mycomponent/connector.php or assets/components/mycomponent/mgr/connector.php
- Processor: core/components/mycomponent/processors/mgr/processorname.php
- Controller: core/components/mycomponent/controllers/controllername.php

### 1.2. Why do I need all those different parts in my manager page? Can't I just echo some values in my controller and build stuff from there?

Sure - you can do that too if you want.

Using the different parts however is advised to make sure you can easily deploy to other installations (as they all expect files at that specific location). It also allows users to move the core folder out of the web accessible root, improving security of the system.

### 1.3. What version of ExtJS does MODX Revolution use? When will MODX Revolution update to ExtJS 4.0?

| MODX Version | ExtJS version |
| ------------ | ------------- |
| 2.1.2-pl     | 3.4.0         |
| 2.1.0-rc1    | 3.3.1         |
| 2.0.4-pl     | 3.3.0         |
| 2.0.0-rc2    | 3.2.1         |

It is unlikely that MODX will start using ExtJS 4 until 2.3/2.4 or 3.0. If you insist on using ExtJS 4.0, you can always get your hands dirty and start the migration process of the manager/assets/modext/ folder.

### 1.4. Can I use ExtJS widgets that MODX uses in the Manager in my own CMP as well?

Yes - that saves code, too.

Make sure you test your code on various releases as core code is subject to changes that could break your implementation of it.

## 2. ExtJS / modExt Troubleshooting

### 2.1. Error: Syntax Error: Unexpected Token '<' on ext-all.js Line 7

When received after initiating an AJAX request to a connector/processor, this error usually means the response that came back is not valid.

Often this is caused by a PHP Fatal Error in the processor code. Inspect the outgoing request using Firebug or Developer Tools to see what it returns and where the error in the PHP side of things is.

### 2.2. Why does my [grid](extending-modx/custom-manager-pages/modext/modx.grid.grid "MODx.grid.Grid") send out two requests when I refresh it / changePage / filter?

This was caused by a legacy bug fixed for MODX 2.2-rc1. If you are still experiencing a number of requests that are not needed, make sure you don't have listeners calling another refresh/load, changePage(0) and refresh() or in another way are explicitely calling a request twice.