---
title: "Controllers and Menus"
_old_id: "10"
_old_uri: "2.x/developing-in-modx/advanced-development/custom-manager-pages/actions-and-menus"
description: "How manager actions resolve to controllers, connectors and processors"
---

Server-side, **Controllers** fetch data, register assets, and load the Smarty **templates** that hold the bare markup; ExtJS renders the interface in the browser. AJAX calls go to a **Connector** (usually `/connectors/index.php`), which routes the request's `action` to a **Processor** that loads or changes data.

A controller is identified by namespace + action from the URL: the `a` parameter carries the action (read server-side from `$_REQUEST`), and `namespace` defaults to `core`. Core controllers and templates live in `/manager/`; extras keep theirs in their namespace directory under `core/components/`.

## How an action resolves to a controller

Given `?a=some/action&namespace=mycomponent`, the manager looks for the controller in this order (`modManagerResponse::getControllerClassName()`):

1. PSR-4 class `\MODX\Revolution\Controllers\Some\Action` — if it exists, no file is loaded; preferred way in 3.x and available to extras.
2. Legacy global class `<Namespace><Action>ManagerController`, e.g. `MycomponentSomeActionManagerController` (namespace and action split on `/`, each part ucfirst'd).
3. File `controllers/some/action.class.php`.
4. File `controllers/some/action/index.class.php`.

If no class matches, the file is looked up under `controllers/` in this order: the active theme folder, `default/`, then the namespace root. Nothing found — the manager throws a not-found exception. Menu permissions (`modMenu.permissions`) are checked before the controller runs — see [Menus](extending-modx/menus).

## Related Pages

- [Custom Manager Pages](extending-modx/custom-manager-pages "Custom Manager Pages")
- [Internationalization](extending-modx/internationalization "Internationalization")
