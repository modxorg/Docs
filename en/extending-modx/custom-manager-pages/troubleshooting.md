---
title: "CMP Development FAQs & Troubleshooting"
_old_id: "1690"
_old_uri: "2.x/faqs-and-troubleshooting/cmp-development-faqs-and-troubleshooting"
---

FAQs and troubleshooting for Custom Manager Pages. Question numbers only help scanning.

This page is a work in progress. If you cannot edit it, [post additions and updates in this forum topic](http://forums.modx.com/thread/72123/faqs-troubleshooting-on-the-rtfm).

_To Editors:_

- Use heading 2 for categories and heading 3 for questions, so the table of contents is generated correctly.
- Move big subjects to a subpage; link existing pages from the first section.
- Keep the numbering correct when you add a question.
- Link generously to further reading.

Other Resources:

- [ExtJS 3.4.0 Documentation](https://docs.sencha.com/extjs/3.4.0/)
- [Custom Manager Pages](extending-modx/custom-manager-pages "Custom Manager Pages")
- [Developing an Extra in MODX Revolution](extending-modx/tutorials/developing-an-extra "Developing an Extra in MODX Revolution") (Specifically [part 2](extending-modx/tutorials/developing-an-extra/part-2 "Developing an Extra in MODX Revolution, Part II"))

## 1. General

### 1.1. What are connectors and processors? And what is a controller?

A connector is a web-accessible PHP file that is the target for back-end AJAX requests. It takes a POST request and routes it to the right processor (the "action" POST or URL parameter selects it). The processor does the work: it reads the POST data (the connector puts it in `$scriptProperties`) and returns a JSON array with the result.

A controller returns the markup (HTML) and inserts JavaScript and CSS on a back-end page.

Typical locations within a component:

- Processor: `core/components/mycomponent/processors/mgr/processorname.class.php` (custom processors must be named `<action>.class.php` and the file must return the class name; the class usually extends `\MODX\Revolution\Processors\Processor` or one of its descendants). MODX 3.x ships one connector, `/connectors/index.php`, routed by the `namespace` parameter; a component may also add its own bootstrap file under `assets/`, but nothing discovers it — see [Connectors](extending-modx/processors/connectors)
- Controller: `core/components/mycomponent/controllers/controllername.class.php`


### 1.2. Why do I need all those different parts in my manager page? Can't I just echo some values in my controller and build stuff from there?

Yes, you can.

The standard layout makes deployment to other installations easier (they expect files at those locations). It also lets users move the core folder out of the web root, which improves security.

### 1.3. What version of ExtJS does MODX Revolution use?

| MODX Version | ExtJS version |
| ------------ | ------------- |
| 3.x          | 3.4           |
| 2.3+         | 3.4           |
| 2.1.2-pl     | 3.4.0         |
| 2.1.0-rc1    | 3.3.1         |
| 2.0.4-pl     | 3.3.0         |
| 2.0.0-rc2    | 3.2.1         |

MODX 3 still ships Ext JS 3 (`manager/assets/ext3/`), so Ext JS 3.4 remains the API to target in CMPs. The manager can also load other JS frameworks alongside it for a specific page.

### 1.4. Can I use ExtJS widgets that MODX uses in the Manager in my own CMP as well?

Yes — that saves code, too.

Test your code on various releases: core code changes can break your implementation.

## 2. ExtJS / modExt Troubleshooting

### 2.1. Error: Syntax Error: Unexpected Token '<' on ext-all.js Line 7

This error after an AJAX request to a connector/processor usually means the response is not valid.

Often a PHP fatal error in the processor caused it. Inspect the outgoing request with Developer Tools to see what it returns and where the PHP error is.

### 2.2. Why does my [grid](extending-modx/custom-manager-pages/modext/modx.grid.grid "MODx.grid.Grid") send out two requests when I refresh it / changePage / filter?

A legacy bug, fixed for MODX 2.2-rc1, caused this. If requests are still doubled, check for listeners that call refresh/load, `changePage(0)` and `refresh()`, or otherwise fire the request twice.
