---
title: "Glossary of Revolution Terms"
description: "Full list of MODX terms can be found here"
---

## Add-on

A MODX Third-party Component (3PC) that does not modify the Core or extend any of its classes, but yet still provides extra functionality to the MODX instance.

## Asset

Any type of file resource that is usually located in the /assets directory, as defined by the constant `MODX_ASSETS_PATH;` can include Third-party Components, libraries, image files, css files, JavaScript files, class files, etc.

## Back-end

A synonym for the MODX manager interface.

## Cache, caching

The process of storing frequently requested data and where it is stored.  By caching data that is being reused, a lot of database requests can be prevented, resulting in a better performance. MODX Revolution offers a number of different caching features on different levels within the application. [See more](extending-modx/caching)

## Category

An optional classifying name that can be attached to any Element or PropertySet (and other objects in later versions of Revolution) that separates it from other similar objects.

## Chunk Tags

Tags in the form `[[$ChunkName]]` that can be used in reference to Chunks.

## Component

Also called "Third-party Component", or 3PC, a Component usually provides extra functionality to MODX, usually in the form of an Add-on, Core Extension, or Template.

## Connector

Essentially entry point for AJAX requests in MODX. It doesn't do any database manipulation on its own; just simply load up the main MODX class, sanitize any request data, and then handle the request by pointing to the appropriate Processor file [See more](getting-started/directory-structure#connectors)

## Content Type

Sets the extension, mime-type and binary setting for any Resource. [See more](building-sites/resources/content-types)

## Context

A delineator of resources and settings that can be used for a variety of reasons; usually used to create multiple-context sites, such as subdomains, multi-language sites, etc.

## Context Setting

A single setting for that Context that either creates a new setting or overrides a System Setting.

## Core Workspace

Each unique MODX Core is represented by a named Workspace. When you install Revolution initially, the MODX Core used by the setup application is recorded into the MODX database as the Default MODX Workspace. In future MODX Revolution releases, there will be an ability to manage multiple Workspaces from a single database, directly from the manager application. This will make it easy to isolate upgrades to the MODX Core; by quickly adding a new Core Workspace and selecting a menu option, you'll be able to apply an entire new MODX Core installation to production sites after testing on a staging site, or quickly revert to a previous Core Workspace you know works. This will be especially important for multi-site configurations running on shared MODX Core installations.

## Document

A specific type of Resource, usually pertaining to a normal website page.

## Document Identifier

See Resource Identifier.

## Element

Also called "Content Elements", a single Template, Template Variable, Chunk, Snippet, Plugin, Category, or Property Set visible in the Manager Elements tree.

## Extension

Also called "Core Extension". A MODX Third-party Component that modifies the MODX Core, such as a custom User or authentication class, caching mechanisms, or context manipulation classes.

## File Resolver

A type of xPDOVehicle Resolver that copies files from the source location to the target location in a Transport Package.

## Form Customization

Feature that allows users to create [Rules](building-sites/client-proofing/form-customization/rules), which govern how manager pages render their forms in the MODX Revolution Manager. [See more](building-sites/client-proofing/form-customization)

## Form Customization Set

A Form Customization Set is a collection of [Rules](building-sites/client-proofing/form-customization/rules) that occur for a specific page (action) in the Manager. [See more](building-sites/client-proofing/form-customization/sets)

## Friendly URLs, Friendly aliases

Friendly URLs (FURLs) is actually short for SEO-friendly URLs. SEO, as you probably know, is an acronym for Search Engine Optimization. Since "Search-engine-Optimization-friendly-URLs" is quite a mouthful, they're usually referred to as FURLs in MODX.

## Language Tags

Tags in the form `[[%LanguageStringKey]]` that reference MODX Lexicon entries.

## Lexicon

A Lexicon is a dictionary of words and phrases organized by Culture (more specific than language, i.e. en-UK) that is used to internationalize the manager application and can be used by Add-On and Core Extension developers to provide localization facilities for their own components. This replaces the legacy MODX language files and allows customization of the entries directly from the manager application.

## Lexicon Topic (formerly Foci)

A set of Lexicon Entries focused on a particular subject. Revolution only loads Lexicon Entries as it needs them, by their Topic, to reduce load times.

## Link Tags

Tags in the form `[[~ResourceId]]` that reference the URL of a particular Resource.

## Manager

The back-end of the MODX interface.

## Media Source

With MS you can specify the "source" of media through many types - from the file system itself, to an Amazon S3 bucket, to a Flickr album. MODX provides two source types with the core installation: the file system and Amazon S3 bucket integration. Other sources can be made by creating Media Source Drivers, or by downloading them from [Package Management](building-sites/extras). [See More](building-sites/media-sources)

