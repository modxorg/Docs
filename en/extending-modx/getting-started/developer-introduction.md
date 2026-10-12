---
title: "Developer Introduction"
_old_id: "96"
_old_uri: "2.x/developing-in-modx/overview-of-modx-development/developer-introduction"
description: "Introduction to the MODX MVC2 architecture: models, views, controllers and connectors"
---

## What is MODX?

MODX Revolution is a content application platform: a CMS whose parts you extend with your own Snippets, Plugins, TVs and Manager pages.

## What is MVC?

MVC — Model-View-Controller — splits an application three ways: the Model holds the data, the Controller talks to the Model, the View shows the result. You can change the View without touching the Model.

### What is MVC²?

MODX extends this to MVC²: Model-View-Controller/Connector. The extra way to reach the Model from the View is the Connector — an AJAX entry point that calls a Processor.

### Connector/Processor Relationships

A Connector is a gateway to Processors. It exists so nothing can call a Processor directly: the Connector decides who is allowed to run which Processor.

## What is xPDO?

[xPDO](extending-modx/xpdo "xPDO") — open eXtensions to PDO — is the database layer of MODX (PHP 8.1+ required, see MODX 3 `composer.json`). It implements the Active Record pattern on top of PDO and lets you keep domain logic separate from database logic, or mix the two, as the task requires.

## What is an ORM?

An ORM maps tables to classes: a table becomes a class, a row becomes an object, and the schema states the mapping. You work with objects; the library writes the SQL. See the [object-relational model](http://www.wikipedia.org/wiki/Object-relational_model) article for the general idea.

## A Brief Overview of Revolution

MODX Revolution is a content management framework: not a general PHP application framework, and more than a fixed CMS. You build content applications out of its elements and its API. Internally it follows the MVC² layout described above.

### The Model

The _M_ is the Model: the core classes, prefixed `mod` in Revolution, that manipulate data records and hold the domain logic. This layer also includes **Processors** — scripts for form processing, REST and AJAX requests, roughly one per CRUD operation. Processors are never called directly; they run through a Connector.

### The View

The _V_ is the View: what the user sees. On the frontend the View is Templates, Chunks and Resources.

#### [Templates](building-sites/elements/templates "Templates")

A Template is the page skeleton a Resource is rendered through — usually the head, header and footer markup in one place.

#### [Chunks](building-sites/elements/chunks "Chunks")

A Chunk is a reusable fragment of HTML you insert in any Template, Chunk or Resource.

#### Resources

A Resource is one item in the site tree — a page, a file, a weblink or a symlink. The client requests it, and MODX renders it through a [Template](building-sites/elements/templates "Templates").

#### In the Manager

Manager views live in `manager/templates/` as Smarty files.

### The Controller

The Controller (_C_) differs by side: in the Manager it is PHP classes (see [Controllers and Menus](extending-modx/menus/actions)); on the frontend, `modRequest` routes the request and Snippets and Plugins do the page-level work.

#### [Snippets](extending-modx/snippets "Snippets")

A Snippet is PHP you write in a Template, Chunk or Resource; MODX runs it on every request and inserts its return value into the page.

#### [Plugins](extending-modx/plugins "Plugins")

A Plugin is PHP bound to system events: before the page is parsed, after it is rendered, before the request is routed, and so on. Use one for logic that spans the whole request — word censoring, link creation, cache handling, context redirection.

### The 2nd C: The Connectors

A Connector is an entry point to Processors. The Manager uses them for every AJAX call that reads or writes data. Since 2.3 there are no per-element connector files: one front controller routes the `action` string to a processor class.

A request to `connectors/index.php` with `action=resource/get` and an `id` returns that Resource as JSON — provided the client has access. Every Connector request is checked against the Access Policy of the request's Context; without access, the Connector refuses to return data.

## See Also

1. [Getting Started Developing](extending-modx/getting-started)
2. [xPDO](extending-modx/xpdo), the database layer for Revolution
3. [Explanation of Directory Structure](getting-started/directory-structure "Explanation of Directory Structure")
4. [Glossary of Revolution Terms](getting-started/glossary "Glossary of Revolution Terms")
