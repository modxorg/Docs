---
title: "Discuss.Controllers.board.xml"
_old_id: "815"
_old_uri: "revo/discuss/discuss.controllers/discuss.controllers.board/discuss.controllers.board.xml"
---

The board.xml controller is what powers the board XML (RSS) feeds.

This controller does not use the wrapper template, but does extend the Discuss.Controllers.board controller for virtually all other behavior. Exceptions noted below under Options.

<div>- [Basic Information](#Discuss.Controllers.board.xml-BasicInformation)
- [Options](#Discuss.Controllers.board.xml-Options)

</div>Basic Information
-----------------

<table><tbody><tr><td>Since Version</td><td>1.0</td></tr><tr><td>Controller File</td><td>controllers/web/board.xml.class.php</td></tr><tr><td>Controller Class Name</td><td>DiscussBoardXmlController   
</td></tr><tr><td>Controller Template</td><td>pages/board.xml.tpl</td></tr><tr><td>Manifest Name</td><td>board</td></tr></tbody></table>Options
-------

If you don't know what the manifest is, please go back to the [Getting Started](/extras/revo/discuss/discuss.getting-started "Discuss.Getting Started") document. The options below need to go into the "board.xml" options array of the manifest.

This controller accepts all options from the board controller, with the following changes/additions:

<table><tbody><tr><th>Key</th><th>Default</th><th>Description</th></tr><tr><td>tpl   
</td><td>disBoardPostXml</td><td>A tpl chunk for the individual listings.</td></tr><tr><td>mode</td><td>rss</td><td>This dedicates some special behaviour in getting the list of items in the feed.</td></tr><tr><td>get\_category\_name   
</td><td>true</td><td>Makes the category\_name placeholder available in individual posts.</td></tr></tbody></table>