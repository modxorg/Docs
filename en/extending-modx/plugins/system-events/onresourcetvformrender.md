---
title: "OnResourceTVFormRender"
description: "Fires when the Template Variables tab is rendered in the Resource editor."
---

## Event: OnResourceTVFormRender

Fires when the Template Variables tab is rendered in the Resource editor (both when creating and editing a Resource).

- Service: 1 - Parser Service Events
- Group: Resources

## Event Parameters

| Name       | Description                                                       |
| ---------- | ----------------------------------------------------------------- |
| categories | An array of the TV categories, passed by reference.               |
| template   | The ID of the Resource's Template.                                |
| resource   | The ID of the Resource being edited.                              |
| tvCounts   | An array with the count of TVs per category, passed by reference. |
| hidden     | Whether the TV tab is hidden, passed by reference.                |

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
