---
title: "Controllers and Menus"
_old_id: "10"
_old_uri: "2.x/developing-in-modx/advanced-development/custom-manager-pages/actions-and-menus"
---

MODX uses a number of concepts for its core and manager.

Server-side you'll find **Controllers** that fetch data and registers assets for (pre-)rendering a page and loading (Smarty) **templates** to output. Most templates are very bare-bones, with the actual rendering of the interface done server-side by ExtJS.  

Controllers are identified by the combination of the namespace and action, passed in as URL parameters in the manager. When no namespace is specified, the core namespace is assumed. The action is specified in the `a` URL paramter.

From the client-side, AJAX requests are send to one of a few **Connectors**, typically `/connectors/index.php`. Based on the `action` in that request, the appropriate **Processor** is loaded that does the actual loading/manipulating of data.

Core controllers and templates are found in `/manager/`, while third party components have them in their own namespace directory in `core/components/`. 

## Related Pages

- [Custom Manager Pages](extending-modx/custom-manager-pages "Custom Manager Pages")
- [Internationalization](extending-modx/internationalization "Internationalization")
