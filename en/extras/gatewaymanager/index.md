---
title: "GatewayManager"
description: "GatewayManager plugin"
---

## What is GatewayManager?

With the `GatewayManager` you're able to make your domains available for certain context inside your MODX installation. You even can link a resource as new start page and the `GatewayManager` provides a placeholder with the original URL (useful for canonical tags).

### Requirements

- MODX Revolution 2.0.0-RC-2 or later
- PHP5 or later

### History

`GatewayManager`, was written by Bert Oost ([www.oostdesign.com](https://www.oostdesign.com)), a simple but effective component to handle domains and contexts inside MODX, and first released on November 13th, 2011.
It is now developed and maintained by Anton Tarasov at ([https://github.com/himurovich/MODX-GatewayManager](https://github.com/himurovich/MODX-GatewayManager))

### Download

It can be downloaded from within the MODX Revolution manager via [Package Management](building-sites/extras "Package Management"), or from the MODX Extras Repository.

## Development and Bug Reporting

`GatewayManager` is stored and developed in GitHub, and can be found here: <https://github.com/himurovich/MODX-GatewayManager>

Bugs can be filed here: <https://github.com/himurovich/MODX-GatewayManager/issues>

## How to use it

The `GatewayManager` for MODX Revolution is configured to be running automatically. When installing it through the [Package Manager](building-sites/extras) you don't need to do anything except setting up the domains. The `GatewayManager` will be available below the Components menu item. Please setup the next settings for each context.

---

Note: that these settings are not necessary for the default MODX "web" context, just leave that one blank

---

- `http_host` - The domain without `http://` and trailing slash
- `site_url` - The domain including `http://` and trailing slash
- `site_start` - The id of the default start page of the context

If you wanna use the canonical tag, you can use this tag to create it completely automatic.

``` php
[[!+gateway.canonical:notempty=`<link rel="canonical" href="[[+gateway.canonical]]" />`]]
```

**Notice:** to handle multiple domains your domains should point all to the same directory (of where MODX is installed). This is generally done with DNS but within your hosting this could be different. When you're unsure contact your hosting about it. When the domains not all pointing to the same directory the `GatewayManager` will not work.
