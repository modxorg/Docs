---
title: "Reserved Parameters"
_old_id: "259"
_old_uri: "2.x/developing-in-modx/other-development-resources/reserved-parameters"
---

You can typically use any parameters you'd like when creating [custom manager pages](extending-modx/custom-manager-pages "Custom Manager Pages") or other integrations, but there are a couple of exceptions. 

## Reserved parameters in the manager

The following parameters are used by the manager for various purposes. 

- `a` – used to define an action or controller
- `namespace` - indicates what namespace the action belongs to; when not specified defaults to `core`
- `context_key` – specifies one of your contexts (e.g. "web" or "mgr")
- `wctx` - specifies the "working context" which is the context the current "thing" belongs to, rather than the context "mgr". 
- `class_key` – specifies a class name, e.g. when creating a Weblink or static resource
- `id` - specifies the ID a certain action or controller defaults to.

## Reserved parameters in the front-end

- `q` - used when friendly URLs are enabled for routing a request to the right resource. Can be changed with the `request_param_alias` system setting, but recommended to leave unchanged.
- `id` - used when friendly URLs are disabled for fetching the current resource. Can be changed with the `request_param_id` system setting, but recommended to leave unchanged.

## Reserved `$_SESSION` variables

- `cultureKey`
- all parameters prefixed with `modx.`
