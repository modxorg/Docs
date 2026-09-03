---
title: "Updating Extras for 3.0"
description: "Checklist for Extra authors: namespaces, processors, xPDO models, menus, and CRC changes from MODX 2.x to 3.x."
sortorder: 2
---

Site owners follow [Upgrading from 2.x to 3.0](getting-started/upgrading-to-3.0). This page is for people who ship or maintain transport packages.

Compatible packages: [SiteDash extras list](https://sitedash.app/extras). Deep detail lives on the linked pages below. The [Collection](https://github.com/modxcms/Collections) notes from [theboxer](https://github.com/theboxer) (summarized on [modx.pro](https://modx.pro/development/19429)) show a real Extra that extends `modResource`.

## Decide support scope

| Goal | Approach |
| --- | --- |
| MODX 3 only | Use namespaced classes, PSR-4 models, `bootstrap.php`. Drop `require_once` of old core paths. |
| One package for 2.x and 3.x | Branch on version (`$modx->version['version'] >= 3`), use class-name prefixes or dynamic parent classes. More work. Overview: [Modernizing Extras cheat sheet](https://modx.com/blog/modernizing-extras-conversion-cheat-sheet). |

Global class aliases (`modResource`, `modObjectCreateProcessor`, …) still load by default in 3.0-3.2 via `load_deprecated_global_class_aliases`. They are scheduled to stop loading automatically in **3.3**. Plan namespaced code before that. See [Changed class names](getting-started/upgrading-to-3.0/class-names).

## Checklist

Work through each item that applies to your Extra.

1. **PHP version**: target the PHP floor of the MODX line you support ([requirements](getting-started/upgrading-to-3.0/requirements)).
2. **Class names**: replace short core names in `extends`, type hints, and `instanceof` with `MODX\Revolution\…` / `xPDO\…`. Tables: [Changed class names](getting-started/upgrading-to-3.0/class-names).
3. **Processors**: extend the new processor namespaces. Remove flat-file processors. Drop `require_once` of `core/model/modx/modprocessor.class.php` and `…/processors/resource/*.class.php` (those paths are gone). Details: [Processors](getting-started/upgrading-to-3.0/processors).
4. **xPDO models**: schema `package` as a PHP namespace, `version="3.0"`, regenerate `metadata.mysql.php`, call `addPackage` with a namespace prefix, register PSR-4. Guide: [xPDO 3](getting-started/upgrading-to-3.0/xpdo).
5. **`bootstrap.php`**: optional file at the Extra core root (namespace path). Register autoload, `addPackage`, and DI services. See [Namespaces](extending-modx/namespaces) and [DI container](extending-modx/di-container).
6. **Menus / CMP**: no `modAction`. Menu `action` is a controller name inside the namespace (`/manager/?namespace=myextra&a=home`). See [modAction and related](getting-started/upgrading-to-3.0/actions).
7. **Manager JS**: `MODx.config.manager_language` → `MODx.config.cultureKey` ([Manager language](getting-started/upgrading-to-3.0/manager-language)).
8. **HTTP client**: `modRestClient` is gone. Use the [HTTP service](extending-modx/services/http).
9. **Build / install**: test install and upgrade on MODX 3. Prefer current scaffolds ([ModExtra3](https://github.com/modx-pro/ModExtra3) for 3.x). Package markdown attributes are parsed in 3.0 ([build script](extending-modx/transport-packages/build-script)).

## Example: Extra that extends `modResource` (Collections pattern)

If a custom resource must appear among `$modx->getDescendants(\MODX\Revolution\modResource::class)`, the schema `extends` value must use the namespaced core class.

### Schema

Before:

```php
<object class="CollectionContainer" extends="modResource">
    <!-- columns unchanged -->
</object>
```

After:

```php
<object class="CollectionContainer" extends="MODX\Revolution\modResource">
    <!-- columns unchanged -->
</object>
```

Rebuild the model so `metadata.mysql.php` picks up the change.

### PHP class and processors

Delete obsolete includes such as:

```php
require_once MODX_CORE_PATH . 'model/modx/modprocessor.class.php';
require_once MODX_CORE_PATH . 'model/modx/processors/resource/create.class.php';
require_once MODX_CORE_PATH . 'model/modx/processors/resource/update.class.php';
```

Extend the namespaced types instead:

| 2.x | 3.x |
| --- | --- |
| `modResource` | `MODX\Revolution\modResource` |
| `modResourceCreateProcessor` | `MODX\Revolution\Processors\Resource\Create` |
| `modResourceUpdateProcessor` | `MODX\Revolution\Processors\Resource\Update` |

Same idea for any custom `{ClassKey}CreateProcessor` / `{ClassKey}UpdateProcessor`. See [Processors](getting-started/upgrading-to-3.0/processors) and [Custom resource classes](building-sites/resources/custom-resources).

## Related pages

- [Breaking changes](getting-started/upgrading-to-3.0/breaking-changes)
- [Changed class names](getting-started/upgrading-to-3.0/class-names)
- [Processors](getting-started/upgrading-to-3.0/processors)
- [xPDO 3](getting-started/upgrading-to-3.0/xpdo)
- [modAction and related](getting-started/upgrading-to-3.0/actions)
- [Namespaces](extending-modx/namespaces)
- [Modernizing Extras (MODX blog series)](https://modx.com/blog/modernizing-extras-conversion-cheat-sheet)
