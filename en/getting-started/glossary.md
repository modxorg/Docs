---
title: "Glossary of Revolution Terms"
sortorder: 5
_old_id: "157"
_old_uri: "2.x/getting-started/an-overview-of-MODX/glossary-of-revolution-terms"
description: "Definitions of common MODX Revolution terms, with links to the related docs"
---

## ACL

An ACL, or Access Control List, is a set of [Permissions](building-sites/client-proofing/security/policies/permissions) attached to an object. More background is on [Wikipedia](https://en.wikipedia.org/wiki/Access_control_list). [See more](building-sites/client-proofing/security/policies/acls)

## Add-on

A MODX Third-party Component (3PC) that does not modify the Core or extend its classes, but still adds functionality to the site.

## Asset

Any file under the assets path defined by `MODX_ASSETS_PATH` (usually `/assets`): libraries, images, CSS, JavaScript, class files, Extra packages, and similar.

## Authentication

How MODX confirms a [User](getting-started/glossary#user) identity for Manager or front-end login. Core auth can be extended with custom authentication classes. [See more](building-sites/client-proofing/security/users)

## Back-end

A synonym for the MODX [Manager](getting-started/glossary#manager).

## Cache, caching

Stored copies of data MODX reuses so it can skip repeated database work. Revolution caches at several levels. [See more](extending-modx/caching)

## Category

An optional label you attach to an [Element](getting-started/glossary#element), [Property Set](getting-started/glossary#property-set), or related objects so you can group them in the Manager.

## Child Resource

A [Resource](getting-started/glossary#resource) that sits under a [Parent Resource](getting-started/glossary#parent-resource) (often a [Container](getting-started/glossary#container)) in the [Resource Tree](getting-started/glossary#resource-tree).

## Chunk

Reusable HTML (or other markup) stored as an [Element](getting-started/glossary#element). You insert a Chunk with a [Chunk Tag](getting-started/glossary#chunk-tags). [See more](building-sites/elements/chunks)

## Chunk Tags

Tags in the form `[[$ChunkName]]` that insert a [Chunk](getting-started/glossary#chunk).

## Component

Also called a Third-party Component or 3PC. Extra code that extends MODX, often as an [Add-on](getting-started/glossary#add-on), [Extension](getting-started/glossary#extension), or template package.

## Connector

Entry point for AJAX requests in MODX. A Connector loads the MODX class, sanitizes request data, then hands the request to a [Processor](getting-started/glossary#processor). [See more](getting-started/directory-structure#connectors)

## Container

A [Resource](getting-started/glossary#resource) marked so it can hold [Child Resources](getting-started/glossary#child-resource) in the [Resource Tree](getting-started/glossary#resource-tree). Containers are [Parent Resources](getting-started/glossary#parent-resource) when they have children.

## Content Type

Sets the file extension, MIME type, and binary flag for a [Resource](getting-started/glossary#resource). [See more](building-sites/resources/content-types)

## Context

A boundary for [Resources](getting-started/glossary#resource) and settings. Sites use Contexts for subdomains, languages, and similar splits.

## Context Setting

A setting scoped to one [Context](getting-started/glossary#context). It can create a new key or override a [System Setting](getting-started/glossary#system-setting).

## Controller

Manager PHP class that builds a Manager page (loads assets, sets placeholders, returns the view). Custom Manager Pages use Controllers. [See more](extending-modx/custom-manager-pages)

## Cookie

HTTP cookie data the browser stores for the site. MODX uses cookies with the [Session](getting-started/glossary#session) for login and request state.

## Core Workspace

Named record of a MODX Core installation path in the database. The setup process creates the default workspace for the Core you install. Multi-workspace switching from the Manager is not a shipped day-to-day workflow in current Revolution releases.

## Database

The SQL database (MySQL/MariaDB) that stores MODX objects: Resources, Elements, Users, settings, and more. Revolution talks to it through xPDO.

## Document

A [Resource](getting-started/glossary#resource) type for a normal website page.

## Document Identifier

See [Resource Identifier](getting-started/glossary#resource-identifier).

## Element

Also called a Content Element: a [Template](getting-started/glossary#template), [Template Variable](getting-started/glossary#template-variables-or-tvs), [Chunk](getting-started/glossary#chunk), [Snippet](getting-started/glossary#snippet), [Plugin](getting-started/glossary#plugin), [Category](getting-started/glossary#category), or [Property Set](getting-started/glossary#property-set) in the Manager Elements tree.

## Error log

The Manager/system log where MODX writes PHP and application errors. You open it from Reports → Error Log. Path and filename follow the `error_log_filepath` and `error_log_filename` [System Settings](getting-started/glossary#system-setting).

## Extension

Also called a Core Extension. A Third-party Component that changes Core behavior, such as a custom User or authentication class, a cache provider, or Context-related classes.

## File Manager

See [Media Browser](getting-started/glossary#media-browser).

## File Resolver

An xPDOVehicle [Resolver](getting-started/glossary#resolver-from-transport-package) that copies files from a Transport Package source path to a target path on the site.

## File System

Local disk storage for site files. The default [Media Source](getting-started/glossary#media-source) type reads and writes the File System. [See more](building-sites/media-sources/types/media-source-type-file-system)

## Form Customization

Manager feature where you define [Rules](building-sites/client-proofing/form-customization/rules) that change how Manager forms look and behave. [See more](building-sites/client-proofing/form-customization)

## Form Customization Set

Also called an FC Set. A group of Form Customization [Rules](building-sites/client-proofing/form-customization/rules) for one Manager page (action). [See more](building-sites/client-proofing/form-customization/sets)

## Friendly URLs, Friendly aliases

SEO-friendly URLs (often shortened to FURLs in MODX). With Friendly URLs enabled, MODX builds readable paths from Resource aliases instead of raw request IDs. [See more](getting-started/friendly-urls)

## FURLs

See [Friendly URLs, Friendly aliases](getting-started/glossary#friendly-urls-friendly-aliases).

## Hooks

In FormIt and similar Extras, a Hook is PHP that runs after (or, as a Prehook, before) form handling: email, redirect, spam checks, custom logic. [See more](extras/formit/formit.hooks)

## Installer

See [Package Management](getting-started/glossary#package-management).

## Language Tags

Tags in the form `[[%LanguageStringKey]]` that pull strings from the [Lexicon](getting-started/glossary#lexicon).

## Lexicon

Dictionary of strings keyed by culture (more specific than a bare language code, for example `en`) used to localize the Manager and Extras. Lexicon entries replace older flat language files and you can edit many of them in the Manager.

## Lexicon Management

Manager tools for browsing and editing [Lexicon](getting-started/glossary#lexicon) entries by namespace and [Lexicon Topic](getting-started/glossary#lexicon-topic-formerly-foci). Related developer docs live under [Internationalization](building-sites/i18n).

## Lexicon Topic (formerly Foci)

A group of Lexicon entries for one subject. Revolution loads topics on demand to keep Manager pages lighter.

## Link Tags

Tags in the form `[[~ResourceId]]` that output the URL of a [Resource](getting-started/glossary#resource).

## Manager

The back-end administration UI for MODX (also called the [Back-end](getting-started/glossary#back-end)).

## Media Browser

Also called the MODX Browser or File Manager. Manager UI for browsing and picking files through a [Media Source](getting-started/glossary#media-source) (upload, folders, insert into Resources and TVs).

## Media Source

Defines where media lives: local [File System](getting-started/glossary#file-system), Amazon S3, or other drivers. Core ships File System and S3. More drivers come from [Package Management](getting-started/glossary#package-management) or custom code. [See more](building-sites/media-sources)

## Menu

Manager navigation items (main menu, user menu, and similar). Packages and Core register menu entries that Controllers open.

## MIME type

Internet Media Type for a file or response (for example `text/html`). A [Content Type](getting-started/glossary#content-type) stores the MIME type for Resources of that type.

## MODX Browser

See [Media Browser](getting-started/glossary#media-browser).

## Namespace

Label Components use to group Lexicon entries, settings, and related objects. A Namespace also points at the absolute path where the Component lives.

## Object

In xPDO terms, a PHP object mapped to a database row (for example a Resource or User record). See also [Primary key](getting-started/glossary#primary-key).

## Package Management

Manager UI and service for installing [Transport Packages](getting-started/glossary#transport-package) (Extras) from remote providers or uploaded packages. Also called the Extras Installer. [See more](building-sites/extras)

## Parent Resource

A [Resource](getting-started/glossary#resource) that has [Child Resources](getting-started/glossary#child-resource) under it in the [Resource Tree](getting-started/glossary#resource-tree). When the parent is marked as a container, it is also a [Container](getting-started/glossary#container).

## Placeholder Tags

Tags in the form `[[+PlaceholderName]]` for values set in PHP, usually with `$modx->setPlaceholder('placeholderName', 'value')` in a [Snippet](getting-started/glossary#snippet) or [Plugin](getting-started/glossary#plugin).

## Plugin

PHP [Element](getting-started/glossary#element) that runs on [System Events](getting-started/glossary#system-event) (save a Chunk, clear the cache, and so on), unlike a [Snippet](getting-started/glossary#snippet) that you call from content. [See more](extending-modx/plugins)

## Prehooks

Hooks that run before the main FormIt (or similar) processing. See [Hooks](getting-started/glossary#hooks).

## Primary key

Database column (or columns) that uniquely identify a row. For Resources the primary key is the Resource ID shown in the [Resource Tree](getting-started/glossary#resource-tree).

## Processor

PHP script that performs one Manager or Connector action (create, update, get list, and so on). Connectors route AJAX calls to Processors. [See more](extending-modx/processors)

## Property

One named parameter on an [Element](getting-started/glossary#element) (default value for a Snippet property, Chunk property, and similar).

## Property Set

A named collection of [Properties](getting-started/glossary#property) you attach to an Element so callers can override defaults for a specific use.

## Renderer

Code that changes how a value appears in a Manager grid or similar UI. Collections and other Extras define custom renderers. [See more](extras/collections)

## Request alias parameter

System Setting `request_param_alias`: query parameter name MODX uses for the Resource alias when Friendly URLs are off or as a fallback. Default is `q`. [See more](building-sites/settings/request_param_alias)

## Request ID parameter

System Setting `request_param_id`: query parameter name for the Resource ID. Default is `id`. [See more](building-sites/settings/request_param_id)

## Resolver (from Transport Package)

Script or built-in action that runs after a [Transport Vehicle](getting-started/glossary#transport-vehicles) is installed or uninstalled. Resolvers run after the vehicle object is saved.

Example PHP Resolver: attach Plugin events to a newly installed [Plugin](getting-started/glossary#plugin).

Example File Resolver: copy `assets/getResources` from the vehicle path into the site `assets` directory.

## Resource

Parsed unit of site content. Common subtypes: [Document](getting-started/glossary#document), [Weblink](getting-started/glossary#weblink), [Symlink](getting-started/glossary#symlink), [Static Resource](getting-started/glossary#static-resource). [See more](building-sites/resources)

## Resource Field

A column on the Resource (`site_content`) row such as `pagetitle`, `longtitle`, `introtext`, `alias`, or `menuindex`. Many appear on the Resource edit screen and through [Resource Tags](getting-started/glossary#resource-tags).

## Resource Identifier

Also called Document ID, Resource ID, or Document Identifier: the number in parentheses in the Manager [Resource Tree](getting-started/glossary#resource-tree) that uniquely identifies the Resource.

## Resource Tags

Tags in the form `[[*fieldOrTvName]]` for [Resource Fields](getting-started/glossary#resource-field) or [Template Variables](getting-started/glossary#template-variables-or-tvs).

## Resource Tree

Hierarchical list of [Resources](getting-started/glossary#resource) in the Manager (usually the left tree). Parent/child placement shapes site structure and URLs.

## Session

Server-side period that ties a visitor’s requests together (login state, flash data, and related values), usually backed by a [Cookie](getting-started/glossary#cookie).

## Setting Tags

Tags in the form `[[++SettingName]]` for [System Settings](getting-started/glossary#system-setting), [Context Settings](getting-started/glossary#context-setting), and [User Settings](getting-started/glossary#user-setting).

## Snippet

PHP [Element](getting-started/glossary#element) you call from Templates, Chunks, or Resources to run dynamic code. [See more](building-sites/elements/snippets)

## Snippet Tags

Tags in the form `[[SnippetName]]` that call a [Snippet](getting-started/glossary#snippet).

## Static Element

An [Element](getting-started/glossary#element) whose source lives in a file on disk instead of only in the database. [See more](building-sites/elements/static-elements)

## Static Resource

[Resource](getting-started/glossary#resource) type that points at a file on the site. MODX serves that file’s contents as the Resource content.

## Symlink

[Resource](getting-started/glossary#resource) type that points at another local Resource and shows that Resource’s content.

## System Event

Named point in Core or Extra code where [Plugins](getting-started/glossary#plugin) can run (save, remove, cache clear, and many others). [See more](extending-modx/plugins/system-events)

## System Setting

Site-wide configuration key. [Context Settings](getting-started/glossary#context-setting) and [User Settings](getting-started/glossary#user-setting) can override it.

## Template

Element that defines the outer markup for Documents of a given type. Resources select a Template. The Template holds Chunk, Snippet, and TV tags. [See more](building-sites/elements/templates)

## Template Variables (or TVs)

Custom fields on a Resource, created by the site builder and edited on the Resource screen. Output them with [Resource Tags](getting-started/glossary#resource-tags). [See more](building-sites/elements/template-variables)

## Transport Package

Zipped set of [Transport Vehicles](getting-started/glossary#transport-vehicles) you install through [Package Management](getting-started/glossary#package-management) or distribute between sites. [See more](extending-modx/transport-packages)

## Transport Vehicles

Package units inside a [Transport Package](getting-started/glossary#transport-package). Each vehicle carries objects or files and install rules. [See more](extending-modx/transport-packages#okay-what-are-these-vehicles)

## TV

See [Template Variables (or TVs)](getting-started/glossary#template-variables-or-tvs).

## URI

Path (and related identifiers) MODX associates with a Resource for routing and Friendly URLs. Related Resource fields include `uri` and `alias`.

## User

Manager or front-end account: username, credentials, profile, and group membership. [See more](building-sites/client-proofing/security/users)

## User Group

Named set of Users used with Access Policies and permissions. [See more](building-sites/client-proofing/security/user-groups)

## User Setting

Setting for one [User](getting-started/glossary#user). It can add a key or override matching Context and System Settings.

## User's Primary Group

The main [User Group](getting-started/glossary#user-group) assigned to a User. Policies and defaults often key off the primary group.

## Username

Login name of a [User](getting-started/glossary#user).

## Validator (from Transport Package)

Script or built-in check that runs before a [Transport Vehicle](getting-started/glossary#transport-vehicles) installs or uninstalls. `true` continues the action. `false` aborts it.

Validators often check writable directories, required Elements, or MySQL/PHP versions.

## Weblink

[Resource](getting-started/glossary#resource) type that points at an external URL or another Resource and redirects visitors there. The Weblink target is that destination URL or Resource. System Setting [`use_weblink_target`](building-sites/settings/use_weblink_target) controls whether link tags and `makeUrl()` print the target URL directly or the Weblink’s own MODX URL.

## xPDOVehicle

Base Transport Vehicle class. It stores xPDOObject instances (table rows) plus attributes that control install and uninstall, including Validators and Resolvers.
