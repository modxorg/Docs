---
title: "MODx.util.getHeaderBreadCrumbs"
---

## MODx.util.getHeaderBreadCrumbs

For som epages you might want to show breadcrubs as a quick way to navigate in the hierarchy. Under `MODx.util` there's a function `getHeaderBreadCrumbs` that'll stub out a breadcrumb header for your page.

## Parameters

| Name   | Description                                                                                                                                              | Default |
| ------ | -------------------------------------------------------------------------------------------------------------------------------------------------------- | ------- |
| header | String ID of the header that should be created or header object (needs an ID as well).                                                                   |         |
| trail  | Array of trail objects. The trail object is required to have `text` and `href` properties. If you don't want to set `href`, set it as `null` or `false`. | []      |

## Returns

This function returns flavoured `modx-breadcrumbs-panel` object with this id: `modx-header-breadcrumbs`. Functions worth noting that you may want to use:

-   updateTrail - takes `trail` and `replace` parameters. `trail` can be array of trail objects or a single trail object. if `true` is passed in `replace`, whole trail will get replaced
-   updateHeader - takes `text` as a parameter and will update the header itself (the last part of breadcrumbs)

## Examples

Examples of a usage can be found in `modx.panel.resource.js`, `modx.panel.user.js`, `modx.panel.source.js` or `modx.panel.context.js`.

Usually you call the util function insited panel's items and define the home crumb:

```javascript
MODx.util.getHeaderBreadCrumbs("modx-context-name", [
    {
        text: _("contexts"),
        href: MODx.getPage("context")
    }
]);
```

Then from the `setup` listener or key events on `name` (or whatever other) filed you call `updateHeader`:

```javascript
Ext.getCmp("modx-header-breadcrumbs").updateHeader(r.object.key);
```
