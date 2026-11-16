---
title: "Contexts"
description: "Contexts in MODX: how they override system settings, how to create one, and how access to them is granted."
---

A Context is a named set of configuration overrides that a request runs under. It has its own settings, its own branch of the resource tree and its own access rules.

MODX ships with two contexts: `web` (Website) for the front end and `mgr` (Manager) for the manager. The **key** is the value passed to `initialize()` and `switchContext()`. The **name** is a label in the interface.

## Creating a Context

Open **Admin** (the gear in the top menu) → **Contexts**. **Create** opens a form:

| Field | Required | Meaning |
| --- | --- | --- |
| **Context Key** | yes | the identifier of the context |
| **Name** | yes | the label shown in the manager and in the resource tree |
| **Description** | no | free text |
| **Rank** | no | the order of the context in the tree |

The keys `mgr`, `web` and `root` are reserved. A key starts with a letter. After that it may contain letters, digits, a hyphen, a dot and a slash. An underscore is rejected, so `domain_2` is not saved.

A new context gets access immediately:

- the **Administrator** user group receives the *Context* policy
- the anonymous user receives the *Load Only* policy: the right `load` and nothing else

The anonymous entry shows as **(anonymous)** on the context's **Access Permissions** tab. Remove that entry to take the access away.

Each context is its own branch in the resource tree. Drag a resource to another context.

**Duplicate** copies the settings, the access rules and the media sources. **Duplicate resources** is checked in that window and copies the resources. Clear the box to leave the resources where they are.

## Context Settings

A context setting overrides the [System setting](building-sites/settings) of the same name. A user group setting overrides the context setting. A user setting overrides the user group setting.

```
System setting → Context setting → User Group setting → User setting
```

Edit a setting on the **Context Settings** tab: **Contexts** → right-click a context → **Edit**. Changing a setting clears that context's cache. You do not need to clear the cache by hand.

Settings a context usually overrides:

| Setting | What it changes |
| --- | --- |
| `base_url` | the path in the context's URLs |
| `http_host` | the host the URLs are built for |
| `site_url` | the context's full URL: scheme, host and path |
| `site_start` | the resource that opens the context |
| `cultureKey`, `locale` | the language and the locale of the request |

These settings control the context's session cookie. They keep the core values unless the context overrides them:

| Setting | Value by default |
| --- | --- |
| `session_name` | empty: PHP keeps its own default |
| `session_cookie_path` | `MODX_BASE_URL`, or the `base_url` setting when it is set |
| `session_cookie_domain` | empty |
| `session_cookie_secure` | `false` |
| `session_cookie_httponly` | `true` |
| `session_cookie_samesite` | empty |
| `session_cookie_lifetime` | `604800` (7 days). A context can set `0`, and then the cookie lasts until the browser closes |

## Context Access

Access is granted per user group. Open the lock icon in the user menu → **Access Control Lists** → a user group → **Access Permissions** → **Contexts**.

A user group's access panel has five tabs: **Contexts**, **Resource Groups**, **Element Categories**, **Media Sources** and **Namespaces**. A policy does not pick the tab. The policy template has to belong to the same group as the tab you are editing.

## Reading Context Settings

Read the current context's setting like any other setting. The call does not show which level supplied the value:

``` php
[[++my_context_setting]]
```

``` php
$setting = $modx->getOption('my_context_setting');
```

For a specific context:

``` php
$setting = $modx->context->getOption('my_context_setting');
$setting = $modx->getContext('web')->getOption('my_context_setting');
```

The request language comes from the first source that has a value:

1. the request's `cultureKey` parameter
2. the session's `cultureKey`
3. the user setting `cultureKey`
4. the context's `cultureKey`
5. the `cultureKey` system setting

If every source is empty, or the value fails the character check, the language is `en`. The check allows `A-Z`, `a-z`, `0-9`, `_` and `-`. In the manager, `manager_language` replaces that result.

## Choosing a Context at Runtime

A request starts in the context the gateway chooses. Two mechanisms change that:

- the gateway file `config.context.php` next to `index.php`. The file returns the context key the request starts in. See [Using Virtual Hosts](building-sites/contexts/virtual-host);
- a Plugin on `OnHandleRequest` that calls `switchContext()`. See [Using a Gateway Plugin](building-sites/contexts/gateway-plugin).

``` php
if ($modx->switchContext('domain2')) {
    // the request continues in the context "domain2"
}
```

`switchContext($contextKey, $reload = false)` returns `false` when the context was not loaded, and when the key is already the current context. In the second case the context is not loaded again. Check the result: on a request that is already in `domain2`, the example above takes the failure branch.

Switching the context during the request does not load a custom session handler, and it does not change the language, the locale or the session cookie. Those come from the context that `index.php` started in. A domain that needs its own language or cookie uses its own directory with `config.context.php`. See [Using Virtual Hosts](building-sites/contexts/virtual-host).

## Events

| Event | When it fires |
| --- | --- |
| `OnContextInit` | a context is loaded. A successful `switchContext()` to a different context loads it. A call for the context that is already current does not |
| `OnContextBeforeSave` | before a context is saved |
| `OnContextSave` | after a context is saved |
| `OnContextBeforeRemove` | before a context is removed |
| `OnContextRemove` | after a context is removed |
| `OnContextFormPrerender` | before a context form is rendered |
| `OnContextFormRender` | after a context form is rendered |

MODX 2 events often named in older material do not exist in MODX 3: `OnContextSwitch`, `OnSiteInit`, `OnSiteRender`, `OnManagerInit` and `OnBeforeRequest`.

## System Settings

| Setting | Value by default | What it does |
| --- | --- | --- |
| `default_context` | `web` | the context the create form uses when the resource is not created inside another context's branch. A branch of the tree uses that branch's context |
| `access_context_enabled` | `true` | checks the access to a context on every request; switching it off ignores every context access rule |
| `allow_forward_across_contexts` | `false` | lets a symlink and `sendForward()` reach a resource in another context |
| `cache_context_settings` | `true` | caches context settings |
| `use_context_resource_table` | `true` | keeps the table of resources that belong to several contexts |
| `context_tree_sort` | `true` | turns sorting of contexts in the resource tree on. The field is `context_tree_sortby` |
| `context_tree_sortby` | `rank` | the field the contexts of the tree are sorted by |
| `context_tree_sortdir` | `ASC` | the direction of the sorting |

## Media Sources of a Context

You can set an element's media source for one context. The element uses its own context's source. With no source on the context, it keeps the element's default source.

## One Resource in Several Contexts

A resource normally belongs to one context. With `use_context_resource_table` on, the `context_resource` table stores resources that belong to several contexts. MODX finds such a resource in each listed context.

## See Also

1. [Using Virtual Hosts](building-sites/contexts/virtual-host)
2. [Using a Gateway Plugin](building-sites/contexts/gateway-plugin)
3. [System Settings](building-sites/settings)
4. [ACLs](building-sites/client-proofing/security/policies/acls)
