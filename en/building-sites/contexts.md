---
title: "Contexts"
description: "Contexts in MODX: how they override system settings, how to create one, how access to them is granted, and the API, events and processors behind them."
---

A Context is a named set of configuration overrides that a request runs under: its own settings, its own branch of the resource tree and its own access rules.

MODX ships with two contexts — `web` (Website) for the front end and `mgr` (Manager) for the manager. A context is addressed by its **key**, the value passed to `initialize()` and `switchContext()`. The **name** is a label for the interface.

## Creating a Context

Contexts are managed in the manager: **Admin** (the gear in the top menu) → **Contexts** (`?a=context`). The **Create** button opens a form with four fields:

| Field | Required | Meaning |
| --- | --- | --- |
| `key` | yes | the identifier of the context |
| `name` | yes | the label shown in the manager and in the resource tree |
| `description` | no | free text |
| `rank` | no | the order of the context in the tree |

The keys `mgr`, `web` and `root` are reserved by the core.

A new context is granted access right away: the **Administrator** user group receives the *Context* policy, the anonymous user the *Load Only* policy — the right `load` and nothing else. The anonymous access is skipped when the request to the processor carries `enableAnonymous=0`.

Contexts appear in the resource tree as their own branch. Resources are moved between contexts by dragging them.

## Context Settings

Context settings override the [System settings](building-sites/settings) of the same name, and user settings override the settings of the context. The order is:

```
System setting → Context setting → User setting
```

A context setting is edited on the **Context Settings** tab: **Contexts** → right-click a context → **Edit**. Changing a setting clears the cache of that context, so no manual cache clear is needed.

The settings a context usually overrides:

| Setting | What it changes |
| --- | --- |
| `base_url` | the path part of the URLs of the context |
| `http_host` | the host the URLs are built for |
| `site_url` | the full URL of the context: scheme, host and path |
| `site_start` | the resource that opens the context |
| `cultureKey`, `locale` | the language and the locale of the request |

The session settings configure the session cookie of the context and keep the values of the core unless the context overrides them:

| Setting | Value by default |
| --- | --- |
| `session_name` | empty — PHP keeps its own default |
| `session_cookie_path` | `MODX_BASE_URL`, or the `base_url` setting when it is set |
| `session_cookie_domain` | empty |
| `session_cookie_secure` | `false` |
| `session_cookie_httponly` | `true` |
| `session_cookie_samesite` | empty |
| `session_cookie_lifetime` | `0` |

## Context Access

Access to a context is granted per user group on the **Contexts** tab of the access panel: the lock icon in the user menu → **Access Control Lists** → a user group → **Access Permissions** → **Contexts**.

A policy on a context decides which of the five access areas applies: Context, Resource Group, Element Category, Media Source and Namespace. A policy without an area covers the context itself.

## Reading Context Settings

A setting of the current context is read like any other setting — the level it comes from is not visible to the reader:

``` php
[[++my_context_setting]]
```

``` php
$setting = $modx->getOption('my_context_setting');
```

The setting of a specific context is read from that context:

``` php
$setting = $modx->context->getOption('my_context_setting');
$setting = $modx->getContext('web')->getOption('my_context_setting');
```

The language of a request is taken from the first source that has a value:

1. the `cultureKey` parameter of the request
2. the `cultureKey` of the session
3. the `cultureKey` of the context
4. the `cultureKey` System setting

The code accepts only the characters `A-Z`, `a-z`, `0-9`, `_` and `-` in a `cultureKey`.

## Choosing a Context at Runtime

A request starts in the context named by the gateway. Two mechanisms change that:

- the gateway file `config.context.php` next to `index.php` — the file returns the key of the context to start in. See [Serving a Second Domain](building-sites/contexts/virtual-host);
- a Plugin on the `OnHandleRequest` event that calls `switchContext()`. See [Using a Gateway Plugin](building-sites/contexts/gateway-plugin).

The method that switches the context:

``` php
if ($modx->switchContext('domain2')) {
    // the request continues in the context "domain2"
}
```

`switchContext($contextKey, $reload = false)` returns `false` when the context was not loaded, so the result has to be checked.

Switching the context does **not** load a custom session handler — the handler is set by the gateway: see [Using a Gateway Plugin](building-sites/contexts/gateway-plugin).

## Events

| Event | When it fires |
| --- | --- |
| `OnContextInit` | a context is loaded: on every request and on every `switchContext()` |
| `OnContextBeforeSave` | before a context is saved |
| `OnContextSave` | after a context is saved |
| `OnContextUpdate` | a context is updated in the manager |
| `OnContextBeforeRemove` | before a context is removed |
| `OnContextRemove` | after a context is removed |
| `OnContextFormPrerender` | before the form of a context is rendered |
| `OnContextFormRender` | after the form of a context is rendered |

The events of MODX 2 that are often named in older material — `OnContextSwitch`, `OnSiteInit`, `OnSiteRender`, `OnManagerInit` and `OnBeforeRequest` — do not exist in MODX 3.

## System Settings

| Setting | Value by default | What it does |
| --- | --- | --- |
| `default_context` | `web` | the context new resources are created in |
| `access_context_enabled` | `true` | checks the access to a context on every request; switching it off ignores every context access rule |
| `allow_forward_across_contexts` | `false` | lets a symlink and `sendForward()` reach a resource in another context |
| `cache_context_settings` | `true` | caches the settings of the contexts |
| `use_context_resource_table` | `true` | keeps the table of resources that belong to several contexts |
| `context_tree_sort` | `true` | sorts the contexts in the resource tree by name |
| `context_tree_sortby` | `rank` | the field the contexts of the tree are sorted by |
| `context_tree_sortdir` | `ASC` | the direction of the sorting |

## Processors

The processors of the contexts and the permission each of them needs:

| Processor | Permission |
| --- | --- |
| `Context/Create` | `new_context` |
| `Context/Duplicate` | `new_context` |
| `Context/Get` | `view_context` |
| `Context/GetList` | `view_context` |
| `Context/Update` | `edit_context` |
| `Context/UpdateFromGrid` | `edit_context` |
| `Context/Remove` | `delete_context` |
| `Context/Setting/Create` | `settings` |
| `Context/Setting/Get` | `settings` |
| `Context/Setting/GetList` | `settings` |
| `Context/Setting/Remove` | `settings` |
| `Context/Setting/Update` | the `save` policy of the context |

`Context/Duplicate` copies the settings, the access rules and the media sources of the context, and — with `duplicateResources=1` — its resources as well.

## Media Sources of a Context

The media source of an element can be set for a single context. The element uses the source of its own context and keeps the default source of the element when the context has none.

## One Resource in Several Contexts

A resource normally belongs to one context. With `use_context_resource_table` enabled, the table `context_resource` holds the resources that belong to several of them, and such a resource is found in each of the listed contexts.

## See Also

1. [Serving a Second Domain](building-sites/contexts/virtual-host)
2. [Using a Gateway Plugin](building-sites/contexts/gateway-plugin)
3. [System Settings](building-sites/settings)
4. [Access Control Lists](building-sites/client-proofing/security/policies/acls)
