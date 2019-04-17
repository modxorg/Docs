---
title: "mxExtendedMenu"
_old_id: "1372"
_old_uri: "revo/mxextendedmenu"
---

## Purpose

mxExtendedMenu was built to boost large content menus by reducing the processing overhead used with chunks. In addition it provides an extremely flexible and targeted set of templates based on resource depth, type and more. If you have a mega-menu or complex html structure then this is also a good alternative. Note that by default to boost performance, as its the main purpose, all template properties are expected to be the actual html block of code to use, see parameter enableModifiers for more information on using chunks for the added control via output modifiers.

## Parameters

| Parameter     | Type   | Default         | Purpose/Use                                                        |
| ------------- | ------ | --------------- | ------------------------------------------------------------------ |
| docid         | int    | \[\[\*id\]\]    | Specify the starting resource id to build the menu from            |
| depth         | int    | 10              | Max depth the menu should be built to                              |
| contextFilter | string | current context | Used to over ride and use external context resources to build menu |
