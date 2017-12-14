---
title: "TinyMCE.Table controls"
_old_id: "1021"
_old_uri: "revo/tinymce/tinymce.table-controls"
---

To add some table controls to the TinyMCE editor, you will need to change two settings. You can find these under System -> System Settings and choose "tinymce" in the namespace dropdown - that's the one defaulting to "core" on top of the grid.

In there, find and add the following:

- tiny.custom\_plugins: Add 'table' somewhere in there, making sure it stays a proper comma delimited list.
- tiny.custom\_buttonsN: Any of the 5 settings where you want the table controls to be shown, for example tiny.custom\_buttons3, and add 'tablecontrols' while making sure it stays a proper comma delimited list.

From: <http://modxcms.com/forums/index.php/topic,65609.msg370576.html#msg370576>