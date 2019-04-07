---
title: "Move TV to Tab"
_old_id: "1353"
_old_uri: "2.x/administering-your-site/form-customization/form-customization-rules/move-tv-to-tab"
---

## The Move TV to Tab Rule

The Move TV to Tab rule will move any TV to the tab you specify.

## Usage

Specify the ID of the tab to move to in the "name" field of the Rule. Then specify the TV's ID prefixed with 'tv' in the "value" field.

The list of available tabs is:

| ID                     | Description                                 |
| ---------------------- | ------------------------------------------- |
| modx-resource-settings | The first tab, or Create/Edit resource tab. |
| modx-page-settings     | The second tab, or Page Settings tab.       |

You can also create a tab with the [New Tab](display/revolution20/New+Tab "New Tab") rule and move a TV there.

## Examples

An example rule for moving the TV 1 to the first tab in the Resource create page would look like so:

![](download/attachments/18678100/rule-tvMove.png?version=1&modificationDate=1279291685000)

## See Also

``` php
[[getResources@section? &parents=`1353` &context=`revolution`]]
```