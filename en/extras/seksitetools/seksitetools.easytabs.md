---
title: "easytabs"
_old_id: "982"
_old_uri: "revo/seksitetools/seksitetools.easytabs"
---

## What is easytabs?

Easytabs will create css tabs on a page.

## Usage

Example for easytabs:

``` php
[[easytabs? &tabContent=`
    [{"tab_id":"one","tab_name":"One","tab_content":"Content 1"},
    {"tab_id":"two","tab_name":"Two","tab_content":"Content 2"},
    {"tab_id":"three","tab_name":"Three","tab_content":"$chunkName"}]
`]]
```

See the snippet properties for more options.

## Properties

| Name       | Description                                  | Default | Required | Version |
| ---------- | -------------------------------------------- | ------- | -------- | ------- |
| tabContent | JSON array of data to display in the tabs.   |         | Yes      | >0.0.2  |
| cssFile    | Specify the location of the css file to use. |         |          | >0.0.2  |

### tabContent

| Name         | Description                                                                                      | Default | Required | Version |
| ------------ | ------------------------------------------------------------------------------------------------ | ------- | -------- | ------- |
| tab\_id      | ID for the field.                                                                                |         | Yes      | >0.0.2  |
| tab\_name    | Name to display on the tab.                                                                      |         | Yes      | >0.0.2  |
| tab\_content | Content to display in the tab. To display content from a chunk prefix the chunk name with a "$". |         | Yes      | >0.0.2  |
