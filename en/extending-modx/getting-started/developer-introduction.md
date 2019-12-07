---
title: "Developer Introduction"
_old_id: "96"
_old_uri: "2.x/developing-in-modx/overview-of-modx-development/developer-introduction"
---

## What is MODX?

MODX Revolution is an Content Application Platform, built for developers, designers and users who want a powerful, scalable system with flexible content management built in.

## What is MVC?

MVC is "Model-View-Controller", a common programming paradigm where the data's Model is only accessed through a Controller, which connects to a View that can easily be changed without having to change the Model.

### What is MVC²?

MVC² is a MODX terminology that is "Model-View-Controller/Connector". It basically adds a new way of accessing the model from the view - Connectors, which are AJAX-based files that "connect" to processors to provide remote CRUD interactions.

### Connector/Processor Relationships

Connectors are simply gateway files that hook into specific Processors. They are used mainly to prevent direct accessing of processors, and limit user access to those processors.

## What is xPDO?

[xPDO](extending-modx/xpdo "xPDO") is our name for open eXtensions to PDO. It's a light-weight ORB (object-relational bridge) library that works on PHP 4 and 5, and takes advantage of the newly adopted standard for database persistence in PHP 5.1+, PDO. It implements the very simple, but effective Active Record pattern for data access, as well as a flexible domain model that allows you to isolate domain logic from database-specific logic, or not, depending on your needs.

## What is an ORM?

As defined by [Wikipedia](http://www.wikipedia.org/wiki/Object-relational_model):

> An object-relational database (ORD), or object-relational database management system (ORDBMS), is a database management system (DBMS) similar to a relational database, but with an object-oriented database model: objects, classes and inheritance are directly supported in database schemas and in the query language. In addition, it supports extension of the data model with custom data-types and methods.

Basically, tables in SQL databases become classes that can contain table-specific methods, inherit from base classes, and much more.

## A Brief Overview of Revolution

Revolution at its core is a Content Management Framework. It's not a PHP Application Framework like CodeIgnitor or Symfony, nor does it purport to be one. With that said, it's much more than a typical CMS like Wordpress or others; it enables you to build Content Management Applications with ease and extensibility.

Revolution bases its internal structure on what we call a MVC² design system. It's loosely based on the MVC, or [model-view-controller](http://en.wikipedia.org/wiki/Model-view-controller) architectural pattern, in programming.

### The Model

The _M_ stands for _Model_, which is the core classes that manipulate data records. These core classes, prefixed with 'mod' in Revolution, handle all the Domain logic for MODX Revolution.

This also includes what Revolution calls "processors", which are scripts that handle Domain Logic for MODX Revolution. They are never accessed directly, and are used to handle form processing, REST requests, AJAX requests, and more. They resemble basic CRUD (Create-Read-Update-Delete) processing tasks.

### The View

Views in MODX Revolution are called 'Templates', but are used differently based on what context we're talking about.

In the front-end, they are Templates, Chunks and Resources.

#### [Templates](building-sites/elements/templates "Templates")

Templates are what they sound like. They allow you to create templates that will encapsulate more page-specific data. Think of them like headers/footers all rolled into one (and so much more!)

#### [Chunks](building-sites/elements/chunks "Chunks")

Chunks are small pieces of HTML code that can be inserted anywhere. They represent View widgets, in a sense, because of their modularity and ease of insertion.

#### Resources

Resources is the basic representation of a single "webpage" in MODX Revolution. They represent a single page or resource by which the client accesses content from the server. They can be files, weblinks, symlinks or just plain-old HTML pages wrapped by [Templates](building-sites/elements/templates "Templates").

#### In the Manager

In the manager-side of MODX Revolution, the View is handled by templates as well, although these are file-based and located in manager/templates, and currently loaded via Smarty.

### The Controller

Controllers in MODX Revolution come in two forms. In the front-end, they are Request Handlers (via the modRequest class) and Snippets and Plugins.

#### [Snippets](extending-modx/snippets "Snippets")

Snippets are simply PHP code that can be placed anywhere in a page. They can be placed in [Chunks](building-sites/elements/chunks "Chunks"), [Templates](building-sites/elements/templates "Templates"), or Resources. They simply execute PHP code whenever they are called, and return whatever output they would like to push to the page.

#### [Plugins](extending-modx/plugins "Plugins")

Plugins are also PHP code, but are targeted at specific System Events that occur throughout the request processing. They can occur before the webpage is rendered, after it is, before the request is handled, or many more places.

They allow users to write generic code that affects basic page functionality, such as word censoring, automatic link creation, separate cache handling, context redirection, and more.

### The 2nd C: The Connectors

Connectors are a new idea to MODX Revolution; they are access points for processors. The manager system in MODX Revolution uses them extensively; they provide secure locations for AJAX requests to process data on certain objects.

For example, a connector request that loads /modx/connectors/resource/index.php with a GET 'action' parameter of "get", and a GET parameter of 'id', will (assuming the request's client has access) grab the Resource with the ID specified and return it in JSON (or whatever is configured; this is JSON by default in Revolution) format.

Every Connector request is also secured down by Context permissions loaded on every request. If the user does not have access (via the Access Policy assigned to the request's context), the connector will refuse to provide data.

Connectors allow for dynamic, secure JSON requests (and eventually REST-based requests) straight from your MODX manager.

## See Also

1. [Getting Started Developing](extending-modx/getting-started)
2. [xPDO](extending-modx/xpdo), the database layer for Revolution
3. [Explanation of Directory Structure](getting-started/directory-structure "Explanation of Directory Structure")
4. [Glossary of Revolution Terms](getting-started/glossary "Glossary of Revolution Terms")
