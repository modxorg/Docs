---
title: "Glossary"
sortorder: 5
_old_id: "157"
_old_uri: "2.x/getting-started/an-overview-of-MODX/glossary-of-revolution-terms"
description: "Common MODX terms used throughout the documentation"
---

## ACL

An ACL, or Access Control List, is a set of [Permissions](building-sites/client-proofing/security/policies/permissions) attached to an object. More information on ACLs can be found on [Wikipedia](https://en.wikipedia.org/wiki/Access_control_list). Also [see more](building-sites/client-proofing/security/policies/acls).

## Add-on

A third-party Component (3PC) that does not modify the Core or extend its classes, but still provides extra functionality to the MODX site. Often installed via Extras (Package Management).

## Asset

Any file resource usually located under `/assets`, as defined by `MODX_ASSETS_PATH`. Can include Extra front-end files, libraries, images, CSS, JavaScript, and similar.

## Back-end

A synonym for the MODX Manager interface.

## Cache, caching

Storing frequently requested data so repeated database work can be avoided. MODX caches configuration, resources, elements, lexicons, and more under `core/cache/`. [See more](extending-modx/caching).

## Category

An optional classifying name attached to Elements, Property Sets, and some other objects so related items can be grouped in the Manager.

## Child Resource

Resources are arranged in a tree. When a Resource is a Container (parent), the Resources inside it are its Child Resources.

## Chunk Tags

Tags in the form `[[$ChunkName]]` that insert a Chunk.

## Component

Also called a third-party Component or 3PC. Usually an Extra (Add-on), Core Extension, or Template package that adds functionality.

## Connector

HTTP entry point for AJAX requests. Connectors bootstrap MODX, sanitize the request, and hand off to a Processor. [See more](getting-started/directory-structure#connectors).

## Content Type

Sets the extension, MIME type, and binary flag for a Resource. [See more](building-sites/resources/content-types).

## Context

A grouping of Resources and settings, commonly used for multi-site, multi-language, or subdomain setups.

## Context Setting

A setting that applies to one Context. It can introduce a new key or override a System Setting for that Context.

## Core Workspace

A named record of the MODX Core used by the site. A normal install creates a single default workspace that points at the core package. Day-to-day sites rarely interact with workspaces beyond what setup and Package Management already do.

## Document

The usual Resource type for a normal website page (class `modDocument`).

## Document Identifier

See Resource Identifier.

## Element

A Template, Template Variable, Chunk, Snippet, Plugin, Category, or Property Set shown in the Manager Elements tree.

## Extension

Also called a Core Extension. A Component that replaces or extends core behaviour, such as a custom authentication class or caching mechanism.

## File Resolver

A Transport Package resolver that copies files from a package source path to a target path on install or uninstall.

## Form Customization

Rules that control how Manager forms look and behave (fields, tabs, and related UI). [See more](building-sites/client-proofing/form-customization).

## Form Customization Set

A collection of Form Customization Rules for a specific Manager page (action). [See more](building-sites/client-proofing/form-customization/sets).

## Friendly URLs, Friendly aliases

SEO-friendly URLs (often abbreviated FURLs). With Friendly URLs enabled, Resources use readable paths based on aliases instead of `index.php?id=…`. See [Using Friendly URLs](getting-started/friendly-urls).

## Language Tags

Tags in the form `[[%LanguageStringKey]]` that output Lexicon entries.

## Lexicon

A dictionary of words and phrases organized by culture (for example `en`, or more specific cultures such as `en-GB`). Used to internationalize the Manager and Extras. Entries can be edited in Lexicon Management.

## Lexicon Topic (formerly Foci)

A set of Lexicon Entries for one subject. MODX loads topics on demand to keep overhead down.

## Link Tags

Tags in the form `[[~ResourceId]]` that output the URL of a Resource.

## Manager

The back-end administration UI of MODX.

## Media Source

A configured source for media files: typically the local filesystem, or remote backends such as Amazon S3. Drivers can be installed as Extras. [See more](building-sites/media-sources).

## Namespace

An organizational key for Components. Namespaces group Lexicon Entries, Settings, and related objects, and usually define a path where the Component lives.

## Package Management

The Manager Installer (Extras → Installer) that downloads and installs Transport Packages from providers such as modx.com. [See more](building-sites/extras).

## Parent Resource

In the Resource Tree, a Container Resource that has Child Resources beneath it.

## Placeholder Tags

Tags in the form `[[+PlaceholderName]]` that output Placeholders, usually set in a Snippet or Plugin with `$modx->setPlaceholder('placeholderName', 'value')`.

## Plugin

PHP that runs on System Events (for example saving a Resource or clearing the cache), with access to the MODX API. Unlike Snippets, Plugins are not usually called from a page tag. [See more](extending-modx/plugins).

## Property

A single named parameter for an Element.

## Property Set

A named collection of Properties attached to an Element so you can pass different parameters without editing the Element itself.

## Renderer

A method used to change how data is displayed (for example in a custom grid column). See Extra documentation where renderers are defined for that package.

## Resource

Anything in the Resource Tree that the Parser can resolve to a URL and content: most often a Document, but also Weblinks, Symlinks, and Static Resources.

## Resource Field

A field on a Resource such as `pagetitle`, `longtitle`, `introtext`, `alias`, or `menuindex`. Many appear on the Resource create/edit screen and via Resource Tags (`[[*pagetitle]]`). Others are available through the Resource object in PHP.

## Resource Identifier

Also called a Document ID or Resource ID: the numeric ID shown in the Resource Tree that uniquely identifies the Resource.

## Resource Tags

Tags in the form `[[*fieldOrTvName]]` that output Resource Fields or Template Variables for the current Resource.

## Resource Tree

The hierarchical list of Resources in the Manager (usually on the left). Structure here drives site navigation and, when Friendly Alias Paths are on, URL paths.

## Resolver (from Transport Package)

A post-processor that runs after a Transport Vehicle’s object is saved during install or uninstall. Examples: attach Plugin events, or copy files into `assets/`.

## Session

The period during which MODX recognizes a visitor (or Manager user) across requests. When the session ends, the next request is treated as a new visitor unless they authenticate again.

## Setting Tags

Tags in the form `[[++SettingName]]` that output [System Settings](getting-started/glossary#system-setting), [Context Settings](getting-started/glossary#context-setting), or [User Settings](getting-started/glossary#user-setting).

## Snippet

PHP that you call from a page (or other Element) to run dynamic logic. [See more](building-sites/elements/snippets).

## Snippet Tags

Tags in the form `[[SnippetName]]` (Snippet calls).

## Static Resource

A Resource whose content is read from a file on the filesystem.

## Symlink

A Resource that reuses the content of another local Resource at a different URL.

## System Event

Events that fire during MODX operations (save, remove, cache clear, and so on). Plugins listen to these events. [See more](extending-modx/plugins/system-events).

## System Setting

A site-wide setting. Context Settings and User Settings can override it for a Context or user.

## Template Variables (or TVs)

Custom fields you attach to Templates and edit on Resources. Referenced with Resource Tags such as `[[*MyTV]]`.

## Transport Package

A zipped collection of Transport Vehicles that can be installed on a MODX site (core upgrades and Extras). [See more](extending-modx/transport-packages).

## Transport Vehicles

Containers inside a Transport Package that hold objects or files and know how to install or uninstall them. [See more](extending-modx/transport-packages#okay-what-are-these-vehicles).

## User Setting

A per-user setting that can create a new key or override the matching Context or System Setting.

## Validator (from Transport Package)

A pre-processor that runs before a Transport Vehicle is installed or uninstalled. If it returns false, that install/uninstall step is skipped. Typical uses: check PHP extensions, writable directories, or required packages.

## Weblink

A Resource that redirects to another Resource or an external URL.

## xPDOVehicle

The base Transport Vehicle class. It stores xPDO objects (rows of data) plus attributes that control install and uninstall, including Validators and Resolvers.
