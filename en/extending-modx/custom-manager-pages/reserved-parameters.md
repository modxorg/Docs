---
title: "Reserved Parameters"
_old_id: "259"
_old_uri: "2.x/developing-in-modx/other-development-resources/reserved-parameters"
---

Parameters of [custom manager pages](extending-modx/custom-manager-pages "Custom Manager Pages") and other integrations are free, with a few exceptions.

## Reserved parameters in the manager

The manager uses these parameters:

- `a` - the action or controller
- `namespace` - the namespace the action belongs to; defaults to `core` when omitted
- `context_key` - one of your contexts (e.g. "web" or "mgr")
- `wctx` - the "working context": the context the current item belongs to, rather than "mgr"
- `class_key` - a class name, e.g. when creating a Weblink or static resource
- `id` - the ID a certain action or controller defaults to

`action` is **not** a manager parameter — the manager only reads `a`. Connectors use `action` to select a processor.

System settings that affect manager routing and assets: `manager_theme` (picks the theme whose `controllers/` and `templates/` directories are searched first), `welcome_action` (the action of the manager's Welcome page), and `manager_path` / `manager_url` (the physical and URL locations of the manager).


## Reserved parameters in the front-end

- `q` - with friendly URLs enabled, routes a request to the right resource. Changeable via the `request_param_alias` system setting, but leave it unchanged.
- `id` - with friendly URLs disabled, fetches the current resource. Changeable via the `request_param_id` system setting, but leave it unchanged.

## Reserved `$_SESSION` variables

- `cultureKey`
- all parameters prefixed with `modx.`