## Namespace

An organizational tag for Components to use to identify Lexicon Entries, Settings, and other objects related to the Component in a Revolution site. Also specifies an absolute path in which the Component may be found.

## Package Management

A web service that enables remote [installation](building-sites/extras) of Transport Packages directly from the Manager.

## Placeholder Tags

Tags in the form `[[+PlaceholderName]]` that reference MODX Placeholders, usually set with `$MODX->setPlaceholder('placeholderName','value')` in a Snippet or Plugin.

## Resource Field

Any of the fields of the `site_content` table, such as `pagetitle`, `longtitle`, `introtext`, `alias`, `menuindex`, etc. Some fields are available on the Document Create/Edit screen and via Resource Tags; Others can only be accessed via the `documentObject`.

## Plugin - 

## Property

A single variable for an Element; used to set a specific parameter for the Element.

## Property Set

A collection of variables used for a particular purpose with an Element. Property Sets are attached to Elements and pass in the Properties that they carry as parameters to the Element. An example is a custom Property Set for a Snippet that passes in specific parameters to the Element, overriding the default behavior.

## Resource

A type of container that is interpreted by the Parser to fetch content. Can have any number of derivative classes; the most common is a Document.

## Resource Identifier

Also called a Document ID, Resource ID, or Document Identifier; the number in parenthesis in the MODX Resource Tree in the Manager that uniquely identifies the Resource specified.

## Resource Tags

Tags in the form `[[*ResourceFieldTV]]`, which can be used to refer to Resource Fields, or Template Variables.

## Resolver (from Transport Package)

Post-processor: a script or predefined action that is evaluated after a [Transport Vehicle](getting-started/glossary#transport-vehicles) is installed or uninstalled. Resolvers always occur after the vehicle's object is save()'d, and can then perform actions on MODX before anything else happens in the install/uninstall process.

An example of a PHP Resolver is one that attaches Plugin Events to a newly-installed [Plugin](getting-started/glossary#plugin).

An example of a file Resolver is one that copies the `assets/getResources` directory in the `xPDOVehicle` path to `/MODX/assets/getResources`.

## Setting Tags

Tags in the form `[[++SettingName]]` that reference MODX [System Settings](getting-started/glossary#system-setting), [Context Settings]((getting-started/glossary#context-setting)), and [User Settings]((getting-started/glossary#user-setting)).

## Snippet Tags

Tags in the form `[[SnippetName]]`, also referred to as Snippet Calls.

## Static Resource

A specific type of Resource that is a direct reference to a specific file on the MODX site. The content is replaced with the contents of that file.

## Symlink

A type of Resource that references a single, local MODX Resource; the Resource's content will replace the Symlink's content.

## System Setting

A site-wide variable accessible to the MODX site. Can be overridden by Context Settings and User Settings.

## Template Variables (or TVs)

Custom Resource Fields created by the user on the Document Create/Edit Screen and referenced using Content Tags.

## Transport Package

A packaged and zipped collection of [Transport Vehicles](getting-started/glossary#transport-vehicles), that can be easily distributed ("transported") from one Core Workspace to another. [See more](extending-modx/transport-packages)

## Transport Vehicles

An intelligent container that encapsulates any artifact that can be distributed in a [Transport Package](getting-started/glossary#transport-package). Transport Vehicles store their payloads in a portable format. [See more](extending-modx/transport-packages#okay-what-are-these-vehicles)

## User Setting

A user-specific setting that either creates a new setting or overrides the similar Context Setting and System Setting. Used to provide unique settings to that user.

## Validator (from Transport Package)

Pre-processor: a script or predefined action that executes prior to the [Transport Vehicle](getting-started/glossary#transport-vehicles) being installed or uninstalled. If the validator returns true, the install/uninstall action will proceed as normal. If the validator returns false, MODX will not uninstall or install the package.

A Validator could be used to determine if a directory exists and is writable, to see if other MODX elements are already installed, or to determine if a certain version of MySQL and PHP are used on a server.

## Weblink

A type of Resource that references a specific URL or MODX Resource, redirecting the visitor to that URL or Resource.

## xPDOVehicle

The base Transport Vehicle class, xPDOVehicle, stores xPDOObject instances (which represent a row of data in a table) in it's payload, along with various attributes that control how the object is installed/uninstalled in a Core Workspace (see xPDOVehicle Validators and xPDOVehicle Resolvers).
