---
title: "xml"
_old_id: "815"
_old_uri: "revo/discuss/discuss.controllers/discuss.controllers.board/discuss.controllers.board.xml"
---

The board.xml controller is what powers the board XML (RSS) feeds.

This controller does not use the wrapper template, but does extend the Discuss.Controllers.board controller for virtually all other behavior. Exceptions noted below under Options.

## Basic Information

| Since Version         | 1.0                                 |
| --------------------- | ----------------------------------- |
| Controller File       | controllers/web/board.xml.class.php |
| Controller Class Name | DiscussBoardXmlController           |
| Controller Template   | pages/board.xml.tpl                 |
| Manifest Name         | board                               |

## Options

If you don't know what the manifest is, please go back to the [Getting Started](/extras/revo/discuss/discuss.getting-started "Discuss.Getting Started") document. The options below need to go into the "board.xml" options array of the manifest.

This controller accepts all options from the board controller, with the following changes/additions:

| Key                 | Default         | Description                                                                     |
| ------------------- | --------------- | ------------------------------------------------------------------------------- |
| tpl                 | disBoardPostXml | A tpl chunk for the individual listings.                                        |
| mode                | rss             | This dedicates some special behaviour in getting the list of items in the feed. |
| get\_category\_name | true            | Makes the category\_name placeholder available in individual posts.             |